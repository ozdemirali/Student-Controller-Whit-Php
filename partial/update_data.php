<?php
    require '..\model\student.php';
    require '..\controller\service.php';

    $data=new Student();
    
    $data->set_id($_POST["id"]);
    $data->set_name($_POST["name"]);
    $data->set_surname($_POST["surname"]);
    $data->set_gender($_POST["gender"]);
    $data->set_classId($_POST["classId"]);
    $data->set_img($_POST["img"]);

    echo $data->id;

    $target_dir = "../img/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   $file=basename($_FILES["fileToUpload"]["name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   
   echo $file;

   // Check if image file is a actual image or fake image
      if($file!=null){
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

            if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            } else {
            echo "File is not an image.";
            $uploadOk = 0;
            }
        }  

         // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
         }
         

         // if everything is ok, try to upload file
            if($uploadOk==1 && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
                $data->set_img($file);}
            else{   //if everything is not ok or not upload file, The methot of set_img() as female.jpg or male.jpg for gender
                    if($data->get_gender()==0){
                        $data->set_img("female.jpg");  
                    }else{
                        $data->set_img("male.jpg");
                    }
            }
    } 


    $service=new Service();
    $result=$service->add_Data($data);

         
    if ($result=="ok") {
          header("Location: ../index.php");
            
        } else {
            echo $result;
        }
      
        
?>    