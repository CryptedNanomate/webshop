
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
// function loadUsers(){
//   $.ajax({
//       url: "./includes/route.php?type=get",
//       type: "GET",
//       dataType: "json",
//       colums:[
//       {data:'id'},
//       {data:'email'},
//       {data:'passowrd'},
//       {data:'confirm_pwd'},
//       {data:'type'},
//       {data:'gender'},
//       {data:'adress'},
//       {data:'id',
//         fnCreatedCell:function (td,id) {
//           $(td).html('<td class = "text-right"><a href="update.php?id='+$id+'"><em class="fa fa-pen-square fa-2x"></em></a><a href="delete.php?id='+$id+'" class="text-danger" tittle="Delete this record" onClick="return confirm(\'are you sure u want to delete this record? \');"><em class="fa fa-trash fa-2x"></em></a></td>')
//         }
//     },
//     ],
//     columnDefs:[{
//       target:[8],
//       orderable: false
//     }],
//     success: (response) => {
//       alert("RADI");
//       console.log(response);
//     },
//     error: (err) => {
//       console.log(err);
//     }
//   });
// };

$(document).ready(function () {
  $.ajax({
    url: "./includes/route.php?type=get",
    type: "GET",
    dataType: "json",
  success: (response) =>
   {(console.log(response.data));
  let result = "";
  for(let enemy of response.data){
    result+=`
    <tr>
    <td>`+enemy.id+`</td>
        <td>`+enemy.email+`</td>
        <td>`+enemy.password+`</td>
        <td>`+enemy.confirm_pwd+`</td>
        <td>`+enemy.type+`</td>
        <td>`+enemy.gender+`</td>
        <td>`+enemy.phone+`</td>
        <td>`+enemy.adress+`</td>
        <td class = "text-right">
        <a href="update.php?id=`+enemy.id+`tittle="Update this record" onClick="return confirm(\'are you sure u want to update this record? \');"><em class="fa fa-pen-square fa-2x"></em></a>
        <a class="text-danger" href="delete.php?id=`+enemy.id+`tittle="Delete this record" onClick="return confirm(\'are you sure u want to delete this record? \');"><em class="fa fa-trash fa-2x"></em></a>
        </td>
    </tr>
`;
  }
  
    console.log(result);
  $('#myTable tbody').html(result); 

    },
    error: (err) => {
      console.log(err);
    }
  });
  });
  
    
//   alert("greska");
//   loadUsers();
// });