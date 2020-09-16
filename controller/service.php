<?php
    class Service{

        public $servername = "localhost";
        public $username = "root";
        public $password = "";
        public $dbname = "studentdb";
        public $conn;


        //Get All Data From Student Table
        function get_Data(){
            $this->open_Connect();
            
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }

            $sql = "SELECT student.Id, student.Name, student.Surname,student.Gender,class.Name as className,student.Img From student INNER JOIN Class ON(student.ClassId=class.Id)";
            $result=$this->conn->query($sql);
            $this->close_Connect();
            return $result;
        }

        function get_Data_By_Id($id){
            //echo $id;
            $this->open_Connect();

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }

            $sql="Select *From student Where Id=".$id;
            $result=$this->conn->query($sql);
            $this->close_Connect();
            return $result;


        }
        
        //Insert data
        function add_Data($data){
            //echo "id:".$data->id; 

            $this->open_Connect();
            
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
            
            if($data->id==null){
                $sql = "INSERT INTO student (Name, Surname, Gender,ClassId,Img) VALUES ('".$data->name."','".$data->surname."','".$data->gender."',".$data->classId.",'".$data->img."')";
            }else{
                $sql = "UPDATE student SET Name='$data->name', Surname='$data->surname',Gender='$data->gender',ClassId=".$data->classId.",Img='".$data->img."' Where Id=".$data->id;
            }
           
            if ($this->conn->query($sql) === TRUE) {
                $result="ok";
            } else {
                $result= $this->conn->error;
            }

            $this->close_Connect();
            return $result;

        }

        
        //Get All Data From Class Table
        function get_Class(){
            $this->open_Connect();
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
            $sql = "SELECT * FROM Class";
            $result=$this->conn->query($sql);
            $this->close_Connect();
            return $result;


        }
          

        //delete data whit id
        function del_Data($id){
            //echo "Service delete function work";
            //echo $id;
            
            $this->open_Connect();
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
            $sql="DELETE FROM Student WHERE Id=".$id;
            //echo $sql;

            if ($this->conn->query($sql) === TRUE) {
                $result="ok";
            } else {
                $result= $this->conn->error;
            }

            $this->close_Connect();
            return $result;
        }


        //Open Database connect
        function open_Connect(){
            //Create connection
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
                                    
            //Set turkhis charset
            $this->conn->set_charset("utf8");
            
        }

        //Close Database connect
        function close_Connect(){
            $this->conn->close();
        }
    }
?>