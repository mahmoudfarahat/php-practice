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

<form  class="col-5" action="" method="post">
    Enter Count <br>
    <input type="number" name="txtcount" value="<?php echo (isset($_POST['txtcount']) ? $_POST['txtcount']:'0') ?>"  class="form-control">
    <br>
    <input type="submit" name="btn"    value="enter array">
 


 <?php
if (isset($_POST["btn"])) {
    $count = $_POST['txtcount'];
    for ($x = 0; $x < $count; $x++) {
        
        echo (" <br/>  <input type='text' name='txtv$x' />  <br/> ");
    }
    ;

    echo ("<input type='submit'  name='btnprint' value='print array'/> ");
}
;
if (isset($_POST["btnprint"])){
    $value =array();
 
    $count = $_POST['txtcount'];

    for ($d=0; $d <$count ; $d++){
        $value[$d] = $_POST["txtv".$d];
    }
    for($z=0; $z <$count ; $z++){
        echo ( $value[$z]."<br/>");
    }


    echo "Max is".max($value);
    echo "Min is".min($value);

}
 

    $list = array('e','t','w','r');
    $k = array_search('t',$list);

    echo$k;


?>
 </form>
    </div>
</body>
</html>