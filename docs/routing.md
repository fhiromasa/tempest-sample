# View Routing

| path                | method | description            |
| ------------------- | ------ | ---------------------- |
| /                   | GET    | Start Page             |
| ** Authorization ** |        |                        |
| /register           | GET    | show registration form |
| /login              | GET    | show login form        |
| ** Mypage **        |        |                        |
| /mypage             | GET    | show user mypage       |
| ** User Restful **  |        |                        |
| /users              | GET    | retrieve all users     |
| /users/create       | GET    | user create form       |
| /users/{id}         | GET    | show specific user     |
| /users/{id}/edit    | GET    | user edit form         |

# API Routing

| path                     | method | description          |
| ------------------------ | ------ | -------------------- |
| ** User Stateless API ** |        |                      |
| /api/users               | POST   | create new user      |
| /api/users               | GET    | retrieve all users   |
| /api/users/{id}          | GET    | get specific user    |
| /api/users/{id}          | PUT    | update specific user |
| /api/users/{id}          | DELETE | delete specific user |
