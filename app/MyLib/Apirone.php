<?php
namespace App\Mylib;

use mysqli;

class Apirone {

    // 콜백 토큰
    protected $CALLBACK_TOKEN = '00d7d102-d6a3-11ec-9d64-0242ac120002';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($callback_token="")
    {
        $this->CALLBACK_TOKEN=$callback_token;
        date_default_timezone_set("Asia/Seoul");

    }
    //create a new account
    public function createAccount(){
        
        

        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $database = "casino";


        // Create connection
        $dbConn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($dbConn->connect_error) {
            die("Connection failed: " . $dbConn->connect_error);
        }



        /****
         * 데이터 가져오기
         */


        $headers = apache_request_headers();
        $token_data = trim($headers['Callback-Token']);

        // 콜백 토큰 체크
        if ($this->CALLBACK_TOKEN != $token_data) {
            $result = [
                'result' => 100, // 콜백 토큰이 다르다면 100번으로 리턴
                'status' => 'ERROR',
            ];

            echo json_encode($result);
            exit;
        }

        $requestData = file_get_contents('php://input');
        $oData = json_decode($requestData);


        $command = $oData->command;
        $request_timestamp = $oData->request_timestamp; // UTC 기준

        $aCheckItem = explode(',', $oData->check);

        ///////////////////////
        // 해당 항목 오류가 없는지 검사
        ///////////////////////
        // 아래 점검 사항에서 구한
        // 사용자 정보, 베팅 정보 등은 하단의 데이터 처리에서 사용하면 됨
        ////////////////////////////////////////////////////////////

        $userInfo = '';
        $betInfo = '';
        foreach ($aCheckItem as $check) {
            switch ($check) {
                case 21:    // 사용자 확인
                    $user_id = $oData->data->user_id;

                    $sql = "SELECT * FROM user_casino WHERE user_id='{$user_id}'";
                    $result = $dbConn->query($sql);

                    if ($result->num_rows > 0) {
                        $userInfo = $result->fetch_assoc();
                    }

                    if (!$userInfo) {
                        $aResult = [
                            'result' => $check,
                            'status' => 'ERROR',
                        ];

                        $dbConn->close();
                        echo json_encode($aResult);
                        exit;
                    }
                    break;

                case 22:    // 활동 회원인지 확인
                    if ($userInfo['status'] != "Active") {    // 활동 회원이 아닐 때
                        $aResult = [
                            'result' => $check,
                            'status' => 'ERROR',
                        ];

                        $dbConn->close();
                        echo json_encode($aResult);
                        exit;
                    }
                    break;

                case 31: // 보유 머니 확인
                    $amount = intval($oData->data->amount); // 베팅, 적중 금액 (DECIMAL 18,2)  원화이므로 int로 변환해서 처리하면 안전.

                    if ($userInfo['money'] < $amount) {   // 베팅 금액보다 보유 금액이 적을 때
                        $aResult = [
                            'result' => $check,
                            'status' => 'ERROR',
                            'data' => [
                                'balance' => $userInfo['money'],
                            ],
                        ];

                        $dbConn->close();
                        echo json_encode($aResult);
                        exit;
                    }
                    break;

                case 41:    // 이미 처리한 transaction인지 확인
                    $transaction_id = $oData->data->transaction_id; // 유일한 string 값인지 확인

                    $sql = "SELECT * FROM bet_casino WHERE transaction_id='{$transaction_id}'";
                    $result = $dbConn->query($sql);

                    // transaction id는 모두 저장해둬야 하고
                    // 작업 처리여부 점검
                    if ($result->num_rows > 0) {
                        $aResult = [
                            'result' => 0,
                            'status' => 'OK',
                            'data' => [
                                'balance' => $userInfo['money'],
                            ],
                        ];

                        $dbConn->close();
                        echo json_encode($aResult);
                        exit;
                    }
                    break;

                case 42:   // transaction 아이디가 존재하는지 확인
                    $transaction_id = $oData->data->transaction_id;  // 유일한 string 값

                    // transaction id는 모두 저장해둬야 하고
                    // 작업 처리여부 점검
                    $sql = "SELECT * FROM bet_casino WHERE transaction_id='{$transaction_id}'";
                    $result = $dbConn->query($sql);

                    // transaction id는 모두 저장해둬야 하고
                    // 작업 처리여부 점검
                    if ($result->num_rows > 0) {
                        $betInfo = $result->fetch_assoc();
                    } else {
                        $aResult = [
                            'result' => $check,
                            'status' => 'ERROR',
                            'data' => [
                                'balance' => $userInfo['money'],
                            ],
                        ];

                        $dbConn->close();
                        echo json_encode($aResult);
                        exit;
                    }
                    break;
            }
        }

        //////////////////////
        // 정상 완료 처리
        //////////////////////
        $aResult = [];
        switch ($command) {
            case "authenticate":
                $aResult = [
                    'result' => 0,
                    'status' => 'OK',
                    'data' => [
                        'account' => $userInfo['user_id'],  // 유일한 사용자 ID (string : 4 ~ 15까지 가능)
                        'nickname' => $userInfo['user_nickname'],   // 사용자 닉네임 (string : 2 ~ 15까지 가능)
                        'balance' => $userInfo['money'],
                    ],
                ];
                break;

            case "balance":
                $aResult = [
                    'result' => 0,
                    'status' => 'OK',
                    'data' => [
                        'balance' => $userInfo['money'],
                    ],
                ];
                break;

            case "bet": // 주문 요청 처리
                $transaction_id = $oData->data->transaction_id;  // 유일한 string 값
                $transaction_timestamp = $oData->timestamp;   // transaction 발생 시간 (UTC)
                $amount = intval($oData->data->amount); // 베팅, 적중 금액 (DECIMAL 18,2)  원화이므로 int로 변환해서 처리하면 안전.
                $game_id = $oData->data->game_id;   // 게임 ROUND ID (여러 bet, win에 대한 관련 내역을 식별하는 ID)
                $game_type = $oData->data->game_type;   // 게임 종류 (바카라, 포커 등...)
                $round_id = $oData->data->round_id; // 게임 ROUND 참조 ID


                // 베팅 내역 기록하고
                // 사용자 베팅 금액 만큼 보유금액 차감

                $user_id = $userInfo['user_id'];
                $request_datetime = time();
                $sql = "INSERT INTO bet_casino VALUES ('{$transaction_id}', '{$user_id}', '{$game_id}', '{$round_id}', 'BET', '{$amount}', '{$request_datetime}')";
                $result = $dbConn->query($sql);

                if (!$result) {
                    $aResult = [
                        'result' => 99,
                        'status' => 'ERROR',
                        'data' => [
                            'balance' => $userInfo['money'],
                        ],
                    ];

                    $dbConn->close();
                    echo json_encode($aResult);
                    exit;
                }


                // transaction 정보 저장
                ////////////////////////

                $user_money = $userInfo['money'] - $amount;
                $sql = "UPDATE user_casino SET money='{$user_money}' WHERE user_id='{$user_id}'";
                $result = $dbConn->query($sql);

                // 관련 작업 모두 성공
                $aResult = [
                    'result' => 0,
                    'status' => 'OK',
                    'data' => [
                        'balance' => $user_money,
                    ],
                ];
                break;

            case "win":    // 주문 항목 적중, 미적중 처리
                $transaction_id = $oData->data->transaction_id;  // 유일한 string 값
                $amount = intval($oData->data->amount); // 베팅, 적중 금액 (DECIMAL 18,2)  원화이므로 int로 변환해서 처리하면 안전.
                $game_id = $oData->data->game_id;   // 게임 ROUND ID (여러 bet, win에 대한 관련 내역을 식별하는 ID)
                $round_id = $oData->data->round_id; // 게임 ROUND 참조 ID
                $match_id = $oData->data->match_id; // bet-win 연관관계 번호

                $user_id = $userInfo['user_id'];
                $request_datetime = time();
                $sql = "INSERT INTO bet_casino VALUES ('{$transaction_id}', '{$user_id}', '{$game_id}', '{$round_id}', 'WIN', '{$amount}', '{$request_datetime}')";
                $result = $dbConn->query($sql);

                $user_money = $userInfo['money'] + $amount;
                if ($result) {
                    if ($amount > 0) {
                        $sql = "UPDATE user_casino SET money='{$user_money}' WHERE user_id='{$user_id}'";
                        $result = $dbConn->query($sql);
                    }
                } else {
                    $aResult = [
                        'result' => 99,
                        'status' => 'ERROR',
                        'data' => [
                            'balance' => $userInfo['money'],
                        ],
                    ];

                    $dbConn->close();
                    echo json_encode($aResult);
                    exit;
                }


                // 관련 작업 모두 성공
                $aResult = [
                    'result' => 0,
                    'status' => 'OK',
                    'data' => [
                        'balance' => $user_money,
                    ],
                ];
                break;

            case "cancel":
                $money = 0;
                $user_id = $userInfo['user_id'];
                $user_money = $userInfo['money'];

                if ($betInfo['sort'] != "CANCEL") {    // 취소 처리가 필요한 상황
                    // 취소 작업 진행
                    // transaction id가 BET 관련된 건 베팅 금액 관련 사항만 취소.  당첨 금액 관련 사항은 취소하면 안됨.  당첨 금액 관련 취소는 별도로 요청이 옴.
                    // transaction id가 WIN 관련된 건 당첨 금액 관련 사항만 취소.  베팅 금액은 취소하면 안됨.

                    if ($betInfo['sort'] == "BET") {   // bet 처리한 transaction id와 일치할 때
                        // 베팅 취소 처리 진행
                        $money = $betInfo['money'];

                        $sql = "UPDATE bet_casino SET sort='CANCEL' WHERE transaction_id='{$transaction_id}'";
                        $result = $dbConn->query($sql);

                        if ($result) {
                            $user_money = $userInfo['money'] + $money;
                            $sql = "UPDATE user_casino SET money='{$user_money}' WHERE user_id='{$user_id}'";
                            $result = $dbConn->query($sql);
                        } else {
                            $aResult = [
                                'result' => 99,
                                'status' => 'ERROR',
                                'data' => [
                                    'balance' => $userInfo['money'],
                                ],
                            ];

                            $dbConn->close();
                            echo json_encode($aResult);
                            exit;
                        }
                    } else if ($betInfo['sort'] == "WIN") {
                        // 결과 취소 처리 진행
                        $money = -1 * $betInfo['money'];

                        $sql = "UPDATE bet_casino SET sort='CANCEL' WHERE transaction_id='{$transaction_id}'";
                        $result = $dbConn->query($sql);

                        if ($result) {
                            $user_money = $userInfo['money'] + $money;
                            $sql = "UPDATE user_casino SET money='{$user_money}' WHERE user_id='{$user_id}'";
                            $result = $dbConn->query($sql);
                        } else {
                            $aResult = [
                                'result' => 99,
                                'status' => 'ERROR',
                                'data' => [
                                    'balance' => $userInfo['money'],
                                ],
                            ];

                            $dbConn->close();
                            echo json_encode($aResult);
                            exit;
                        }
                    }
                }

                $aResult = [
                    'result' => 0,
                    'status' => 'OK',
                    'data' => [
                        'balance' => $user_money,
                    ],
                ];
                break;

            case "status":
                $transaction_id = $oData->data->transaction_id;  // 유일한 string 값

                if ($betInfo['sort'] == "CANCEL") {    // 취소 처리한 상황
                    $aResult = [
                        'result' => 0,
                        'status' => 'OK',
                        'data' => [
                            'account' => $userInfo['user_id'],
                            'transaction_id' => $transaction_id,
                            'transaction_status' => 'CANCELED',
                        ],
                    ];
                } else {
                    $aResult = [
                        'result' => 0,
                        'status' => 'OK',
                        'data' => [
                            'account' => $userInfo['user_id'],
                            'transaction_id' => $transaction_id,
                            'transaction_status' => 'OK',
                        ],
                    ];
                }
                break;
        }

        $dbConn->close();
        echo json_encode($aResult);
                                            
        
    }

    public function FunctionName($var = null)
    {
        $key = implode('-', str_split(substr(strtoupper(md5(microtime().rand(1000, 9999))), 0, 30), 6));
        //$key = bin2hex(random_bytes(32));
        printf("uniqid(): %s\r\n", uniqid(15));

        $data =  random_bytes(16);
        assert(strlen($data) == 16);

        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        // Output the 36 character UUID.
        $key =  vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
            
        echo $key;
    }
}