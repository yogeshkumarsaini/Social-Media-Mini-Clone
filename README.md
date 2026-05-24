# 📱 Social Media Mini Clone

A modern Social Media Mini Clone built using **PHP**, **MySQL**, and **Bootstrap 5**.

This project includes:
- User Authentication
- Create Posts
- Upload Images
- Like System
- Comment System
- Friend Request System
- User Profiles
- Modern Responsive UI

---

# 🚀 Features

## 🔐 Authentication
- User Registration
- User Login
- Logout System
- Session Handling

## 📝 Posts
- Create Text Posts
- Upload Post Images
- Delete Own Posts
- View All Posts

## ❤️ Likes
- Like Posts
- Like Counter

## 💬 Comments
- Add Comments
- View Comments

## 👥 Friend System
- Send Friend Request
- Accept Friend Request
- Remove Friends

## 👤 User Profile
- Profile Page
- Profile Image
- User Information

## 🎨 UI
- Modern Bootstrap 5 Design
- Responsive Layout
- Clean Dashboard

---

# 🛠️ Technologies Used

- PHP
- MySQL
- Bootstrap 5
- HTML5
- CSS3
- JavaScript

---

# 📁 Project Structure

```bash
social-media-clone/
│
├── assets/
│   └── css/
│       └── style.css
│
├── config/
│   └── db.php
│
├── auth/
│   ├── login.php
│   ├── register.php
│   └── logout.php
│
├── posts/
│   ├── create_post.php
│   ├── like_post.php
│   ├── comment_post.php
│   └── delete_post.php
│
├── friends/
│   ├── send_request.php
│   ├── accept_request.php
│   └── remove_friend.php
│
├── uploads/
│
├── dashboard.php
├── profile.php
├── index.php
└── database.sql
```

---

# ⚙️ Installation Guide

## 1️⃣ Clone Project

```bash
git clone https://github.com/yogeshkumarsaini/social-media-clone.git
```

---

## 2️⃣ Move Project

Move project folder into:

```bash
htdocs/
```

If using XAMPP:

```bash
C:/xampp/htdocs/
```

---

## 3️⃣ Create Database

Open:

```bash
http://localhost/phpmyadmin
```

Create database:

```sql
social_media_clone
```

Import:

```bash
database.sql
```

---

## 4️⃣ Configure Database

Open:

```bash
config/db.php
```

Update database credentials:

```php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "social_media_clone"
);
```

---

## 5️⃣ Run Project

Open browser:

```bash
http://localhost/social-media-clone
```

---

# 🗄️ Database Tables

- users
- posts
- likes
- comments
- friend_requests
