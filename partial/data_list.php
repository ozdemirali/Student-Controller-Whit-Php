<?php
    require 'controller\service.php';

    $service=new Service();
    $result=$service->get_Data();



    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>
                    <img src='img/".$row['Img']. "' class='rounded-circle' alt='Cinque Terre' width='50' height='50'> 
                </td>";
            echo "<td>" . $row['Name']. " ".$row['Surname'] . "</td>";
            echo "<td>"; 
            echo $row['Gender']==0?'Kadın':'Erkek';
            echo "</td>";
            echo "<td>" . $row['className'] . "</td>";
            echo "<td>
                    <a href='edit.php?id=".$row['Id']. " 'class='btn btn-outline-primary' >Düzenle</a>
                    <a href='partial\delete.php?id=".$row['Id']. " 'class='btn btn-outline-danger' >Sil</a>
                </td>";
            echo "</tr>";

        }
    } else {
        echo "Kayıt yok";
    }
?>
