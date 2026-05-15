<?php

namespace Entities;

class Quiz_attempt
{
    private $db; 

    
    public function __construct($db) {
        $this->db = $db;
    }

    
public function saveAttempt($userId, $quizId, $score, $status) {
    // Debug: Chouf wach had l-ma3loumat machi khawyin
    if (empty($userId) || empty($quizId)) {
        die("Erreur: UserID awla QuizID khawyin f l-Session!");
    }

    try {
        $sql = "INSERT INTO quiz_attempts (id_user, id_quiz, score, attempt_date, status) 
                VALUES (?, ?, ?, NOW(), ?)";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$userId, $quizId, $score, $status]);
        
        return $result;
    } catch (\PDOException $e) {
        // Hna ghadi i-goul lik l-moshkil b-debt (maslan smyt l-colonne ghalta)
        die("Erreur SQL: " . $e->getMessage());
    }
}
}