# MediNova web Application - Laravel

![Laravel](https://img.shields.io/badge/Laravel-9.x-red?style=flat-square)
![PHP](https://img.shields.io/badge/PHP-8.1-blue?style=flat-square)

## 📌 Features

- User-friendly appointment booking
- Specialization-based doctor selection
- Secure authentication and authorization
- Database migration and seeding
- Well-structured and documented code

## 🚀 Installation Guide

### Step 1: Clone the Repository
```bash
 git clone https://github.com/yourusername/your-repo.git
 cd your-repo
```

### Step 2: Install Dependencies
```bash
composer install
```

### Step 3: Configure Environment Variables
```bash
cp .env.example .env
```
Update `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=medinova
DB_USERNAME=root
DB_PASSWORD=
```

### Step 4: Generate Application Key
```bash
php artisan key:generate
```

### Step 5: Run Migrations and Seed Database
```bash
php artisan migrate --seed
```

### Step 6: Start the Application
```bash
php artisan serve
```
Visit `http://127.0.0.1:8000` in your browser.
 
