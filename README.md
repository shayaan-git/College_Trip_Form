# BBDEC College Trip Form 🛫

This project is a basic travel form application where users can submit their details to register for a college trip. The form collects user information and stores it in a MySQL database. Learning project.

## Tech Stack

- PHP
- MySQL (MySQLi)
- HTML5
- CSS3
- JavaScript

## Features

- Form validation (client-side and server-side)
- Prepared statements for SQL injection protection
- Input sanitization
- Success/error message display
- Auto-redirect after submission

## Setup

### Prerequisites
- XAMPP or similar (PHP + MySQL)
- Web browser

### Installation

1. Clone the repository
   ```bash
   git clone https://github.com/shayaan-git/College_Trip_Form.git
   ```

2. Move to XAMPP htdocs
   ```
   C:\xampp\htdocs\
   ```

3. Create database and table in phpMyAdmin
   ```sql
   CREATE DATABASE trip;
   
   USE trip;
   
   CREATE TABLE trip (
     sno INT(11) NOT NULL AUTO_INCREMENT,
     name VARCHAR(50) NOT NULL,
     age INT(3) NOT NULL,
     gender VARCHAR(10) NOT NULL,
     email VARCHAR(50) NOT NULL,
     phone VARCHAR(15) NOT NULL,
     other TEXT NOT NULL,
     date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (sno)
   );
   ```

4. Start Apache and MySQL in XAMPP

5. Access the project
   ```
   http://localhost/index.php
   ```

6. ### Database Configuration

1. Copy `config.example.php` to `config.php`
2. Update database credentials in `config.php`:

## Project Structure

```
/
├── index.php       # Main file (PHP + HTML)
├── style.css       # Styles
├── script.js       # Client-side logic
├── univ.jpg        # Background image
├── config.example.php      # Database Credentials
└── README.md       # Documentation
```

## Security Features

- Prepared statements (prevents SQL injection)
- Input validation and sanitization
- `mysqli_real_escape_string()` for extra protection
- Email format validation
- Age range validation
- Required field checks

## Known Limitations

This is a learning project. Not production-ready:
- No CSRF protection
- No rate limiting
- Database credentials in code
- Basic error handling

## 🎓 Learning Outcomes

This project helped me learn:
- PHP basics and syntax
- MySQLi database connectivity
- Form handling with PHP POST method
- Basic CRUD operations (Create/Insert)
- Integration of frontend and backend
- SQL injection vulnerabilities (needs improvement)

## License

Open source for educational purposes.

Created as a learning project while following web development tutorials.

**⭐ If you found this helpful, consider giving it a star!**
