CREATE DATABASE FinanceDB;
USE FinanceDB;

-- Users table for login
CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

-- Table for recording income
CREATE TABLE Income (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    date DATE NOT NULL,
    invoice VARCHAR(255) NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

-- Table for recording expenses
CREATE TABLE Expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    date DATE NOT NULL,
    invoice VARCHAR(255) NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

-- inserts

INSERT INTO Users (username, password, email) VALUES 
('user1', 'password1', 'user1@example.com'),
('user2', 'password2', 'user2@example.com');

INSERT INTO Income (type, amount, date, invoice, user_id) VALUES 
('Salary', 2000.00, '2024-05-16', '/path/to/invoice1.jpg', 1),
('Freelance', 500.00, '2024-05-17', '/path/to/invoice2.jpg', 2);

INSERT INTO Expenses (type, amount, date, invoice, user_id) VALUES 
('Groceries', 150.00, '2024-05-16', '/path/to/invoice3.jpg', 1),
('Rent', 800.00, '2024-05-17', '/path/to/invoice4.jpg', 2);


-- Selects
SELECT * FROM Users;
SELECT * FROM Income;
SELECT * FROM Expenses;


-- Procedure to Show Balance
DELIMITER $$

CREATE PROCEDURE ShowBalance(IN userId INT)
BEGIN
    WITH IncomeDetails AS (
        SELECT 
            'Income' AS EntryType,
            type AS Description,
            amount AS Amount,
            date AS EntryDate
        FROM Income 
        WHERE user_id = userId
    ),
    ExpenseDetails AS (
        SELECT 
            'Expense' AS EntryType,
            type AS Description,
            amount AS Amount,
            date AS EntryDate
        FROM Expenses 
        WHERE user_id = userId
    ),
    TotalIncome AS (
        SELECT 
            'Total Income' AS Description,
            IFNULL(SUM(amount), 0) AS Amount
        FROM Income 
        WHERE user_id = userId
    ),
    TotalExpenses AS (
        SELECT 
            'Total Expenses' AS Description,
            IFNULL(SUM(amount), 0) AS Amount
        FROM Expenses 
        WHERE user_id = userId
    ),
    MonthlyBalance AS (
        SELECT 
            'Monthly Balance' AS Description,
            (SELECT IFNULL(SUM(amount), 0) FROM Income WHERE user_id = userId) 
            - 
            (SELECT IFNULL(SUM(amount), 0) FROM Expenses WHERE user_id = userId) 
            AS Amount
    )
    SELECT * FROM IncomeDetails
    UNION ALL
    SELECT * FROM ExpenseDetails
    UNION ALL
    SELECT NULL AS EntryType, Description, Amount, NULL AS EntryDate FROM TotalIncome
    UNION ALL
    SELECT NULL AS EntryType, Description, Amount, NULL AS EntryDate FROM TotalExpenses
    UNION ALL
    SELECT NULL AS EntryType, Description, Amount, NULL AS EntryDate FROM MonthlyBalance;
END$$

DELIMITER ;

-- Test Querie
CALL ShowBalance(1);
