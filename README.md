# 📚 Manage Library Books – CodeIgniter 4 Project

This is a simple web application built with **CodeIgniter 4** and **MySQL** that allows librarians to manage library books. The app supports full CRUD (Create, Read, Update, Delete) functionality along with optional book cover image uploads.

---

## 🚀 Features

- 📖 Add new book records (title, author, genre, publication year, image)
- 🧾 View a table of all books
- ✏️ Edit existing book records with form validation
- 🗑️ Delete book records (with confirmation)
- 🖼️ Optional book cover image upload
- 🧼 Placeholder image shown if no upload provided
- ✅ Server-side form validation

---

## 🛠️ Setup Instructions

### 📦 Requirements

- PHP 8.1 or later
- Composer
- MySQL or Docker
- Git

### 🔧 Installation Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/shereensttr03/Manage-Library-Books.git
   cd Manage-Library-Books
Install dependencies
composer install
Copy and configure environment file
cp env .env
Update .env with your database info:

CI_ENVIRONMENT = development

database.default.hostname = 127.0.0.1

database.default.database = library_db

database.default.username = root

database.default.password = secret

database.default.DBDriver = MySQLi

Create the database and table
You can either do this manually or inside a Docker container:

CREATE DATABASE library_db;

USE library_db;

CREATE TABLE books (
    id ,
    title,
    author,
    genre,
    year,
    image,
);

Start the development server
php spark serve
Open your browser
http://localhost:8080/books

🐳 Docker Users

Run a MySQL container like this:

docker run --name mysql-container -e MYSQL_ROOT_PASSWORD=secret -e MYSQL_DATABASE=library_db -p 3306:3306 -d mysql:8.0
Use 127.0.0.1 as your hostname in .env.

💡 Design & Development Notes

Framework: CodeIgniter 4 was chosen for its simplicity and MVC structure.

Image Uploads: Images are optional. If not uploaded, a default placeholder is shown.

Validation: Title, author, and year are required; validation errors are shown on form submission.

🙋‍♀️ Author
Shereen Sattar
