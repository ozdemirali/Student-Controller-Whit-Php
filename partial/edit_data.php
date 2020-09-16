<?php
  require 'model\student.php';
  require 'controller\service.php';


   $id=$_GET['id'];

   $service=new Service();
   $result=$service->get_Data_By_Id($id);
   
   $data=new Student();


   //Drobdown list için gerekli olan veri.
   $classList=$service->get_Class();
    
   if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       
        $data->set_id($row['Id']);
        $data->set_name($row['Name']);
        $data->set_surname($row['Surname']);
        $data->set_gender($row['Gender']);
        $data->set_classId($row['ClassId']);
        $data->set_img($row['Img']);

    }
} else {
    echo "Kayıt yok";
}

echo "<div class='form-group'>
        <label hidden >Id:</label>
        <input type='text' class='form-control' hidden value='".$data->id."' placeholder='Adını Giriniz' name='id' id='id' required>
    </div>";

echo "<div class='form-group'>
        <label >Adı:</label>
        <input type='text' class='form-control' value='".$data->name."' placeholder='Adını Giriniz' name='name' id='name' required>
    </div>";

echo "<div class='form-group'>
        <label>Soyadı:</label>
        <input type='text' class='form-control' value='".$data->surname."' placeholder='Soyadını Giriniz' name='surname' id='surname' required>
    </div>";

echo "<div class='form-group'>
    <label>Cinsiyeti:</label>
    <select id='inputState' name='gender' class='form-control'>";
      echo " <option value='0'";
      echo $data->gender==0?' selected':'';
      echo ">Kadın</option>
        <option value='1'";
      echo  $data->gender==1?' selected':''; 
      echo">Erkek</option>
    </select>
</div>";

echo "<div class='form-group'>
    <label>Sınıf:</label>
    <select id='inputState' name='classId' class='form-control'>";
       
    if($classList->num_rows>0){
        while($row = $classList->fetch_assoc()) {
            echo "<option value=" .$row['Id'];
            echo $row['Id']==$data->classId?' selected':'';
            echo ">".$row['Name']."</option>";
        }
     }
           
echo" </select>
    </div>";

echo "<div class='form-group'>
    <label>Resmi:</label>
    <label>".$data->img."</label>
    <input type='text' Hidden name='img' value='".$data->img."' class='form-control-file border'>
    <input type='file' class='form-control-file border' name='fileToUpload's>
</div>";

?>