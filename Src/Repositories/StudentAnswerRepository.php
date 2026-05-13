<?php

namespace Repositories;

use PDO;
use Entities\StudentAnswer;
class StudentAnswerRepository
{
    private PDO $con;

    public function __construct(PDO $con)
    {
        $this->con = $con;
    }

    public function createAnswer(StudentAnswer $answer):bool{
        $sql = "INSERT answers(attempt_id,question_id,answer_id) VALUES(?,?,?,?)";
        $stmt = $this->con->prepare($sql);

        return $stmt->execute([
            $answer->getAttemptId(),
            $answer->getQuestionId(),
            $answer->getAnswerId()
        ]);
    }

}