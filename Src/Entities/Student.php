<?php

namespace Entities;


class Student extends User
{
    private $db;
    private $id;

    public function __construct($db, $id, $firstname, $lastname, $email, $password)
    {
        parent::__construct($firstname, $lastname, $email, $password);
        

        $this->db = $db;
        $this->id = $id;
    }

    public function getDetailsStudent()
    {
        $sql = "SELECT q.title, qa.score,qa.attempt_date, qa.status
                FROM quiz_attempts qa
                JOIN quizzes q ON qa.id_quiz = q.id
                WHERE qa.id_user = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $this->id]);
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}