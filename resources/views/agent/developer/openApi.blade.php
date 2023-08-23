@extends('agent.layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title" style="font-weight:bold">
      <span class="page-title-icon bg-gradient-primary text-white me-2" style="font-size:14px; ">
        <i class="mdi mdi-home"></i>
      </span> API 가이드
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">API 가이드</li><i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        {{-- <li class="breadcrumb-item active" aria-current="page">베팅내역</li> --}}
      </ol>
    </nav>
  </div>
  
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          {{-- <h4 class="card-title" style="font-weight:bold">에볼루션 기본 API</h4>
          <p class="card-description"><code>/developer/openapi.yaml</code>
          </p> --}}
          <div>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.19.5/swagger-ui.css" >
            <style>
              .topbar {
                display: none;
              }
            </style>
            <div id="swagger-ui"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{asset('plugins/swagger-ui/swagger-ui-apikey-auth-form.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.19.5/swagger-ui-bundle.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.19.5/swagger-ui-standalone-preset.js"> </script>
@endsection
@push('page_scripts')
    <script>
      $(document).ready(function () {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
      });

      var spec = {
        "swagger": "2.0",
        // openapi:"3.0.1",
        "info": {
          "description": "This is a sample server Petstore server.  You can find out more about Swagger at [http://swagger.io](http://swagger.io) or on [irc.freenode.net, #swagger](http://swagger.io/irc/).  For this sample, you can use the api key `special-key` to test the authorization filters.",
          "version": "1.0.0",
          "title": "기본 API",          
        },
        "host": "127.0.0.1:8000",
        "basePath": "/api/v1",
        
        "schemes": [
          "https",
          "http"
        ],
        "paths": {
          "/agent": {
            "get": {
              "tags": [
                "에이전트"
              ],
              "summary": "Get Users",
              "description": "Returns all users",
              "operationId": "getUsers",
              "produces": [
                "application/json",
                "application/xml"
              ],
              // "parameters": [
              //   {
              //     "name": "userId",
              //     "in": "path",
              //     "description": "ID of pet to return",
              //     "required": true,
              //     "type": "integer",
              //     "format": "int64"
              //   }
              // ],
              "responses": {
                // "200": {
                //   "description": "successful operation",
                //   "schema": {
                //     "$ref": "#/definitions/Pet"
                //   },
                  
                // },
                "200": {
                  "description": "successful operation",
                  "schema": {
                    "type": "array",
                    "items": {
                      "$ref": "#/definitions/User"
                    }
                  }
                },
                // "400": {
                //   "description": "Invalid ID supplied"
                // },
                "404": {
                  "description": "Pet not found"
                },
                "responses": {
                "405": {
                  "description": "Invalid input"
                },
                "400": {
                  "description": "Invalid token"
                }
              },
              },
              "security": [
                {
                  "Bearer": []
                }
              ]
            },
            
          },
          "/user": {
            "post": {
              "tags": [
                "유저"
              ],
              "summary": "Add a new User to the group",
              "description": "",
              "operationId": "addUser",
              "consumes": [
                "application/json",
                "application/xml"
              ],
              "produces": [
                "application/json",
                "application/xml"
              ],
              "parameters": [
                {
                  "in": "body",
                  "name": "body",
                  "description": "User object that needs to be added to the group",
                  "required": true,
                  "schema": {
                    "$ref": "#/definitions/User"
                  }
                }
              ],
              "responses": {
                "405": {
                  "description": "Invalid input"
                },
                "400": {
                  "description": "Invalid token"
                }
              },
              // "security": [
              //   {
              //     "petstore_auth": [
              //       "write:pets",
              //       "read:pets"
              //     ]
              //   }
              // ]
              "security": [
                {
                  "Bearer": []
                }
              ]
            },
            // "put": {
            //   "tags": [
            //     "user"
            //   ],
            //   "summary": "Update an existing pet",
            //   "description": "",
            //   "operationId": "updatePet",
            //   "consumes": [
            //     "application/json",
            //     "application/xml"
            //   ],
            //   "produces": [
            //     "application/json",
            //     "application/xml"
            //   ],
            //   "parameters": [
            //     {
            //       "in": "body",
            //       "name": "body",
            //       "description": "Pet object that needs to be added to the store",
            //       "required": true,
            //       "schema": {
            //         "$ref": "#/definitions/Pet"
            //       }
            //     }
            //   ],
            //   "responses": {
            //     "400": {
            //       "description": "Invalid ID supplied"
            //     },
            //     "404": {
            //       "description": "Pet not found"
            //     },
            //     "405": {
            //       "description": "Validation exception"
            //     }
            //   },
            //   "security": [
            //     {
            //       "petstore_auth": [
            //         "write:pets",
            //         "read:pets"
            //       ]
            //     }
            //   ]
            // },
            "get": {
              "tags": [
                "유저"
              ],
              "summary": "Get Users",
              "description": "Returns all users",
              "operationId": "getUsers",
              "produces": [
                "application/json",
                "application/xml"
              ],
              // "parameters": [
              //   {
              //     "name": "userId",
              //     "in": "path",
              //     "description": "ID of pet to return",
              //     "required": true,
              //     "type": "integer",
              //     "format": "int64"
              //   }
              // ],
              "responses": {
                // "200": {
                //   "description": "successful operation",
                //   "schema": {
                //     "$ref": "#/definitions/Pet"
                //   },
                  
                // },
                "200": {
                  "description": "successful operation",
                  "schema": {
                    "type": "array",
                    "items": {
                      "$ref": "#/definitions/User"
                    }
                  }
                },
                // "400": {
                //   "description": "Invalid ID supplied"
                // },
                "404": {
                  "description": "Pet not found"
                },
                "responses": {
                "405": {
                  "description": "Invalid input"
                },
                "400": {
                  "description": "Invalid token"
                }
              },
              },
              "security": [
                {
                  "Bearer": []
                }
              ]
            },
            // "post": {
            //   "tags": [
            //     "pet"
            //   ],
            //   "summary": "Updates a pet in the store with form data",
            //   "description": "",
            //   "operationId": "updatePetWithForm",
            //   "consumes": [
            //     "application/x-www-form-urlencoded"
            //   ],
            //   "produces": [
            //     "application/json",
            //     "application/xml"
            //   ],
            //   "parameters": [
            //     {
            //       "name": "petId",
            //       "in": "path",
            //       "description": "ID of pet that needs to be updated",
            //       "required": true,
            //       "type": "integer",
            //       "format": "int64"
            //     },
            //     {
            //       "name": "name",
            //       "in": "formData",
            //       "description": "Updated name of the pet",
            //       "required": false,
            //       "type": "string"
            //     },
            //     {
            //       "name": "status",
            //       "in": "formData",
            //       "description": "Updated status of the pet",
            //       "required": false,
            //       "type": "string"
            //     }
            //   ],
            //   "responses": {
            //     "405": {
            //       "description": "Invalid input"
            //     }
            //   },
            //   "security": [
            //     {
            //       "petstore_auth": [
            //         "write:pets",
            //         "read:pets"
            //       ]
            //     }
            //   ]
            // },
            // "delete": {
            //   "tags": [
            //     "pet"
            //   ],
            //   "summary": "Deletes a pet",
            //   "description": "",
            //   "operationId": "deletePet",
            //   "produces": [
            //     "application/json",
            //     "application/xml"
            //   ],
            //   "parameters": [
            //     {
            //       "name": "api_key",
            //       "in": "header",
            //       "required": false,
            //       "type": "string"
            //     },
            //     {
            //       "name": "petId",
            //       "in": "path",
            //       "description": "Pet id to delete",
            //       "required": true,
            //       "type": "integer",
            //       "format": "int64"
            //     }
            //   ],
            //   "responses": {
            //     "400": {
            //       "description": "Invalid ID supplied"
            //     },
            //     "404": {
            //       "description": "Pet not found"
            //     }
            //   },
            //   "security": [
            //     {
            //       "petstore_auth": [
            //         "write:pets",
            //         "read:pets"
            //       ]
            //     }
            //   ]
            // }
          },
          "/user/deposit-balance": {
            "post": {
              "tags": [
                "유저머니"
              ],
              "summary": "Add a new User to the group",
              "description": "",
              "operationId": "addUser",
              "consumes": [
                "application/json",
                "application/xml"
              ],
              "produces": [
                "application/json",
                "application/xml"
              ],
              "parameters": [
                {
                  "in": "body",
                  "name": "body",
                  "description": "User object that needs to be added to the group",
                  "required": true,
                  "schema": {
                    "$ref": "#/definitions/User"
                  }
                }
              ],
              "responses": {
                "405": {
                  "description": "Invalid input"
                },
                "400": {
                  "description": "Invalid token"
                }
              },
              "security": [
                {
                  "Bearer": []
                }
              ]
            },
          },
          "/user/withdraw-balance": {
            "post": {
              "tags": [
                "유저머니"
              ],
              "summary": "Add a new User to the group",
              "description": "",
              "operationId": "addUser",
              "consumes": [
                "application/json",
                "application/xml"
              ],
              "produces": [
                "application/json",
                "application/xml"
              ],
              "parameters": [
                {
                  "in": "body",
                  "name": "body",
                  "description": "User object that needs to be added to the group",
                  "required": true,
                  "schema": {
                    "$ref": "#/definitions/User"
                  }
                }
              ],
              "responses": {
                "405": {
                  "description": "Invalid input"
                },
                "400": {
                  "description": "Invalid token"
                }
              },
              "security": [
                {
                  "Bearer": []
                }
              ]
            },
          },
          "/user/withdraw-balance-all": {
            "post": {
              "tags": [
                "유저머니"
              ],
              "summary": "Add a new User to the group",
              "description": "",
              "operationId": "addUser",
              "consumes": [
                "application/json",
                "application/xml"
              ],
              "produces": [
                "application/json",
                "application/xml"
              ],
              "parameters": [
                {
                  "in": "body",
                  "name": "body",
                  "description": "User object that needs to be added to the group",
                  "required": true,
                  "schema": {
                    "$ref": "#/definitions/User"
                  }
                }
              ],
              "responses": {
                "405": {
                  "description": "Invalid input"
                },
                "400": {
                  "description": "Invalid token"
                }
              },
              "security": [
                {
                  "Bearer": []
                }
              ]
            },
          },
          ////
          "/vendor": {
            "get": {
              "tags": [
                "벤더"
              ],
              "summary": "Get Users",
              "description": "Returns all users",
              "operationId": "getUsers",
              "produces": [
                "application/json",
                "application/xml"
              ],
              // "parameters": [
              //   {
              //     "name": "userId",
              //     "in": "path",
              //     "description": "ID of pet to return",
              //     "required": true,
              //     "type": "integer",
              //     "format": "int64"
              //   }
              // ],
              "responses": {
                // "200": {
                //   "description": "successful operation",
                //   "schema": {
                //     "$ref": "#/definitions/Pet"
                //   },
                  
                // },
                "200": {
                  "description": "successful operation",
                  "schema": {
                    "type": "array",
                    "items": {
                      "$ref": "#/definitions/User"
                    }
                  }
                },
                // "400": {
                //   "description": "Invalid ID supplied"
                // },
                "404": {
                  "description": "Pet not found"
                },
                "responses": {
                "405": {
                  "description": "Invalid input"
                },
                "400": {
                  "description": "Invalid token"
                }
              },
              },
              "security": [
                {
                  "Bearer": []
                }
              ]
            },
            
          },
          "/game": {
            "get": {
              "tags": [
                "게임&로비 정보"
              ],
              "summary": "Get Users",
              "description": "Returns all users",
              "operationId": "getUsers",
              "produces": [
                "application/json",
                "application/xml"
              ],
              // "parameters": [
              //   {
              //     "name": "userId",
              //     "in": "path",
              //     "description": "ID of pet to return",
              //     "required": true,
              //     "type": "integer",
              //     "format": "int64"
              //   }
              // ],
              "responses": {
                // "200": {
                //   "description": "successful operation",
                //   "schema": {
                //     "$ref": "#/definitions/Pet"
                //   },
                  
                // },
                "200": {
                  "description": "successful operation",
                  "schema": {
                    "type": "array",
                    "items": {
                      "$ref": "#/definitions/User"
                    }
                  }
                },
                // "400": {
                //   "description": "Invalid ID supplied"
                // },
                "404": {
                  "description": "Pet not found"
                },
                "responses": {
                "405": {
                  "description": "Invalid input"
                },
                "400": {
                  "description": "Invalid token"
                }
              },
              },
              "security": [
                {
                  "Bearer": []
                }
              ]
            },
            
          },
          "/game-key": {
            "get": {
              "tags": [
                "게임&로비 정보"
              ],
              "summary": "Get Users",
              "description": "Returns all users",
              "operationId": "getUsers",
              "produces": [
                "application/json",
                "application/xml"
              ],
              // "parameters": [
              //   {
              //     "name": "userId",
              //     "in": "path",
              //     "description": "ID of pet to return",
              //     "required": true,
              //     "type": "integer",
              //     "format": "int64"
              //   }
              // ],
              "responses": {
                // "200": {
                //   "description": "successful operation",
                //   "schema": {
                //     "$ref": "#/definitions/Pet"
                //   },
                  
                // },
                "200": {
                  "description": "successful operation",
                  "schema": {
                    "type": "array",
                    "items": {
                      "$ref": "#/definitions/User"
                    }
                  }
                },
                // "400": {
                //   "description": "Invalid ID supplied"
                // },
                "404": {
                  "description": "Pet not found"
                },
                "responses": {
                "405": {
                  "description": "Invalid input"
                },
                "400": {
                  "description": "Invalid token"
                }
              },
              },
              "security": [
                {
                  "Bearer": []
                }
              ]
            },
            
          },
          "/game-url": {
            "get": {
              "tags": [
                "게임 접속"
              ],
              "summary": "Get Users",
              "description": "Returns all users",
              "operationId": "getUsers",
              "produces": [
                "application/json",
                "application/xml"
              ],
              // "parameters": [
              //   {
              //     "name": "userId",
              //     "in": "path",
              //     "description": "ID of pet to return",
              //     "required": true,
              //     "type": "integer",
              //     "format": "int64"
              //   }
              // ],
              "responses": {
                // "200": {
                //   "description": "successful operation",
                //   "schema": {
                //     "$ref": "#/definitions/Pet"
                //   },
                  
                // },
                "200": {
                  "description": "successful operation",
                  "schema": {
                    "type": "array",
                    "items": {
                      "$ref": "#/definitions/User"
                    }
                  }
                },
                // "400": {
                //   "description": "Invalid ID supplied"
                // },
                "404": {
                  "description": "Pet not found"
                },
                "responses": {
                "405": {
                  "description": "Invalid input"
                },
                "400": {
                  "description": "Invalid token"
                }
              },
              },
              "security": [
                {
                  "Bearer": []
                }
              ]
            },
            
          },
          "/transaction": {
            "get": {
              "tags": [
                "트랜잭션"
              ],
              "summary": "Get Users",
              "description": "Returns all users",
              "operationId": "getUsers",
              "produces": [
                "application/json",
                "application/xml"
              ],
              // "parameters": [
              //   {
              //     "name": "userId",
              //     "in": "path",
              //     "description": "ID of pet to return",
              //     "required": true,
              //     "type": "integer",
              //     "format": "int64"
              //   }
              // ],
              "responses": {
                // "200": {
                //   "description": "successful operation",
                //   "schema": {
                //     "$ref": "#/definitions/Pet"
                //   },
                  
                // },
                "200": {
                  "description": "successful operation",
                  "schema": {
                    "type": "array",
                    "items": {
                      "$ref": "#/definitions/User"
                    }
                  }
                },
                // "400": {
                //   "description": "Invalid ID supplied"
                // },
                "404": {
                  "description": "Pet not found"
                },
                "responses": {
                "405": {
                  "description": "Invalid input"
                },
                "400": {
                  "description": "Invalid token"
                }
              },
              },
              "security": [
                {
                  "Bearer": []
                }
              ]
            },
            
          },
          "/transaction-date": {
            "get": {
              "tags": [
                "트랜잭션"
              ],
              "summary": "Get Users",
              "description": "Returns all users",
              "operationId": "getUsers",
              "produces": [
                "application/json",
                "application/xml"
              ],
              // "parameters": [
              //   {
              //     "name": "userId",
              //     "in": "path",
              //     "description": "ID of pet to return",
              //     "required": true,
              //     "type": "integer",
              //     "format": "int64"
              //   }
              // ],
              "responses": {
                // "200": {
                //   "description": "successful operation",
                //   "schema": {
                //     "$ref": "#/definitions/Pet"
                //   },
                  
                // },
                "200": {
                  "description": "successful operation",
                  "schema": {
                    "type": "array",
                    "items": {
                      "$ref": "#/definitions/User"
                    }
                  }
                },
                // "400": {
                //   "description": "Invalid ID supplied"
                // },
                "404": {
                  "description": "Pet not found"
                },
                "responses": {
                "405": {
                  "description": "Invalid input"
                },
                "400": {
                  "description": "Invalid token"
                }
              },
              },
              "security": [
                {
                  "Bearer": []
                }
              ]
            },
            
          },
          "/transaction-relation": {
            "get": {
              "tags": [
                "트랜잭션"
              ],
              "summary": "Get Users",
              "description": "Returns all users",
              "operationId": "getUsers",
              "produces": [
                "application/json",
                "application/xml"
              ],
              // "parameters": [
              //   {
              //     "name": "userId",
              //     "in": "path",
              //     "description": "ID of pet to return",
              //     "required": true,
              //     "type": "integer",
              //     "format": "int64"
              //   }
              // ],
              "responses": {
                // "200": {
                //   "description": "successful operation",
                //   "schema": {
                //     "$ref": "#/definitions/Pet"
                //   },
                  
                // },
                "200": {
                  "description": "successful operation",
                  "schema": {
                    "type": "array",
                    "items": {
                      "$ref": "#/definitions/User"
                    }
                  }
                },
                // "400": {
                //   "description": "Invalid ID supplied"
                // },
                "404": {
                  "description": "Pet not found"
                },
                "responses": {
                "405": {
                  "description": "Invalid input"
                },
                "400": {
                  "description": "Invalid token"
                }
              },
              },
              "security": [
                {
                  "Bearer": []
                }
              ]
            },
            
          },
        },
        "securityDefinitions": {
          "Bearer": {
            type: 'apiKey',
            in: 'header',
            name: 'Authorization',
            description: 'Bearer Token',
            scheme: 'bearer',
            bearerFormat: 'JWT',
          },
          // "petstore_auth": {
          //   "type": "oauth2",
          //   "authorizationUrl": "https://petstore.swagger.io/oauth/authorize",
          //   "flow": "implicit",
          //   "scopes": {
          //     "read:pets": "read your pets",
          //     "write:pets": "modify pets in your account"
          //   }
          // }
        },
        "definitions": {
          "UserList":{
            "type": "array",
            "items": {
              "$ref": "#/definitions/User"
            }
          },
          "User": {
            "type": "object",
            "properties": {
              "id": {
                "type": "integer",
                "format": "int64"
              },
              "username": {
                "type": "string"
              },
              "firstName": {
                "type": "string"
              },
              "lastName": {
                "type": "string"
              },
              "email": {
                "type": "string"
              },
              "password": {
                "type": "string"
              },
              "phone": {
                "type": "string"
              },
              "userStatus": {
                "type": "integer",
                "format": "int32",
                "description": "User Status"
              }
            },
            "xml": {
              "name": "User"
            }
          }
        },
        // "externalDocs": {
        //   "description": "Find out more about Swagger",
        //   "url": "http://swagger.io"
        // }
      }

      window.onload = function() {
        
        /*
        const ui = SwaggerUIBundle({
          spec: spec,
          dom_id: '#swagger-ui',
          deepLinking: true,
          presets: [
            SwaggerUIBundle.presets.apis,
            SwaggerUIStandalonePreset
          ],
          plugins: [
            SwaggerUIApiKeyAuthFormPlugin,
            SwaggerUIBundle.plugins.DownloadUrl
          ],
          layout: "StandaloneLayout",
          configs: {
            apiKeyAuthFormPlugin: {
              forms: {
                api_key: {
                  fields: {
                    client: {
                      type: 'checkbox',
                      label: 'Client',
                      inputProps: {
                        onChange(evt) {
                          const userFields = document.querySelectorAll('.swUI-AKF-userField');
                          const clientFields = document.querySelectorAll('.swUI-AKF-clientField');
                          const show = (el) => { el.closest('.wrapper').style.display = 'block'; };
                          const hide = (el) => { el.closest('.wrapper').style.display = 'none'; };

                          userFields.forEach(evt.target.checked ? hide : show);
                          clientFields.forEach(evt.target.checked ? show : hide);
                        }
                      },
                    },
                    username: {
                      type: 'text',
                      label: 'Username',
                      initialValue: 'hans',
                      inputProps: {
                        className: 'swUI-AKF-userField'
                      }
                    },
                    password: {
                      type: 'password',
                      label: 'Password',
                      inputProps: {
                        className: 'swUI-AKF-userField'
                      }
                    },
                    clientId: {
                      type: 'text',
                      label: 'ClientId',
                      initialValue: 'test',
                      rowProps: {
                        style: { display: 'none' }
                      },
                      inputProps: {
                        className: 'swUI-AKF-clientField'
                      }
                    },
                    clientSecret: {
                      type: 'password',
                      label: 'ClientSecret',
                      rowProps: {
                        style: { display: 'none' }
                      },
                      inputProps: {
                        className: 'swUI-AKF-clientField',
                      }
                    }
                  },
                  authCallback: function(values, callback) {
                    if (values.client === 'on') {
                      if (values.clientId === 'client' && values.clientSecret === 'client-secret') {
                        callback(null, 'special-key');
                      } else {
                        callback('invalid client credentials');
                      }
                    } else {
                      if (values.username === 'user' && values.password === 'secret') {
                        callback(null, 'special-key');
                      } else {
                        callback('invalid user credentials');
                      }
                    }
                  }
                }
              },
              localStorage: {
                api_key: {}
              }
            }
          }
        })
     */
      const ui = window.ui = SwaggerUIBundle({
        // url: "https://petstore.swagger.io/v2/swagger.json",
        spec: spec,
        dom_id: '#swagger-ui',
        deepLinking: true,
        presets: [
          SwaggerUIBundle.presets.apis,
          SwaggerUIStandalonePreset
        ],
        plugins: [
          SwaggerUIBundle.plugins.DownloadUrl,
          SwaggerUIApiKeyAuthFormPlugin,
        ],
        layout: "StandaloneLayout",
        
      });

        // window.ui = ui;
        // addAuthButton()
      }      
    </script>
@endpush