<?php 
    require '..\controller\service.php';
    $service=new Service();
    
    $result=$service->del_Data($_GET['id']);
   
    if ($result=="ok") {
        header("Location: ..");
        
    } else {
        echo $result;
    }
?>