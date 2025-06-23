# Student Record System 📚

A simple web application built using **PHP** and **MySQL**.

## 🚀 Features
- Add new student records
- View all student entries in a table
- Delete individual records

## 💡 What I Learned
- PHP-MySQL connectivity
- HTML forms & CRUD operations
- Debugging common server/database errors

## 🧠 Challenges I Faced
- PHP connection errors (solved by using correct password)
- phpMyAdmin access issue (fixed by setting password in config)

## 🧪 How to Run
1. Copy this folder to `htdocs` in XAMPP
2. Create a database named `school_db`
3. Run this SQL in phpMyAdmin:

```sql
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    age INT,
    course VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
