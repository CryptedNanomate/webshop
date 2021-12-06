"use strict";

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];

    if (td) {
      txtValue = td.textContent || td.innerText;

      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function loadUsers() {
  $.ajax({
    url: "index-2.php",
    type: "GET",
    dataType: "json",
    success: function success(response) {
      console.log(response);
    }
  });
}

$(document).ready(function () {
  $('#myTable').DataTable({
    ajax: '../includes/route.php?type=get',
    colums: [{
      data: 'id'
    }, {
      data: 'email'
    }, {
      data: 'password'
    }, {
      data: 'confirm_pwd'
    }, {
      data: 'type'
    }, {
      data: 'gender'
    }, {
      data: 'phone'
    }, {
      data: 'adress'
    }, {
      data: 'id',
      fnCreatedCell: function fnCreatedCell(td, id) {
        $(td).html(' <td class = "text-right"><a href="update.php?id=' + id + '"><em class="fa fa-pen-square fa-2x"></em></a> <a href="delete.php?id=' + id + '" class="text-danger" tittle="Delete this record" onClick="return confirm(\'are you sure u want to delete this record? \');"><em class="fa fa-trash fa-2x"></em></a></td>');
      }
    }],
    columnDefs: [{
      target: [7],
      orderable: false
    }]
  });
});