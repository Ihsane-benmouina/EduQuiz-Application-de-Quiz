<?php

namespace Entities;

class Student extends User
{
     private $db;
     private $id;
     public function __construct($db,$id){
        $this->db = $db;
        $this->id = $id;
     }
     public function getdetailsstudents($db){
        $sql="SELECT quize.name ,  ";

     }


}