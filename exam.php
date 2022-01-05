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
<!-- Display the countdown timer in an element -->
<p id="demo"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 4, 2022 00:02:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    // document.getElementById("demo").innerHTML = "EXPIRED";
window.open('result.php','_self')
  }
}, 1000);
</script>
</head>
<body>

<div id="demo"></div>

<div class="container m-5">
    <center> <h1>Welcome Exam</h1></center>
    <h3>Student :<?php 

    if(isset($_SESSION['name'])) 
    
    echo ($_SESSION["name"]); 
    
    else
     header ("Location:startexam.php") 
    
    ?></h3>
    <form action="" method="post">
<input type="submit" formnovalidate class="btn btn-danger" value="Logout" name="btnexit" >


 


 <?php
if(isset($_POST["btnexit"]))
{
    session_destroy();
    header("Location:startexam.php");
}


    $questions = array(
        array("To declare Varaible using ","%","$","&","#"),
        array("To Put Condition Using ","Loop","If","$","Random"),
        array("To Generate value from device using ","Random","Rand","RND","Switch"),
        array("to Declare array in php using ","[]","array","{}","()"),
        array("to Dublicate Code using ","if","while","switch","Rand")
    );

    $model = array("$","if","Rand","array","while");


    if(!isset( $_SESSION["qno"])){
        $x=0;
        echo ("<div class='alert alert-success m-3'>".$questions[$x][0]."</div>");    
    
        for($i=1 ; $i<count($questions[$x]) ; $i++){
            echo "<div class='panel panel-body m-3'>";
            echo "<input type='radio' required  name='rdchoice' value='".$questions[$x][$i]."' />".$questions[$x][$i]."";
            echo"</div>";
            
        }
       echo'<input type="submit" class="btn btn-success" value="next" name="btnnext" >';
        $x++;
        $_SESSION["qno"]=$x;
        $_SESSION["correct"]=0;
        $_SESSION["incorrect"]=0;

    }
    



    if (isset($_POST["btnnext"]))
    {
        $answer = $_POST["rdchoice"];
        if($answer==$model[$_SESSION["qno"]-1])
        {
            $_SESSION["correct"]++;
        }else{
            $_SESSION["incorrect"]++;
        }

        if ( $_SESSION["qno"]<5)
        {
         $x = $_SESSION["qno"];

            echo ("<div class='alert alert-success m-3'>".$questions[$x][0]."</div>");    
            for($i=1 ; $i<count($questions[$x]) ; $i++){
                echo "<div class='panel panel-body m-3'>";
                echo "<input type='radio' required  name='rdchoice' value='".$questions[$x][$i]."' />".$questions[$x][$i]."";
                echo"</div>";
            }
            echo'<input type="submit" class="btn btn-primary" value="previous" name="btnprev" >';
            echo'<input type="submit" class="btn btn-success" value="next" name="btnnext" >';
            $x++;
            $_SESSION["qno"]=$x;

        }
        else
        {
            $_SESSION["qno"] = $_SESSION["qno"]-1;
           
            echo("<div class='alert alert-success m-2'>This last Q</div>");
            echo'<input type="submit" class="btn btn-primary" value="previous" name="btnprev" >';
        }
     
    }

    
    if (isset($_POST["btnprev"]))
    {
       
        if ($_SESSION["qno"]>0)
        {
            $x = $_SESSION["qno"];
            echo ("<div class='alert alert-success m-3'>".$questions[$x][0]."</div>");    
            for($i=1 ; $i<count($questions[$x]) ; $i++){
                echo "<div class='panel panel-body m-3'>";
                echo "<input type='radio' required name='rdchoice' value='".$questions[$x][$i]."' />".$questions[$x][$i]."";
                echo"</div>";
            }

            echo'<input type="submit" class="btn btn-primary" value="previous" name="btnprev" >';

            echo'<input type="submit" class="btn btn-success" value="next" name="btnnext" >';
            $x--;
            $_SESSION["qno"]=$x;

        }
        else{
         
            echo("<div class='alert alert-success m-2'>This last Q</div>");
            echo'<input type="submit" class="btn btn-success" value="next" name="btnnext" >';
        }
      
    }

    if(isset($_POST["btnfinish"]))
    {
        header("Location:result.php");
    }
?>



<input type="submit" class="btn btn-danger" value="finish" name="btnfinish" >

   </form>
    </div>
</body>
</html>