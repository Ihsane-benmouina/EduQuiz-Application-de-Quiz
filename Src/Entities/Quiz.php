<?php
namespace App\Entities;


class Quiz{
    public $id;
    public $title;
    public $description;
    public $access_code;
    public $created_by;

    public  function  __construct($title , $description,$access_code,$created_by){
        $this->title=$title;
        $this->description=$description;
        $this->access_code=$access_code;
        $this->created_by=$created_by;
    }



}