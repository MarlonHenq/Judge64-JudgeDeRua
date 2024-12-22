<?php
require_once __DIR__ . '/func/loadEnv.php';

loadEnv(__DIR__ . '/../.env');

if (!extension_loaded('pdo_mysql')) {
    die('A extensão pdo_mysql não está habilitada no PHP.');
}

class Database {
    private $conn;

    public function connect() {
        $this->conn = null;
        $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];

        // echo $dsn . '<br>';
        // echo $username . '<br>';
        // echo $password . '<br>';

        try {
            $this->conn = new PDO($dsn, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $this->conn;
    }

    // Getters e Setters para users
    public function getUserById($id) {
        $query = 'SELECT * FROM users WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByNickname($nickname) {
        $query = 'SELECT * FROM users WHERE nickname = :nickname';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nickname', $nickname, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByToken($token) {
        $query = 'SELECT * FROM users WHERE token = :token';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($username, $nickname, $password, $token) {
        $query = 'INSERT INTO users (username, nickname, password, token) VALUES (:username, :nickname, :password, :token)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':nickname', $nickname, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    public function updateUserToken($id, $token) {
        $query = 'UPDATE users SET token = :token, last_login_date = NOW() WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function updateUserLastLoginDate($id) {
        $query = 'UPDATE users SET last_login_date = NOW() WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Getters e Setters para exercises
    public function createExercise($name, $description, $difficulty, $test, $code) {
        $query = 'INSERT INTO exercises (name, description, test, code,  difficulty) VALUES (:name, :description, :test, :code, :difficulty)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':test', $test, PDO::PARAM_STR);
        $stmt->bindParam(':code', $code, PDO::PARAM_STR);
        $stmt->bindParam(':difficulty', $difficulty, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    public function updateExercise ($id, $name, $description, $difficulty, $test, $code) {
        $query = 'UPDATE exercises SET name = :name, description = :description, test = :test, code = :code, difficulty = :difficulty WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':test', $test, PDO::PARAM_STR);
        $stmt->bindParam(':code', $code, PDO::PARAM_STR);
        $stmt->bindParam(':difficulty', $difficulty, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getExercises() {
        $query = 'SELECT * FROM exercises';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExerciseById($id) {
        $query = 'SELECT * FROM exercises WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateExerciseUsers($id, $users_completed) {
        $query = 'UPDATE exercises SET users_completed = :users_completed WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':users_completed', $users_completed);
        return $stmt->execute();
    }

    public function getLastId() {
        return $this->conn->lastInsertId();
    }

    // Getters e Setters para user_exercises
    public function createUserExercise($user_id, $exercise_id, $completed, $completion_date, $user_solution) {
        $query = 'INSERT INTO user_exercises (user_id, exercise_id, completed, completion_date, user_solution) VALUES (:user_id, :exercise_id, :completed, :completion_date, :user_solution)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':exercise_id', $exercise_id, PDO::PARAM_INT);
        $stmt->bindParam(':completed', $completed, PDO::PARAM_INT);
        $stmt->bindParam(':completion_date', $completion_date, PDO::PARAM_STR);
        $stmt->bindParam(':user_solution', $user_solution, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getUserExercise($user_id, $exercise_id) {
        $query = 'SELECT * FROM user_exercises WHERE user_id = :user_id AND exercise_id = :exercise_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':exercise_id', $exercise_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUserExercise($user_id, $exercise_id, $completed, $completion_date, $user_solution) {
        $query = 'UPDATE user_exercises SET completed = :completed, completion_date = :completion_date, user_solution = :user_solution WHERE user_id = :user_id AND exercise_id = :exercise_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':exercise_id', $exercise_id, PDO::PARAM_INT);
        $stmt->bindParam(':completed', $completed, PDO::PARAM_INT);
        $stmt->bindParam(':completion_date', $completion_date, PDO::PARAM_STR);
        $stmt->bindParam(':user_solution', $user_solution, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getUserCompletedExercises($user_id) {
        $query = 'SELECT * FROM user_exercises WHERE user_id = :user_id AND completed = 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
