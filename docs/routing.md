# Routing

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
