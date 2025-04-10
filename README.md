# 🌍 Microplastics Ecosystem Database (XAMPP + MySQL)

This project provides a **local web-based database** for exploring categorized microplastics data across different ecosystems: **marine, freshwater, terrestrial, and airborne**. It was developed using PHP, MySQL, and JavaScript, and is designed for environmental research and visualization.

---

## 📁 Files Included

- `index.php` — Main landing page interface  
- `airborne.php`, `marine.php`, `freshwater.php`, `terrestial.php` — Ecosystem-wise pages  
- `db_connect.php` — MySQL connection script  
- `fetch_data.php` — Backend data handler  
- `styles.css` — Frontend styling  
- `script.js` — Filter and search logic  
- `background.jpg` — UI background  
- `README.md` — Project documentation  

---

## 🌐 How to Run the Web Database Locally

### 1. Install & Start XAMPP
- Download from: https://www.apachefriends.org  
- Launch **Apache** and **MySQL** from the control panel

### 2. Create Database
- Go to: http://localhost/phpmyadmin  
- Create a database: `microplastics_db`  
- Import CSV or SQL into table: `microplastics_backup`

### 3. Place Files into XAMPP
Copy all files into:
### 4. Visit Your Interface
- In your browser:  
  http://localhost/microplastics_db/index.php
  
---

## 🖼️ UI Features

- Dropdown filter by ecosystem  
- Keyword-based search  
- Clean layout with styled visuals  
- Fast, dynamic content loading using AJAX

---

## 🔐 Notes

- Sensitive credentials in `db_connect.php` can be excluded from public repos using a `.gitignore` file
- This repository does **not store personal or login data**

---

## 👩‍💻 Author

- **GitHub:** [Dharani0608](https://github.com/Dharani0608)
