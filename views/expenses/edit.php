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

    if (!$expense) {
        echo "Expense not found or you do not have permission to edit this expense.";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = htmlspecialchars($_POST['title']);
        $amount = floatval($_POST['amount']);
        
 
        $expenseModel->update($id, $_SESSION['user_id'], $title, $amount);

        header('Location: index.php');
        exit();
    }
} else {
    echo "Invalid expense ID.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Expense</title>
</head>
<body>
    <h1>Edit Expense</h1>
    <form method="POST" action="edit.php?id=<?php echo $expense['id']; ?>">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($expense['title']); ?>" required>

        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" step="0.01" value="<?php echo htmlspecialchars($expense['amount']); ?>" required>

        <button type="submit">Update Expense</button>
    </form>
    <a href="index.php">Return to Expenses List</a>
</body>
</html>
