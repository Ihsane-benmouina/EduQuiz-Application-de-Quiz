<?php

namespace Services;

use Repositories\AnswerRepository;

class ScoreService
{
    private AnswerRepository $answerRep;

    public function __construct(AnswerRepository $answerRep)
    {
        $this->answerRep = $answerRep;
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
}