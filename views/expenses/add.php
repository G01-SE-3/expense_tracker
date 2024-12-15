<?php
session_start();
require_once '../../models/Expense.php';
require_once '../../models/User.php';

$user = new User();
if (!$user->checkLogin()) {
    header('Location: /expense_tracker/views/users/login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $amount = floatval($_POST['amount']);
    
    // Create an Expense object and add the expense for the logged-in user
    $expenseModel = new Expense();
    $expenseModel->add($_SESSION['user_id'], $title, $amount);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Expense</title>
</head>
<body>
    <h1>Add Expense</h1>
    <form method="POST" action="add.php">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" step="0.01" required>

        <button type="submit">Add Expense</button>
    </form>
    <a href="index.php">Return to Expenses List</a>
</body>
</html>
