<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container m-4">
        <center>
       <h2> Supermarket - Sales Department </h2>
        </center>
        <form method="post">
            Client Name <br/>
            <input type="text" value="<?php  echo(isset($_POST["txtname"])?$_POST["txtname"]:''); ?>" class="form-control" name="txtname" placeholder="Employee Name"/>
            <br/>
            Count Of Product
            <input type="number" value="<?php  echo(isset($_POST["txtno"])?$_POST["txtno"]:''); ?>"  name="txtno" class="form-control" placeholder="Count Of products"/>
            <br/>
            Department <br/>
            <select name="drpselect" class="form-control">
                <option value="Snacks"> Snacks </option>
                <option value="Electronic"> Electronic </option>
                <option value="Other"> Others </option>
            </select>
            <br/>
                City <br/>
                <input type="radio"  <?php if (isset($_POST["rdcity"]) && $_POST["rdcity"]=="Giza") echo "checked";?> name="rdcity" value="Giza"  class="form-check-input"  />Giza
                <input type="radio"  <?php if (isset($_POST["rdcity"]) && $_POST["rdcity"]=="Cairo") echo "checked";?> name="rdcity" value="Cairo" class="form-check-input"  />Cairo
                <input type="radio"  <?php if (isset($_POST["rdcity"]) && $_POST["rdcity"]=="Other") echo "checked";?> name="rdcity" value="Other" class="form-check-input"  />Other
            <br/>
            </br>
            <input type="submit" value="Data Entry Invoice Details" name="btnadd" class="btn btn-danger"/>
            <br/>
            <?php
            if(isset($_POST["btnadd"]))
            {
                echo("<table class='table table-border table-striped'>");
                echo("<tr><th>No</th><th>Product Name</th><th>Quantity</th><th>Price</th></tr>");
                $count=$_POST["txtno"];
                for($x=0;$x<$count;$x++){
                    echo("<tr>");
                    echo("<td>$x</td>");
                    echo("<td> <input type='text' name='txtpro$x' class='form-control' /> </td>");
                    echo("<td> <input type='number' name='txtqty$x' class='form-control' /> </td>");
                    echo("<td> <input type='number' name='txtprice$x' class='form-control' /> </td>");
                  echo("</tr>");
                }
                echo("<tr>");
                echo("<td colspan='4'> <input type='submit' name='btncalc' class='btn btn-primary' value='Calculate Invoice Details' /> </td>");
                echo("</tr>");
                echo("</table>");
            }

            if(isset($_POST["btncalc"]))
            {                
                $client; $proname=array(); $qty=array(); $price=array(); $depart; $city;
                $total; $percent; $value; $after; $delivery; $net;
                $subtotal=array();
                $client=$_POST["txtname"];
                $count=$_POST["txtno"];

                echo("<table class='table table-border table-striped'>");
                echo("<tr><th colspan='2'>Client Name</th><td colspan='3'>$client</td></tr>");

                echo("<tr><th>No</th><th>Product Name</th><th>Quantity</th><th>Price</th><th>Sub Total</th></tr>");
                $total=0;
                for ($x=0;$x<$count;$x++) {
                     
                    $proname[$x]=$_POST["txtpro".$x];
                    $qty[$x]=$_POST["txtqty".$x];
                    $price[$x]=$_POST["txtprice".$x];
                    $subtotal[$x]=$qty[$x]*$price[$x];
                    echo("<tr><th>$x</th><th>$proname[$x] </th><th> $qty[$x]</th><th> $price[$x]</th><th>$subtotal[$x]</th></tr>");   
                    $total=$total+$subtotal[$x];
                }

                $delivery=$_POST["drpselect"];
                $city=$_POST["rdcity"];

                if($total<1000)
                    $percent=0;
                else if($total<3000)
                    $percent=0.05;
                else if($total<5000)
                    $percent=0.08;
                else if($total>5000)
                    $percent=0.10;
                
                $value=$total*$percent;
                $after=$total-$value;

                switch($city)
                {
                    case "Giza":
                        $delivery=50;
                        break;
                    case "Cairo":   
                        $delivery=30;
                        break;
                    default:   
                        $delivery=40;
                }
                $net=$after+$delivery;

               $m=max($price);

               
               echo($m);
               $k = array_search($m, $price);
               echo $k;
               echo $proname[$k];

                 
                echo("<tr><th colspan='2'>Total </th><td colspan='3'>$total</td></tr>");
                echo("<tr><th colspan='2'>Discount % </th><td colspan='3'>$percent</td></tr>");
                echo("<tr><th colspan='2'>Discount Value </th><td colspan='3'>$value</td></tr>");
                echo("<tr><th colspan='2'>Total After Discount </th><td colspan='3'>$after</td></tr>");
                echo("<tr><th colspan='2'>Delivery Value </th><td>$delivery</td></tr>");
                echo("<tr><th colspan='2'>Net Total </th><td colspan='3'>".$net."</td></tr>");
                echo("</table>");



            }
        ?>

        </form>
         
      


    </div>



</body>
</html>