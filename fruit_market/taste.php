<?php
    $server = "localhost";
    $user = "root";
    $pwd = "";

    $db = "fruit_market";

    $conn = mysql_connect("$server","$user","$pwd") or die(mysql_error());

    mysql_select_db($db,$conn);
    // echo "connected to $db";
?>

<h1>Welcome to Taste Table</h1>

<form action="#" method="POST">

    <input type="text" placeholder="Enter Taste Value" name="taste_name" id="taste_name" value="">
    <input type="submit" value="Save it!" name="btn" id="btn">

</form>

<?php
    if(isset($_POST['btn'])){
        $taste_name = $_REQUEST['taste_name'];

        mysql_query("insert into taste (taste) values ('$taste_name')") or die(mysql_error());
    }

?>

<table border="3px solid green">
    <tr>
        <th>S.N.</th>
        <th>Taste Name</th>
        <th>Availability</th>
    </tr>

    <?php
        $qry = mysql_query("select * from taste") or die(mysql_error());

        while($obj = mysql_fetch_object($qry)){
            $taste_id = $obj->t_id;
            $taste_name = $obj->taste;
            $taste_status = $obj->status;

            if($taste_status == 1){
                $taste_status ="Available";

            }else{
                $taste_status = "Not Available";
            }


    ?>
    <tr>
        <td><?php echo $taste_id; ?></td>
        <td><?php echo $taste_name; ?></td>
        <td><?php echo $taste_status; ?></td>
    </tr>

    <?php
        }
        ?>


</table>