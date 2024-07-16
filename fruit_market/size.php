<?php
    require_once "config/config.php";
    ?>

<h1>Welcome to size table</h1>

<form method="POST">
    <input type="text" name="size" id="size" value="">
    <input type="submit" value="Save" name="save_size" id="save_size">

</form>

<?php
   if(isset($_POST['save_size'])){
    $size = $_POST['size'];
    
    $qry1= mysql_query("Select * from size where size = '$size'") or die(mysql_error());
    $count = mysql_num_rows($qry1);

    if($count < 1){
        $qry2 = mysql_query("insert into size (size) values ('$size')") or die(mysql_error());

    }else{
        echo $size." Already Exists";
        mysql_query("update size set status='1' where size='$size'") or die(mysql_error());
    }

    
   } 
?>

<table border="3px">
    <tr>
        <th>S.N.</th>
        <th>Size Name</th>
        <th>Availability</th>
        <th>Action</th>
    </tr>

   <?php 
        $qry3 = mysql_query("select * from size where status = '1'") or die(mysql_error());
        $i = 1;
        while($obj = mysql_fetch_object($qry3)){
            $size_name = $obj->size;
            $status = $obj->status;
            $size_id = $obj->s_id;

            if($status == 1){
                $status = "Available";
            }
            else{
                $status = "Unavailable";
            }


            $i++;

    ?>

    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $size_name; ?></td>
        <td><?php echo $status; ?></td>
        <td><button id="remove" onClick="rem(<?php echo $size_id; ?>)">Remove</button></td>
        </tr>

    <?php
        
        }
    ?>


</table>

<form method="POST" id="hiddenForm">
    <input type="text" id="hiddenTxt" name="hiddenTxt" value="" >
</form>
<?php
    $removed_size = $_POST['hiddenTxt'];
    if($removed_size != ""){
    $qry4 = mysql_query("update size set status='0' where s_id='$removed_size'") or die(mysql_error());
    }
?>

<script>
    function rem(sizeId){
        // document.getElementById("hiddenForm").hide();
        // document.getElementById("hiddenTxt").hide();
        document.getElementById("hiddenTxt").value = sizeId;
        document.getElementById("hiddenForm").submit();
    }

</script>