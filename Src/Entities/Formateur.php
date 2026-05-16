<?php

namespace Entities;




require_once "User.php";

class Formateur extends User
{

    public function createQuiz()
    {
        echo "Quiz created";
    }

    public function generateAccessCode()
    {
        return rand(100000, 999999);
    }

    public function addQuestion()
    {
        echo "Question added";
    }

    public function updateQuestion()
    {
        echo "Question updated";
    }

    public function deleteQuestion()
    {
        echo "Question deleted";
    }
}


