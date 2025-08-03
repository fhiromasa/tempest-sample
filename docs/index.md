# Tempest Sample Application

# URL design

| path                | method | description            |
| ------------------- | ------ | ---------------------- |
| /                   | GET    | Start Page             |
| /dummy-path         | GET    |                        |
| ** Authorization ** |        |                        |
| /login              | GET    | show login form        |
| /login              | POST   | login user             |
| /register           | GET    | show registration form |
| /register           | POST   | register new user      |
| ** User Restful **  |        |                        |
| /users              | GET    | retrieve all users     |
| /users/create       | GET    | user create form       |
| /users              | POST   | create new user        |
| /users/{id}         | GET    | show specific user     |
| /users/{id}/edit    | GET    | user edit form         |
| /users/{id}         | PUT    | update specific user   |
| /users/{id}         | DELETE | delete specific user   |

# Form Validation

| name       | type   | length-min | length-max | number-min | number-max | comment |
| ---------- | ------ | ---------- | ---------- | ---------- | ---------- | ------- |
| first_name | text   | 2          | 100        | -          | -          |         |
| last_name  | text   | 2          | 100        | -          | -          |         |
| email      | text   | 3          | 100        | -          | -          | ISO     |
| id         | number | 1          | -          | 0          | -          |         |
| password   | text   | 8          | 30         | -          | -          |         |
