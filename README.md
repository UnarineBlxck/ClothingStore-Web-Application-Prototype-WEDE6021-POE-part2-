# 🛍️ ClothingStore Web Application Prototype (WEDE6021 POE)

## 📌 Project Overview
This project is a fully functional web application prototype for a Clothing Store system developed using **PHP, MySQL, HTML, and CSS**. It demonstrates user management, authentication, and administrative control features as required in the WEDE6021 Portfolio of Evidence (POE).

The system allows users to register, log in, and be verified by an administrator before gaining full access. It also includes database creation, file-based data loading, and full CRUD functionality for user management.

---

## 👨‍💻 Developer Information
- Student Name: *[Your Name Here]*
- Student Number: *[Your Student Number]*
- Module: WEDE6021
- Institution: *[Your Institution]*

---

## 🧩 Features Implemented

### 👤 User Features
- User registration system
- Secure login system (MD5 hashed passwords)
- Sticky form validation (form retains user input on errors)
- Display of logged-in user details using associative arrays
- Restriction: Only verified users can log in

### 🛠️ Admin Features
- Admin login system
- View pending user registrations
- Verify users before activation
- Delete users from system

### 🗄️ Database Features
- MySQL database: `una_store`
- Tables:
  - `tblUser`
  - `tblAdmin`
- Automatic table creation using `createTable.php`
- Data loaded from `userData.txt`
- Drop-and-recreate table functionality for testing purposes

### 📂 File Handling
- Reads user data from `userData.txt`
- Inserts data into MySQL using PHP file handling

### 🎨 Frontend Features
- Responsive form layouts
- Navigation bar for easy page switching
- External CSS styling using `styles.css`
- Clean and simple UI for usability

---

## ⚙️ How to Run the Project

### 1. Setup Requirements
- Install XAMPP or WAMP
- Start Apache and MySQL
- Place project folder in `htdocs`

### 2. Database Setup
1. Open browser
2. Run:

http://localhost/ClothingStore/createTable.php

3. This will:
- Create database tables
- Load sample users from `userData.txt`

### 3. Run Application
Open:

http://localhost/ClothingStore/index.php


---

## 🔐 Login Information (Sample Data)
If using provided text file data:

- Users are loaded from `userData.txt`
- Admin login credentials stored in `tblAdmin`

---

## 📁 Project Structure

ClothingStore/
│
├── index.php
├── login.php
├── register.php
├── adminLogin.php
├── adminDashboard.php
├── createTable.php
├── DBConn.php
├── styles.css
├── userData.txt
├── myClothingStore.sql


---

## 🎥 Demonstration Video
👉 YouTube Video Link:  
https://www.youtube.com/watch?v=YOUR_VIDEO_LINK_HERE

---

## 🧪 Testing Notes
- Ensure MySQL is running before accessing pages
- Always run `createTable.php` first before testing login
- Ensure all files are inside the same root directory

---

## 📌 Important Notes
- This system is designed as a prototype for educational purposes
- Passwords are hashed using MD5 (as per assignment requirement)
- Admin verification is required before user login access

---

## ✅ Conclusion
This project demonstrates a complete web application prototype including authentication, database handling, file processing, and administrative control as required for the WEDE6021 POE submission.
