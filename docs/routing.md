# Routing

| path                | method | description                    |
| ------------------- | ------ | ------------------------------ |
| /                   | GET    | Start Page                     |
| ** Authorization ** |        |                                |
| /register           | GET    | show registration form         |
| /register           | POST   | register new user              |
| /login              | GET    | show login form                |
| /login              | POST   | login user and redirect mypage |
| ** Mypage **        |        |                                |
| /mypage             | GET    | show user mypage               |
| ** User Restful **  |        |                                |
| /users              | GET    | retrieve all users             |
| /users/create       | GET    | user create form               |
| /users              | POST   | create new user                |
| /users/{id}         | GET    | show specific user             |
| /users/{id}/edit    | GET    | user edit form                 |
| /users/{id}         | PUT    | update specific user           |
| /users/{id}         | DELETE | delete specific user           |

# API Routing

| path        | method | description   |
| ----------- | ------ | ------------- |
| /api/paths  | GET    | all api paths |
