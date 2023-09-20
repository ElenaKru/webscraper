
## How To Use

To clone and run this application, you'll need [Git](https://git-scm.com) and [Node.js](https://nodejs.org/en/download/) (which comes with [npm](http://npmjs.com)), [Laravel](https://laravel.com/) and [MongoDB](https://www.mongodb.com/) installed on your computer. Make sure that your php.ini includes mongodb extension.
<br>

<h2>Installation</h2>
<br>
From your command line:

```bash

# Go into the backend directory
$ cd backend

# Install backend dependencies
$ composer install

# Go into the frontend directory (run command from a new terminal)
$ cd frontend

# Install frontend dependencies
$ npm install

# Run the backend server (runs on laravel default localhost:8000)
$ php artisan serve

# Run the frontend server (runs on angular default localhost:4200)
$ ng serve
```

<h2>Seeding and Migration</h2>

Database connection settings can be edited directly inside backend\config\database.php. However, the more secure and highly recommended approach is to edit the DB connection details as .env constants.

```bash
# Migrate the web_pages_table collection to the database
$ php artisan migrate
```