# Database Schema

# **users** table

- id: UUID (primary key)
- username: VARCHAR(255) (unique)
- email: VARCHAR(255) (unique)
- password_hash: VARCHAR(255)
- created_at: TIMESTAMP
- updated_at: TIMESTAMP

# **posts** table

- id: UUID (primary key)
- user_id: UUID (foreign key to users.id)
- title: VARCHAR(255)
- content: TEXT
- created_at: TIMESTAMP
- updated_at: TIMESTAMP

# **comments** table

- id: UUID (primary key)
- post_id: UUID (foreign key to posts.id)
- user_id: UUID (foreign key to users.id)
- content: TEXT
- created_at: TIMESTAMP

# **password_resets** table

- id: UUID (primary key)
- user_id: UUID (foreign key to users.id)
- token: VARCHAR(255) (unique)
- expires_at: TIMESTAMP
