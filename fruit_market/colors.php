<?php

require_once 'config/config.php';

?>
<div style=" align-items:center; justify-content:center;">
<h1 style="text-align:center;color:green;">
    Colors Table 
</h1>

<table border="2px" style="border-collapse:collapse;margin:auto;">
    <tr>
        <th>S No.</th>
        <th>Color</th>
        <th>Availability</th>
    </tr>
<?php 
    $qry1=mysql_query("select * from colors") or die(mysql_error());
    

    while($obj=mysql_fetch_object($qry1)){
        
        $color_id=$obj->c_id;
        $color_name=$obj->color;
        $color_status=$obj->status;

        if($color_status==1){
            $color_status="Available";
        }else{
            $color_status="Unavailable";
        }
    
?>
<tr>
    <td><?php echo $color_id; ?></td>
    <td><?php echo $color_name; ?></td>
    <td><?php echo $color_status; ?></td>
</tr>

<?php
    //closing of while loop
    }
?>
</table>

</div>

