# Microplastics Database for Environmental Research

This project provides a local web-based interface to explore categorized microplastic data (terrestrial, marine, etc.). Built using XAMPP, MySQL, PHP, and JavaScript, it supports real-time filtering and visualization.

---

## 🌐 How to Run the Web Database Locally

### 1. Install & Start XAMPP
- Download XAMPP: https://www.apachefriends.org
- Launch **Apache** and **MySQL** from the control panel

### 2. Create Database
- Open http://localhost/phpmyadmin
- Create a new database: `microplastics_db`
- Import your CSV or SQL file into the `microplastics_backup` table

### 3. Add the Project to XAMPP
- Copy all frontend files (`index.php`, `style.css`, etc.) into:  
  `C:\xampp\htdocs\microplastics_db`

### 4. Visit Your Interface
- In your browser:  
  http://localhost/microplastics_db/index.php

---

## 🖼️ Sample UI Features

- Ecosystem filter dropdown  
- Real-time keyword search  
- Clean layout with styled background

---

## 📁 Project Structure

- index.php  
- db_connect.php  
- fetch_data.php  
- style.css  
- script.js  
- background.jpg

---

## 🔐 Notes

- Sensitive credentials (like `db_connect.php`) are excluded via `.gitignore`  
- This repository does **not expose login or personal data**
