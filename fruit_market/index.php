<?php
require_once 'config/config.php';
    if(isset($_POST['save'])){
        $fruit=$_REQUEST['fruit_name'];
    //$_REQUEST can be used to handle both get and post requests
        mysql_query("insert into fruits (fruit) values ('$fruit')") or die(mysql_error());
       $success= $fruit." has been succesfully saved";
    }
?>
<div style="margin:auto">
<h1 style="text-align:center;">Welcome to Fruit Market</h1>

<form method="post" style="display:flex;align-items:center;justify-content:center;">
<input type="text" name="fruit_name" id="fruit_name" value="">
<br>
<br>

<input type="submit" value="Add Fruit" name="save" id="save">
</form>
<br>
<br>

<h1 style="text-align:center;color:green;">

<?php 

echo $success;
?>
</h1>
<table border="1px"  style="border-collapse:collapse;margin:auto;">
<tr>
    <th>S.NO</td>
    <th>Fruit</th>
    <th>Availability</th>
</tr>



<?php
$qry1=mysql_query("select * from fruits") or die(mysql_error());

while($res1=mysql_fetch_object($qry1))
{
$fruit_id=$res1->f_id;
$fruit=$res1->fruit;
$status=$res1->status;
if($status==1)
{
    $status="Available";
}else{
    $status="Unavailable";
}
?>

<tr>
    <td><?php echo $fruit_id;?></td>
    <td><?php echo $fruit;?></td>
    <td><?php echo $status;?></td>
</tr>



<?php

}

?>
</table>


</div>