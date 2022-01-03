<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div class="container m-3 p-3 col-4  ">

    <br>

<form action="" method="post">
    <input type="text"value="<?php echo (isset($_POST['txtno']) ? $_POST["txtno"] : '') ?>" name="txtno" placeholder="Enter Value" class="form-control">
    <br>
    <input type="submit" value="Calculate Value" name="btncalc" class="btn btn-danger">
    <?php
if(isset($_POST["btncalc"]))
{
    $end =$_POST["txtno"];
    for($x= 1; $x<=$end; $x++){
        echo("<input type='text' class='form-control' name='txtv$x' > </br>");
    }
   echo ("<input type='submit' value='calcutate Total' name='btntotal' class='btn btn-success'>");
}   
if(isset($_POST['btntotal'])){
    $end = $_POST['txtno'];
    $total= 0;
    for ($c=1;$c <= $end;$c++){
        $total =$total+$_POST["txtv".$c];
    }
    echo("<div class='alert alert-success'>The total is $total</div>");
}
  




?>
    </form>

    
</div>
</body>
</html>


 