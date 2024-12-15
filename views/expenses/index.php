<?php
session_start();
require_once '../../models/Expense.php';
require_once '../../models/User.php';

$user = new User();
if (!$user->checkLogin()) {
    header('Location: /expense_tracker/views/users/login.php');
    exit();
}

$expenses = (new Expense())->getAll($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Expense List</title>
</head>
<body>
    <h1>Expense List</h1>
    <a href="/expense_tracker/views/expenses/add.php">Add New Expense</a> |
    <a href="/expense_tracker/views/users/logout.php">Logout</a>
    <?php if (!empty($expenses) && is_array($expenses)): ?>
        <ul>
            <?php foreach ($expenses as $expense): ?>
                <li>
                    <?php echo htmlspecialchars($expense['title']); ?> - 
                    <?php echo htmlspecialchars($expense['amount']); ?> - 
                    <?php echo htmlspecialchars($expense['created_at']); ?>
                    <a href="/expense_tracker/views/expenses/edit.php?id=<?php echo $expense['id']; ?>">Edit</a> |
                    <a href="/expense_tracker/views/expenses/delete.php?id=<?php echo $expense['id']; ?>">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No expenses found.</p>
    <?php endif; ?>
</body>
</html>
