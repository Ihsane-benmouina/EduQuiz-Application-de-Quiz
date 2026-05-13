<?php

namespace Entities;

class StudentAnswer
{
    private ?int $id;
    private int $attempt_id;
    private int $question_id;
    private int $answer_id;

    public function __construct(?int $id, int $attempt_id, int $question_id, int $answer_id)
    {
        $this->id = $id;
        $this->attempt_id = $attempt_id;
        $this->question_id = $question_id;
        $this->answer_id = $answer_id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }


    public function getAttemptId(): int
    {
        return $this->attempt_id;
    }

    public function setAttemptId(int $attempt_id): void
    {
        $this->attempt_id = $attempt_id;
    }

    public function getQuestionId(): int
    {
        return $this->question_id;
    }

    public function setQuestionId(int $question_id): void
    {
        $this->question_id = $question_id;
    }

    public function getAnswerId(): int
    {
        return $this->answer_id;
    }

    public function setAnswerId(int $answer_id): void
    {
        $this->answer_id = $answer_id;
    }


}