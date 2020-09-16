<?php
     require 'controller\service.php';
     $service=new Service();
     $result=$service->get_Class();

     if($result->num_rows>0){
        while($row = $result->fetch_assoc()) {
            echo "<option value=".$row['Id'].">".$row['Name']."</option>";
        }
     }
     else{

     }
 
?>