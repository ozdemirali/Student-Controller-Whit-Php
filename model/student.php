<?php
    class Student{
        public $id;
        public $name;
        public $surname;
        public $gender;
        public $classId;
        public $img;


        //Id
        function set_id($id) {
          $this->id = $id;
        }
        function get_id() {
          return $this->id;
        }
        
        // Name
        function set_name($name) {
          $this->name = $name;
        }
        function get_name() {
          return $this->name;
        }


        
        // Surname
        function set_surname($surname) {
          $this->surname = $surname;
        }
        function get_surname() {
          return $this->surname;
        }

        // Gender
        function set_gender($gender) {
            $this->gender = $gender;
          }
          function get_gender() {
            return $this->gender;
        }

        // ClassId
        function set_classId($classId) {
            $this->classId = $classId;
          }
          function get_classId() {
            return $this->classId;
          }

          // Image
        function set_img($img) {
            $this->img = $img;
        }
        function get_img() {
            return $this->img;
        }

        

     

        
    }
?>