<?php
session_start();
require_once '../../models/Expense.php';
require_once '../../models/User.php';

$user = new User();
if (!$user->checkLogin()) {
    header('Location: /expense_tracker/views/users/login.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    
    $expenseModel = new Expense();
    $expense = $expenseModel->getById($id, $_SESSION['user_id']);

    if ($expense) {
        $expenseModel->delete($id, $_SESSION['user_id']);
        header('Location: index.php');
        exit();
    } else {
        echo "Expense not found or you do not have permission to delete this expense.";
        exit();
    }
} else {
    echo "Invalid expense ID.";
    exit();
}
?>
