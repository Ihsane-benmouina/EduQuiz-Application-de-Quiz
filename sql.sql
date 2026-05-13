-- Active: 1776178099256@@127.0.0.1@3306@eduquiz
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
);
-- 1. Les Roles
INSERT INTO roles (label) VALUES ('Prof'), ('Étudiant');

-- 2. Les Users (Passwords khasshom ikouno hashed f PHP, hna gha ndirhom 3adyin)
INSERT INTO users (firstname, lastname, email, password, label_role) VALUES 
('Othmane', 'Dev', 'othmane@pro.com', '123', 'Prof'),
('Ahmed', 'Test', 'ahmed@student.com', '456', 'Étudiant');
-- 3. Le Quiz (created_by = 1 dyal Othmane)
INSERT INTO quizzes (title, description, access_code, created_by) VALUES 
('PHP Object Oriented', 'Quiz sur les bases de la POO en PHP', 'PHP-2026', 1);

-- 4. Les Questions (id_quiz = 1)
INSERT INTO questions (question_text, id_quiz) VALUES 
('Que signifie l’acronyme POO ?', 1),
('Quelle est la fonction magique utilisée pour le constructeur en PHP ?', 1);
-- 5. Les Réponses pour Question 1
INSERT INTO answers (answer_text, is_correct, id_question) VALUES 
('Programmation Orientée Objet', 1, 1),
('Programmation Ordonnée et Optimisée', 0, 1),
('Petit Objet Ordinateur', 0, 1);

-- 6. Les Réponses pour Question 2
INSERT INTO answers (answer_text, is_correct, id_question) VALUES 
('__construct()', 1, 2),
('__init()', 0, 2),
('construct()', 0, 2);

-- 7. L'Attempt (L-mou7awala dyal Ahmed)
INSERT INTO quiz_attempts (status, score, id_user, id_quiz) VALUES 
('completed', 20.00, 2, 1);

-- 8. Student Answers (Ahmed jaweb s7i7 3la l-as'ila b joj)
-- On suppose que id_attempt = 1, Q1_id=1, Q2_id=2, Ans1_id=1, Ans2_id=4
INSERT INTO student_answers (is_correct, attempt_id, question_id, answer_id) VALUES 
(1, 1, 1, 1),
(1, 1, 2, 4);
