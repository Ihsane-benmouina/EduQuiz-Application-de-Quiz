<?php

namespace Services;

use Repositories\AnswerRepository;
use Repositories\QuizAttemptRepository;
use Repositories\StudentAnswerRepository;

class ScoreService
{
    private AnswerRepository $answerRep;
    private StudentAnswerRepository $studentAnswerRep;
    private QuizAttemptRepository $quizAttemptRepository;

    public function __construct(
        AnswerRepository $answerRepository,
        StudentAnswerRepository $studentAnswerRepository,
        QuizAttemptRepository $quizAttemptRepository
    ) {
        $this->answerRepository = $answerRepository;
        $this->studentAnswerRepository = $studentAnswerRepository;
        $this->quizAttemptRepository = $quizAttemptRepository;
    }

    public function calculateScore(array $studentAnswers): float
    {
        $score = 0;
        foreach($studentAnswers as $answerId){
            $is_correct = $this->answerRep->isCorrectAnswer($answerId);
            if($is_correct){
                $score++;
            }
        }
        return $score;
    }

    public function getCorrections(int $attemptId): array
    {
        return $this
            ->studentAnswerRep
            ->getCorrectionsByAttempt($attemptId);
    }

    public function getQuizStatistics(int $quizId): array
    {
        return $this
            ->quizAttemptRepository
            ->getQuizResults($quizId);
    }
}