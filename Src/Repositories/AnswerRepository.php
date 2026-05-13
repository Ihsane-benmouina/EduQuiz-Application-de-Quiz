<?php

namespace Repositories;

use PDO;

class AnswerRepository
{
    private PDO $con;

    public function __construct(PDO $con)
    {
        $this->con = $con;
    }
    public function isCorrectAnswer(int $id):bool{
        $sql = "SELECT is_correct FROM answers WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result['is_correct'];
    }
}