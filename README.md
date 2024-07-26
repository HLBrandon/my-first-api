# First API in Laravel 10

Basic API developed in [Laravel](https://github.com/laravel/framework "Laravel"). It works with the HTTP verbs **GET**, **POST**, **PUT**, and **DELETE**.

> **Note:** This is a simple project. I recently started with Laravel. I know I am still learning and have a long way to go, but I have decided to upload this project to a repository to keep a record of my progress in this new world of Laravel.

### Migrations

    php artisan migrate

### Seeders

    php artisan db:seed

## POST REQUEST

#### URL API

    http://127.0.0.1:8000/api/student/

#### request body

    {
        "first_name" : "name",
        "last_name" : "last name",
        "email" : "email@example.com",
        "password" : "pass12345",
        "age" : 22,
        "career_id" : 2
    }

> **Note**: In CareerSeeder, only three careers are created. So the values for the key "career_id" must range from 1 to 3

#### Response success

    {
        "status": true,
        "message": "Created with exit",
        "data": {
            "id": 1,
            "first_name": "Bert",
            "last_name": "Bradtke",
            "email": "bert@example.com",
            "age": 38,
            "career": {
                "career_id": 3,
                "career_name": "Ingenieria en Gestión Empresarial"
            }
        }
    }

## GET REQUEST

#### URL API

`http://127.0.0.1:8000/api/student/`

#### Response

<p>List all students</p>

    [
        {
            "id": 1,
            "first_name": "Nichole",
            "last_name": "Dickinson",
            "email": "estefania99@bergnaum.net",
            "age": 25,
            "career": {
                "career_id": 1,
                "career_name": "Ingenieria en Sistemas Computacionales"
            }
        },
        {
            "id": 2,
            "first_name": "Asia",
            "last_name": "Smith",
            "email": "fabian36@krajcik.com",
            "age": 25,
            "career": {
                "career_id": 1,
                "career_name": "Ingenieria en Sistemas Computacionales"
            }
        },
        {
            "id": 3,
            "first_name": "Blake",
            "last_name": "Cummerata",
            "email": "upredovic@dare.com",
            "age": 19,
            "career": {
                "career_id": 3,
                "career_name": "Ingenieria en Gestión Empresarial"
            }
        }
    ]

## GET REQUEST WITH ID

#### URL API

`http://127.0.0.1:8000/api/student/5`

#### Response

	{
        "id": 5,
        "first_name": "Margarete edit",
        "last_name": "Howell edit",
        "email": "roy.dietrich@hotmail.edit",
        "age": 25,
        "career": {
            "career_id": 1,
            "career_name": "Ingenieria en Sistemas Computacionales"
        }
	}

## PUT REQUEST

#### URL API

`http://127.0.0.1:8000/api/student/5`

#### request body

	{
        "first_name" : "name edit",
        "last_name" : "last name edit",
        "email" : "email@example.com",
        "age" : 22,
        "career_id" : 2
	}

> **Note**: With PUT the password is not required

#### Response success

	{
        "status": true,
        "message": "Student Updated successfully"
	}

## DELETE REQUEST WITH ID

#### URL API

`http://127.0.0.1:8000/api/student/5`

#### Response

	{
        "status": true,
        "message": "Student Deleted successfully"
	}

## RELATED

- [CRUD in Java and API Laravel](https://github.com/HLBrandon/crud-java-api-laravel10 "CRUD in Java and API Laravel")