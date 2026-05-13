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
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
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
    attempt_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
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
-- INSERT ROLES
INSERT INTO roles(label)
VALUES
('admin'),
('teacher'),
('student');

-- INSERT USERS
INSERT INTO users(firstname, lastname, email, password, label_role)
VALUES
('Othman', 'Hamadellah', 'othman@gmail.com', '123456', 'admin'),
('Sara', 'Karimi', 'sara@gmail.com', '123456', 'teacher'),
('Youssef', 'Alaoui', 'youssef@gmail.com', '123456', 'student');

-- INSERT QUIZ
INSERT INTO quizzes(title, description, access_code, created_by)
VALUES
(
    'HTML Basics',
    'Quiz about HTML fundamentals',
    'HTML2026',
    2
);

-- INSERT QUESTIONS
INSERT INTO questions(question_text, id_quiz)
VALUES
('What does HTML stand for?', 1),
('Which tag is used for links?', 1);

-- INSERT ANSWERS FOR QUESTION 1
INSERT INTO answers(answer_text, is_correct, id_question)
VALUES
('Hyper Text Markup Language', TRUE, 1),
('High Transfer Machine Language', FALSE, 1),
('Home Tool Markup Language', FALSE, 1);

-- INSERT ANSWERS FOR QUESTION 2
INSERT INTO answers(answer_text, is_correct, id_question)
VALUES
('<a>', TRUE, 2),
('<p>', FALSE, 2),
('<img>', FALSE, 2);

-- INSERT QUIZ ATTEMPT
INSERT INTO quiz_attempts(status, score, id_user, id_quiz)
VALUES
('completed', 80.00, 3, 1);

-- INSERT STUDENT ANSWERS
INSERT INTO student_answers(is_correct, attempt_id, question_id, answer_id)
VALUES
(TRUE, 1, 1, 1),
(FALSE, 1, 2, 5);
SELECT q.title, qa.score, qa.attempt_date, qa.status
FROM quiz_attempts qa
JOIN quizzes q ON qa.id_quiz = q.id
WHERE qa.id_user = 3;