<?php
namespace App\Repositories;
use PDO;

class QuizRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createQuiz($title, $description, $accessCode, $createdBy) {
        try {
            $sql = "INSERT INTO quizzes (title, description, access_code, created_by) 
                    VALUES (:title, :description, :access_code, :created_by)";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':title'       => $title,
                ':description' => $description,
                ':access_code' => $accessCode,
                ':created_by'  => $createdBy
            ]);

            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            die("Erreur lors de la création du quiz : " . $e->getMessage());
        }
    }

    public function deleteQuestionsByQuiz($quizId) {
        $stmt = $this->db->prepare("DELETE FROM questions WHERE id_quiz = ?");
        return $stmt->execute([$quizId]);
    }

    public function addQuestion($questionText, $quizId) {
        $sql = "INSERT INTO questions (question_text, id_quiz) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$questionText, $quizId]);
        return $this->db->lastInsertId();
    }

    public function addAnswer($answerText, $isCorrect, $questionId) {
        $stmt = $this->db->prepare("INSERT INTO answers (answer_text, is_correct, id_question) VALUES (?, ?, ?)");
        return $stmt->execute([$answerText, $isCorrect, $questionId]);
    }

    public function getQuizFullDetails($quizId) {
        $sql = "SELECT q.id as q_id, q.question_text, a.id as a_id, a.answer_text, a.is_correct 
                FROM questions q 
                LEFT JOIN answers a ON q.id = a.id_question 
                WHERE q.id_quiz = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$quizId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllQuizzesByFormateur($userId) {
        $sql = "SELECT * FROM quizzes WHERE created_by = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}