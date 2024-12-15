
# Expense Tracker App

![Expense Tracker](https://img.shields.io/badge/Version-1.0-green)  
A simple PHP-based **Expense Tracker** app that allows users to manage their daily expenses securely. Built with the **Model-View-Controller (MVC)** architecture.

## 📌 Features
- **User Authentication**: Secure login and registration.
- **Expense Management**: Add, edit, and delete expenses (including title, amount, and date).
- **Privacy**: Each user can only access their own expenses.

## 🛠️ Technologies Used
- **PHP**: Server-side scripting language used for logic implementation.
- **MySQL**: Database to store user and expense information.
- **MVC Architecture**: The app is structured using the **Model-View-Controller** pattern, ensuring separation of concerns.
  - **Model**: Contains all the logic related to data management (e.g., database queries).
  - **View**: Handles presentation and user interface.
  - **Controller**: Processes input from users, updates the model, and loads the view.

## ⚙️ Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/yourusername/expense-tracker.git
```

### 2. Set up the Database
Create a database named `expense_tracker` and import the schema from `database.sql`. Alternatively, create the tables manually using the SQL provided below:

```sql
CREATE DATABASE expense_tracker;

USE expense_tracker;

CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);
```

### 3. Configure Database Connection
In `config/db.php`, update the database connection settings with your credentials:

```php
return new PDO('mysql:host=localhost;dbname=expense_tracker', 'yourusername', 'yourpassword', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
```

### 4. Running the App
Ensure you have a local PHP environment (like XAMPP, WAMP, or MAMP) running. Place your project directory in the web server’s root folder (e.g., `htdocs` for XAMPP). Open your browser and navigate to `http://localhost/expense-tracker/views/index.php`.

## 🔍 Directory Structure

```
/expense_tracker
│
├── /controllers          # Handles user requests and connects the Model and View
│   ├── ExpenseController.php
│   └── UserController.php
│
├── /models               # Handles data logic and database queries
│   ├── Expense.php
│   └── User.php
│
├── /views                # Contains all user-facing pages
│   ├── /expenses
│   │   ├── index.php
│   │   ├── add.php
│   │   └── edit.php
│   └── /users
│       ├── login.php
│       └── register.php
│
├── /config               # Contains configuration files (e.g., database connection)
│   └── db.php
│
└── /public               # Publicly accessible files (entry point, assets)
    ├── index.php
    └── .htaccess         # URL rewriting for better SEO
```

## 🚀 How to Use

### 1. Sign Up
- Navigate to the **Register** page and provide a username and password to create your account.

### 2. Login
- After registering, log in using your credentials to access your personal expense tracker.

### 3. Manage Expenses
- **Add Expense**: Log your new expenses by providing the title and amount.
- **Edit Expense**: Modify any details of an existing expense.
- **Delete Expense**: Remove any unwanted expense entries.

### 4. Privacy
- Each user can only view and manage their own expenses.

## 💻 Running Locally

1. Clone the repo:
   ```bash
   git clone https://github.com/yourusername/expense-tracker.git
   ```

2. Set up the local server (using XAMPP or similar software).
3. Create the database as mentioned above.
4. Edit `config/database.php` to match your MySQL credentials.
5. Access your app in a browser at `http://localhost/expense-tracker/public/index.php`.


