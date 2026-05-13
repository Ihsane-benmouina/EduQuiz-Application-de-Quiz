<?php

namespace Services;

use Repositories\AnswerRepository;
use Repositories\StudentAnswerRepository;

class ScoreService
{
    private AnswerRepository $answerRep;
    private StudentAnswerRepository $studentAnswerRep;

    public function __construct(AnswerRepository $answerRep,StudentAnswerRepository $studentAnswerRep)
    {
        $this->answerRep = $answerRep;
        $this->studentAnswerRep = $studentAnswerRep;
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
}