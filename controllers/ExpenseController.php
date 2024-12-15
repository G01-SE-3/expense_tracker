<?php
class ExpenseController extends Controller {
    public function index() {
        $model = $this->loadModel('Expense');
        $expenses = $model->getAll();
        $this->loadView('expenses/index', ['expenses' => $expenses]);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
        
            $model = $this->loadModel('Expense');
        
            $title = htmlspecialchars($_POST['title']);
            $amount = floatval($_POST['amount']);
            
            $model->add($title, $amount);
            
            header('Location: /expense_tracker/');
            exit();
        } else {
           
            $this->loadView('expenses/add');
        }
    }

    public function delete($id) {
        $model = $this->loadModel('Expense');
        $model->delete($id);
        header('Location: /expense_tracker/');
    }
}
?>
