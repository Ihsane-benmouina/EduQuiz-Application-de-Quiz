<?php

namespace Entities;

class Quiz
{
    private $id;
    private $db;

    public function __construct($id, $db) {
        $this->id = $id;
        $this->db = $db;
    }

    public function getQuestionsAndAnswers() {
       
        $sql = "SELECT id, question_text FROM questions WHERE id_quiz = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->id]);
        $questions = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      
        foreach ($questions as &$question) {
            $sqlAnswers = "SELECT id, answer_text, is_correct FROM answers WHERE id_question = ?";
            $stmtA = $this->db->prepare($sqlAnswers);
            $stmtA->execute([$question['id']]);
            $question['answers'] = $stmtA->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $questions;
    }
}