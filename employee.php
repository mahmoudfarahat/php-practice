
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
        <center>
      <h2>HR Department - Salary Detalis</h2>
        </center>
        <form method="post" class="col-4">
                    Employee <br>
                    <input value="<?php echo (isset($_POST['txtname']) ? $_POST["txtname"] : '') ?>" type="text" class="form-control" name="txtname"
                    placeholder="your name" >
                    <br>
                    Total Hour <br>
                    <input  value="<?php echo (isset($_POST['txthour']) ? $_POST["txthour"] : '') ?>" type="number" class="form-control" name="txthour"
                    placeholder="hours " >
                    <br>
                    Rate per Hour <br>
                    <input value="<?php echo (isset($_POST['txtrate']) ? $_POST["txtrate"] : '') ?>" type="number" class="form-control" name="txtrate"
                    placeholder="Rate per hour" >
                    <br>
                     Discount %  <br>
                   <input value="<?php echo (isset($_POST['txtdiscount']) ? $_POST["txtdiscount"] : '') ?>"  type="text" class="form-control" name="txtdiscount"
                    placeholder="Rate per hour" >
                    <br>
                    Bonus  <br>
                     <input  value="<?php echo (isset($_POST['txtbouns']) ? $_POST["txtbouns"] : '') ?>" type="number" class="form-control" name="txtbouns"
                    placeholder="Rate per hour" >
                    <br>

                   <input type="radio" name="stick" class="form-check-input" <?php if (isset($_POST['stick']) && $_POST['stick'] == 'Snacks') {
    echo "checked";
}
?> value="Snacks">Snacks
                   <input type="radio"  name="stick" class="form-check-input" <?php if (isset($_POST['stick']) && $_POST['stick'] == 'Electronic') {
    echo "checked";
}
?> value="Electronic">Electronic
                   <input type="radio" name="stick" class="form-check-input"  <?php if (isset($_POST['stick']) && $_POST['stick'] == 'other') {
    echo "checked";
}
?> value="other">other


                    <select name="drpselect" class="form-control" id="">
                        <option <?php if (isset($_POST['drpselect']) && $_POST['drpselect'] == 'Snacks') {
    echo "selected";
}
?> value="Snacks">Snacks</option>
                        <option <?php if (isset($_POST['drpselect']) && $_POST['drpselect'] == 'hey') {
    echo "selected";
}
?> value="hey">hey</option>
                        <option  <?php if (isset($_POST['drpselect']) && $_POST['drpselect'] == 'other') {
    echo "selected";
}
?> value="other">other</option>

                    </select>
                    <br>
                    <button  type="submit"  class="btn btn-danger"
                     value="Calculate Salary Detalis" name="btncalc">Calculate Salary Detalis</button>
                    <br>
        </form>
        <?php
if (isset($_POST["btncalc"])) {
    $name;
    $hour;
    $rate;
    $discount;
    $bouns;
    $salary;
    $value;
    $after;
    $net;
    $name = $_POST["txtname"];
    $hour = $_POST["txthour"];
    $rate = $_POST["txtrate"];
    $bouns = $_POST["txtbouns"];
    $discount = $_POST["txtdiscount"];
    $salary = $hour * $rate;
    $value = $salary * $discount;
    $after = $salary - $value;
    $net = $after + $bouns;
    echo ("Salary Is: " . $salary . "<br/>");
    echo ("Discount Is: " . $value . "<br/>");
    echo ("Salary after discount Is: " . $after . "<br/>");
    echo ("Net Salart Is: " . $net . "<br/>");
}

?>
    </div>
</body>
</html>