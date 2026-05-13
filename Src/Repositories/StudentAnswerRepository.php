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

    public function getCorrectionsByAttempt(int $attemptId):array{
        $sql = "
        SELECT
            q.question_text,

            student_answer.answer_text AS student_answer,

            correct_answer.answer_text AS correct_answer,

            correct_answer.is_correct

        FROM student_answers sa

        JOIN questions q
            ON sa.question_id = q.id

        JOIN answers student_answer
            ON sa.answer_id = student_answer.id

        JOIN answers correct_answer
            ON q.id = correct_answer.id_question
            AND correct_answer.is_correct = 1

        WHERE sa.attempt_id = ?
    ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            $attemptId
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}