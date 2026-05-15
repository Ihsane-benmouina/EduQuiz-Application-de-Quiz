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

('gg', 'hgveuy', 'othmane12@gmail.com', '1234E56', 'teacher');

-- INSERT QUIZ
INSERT INTO quizzes(title, description, access_code, created_by)
VALUES
(
    'HTML Basics',
    'Quiz about HTML fundamentals',
    'HTML2026',
    9
);

-- INSERT QUESTIONS
INSERT INTO questions(question_text, id_quiz)
VALUES
('What does HTML stand for?', 3),
('Which tag is used for links?', 3);

-- INSERT ANSWERS FOR QUESTION 1
INSERT INTO answers(answer_text, is_correct, id_question)
VALUES
('Hyper Text Markup Language', TRUE, 3),
('High Transfer Machine Language', FALSE, 3),
('Home Tool Markup Language', FALSE, 3);

-- INSERT ANSWERS FOR QUESTION 2
INSERT INTO answers(answer_text, is_correct, id_question)
VALUES
('<a>', TRUE, 4),
('<p>', FALSE, 4),
('<img>', FALSE, 4);

-- INSERT QUIZ ATTEMPT
INSERT INTO quiz_attempts(status, score, id_user, id_quiz)
VALUES
('completed', 80.00, 6, 3);

-- INSERT STUDENT ANSWERS
INSERT INTO student_answers( attempt_id, question_id, answer_id)
VALUES
( 3, 3, 4),
( 3, 4, 7);
SELECT q.title, qa.score, qa.attempt_date, qa.status
FROM quiz_attempts qa
JOIN quizzes q ON qa.id_quiz = q.id
WHERE qa.id_user = 3;
SELECT questions.question_text ,answers.answer_text from answers 
    join questions on 
    answers.id_question = questions.id 
    where id_quiz = 1;
    drop DATABASE eduquiz;
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
                                attempt_id INT,
                                question_id INT NOT NULL,
                                answer_id INT NOT NULL,
                                FOREIGN KEY (attempt_id) REFERENCES quiz_attempts(id) ON DELETE SET NULL,
                                FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE RESTRICT,
                                FOREIGN KEY (answer_id) REFERENCES answers(id) ON DELETE RESTRICT
)