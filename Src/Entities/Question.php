<?php
namespace Entities;

class Question
{
       
    private $id;
   private $db;
   public function __construct(  $db)
   { 
  
    $this->db = $db;
  
      }
      public function getquistionbyid($idquiz){
        $_SESSION["id_quiz"] = $idquiz;
        $sql="SELECT questions.question_text from questions where id_quiz=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idquiz]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
      }



}