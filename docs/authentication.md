# Authentication

Supporting method

- email and password authentication.

# **register** route

User access `/register`.

```
+--------------------------------------------------+
| header                                           |
+--------------------------------------------------+
| registration                                     |
|                                                  |
|  email:       [___________________]              |
|  password:    [___________________]              |
|                                                  |
|  [submit]                                        |
+--------------------------------------------------+
| footer                                           |
+--------------------------------------------------+
```

User input email and password.

User push submit button.

App registration.

## Validation

- email ([see validation.md](./validation.md))
- password ([see validation.md](./validation.md))

# **login** route

User access `/login`.

```
+--------------------------------------------------+
| header                                           |
+--------------------------------------------------+
| login                                            |
|                                                  |
|  email:       [___________________]              |
|  password:    [___________________]              |
|                                                  |
|  [login]                                         |
+--------------------------------------------------+
| footer                                           |
+--------------------------------------------------+
```

User input email and password.

User push login button.

App redirect mypage.

## Validation

- email ([see validation.md](./validation.md))
- password ([see validation.md](./validation.md))

# **logout** route

User access `/logout`.

App remove session.

## Reset Password
