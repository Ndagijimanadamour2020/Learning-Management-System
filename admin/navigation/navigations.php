<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<title>CYONDO TSS</title>

<!-- Bootstrap core CSS -->
<link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen"/>
<link href="<?php echo web_root; ?>css/dataTables.bootstrap.css" rel="stylesheet" media="screen"/>  
<link href="<?php echo web_root; ?>css/alumni.css" rel="stylesheet" media="screen"/>
<link href="<?php echo web_root; ?>fonts/font-awesome.min.css" rel="stylesheet"/>   
<!-- <link href="<?php echo web_root; ?>admin/adminMenu/dist/metisMenu.min.css" rel="stylesheet"/>   -->

<link rel="stylesheet" href="<?php echo web_root; ?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="<?php echo web_root; ?>css/jquery-ui.css"> 
<!-- <link rel="stylesheet" href="<?php echo web_root; ?>web/viewer.css">  -->
<!-- Plugins -->

 <style type="text/css">
/*     #navigation {
        margin-bottom: 40px;
     }
     #page-wrapper{
        min-height: 900px;
     }
     #page-footer {
        border-top: 1px solid #ddd;
        margin-top: -15px;
        padding: 10px;
     }*/
    /* * { 
        font-family: 'Lucida Calligraphy';
     }*/
 </style>
<!-- Custom styles for this template -->
<!-- <link href="<?php echo web_root; ?>css/offcanvas.css" rel="stylesheet"> -->
   <?php
   admin_confirm_logged_in();
  ?>
<body>
 <section id="navigation">
<!-- navigations.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo web_root; ?>admin/index.php">CYONDO TECHNICAL SECONDARY SCHOOL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <span class="nav-link text-white"><?php echo $_SESSION['NAME']; ?></span>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo web_root; ?>admin/logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="offcanvas offcanvas-start bg-light" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="sidebarLabel">Navigation</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo web_root; ?>admin/modules/lesson/index.php"><i class="fa fa-book"></i> Lessons</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo web_root; ?>admin/modules/exercises/index.php"><i class="fa fa-pencil-alt"></i> Exercises</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo web_root; ?>admin/modules/modstudent/index.php"><i class="fa fa-user-graduate"></i> Students</a>
      </li>
      <?php if ($_SESSION['TYPE'] == "Administrator") { ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo web_root; ?>admin/modules/user/index.php"><i class="fa fa-users-cog"></i> Manage Users</a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo web_root; ?>admin/modules/report/index.php"><i class="fa fa-chart-line"></i> Reports</a>
      </li>
    </ul>
  </div>
</div>

</section>


<section id="page-wrapper"> 
  <?php  check_message(); ?> 
  <?php  require_once $content;?>  
 </section> 

<section id="page-footer"> 
      <footer>  <p align="center">&copy; CYONDO TECHNICAL SECONDARY SCHOOL </p></footer>
</section>
<!-- Plugins -->

<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/jquery.js"></script> 
<script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
<script src="<?php echo web_root; ?>admin/adminMenu/dist/metisMenu.min.js"></script>
  
<script src="<?php echo web_root; ?>js/jquery.dataTables.min.js"></script>/
<script src="<?php echo web_root; ?>js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/kcctc.js"></script>
<script src="<?php echo web_root;?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script type="text/javascript" src="<?php echo web_root; ?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo web_root; ?>js/autofunc.js"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    var t = $('#example').DataTable( {
        "bSort": false,
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
 

          //vertical scroll
         // "scrollY":        "300px",

        // "scrollCollapse": true,

        //ordering start at column 1
        "order": [[ 1, 'desc' ]]
    } );

    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );

</script>


<script>

$(function(){
  $(".tds").each(function(i){
    len=$(this).text().length;
    if(len>80)
    {
      $(this).text($(this).text().substr(0,80)+'...');
    }
  });
});
  $(function () {
    //Add text editor 
     $("#ANNOUNCEMENT_WHAT").wysihtml5();
     $("#EVENT_WHAT").wysihtml5();
     $("#compose-textarea").wysihtml5();
  });
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker2').datetimepicker({
            locale: 'ru',
             autoclose: 1,
        });
    });
</script>

<script type="text/javascript">

$("#retype_user_pass").focusout(function(){

        var pass = $("#user_pass").val();
        var repass = $(this).val();
        if (pass != repass) {
            alert("Password does not match");
        };
});

function validatedpass(){

     var pass = $("#user_pass").val();
        var repass = $("#retype_user_pass").val();
        if (pass != repass) {
            alert("Password does not match");
            return false
        }else{
            return true
        };
}

$('#date_pickerfrom').datetimepicker({
  format: 'yyyy',
    language:  'en',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 4,
    minView: 4,
    forceParse: 0
    });


$('#date_pickerto').datetimepicker({
  format: 'yyyy',
    language:  'en',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 4,
    minView: 4,
    forceParse: 0
    });



</script>


<script>
  function checkall(selector)
  {
    if(document.getElementById('chkall').checked==true)
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=true;
      }
    }
    else
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=false;
      }
    }
  }
   function checkNumber(textBox){
        while (textBox.value.length > 0 && isNaN(textBox.value)) {
          textBox.value = textBox.value.substring(0, textBox.value.length - 1)
        }
        textBox.value = trim(textBox.value);
      }
      //
      function checkText(textBox)
      {
        var alphaExp = /^[a-zA-Z]+$/;
        while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
          textBox.value = textBox.value.substring(0, textBox.value.length - 1)
        }
        textBox.value = trim(textBox.value);
      }

  </script>

<script type="text/javascript">
 


// function truncateText(selector, maxLength) {
//     var element = document.querySelector(selector),
//         truncated = element.innerText;

//     if (truncated.length > maxLength) {
//         truncated = truncated.substr(0,maxLength) + '...';
//     }
//     return truncated;
// }
// //You can then call the function with something like what i have below.
// document.querySelector('#tds').innerText = truncateText('#tds', 107);
    </script>

</body>
</html>
