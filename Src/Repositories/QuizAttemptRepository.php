<?php

namespace Repositories;

use PDO;
use Entities\QuizAttempt;
class QuizAttemptRepository
{
    private PDO $con;

    public function __construct(PDO $con)
    {
        $this->con = $con;
    }

    public function createAttempt(QuizAttempt $attempt):bool{
        $sql = "INSERT INTO quiz_attempts(status,score,id_user,id_quiz) VALUES(?,?,?,?)";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            $attempt->getStatus(),
            $attempt->getScore(),
            $attempt->getIdUser(),
            $attempt->getIdQuiz()
        ]);
    }
}