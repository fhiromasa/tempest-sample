# Database Schema

# **users** table

User table for authentication.

## stracture

| Field      | Type     | Lengh |          | Default | Extra          | comment |
| :--------- | :------- | :---- | :------- | :------ | :------------- | :------ |
| id         | int      |       | NOT NULL |         | AUTO_INCREMENT |         |
| username   | VARCHAR  | 255   | NOT NULL |         |                |         |
| email      | VARCHAR  | 255   | NOT NULL |         |                |         |
| password   | VARCHAR  | 255   |          |         |                |         |
| created_at | DATETIME |       | NOT NULL |         |                |         |
| updated_at | DATETIME |       | NOT NULL |         |                |         |

## index

| Name    | ColumnName |     |
| :------ | :--------- | :-- |
| PRIMARY | id         |     |

## relation

# **permissions** table

Permissions teble for user authorization type.

## stracture

| Field | Type    | Lengh |          | Default | Extra          | comment |
| :---- | :------ | :---- | :------- | :------ | :------------- | :------ |
| id    | int     |       | NOT NULL |         | AUTO_INCREMENT |         |
| name  | VARCHAR | 255   | NOT NULL |         |                |         |

## index

| Name    | ColumnName |     |
| :------ | :--------- | :-- |
| PRIMARY | id         |     |

## relation

# **user_permissions** table

## stracture

| Field         | Type | Lengh |          | Default | Extra          | comment |
| :------------ | :--- | :---- | :------- | :------ | :------------- | :------ |
| id            | int  |       | NOT NULL |         | AUTO_INCREMENT |         |
| user_id       | int  |       | NOT NULL |         |                |         |
| permission_id | int  |       | NOT NULL |         |                |         |

## index

| Name                                          | ColumnName    |     |
| :-------------------------------------------- | :------------ | :-- |
| PRIMARY                                       | id            |     |
| fk_users_user_permissions_user_id             | user_id       |     |
| fk_permissions_user_permissions_permission_id | permission_id |     |

## relation

| Name                                          | Columns       | FK Table    | FK Columns | On Update | On Delete |
| :-------------------------------------------- | :------------ | :---------- | :--------- | :-------- | :-------- |
| fk_users_user_permissions_user_id             | user_id       | users       | id         |           | RESTRICT  |
| fk_permissions_user_permissions_permission_id | permission_id | permissions | id         |           | RESTRICT  |

# **posts** table

## stracture

| Field      | Type     | Lengh |          | Default | Extra          | comment |
| :--------- | :------- | :---- | :------- | :------ | :------------- | :------ |
| id         | int      |       | NOT NULL |         | AUTO_INCREMENT |         |
| user_id    | int      |       | NOT NULL |         |                |         |
| title      | VARCHAR  | 255   |          |         |                |         |
| content    | TEXT     |       |          |         |                |         |
| created_at | DATETIME |       | NOT NULL |         |                |         |
| updated_at | DATETIME |       | NOT NULL |         |                |         |

## index

| Name                   | ColumnName |     |
| :--------------------- | :--------- | :-- |
| PRIMARY                | id         |     |
| fk_users_posts_user_id | user_id    |     |

## relation

| Name                   | Columns | FK Table | FK Columns | On Update | On Delete |
| :--------------------- | :------ | :------- | :--------- | :-------- | :-------- |
| fk_users_posts_user_id | user_id | users    | id         |           | RESTRICT  |

# **comments** table

## stracture

| Field      | Type     | Lengh |          | Default | Extra          | comment |
| :--------- | :------- | :---- | :------- | :------ | :------------- | :------ |
| id         | int      |       | NOT NULL |         | AUTO_INCREMENT |         |
| post_id    | int      |       | NOT NULL |         |                |         |
| user_id    | int      |       | NOT NULL |         |                |         |
| content    | TEXT     |       |          |         |                |         |
| created_at | DATETIME |       | NOT NULL |         |                |         |
| updated_at | DATETIME |       | NOT NULL |         |                |         |

## index

| Name                      | ColumnName |     |
| :------------------------ | :--------- | :-- |
| PRIMARY                   | id         |     |
| fk_posts_comments_post_id | post_id    |     |
| fk_users_comments_user_id | user_id    |     |

## relation

| Name                      | Columns | FK Table | FK Columns | On Update | On Delete |
| :------------------------ | :------ | :------- | :--------- | :-------- | :-------- |
| fk_posts_comments_post_id | post_id | posts    | id         |           | RESTRICT  |
| fk_users_comments_user_id | user_id | users    | id         |           | RESTRICT  |

# **password_resets** table

## stracture

| Field      | Type     | Lengh |          | Default | Extra          | comment |
| :--------- | :------- | :---- | :------- | :------ | :------------- | :------ |
| id         | int      |       | NOT NULL |         | AUTO_INCREMENT |         |
| user_id    | int      |       | NOT NULL |         |                |         |
| token      | VARCHAR  | 255   |          |         |                |         |
| expires_at | DATETIME |       | NOT NULL |         |                |         |
| created_at | DATETIME |       | NOT NULL |         |                |         |
| updated_at | DATETIME |       | NOT NULL |         |                |         |

## index

| Name                             | ColumnName |     |
| :------------------------------- | :--------- | :-- |
| PRIMARY                          | id         |     |
| fk_users_password_resets_user_id | user_id    |     |

## relation

| Name                             | Columns | FK Table | FK Columns | On Update | On Delete |
| :------------------------------- | :------ | :------- | :--------- | :-------- | :-------- |
| fk_users_password_resets_user_id | user_id | users    | id         |           | RESTRICT  |
