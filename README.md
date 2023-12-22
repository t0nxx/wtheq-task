# Wtheq Task

### Watch setup instructions sideo
[Setup-Video](https://youtu.be/_RqOXoOnAvY)

## Prerequisites & Environment

- PHP 8.1 .
- Composer version  >= 2.5 .
- Laravel 10
- Mysql Database

### How To install


- Clone the project.

```bash
$ git clone https://github.com/t0nxx/wtheq-task.git
```

- Navigate to project folder then install dependencies

```bash
$ composer install
```

- Open your mysql db manger and create a database as any name you want 

- Edit .env file with any editor and change your database connection info 

```bash
DB_CONNECTION=mysql
DB_HOST=your_host
DB_PORT=your_port
DB_DATABASE=your_db_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

- Run migrations
```bash
$ php artisan migrate
```
- If you want to user pre maded data , just use the seeders

```bash
$ php artisan db:seed
```
- If you seed the data , you will have 3 users account with 3 differnt types
  - email : normal_user@mail.com   &  password : 123456
 
  - email : silver_user@mail.com   &  password : 123456

  - email : gold_user@mail.com   &  password : 123456

- Run the project 

```bash
$ php artisan serve
```
## Note ##
You don't need to use any API platform aka postman/insomnia to try the apis
as the project has self api documented definition 🤖
### just run the project and naviagte to 
http://localhost:8000/docs/api
