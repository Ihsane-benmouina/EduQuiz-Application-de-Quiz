<?php

namespace Entities;

class QuizAttempt
{
    private ?int $id;
    private string $status;
    private ?float $score;
    private string $attemptDate;
    private int $id_user;
    private int $id_quiz;

    public function __construct(?int $id, string $status, ?float $score, string $attemptDate, int $id_user, int $id_quiz)
    {
        $this->id = $id;
        $this->status = $status;
        $this->score = $score;
        $this->attempt_date = $attemptDate;
        $this->id_user = $id_user;
        $this->id_quiz = $id_quiz;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(float $score): void
    {
        $this->score = $score;
    }

    public function getAttemptDate(): string
    {
        return $this->attemptDate;
    }

    public function setAttemptDate(string $attempt_date): void
    {
        $this->attemptDate = $attempt_date;
    }

    public function getIdUser(): int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): void
    {
        $this->id_user = $id_user;
    }

    public function getIdQuiz(): int
    {
        return $this->id_quiz;
    }

    public function setIdQuiz(int $id_quiz): void
    {
        $this->id_quiz = $id_quiz;
    }


}