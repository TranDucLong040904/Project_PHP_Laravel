<div align="right">
  <a href="README.md"><img src="https://img.shields.io/badge/English-blue?style=flat-square&logo=github&logoColor=white&labelColor=000080" alt="English"></a>
  <a href="README.vi.md"><img src="https://img.shields.io/badge/Tiếng_Việt-red?style=flat-square&color=C90000" alt="Tiếng Việt"></a>
</div>

# 🎬 WebCinema - Online Movie Ticket Booking System

![Banner](https://github.com/user-attachments/assets/7ce9b688-8e8f-4ab2-8407-891e6f8b16ac)

<div align="center">

![Repo Size](https://img.shields.io/github/repo-size/TranDucLong040904/Project_PHP_Laravel?style=flat-square&label=Size&color=orange)
![Last Commit](https://img.shields.io/github/last-commit/TranDucLong040904/Project_PHP_Laravel?style=flat-square&label=Last%20Commit&color=blue)
![Commit Activity](https://img.shields.io/github/commit-activity/y/TranDucLong040904/Project_PHP_Laravel?style=flat-square&label=Commits/Year&color=red)
![Stars](https://img.shields.io/github/stars/TranDucLong040904/Project_PHP_Laravel?style=flat-square&color=yellow)
[![Ask Me Anything !](https://img.shields.io/badge/Ask%20me-anything-1abc9c.svg?style=flat-square)](https://github.com/TranDucLong040904)

</div>

---

## 📖 Introduction

**WebCinema** is a personal online movie ticket booking platform built to modernize the cinema operation process. The project simulates the real-world workflow from searching for movies and trailers, selecting showtimes, choosing seats in **real-time**, and completing payments.

---

## 📑 Table of Contents

- [Introduction](#-introduction)
- [About the Author](#-about-the-author)
- [Technology Stack](#-technology-stack)
- [Key Features](#-key-features)
- [Installation & Setup](#-installation--setup)
- [Folder Structure](#-folder-structure)
- [System Architecture](#-system-architecture)
- [Demo Screenshots](#-demo-screenshots)
- [License](#-license-bản-quyền)
- [References](#-references)

---

## 👨‍💻 About the Author

The project is developed and maintained by:

| Avatar | Information | Contact |
| :---: | :--- | :--- |
| <img src="public\images\github_circle.png" width="80" height="80" style="border-radius:50%; object-fit:cover;"/> | **Tran Duc Long** | [![GitHub](https://img.shields.io/badge/GitHub-100000?style=flat-square&logo=github&logoColor=white)](https://github.com/TranDucLong040904)<br>[![Email](https://img.shields.io/badge/Email-D14836?style=flat-square&logo=gmail&logoColor=white)](mailto:22010139@st.phenikaa-uni.edu.vn) |

---

## 🛠️ Technology Stack

The project is built using the **MVC architecture** and modern technologies:

| Component | Technology |
| :--- | :--- |
| **Backend** | ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white) ![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white) |
| **Frontend** | ![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white) ![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white) ![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=flat-square&logo=bootstrap&logoColor=white) |
| **Database** | ![MySQL](https://img.shields.io/badge/MySQL-005C84?style=flat-square&logo=mysql&logoColor=white) |
| **Tools** | ![Composer](https://img.shields.io/badge/Composer-885630?style=flat-square&logo=composer&logoColor=white) ![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=flat-square&logo=xampp&logoColor=white) ![Git](https://img.shields.io/badge/Git-F05032?style=flat-square&logo=git&logoColor=white) |

---

## 🚀 Key Features

### 🔐 For Admin (System Administrator)
* ✅ **Movie Management:** Add, edit, delete, activate/hide movies.
* ✅ **Schedule Management:** Arrange showtimes and cinema rooms logically.
* ✅ **Resource Management:** Manage rooms, seat types (VIP/Standard), and pricing.
* ✅ **Service Management:** Manage beverage combos and drinks.
* ✅ **System Control:** Manage payment methods and user accounts.
* 📊 **Statistics:** View insightful revenue reports.

### 👤 For User (Customer)
* ✅ **Account:** Registration, Login, Security, Password change.
* ✅ **Information Search:** Find movies, view trailers, content, and showtimes.
* ✅ **Booking:** Intuitive seat selection (seat map), combo selection.
* ✅ **Payment:** Demo integration for online payment.
* ✅ **History:** Review past ticket orders.

---

## ⚙️ Installation & Setup

System requirements: `PHP >= 8.x`, `MySQL`, `Composer`.

```bash
# 1. Clone repository
git clone https://github.com/TranDucLong040904/Project_PHP_Laravel.git

# 2. Navigate to project directory
cd Project_PHP_Laravel

# 3. Install dependencies
composer install

# 4. Configure environment
cp .env.example .env
# (Note: Open .env file and update DB_DATABASE, DB_USERNAME, DB_PASSWORD)

# 5. Generate key & Run migrations
php artisan key:generate
php artisan migrate

# 6. Start the server
php artisan serve
```
---
## 📂 Folder Structure
An overview of the project's source code structure:
```Plaintext

WebCinema/
├── app/
│   ├── Http/Controllers/   # Handles logic (Admin, User, Auth)
│   ├── Models/             # Database interaction models (Movie, Ticket, Seat...)
│   └── ...
├── database/
│   ├── migrations/         # Schema setup
│   └── seeders/            # Sample data
├── public/
│   ├── images/             # Posters, banners
│   └── css/                # Custom Styles
├── resources/
│   └── views/              # Interface (Blade templates)
│       ├── admin/          # Admin interface
│       └── user/           # Customer interface
├── routes/
    └── web.php             # Web routing
```
---
## 📐 System Architecture

<details>
<summary><b>1. Overall Block Diagram (Click to view)</b></summary>
<br>

![image](https://github.com/user-attachments/assets/df8747f2-d454-473b-afcd-35e4fa816f7c)
</details>

<details>
<summary><b>2. Functional Breakdown - Use Case (Click to view)</b></summary>
<br>

**Admin:**  
![image](https://github.com/user-attachments/assets/44d19e96-6cd5-4c89-935c-c9282106288c)

**User (Member):**
![image](https://github.com/user-attachments/assets/152fe61a-502c-4cd4-bd5a-cefc9662386f)

**Guest (Visitor):**
![image](https://github.com/user-attachments/assets/d89621d8-3359-4229-8f2a-3b63ba3df540)
</details>

<details>
<summary><b>3. Algorithm Flowcharts (Click to view)</b></summary>
<br>

| Registration | Login |
| :---: | :---: |
| ![image](https://github.com/user-attachments/assets/2afdad27-95c8-4830-b378-a0c8882c5df0) | ![image](https://github.com/user-attachments/assets/382f3fbb-4ac1-4d16-aa10-566cc0b791fc) |

</details>



---

## 🖼️ Demo Screenshots

<details>
<summary>🔐 <b>Admin Interface (Management) - Click to view</b></summary>

<br>

**1. Admin Login**
![image](https://github.com/user-attachments/assets/6f7322ae-85f8-4e69-8545-6e2e8b879887)

**2. Movie & Genre Management**
![image](https://github.com/user-attachments/assets/bd8eba6e-e689-487e-82d8-63918c1a8c09)
![image](https://github.com/user-attachments/assets/6608ddc4-eb84-4253-b12a-850113f4bbec)

**3. Schedule & Room Management**
![image](https://github.com/user-attachments/assets/9101ace5-663e-429f-84b1-e0ba861523ad)
![image](https://github.com/user-attachments/assets/96a1f827-d669-4b7f-a8e3-734b1f1de0cd)

**4. Service & Resource Management**
(Drinks, Seats, Payment Methods, User Accounts)
![image](https://github.com/user-attachments/assets/72f47f88-3516-41f4-8b33-8647c5cf4510)
![image](https://github.com/user-attachments/assets/fbca5a14-25eb-40a8-bcf4-0e2dc2ab12a8)
![image](https://github.com/user-attachments/assets/b2b47b9c-7fa8-493f-8e31-4808e8ba2d16)
![image](https://github.com/user-attachments/assets/5c049302-eac9-4724-8660-51a72c44e880)

**5. Invoice Statistics**
<img width="1899" height="500" alt="image" src="https://github.com/user-attachments/assets/729c217b-9c6b-4cfb-959e-7f633363232a" />
<img width="1879" height="476" alt="image" src="https://github.com/user-attachments/assets/4e639ed0-5756-4565-81e8-0045a8a4af73" />
<img width="1871" height="454" alt="image" src="https://github.com/user-attachments/assets/cbdfbc3f-d395-48f4-add4-2b38a46f2518" />
<img width="1880" height="638" alt="image" src="https://github.com/user-attachments/assets/33202970-3733-4b00-9f5d-02ba8f5ebac4" />

</details>

<details>
<summary>👤 <b>User Client Interface - Click to view</b></summary>

<br>

**1. Homepage & Login**
![image](https://github.com/user-attachments/assets/7ce9b688-8e8f-4ab2-8407-891e6f8b16ac)
![image](https://github.com/user-attachments/assets/b2698862-d83c-4686-a04f-7dbbdf946b4b)

**2. Showtimes & Pricing**
![image](https://github.com/user-attachments/assets/2a9146ed-b8c7-4348-a42c-b6748e568272)
![image](https://github.com/user-attachments/assets/50d3ae01-625e-495a-9659-a487ce70b2f8)

**3. Promotions & News**
![image](https://github.com/user-attachments/assets/312878d5-9e9f-43ca-a2bb-12f17b19957f)

**4. Booking Process & Seat Selection**
![image](https://github.com/user-attachments/assets/ed2593e1-e8d2-4ce0-aa58-9d6e946fff96)
![image](https://github.com/user-attachments/assets/6d8fdfbb-2e0c-4fc8-a140-a06da04f5725)

**5. Password Change**
![image](https://github.com/user-attachments/assets/931bf0fd-c22d-43ef-ab3e-f09900f0cabf)

</details>

---

## 📜 License (Copyright)

This is a personal project shared strictly for **educational and reference purposes**.

* ✅ **Allowed:** Viewing source code, cloning for study, research, or development of new features for personal use.
* ❌ **Not Allowed:** Using this source code for commercial purposes, resale, or profit without the author's permission.

The project currently does not have a formal LICENSE file. All intellectual property rights belong to the author.

---

## ☎️ Contact

* **GitHub Profile:** [TranDucLong040904](https://github.com/TranDucLong040904)
* **GitHub Project:** [Project_PHP_Laravel](https://github.com/TranDucLong040904/Project_PHP_Laravel_Test.git)
* **Demo Video:** [YouTube Channel](https://www.youtube.com/@leo.tran.04)

---
<div align="center">
  
  **⭐ If this project is helpful, please leave a Star! ⭐**
  
  Copyright © 2025 Tran Duc Long
</div>
