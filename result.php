<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>



<div class="container m-5">
    <center> <h1>Result Exam</h1></center>
        <table class="table table-border table-striped">

        </table>
  
        count of correct answer :  <?php  echo($_SESSION["correct"])   ?>
        count of correct answer :  <?php  echo($_SESSION["incorrect"])   ?>
    
    </div>
</body>
</html>