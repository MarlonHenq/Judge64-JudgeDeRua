CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    nickname VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    token VARCHAR(255) DEFAULT NULL,
    account_creation_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    last_login_date DATETIME DEFAULT NULL,
    admin BOOLEAN DEFAULT FALSE
);

CREATE TABLE IF NOT EXISTS exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    test TEXT,
    users_completed TEXT,
    difficulty ENUM('Easy', 'Medium', 'Hard') NOT NULL,
    available BOOLEAN DEFAULT TRUE,
    creation_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS user_exercises (
    user_id INT NOT NULL,
    exercise_id INT NOT NULL,
    completed BOOLEAN NOT NULL DEFAULT FALSE,
    completion_date DATETIME DEFAULT NULL,
    user_solution TEXT,
    PRIMARY KEY (user_id, exercise_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (exercise_id) REFERENCES exercises(id) ON DELETE CASCADE
);