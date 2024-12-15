<?php

class Expense {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=expense_tracker', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function getAll($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM expenses WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

 
    public function add($userId, $title, $amount) {
        $stmt = $this->pdo->prepare("INSERT INTO expenses (title, amount, user_id) VALUES (?, ?, ?)");
        $stmt->execute([$title, $amount, $userId]);
    }

    public function delete($id, $userId) {
        $stmt = $this->pdo->prepare("DELETE FROM expenses WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $userId]);
    }

    public function getById($id, $userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM expenses WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $userId, $title, $amount) {
        $stmt = $this->pdo->prepare("UPDATE expenses SET title = ?, amount = ? WHERE id = ? AND user_id = ?");
        $stmt->execute([$title, $amount, $id, $userId]);
    }
}
?>
