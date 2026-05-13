<?php
class Quiz {
    public string $title;
    public string $description;
    public string $accessCode;
    public array $questions = [];

    public function __construct(string $t, string $d) {
        $this->title = $t;
        $this->description = $d;
        $this->accessCode = "QUIZ-" . rand(1000, 9999);
    }
}