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

    public function getCorrectionsByAttempt(int $attemptId): array
    {
        $sql = "
        SELECT
            q.id AS question_id,
            q.question_text,

            a.id AS answer_id,
            a.answer_text,
            a.is_correct,

            CASE 
                WHEN sa.answer_id = a.id THEN 1
                ELSE 0
            END AS is_selected

        FROM questions q

        JOIN answers a 
            ON q.id = a.id_question

        LEFT JOIN student_answers sa 
            ON sa.question_id = q.id
            AND sa.attempt_id = :attempt_id

        WHERE q.id IN (
            SELECT question_id 
            FROM student_answers 
            WHERE attempt_id = :attempt_id
        )

        ORDER BY q.id, a.id
    ";

        $stmt = $this->con->prepare($sql);

        $stmt->execute([
            'attempt_id' => $attemptId
        ]);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 🔥 VERY IMPORTANT: group by question
        $result = [];

        foreach ($rows as $row) {

            $questionId = $row['question_id'];

            if (!isset($result[$questionId])) {
                $result[$questionId] = [
                    'question_text' => $row['question_text'],
                    'answers' => []
                ];
            }

            $result[$questionId]['answers'][] = [
                'answer_text' => $row['answer_text'],
                'is_correct' => (bool)$row['is_correct'],
                'is_selected' => (bool)$row['is_selected']
            ];
        }

        return array_values($result);
    }

}