<?php

namespace Repositories;

use PDO;
use Entities\QuizAttempt;
class QuizAttemptRepository
{
    private PDO $pdo;

    public function __construct(PDO $con)
    {
        $this->pdo = $con;
    }

    public function createAttempt(QuizAttempt $attempt):bool{
        $sql = "INSERT INTO quiz_attempts(status,score,id_user,id_quiz) VALUES(?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $attempt->getStatus(),
            $attempt->getScore(),
            $attempt->getIdUser(),
            $attempt->getIdQuiz()
        ]);
    }

    public function getQuizResults(int $quizId): array
    {
        $sql = "
        SELECT
            u.firstname,
            u.lastname,
            q.title,
            qa.score,
            qa.attempt_date

        FROM quiz_attempts qa

        JOIN users u
            ON qa.id_user = u.id

        JOIN quizzes q
            ON qa.id_quiz = q.id

        WHERE qa.id_quiz = :quiz_id

        ORDER BY qa.score DESC
    ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'quiz_id' => $quizId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAttemptsByStudent(int $studentId): array
    {
        $sql = "
        SELECT
            qa.id,
            qa.score,
            qa.status,
            qa.attempt_date,

            q.title

        FROM quiz_attempts qa

        JOIN quizzes q
            ON qa.id_quiz = q.id

        WHERE qa.id_user = :student_id

        ORDER BY qa.attempt_date DESC
    ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'student_id' => $studentId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}