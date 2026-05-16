<?php

namespace Services;

use App\Repositories\QuizRepository;

class QuizService
{
    private QuizRepository $repo;

    public function __construct(QuizRepository $repo)
    {
        $this->repo = $repo;
    }

    public function generateAccessCode(): string
    {
        return "#QUIZ-" . rand(1000, 9999);
    }

    public function saveCompleteQuiz($quizId, $questionsData)
    {
        try {
            $this->repo->deleteQuestionsByQuiz($quizId);

            foreach ($questionsData as $question) {
                $questionId = $this->repo->addQuestion(
                    $question['text'],
                    $quizId
                );

                foreach ($question['options'] as $index => $option) {
                    $isCorrect = ($question['correct'] == $index) ? 1 : 0;
                    $this->repo->addAnswer(
                        $option,
                        $isCorrect,
                        $questionId
                    );
                }
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}