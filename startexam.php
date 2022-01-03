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
 
<div class="contaier m-5">
    <center> <h1>Electronic Exam - Farahat Univercity</h1>  </center>
       
        <form action="" method = "post">
            Student Name : <br>
            <input type="text" name="txtname" class="form-control">
            <p></p>
            <input type="submit" name="btnstart" id="" class="btn btn-danger" value="Start Exam"> 
            <?php

            if(isset($_POST["btnstart"]))
            {
                $_SESSION['name'] = $_POST['txtname'];
                header("Location:exam.php");
            }
            ?>
        </form>
     
</div>


 <?php


?>
  
    </div>
</body>
</html>