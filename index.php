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


    <div class="container m-4">

      <h2>HR Department - Salary Detalis</h2>
     <form method="post">
     <br>

     <input type="text" name="txtno" value="<?php echo(isset($_POST["txtno"])?$_POST["txtno"]:'') ?>"  >
                    <button  type="submit"  class="btn btn-danger"
                     value="Calculate Salary Detalis" name="btncalc">Calculate Salary Detalis</button>
                    <br>
        <?php

if (isset($_POST["btncalc"])) {
    $end = $_POST["txtno"];
    for ($x = 0; $x < $end; $x++) {
        echo ("<input type='text' class ='form-control' name = 'txtv$x' /> <br/>");
    }
    echo ('<input type="submit" value="Calculate Total" name="btntotal" class="btn btn-success" >');
}
if (isset($_POST["btntotal"])) {
    // $v = array();
    // for ($x=0; $x<=5; $x++)
    // { 
    //     $v[$x] =4;
    // }
    // for ($x=0; $x<=5; $x++)  
    // {
    //    echo( $v[$x] . '<br>');
    // }
    $end = $_POST["txtno"];

    
    $total = 0;
    $value = array();
    for ($c=0; $c<= $end-1 ;$c++)
     {
        $value[$c] = $_POST["txtv".$c];
        $total = $total + $value[$c];

        echo ("<input type='text' class ='form-control'  value='$value[$c]' /> <br/>");


    }

    print_r($value);
       echo ("<div class='alert alert-success'> $total </div>");
 }
 
?>
 </form>
    </div>
</body>
</html>