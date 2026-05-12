CREATE DATABASE eduquiz;
USE eduquiz;
CREATE TABLE roles(
    id INT PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(100) UNIQUE
);
CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    password VARCHAR(250) NOT NULL,
    label_role VARCHAR(100),
    FOREIGN KEY (label_role) REFERENCES roles(label) ON DELETE SET NULL
);
CREATE TABLE quizzes(
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(250),
    access_code VARCHAR(100) UNIQUE NOT NULL,
    created_by INT NOT NULL,
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE CASCADE
);
CREATE TABLE questions(
    id INT PRIMARY KEY AUTO_INCREMENT,
    question_text VARCHAR(250) NOT NULL,
    id_quiz INT NOT NULL,
    FOREIGN KEY (id_quiz) REFERENCES quizzes(id) ON DELETE CASCADE
);
CREATE TABLE answers(
    id INT PRIMARY KEY AUTO_INCREMENT,
    answer_text VARCHAR(250) NOT NULL,
    is_correct BOOLEAN NOT NULL,
    id_question INT NOT NULL,
    FOREIGN KEY (id_question) REFERENCES questions(id) ON DELETE CASCADE
);
CREATE TABLE quiz_attempts(
    id INT PRIMARY KEY AUTO_INCREMENT,
    status ENUM('in_progress', 'completed') NOT NULL,
    score DECIMAL(5,2),
    id_user INT,
    id_quiz INT,
    FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (id_quiz) REFERENCES quizzes(id) ON DELETE SET NULL
);
CREATE TABLE student_answers(
    id INT PRIMARY KEY AUTO_INCREMENT,
    is_correct BOOLEAN NOT NULL,
    attempt_id INT,
    question_id INT NOT NULL,
    answer_id INT NOT NULL,
    FOREIGN KEY (attempt_id) REFERENCES quiz_attempts(id) ON DELETE SET NULL,
    FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE RESTRICT,
    FOREIGN KEY (answer_id) REFERENCES answers(id) ON DELETE RESTRICT
)