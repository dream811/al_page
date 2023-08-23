$(function () {
  makeTree = function () {
    console.log('tree')
    var
      $table = $('#Table'),
      rows = $table.find('tr');

  rows.each(function (index, row) {
      var
          $row = $(row),
          level = $row.data('level'),
          id = $row.data('id'),
          // $columnName = $row.find('td[data-column="name"]'),
          $columnName = $row.find('td:first'),
          children = $table.find('tr[data-parent="' + id + '"]');

      if (children.length) {
          var expander = $columnName.prepend('' +
              '<span class="treegrid-expander fas fa-chevron-right"></span>' +
              '');

          children.hide();

          expander.on('click', function (e) {
              var $target = $(e.target);
              if ($target.hasClass('fa-chevron-right')) {
                  $target
                      .removeClass('fa-chevron-right')
                      .addClass('fa-chevron-down');

                  children.show();
              } else if($target.hasClass('fa-chevron-down')){
                  $target
                      .removeClass('fa-chevron-down')
                      .addClass('fa-chevron-right');

                  reverseHide($table, $row);
              }


              
          });
      }

      $columnName.prepend('' +
          '<span class="treegrid-indent" style="width:' + 15 * level + 'px"></span>' +
          '');
  });
  }
  

  // Reverse hide all elements
  reverseHide = function (table, element) {
      var
          $element = $(element),
          id = $element.data('id'),
          children = table.find('tr[data-parent="' + id + '"]');

      if (children.length) {
          children.each(function (i, e) {
              reverseHide(table, e);
          });

          $element
              .find('.fa-chevron-down')
              .removeClass('fa-chevron-down')
              .addClass('fa-chevron-right');

          children.hide();
      }
  };
});
