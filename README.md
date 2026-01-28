# PHP MySQL Demo

A Laravel application with Docker, featuring user authentication and CRUD operations.

## Quick Start

```bash
# Start the containers
docker-compose up -d

# Run migrations (first time only)
docker exec laravel_web php artisan migrate

# Access the app
open http://localhost:8080
```

## Docker Architecture

This project uses Docker Compose to run two containers:

### Services

| Service | Container | Port | Description |
|---------|-----------|------|-------------|
| `web` | laravel_web | 8080 | PHP/Apache serving Laravel |
| `db` | laravel_db | 3306 | MySQL 8.0 database |

### How It Works

```
Your Machine                     Docker
─────────────                    ──────
localhost:8080  ──────────────►  web container (PHP) ──────►  db container (MySQL)
     │                                │                            │
     │                                │                            │
./src folder ◄─── live sync ───► /var/www/html              db_data volume
```

- **Live code sync**: Edit files in `./src` and changes reflect immediately
- **Persistent database**: Data stored in `db_data` volume survives container restarts
- **Container networking**: Web connects to MySQL via hostname `db`

### Database Credentials

| Setting | Value |
|---------|-------|
| Host | `db` (inside Docker) / `localhost` (outside) |
| Port | 3306 |
| Database | laravel |
| Username | laravel |
| Password | secret |

## Authentication Demo

### Files Created

| File | Purpose |
|------|---------|
| `app/Http/Controllers/AuthController.php` | Login/Register/Logout |
| `app/Http/Controllers/NoteController.php` | CRUD operations for notes |
| `app/Models/Note.php` | Note model |
| `database/migrations/2024_01_28_000000_create_notes_table.php` | Notes table |
| `resources/views/layouts/app.blade.php` | Base layout |
| `resources/views/auth/login.blade.php` | Login page |
| `resources/views/auth/register.blade.php` | Registration page |
| `resources/views/dashboard.blade.php` | Dashboard with notes CRUD |

### Features

- User registration with validation
- Login/logout with session handling
- Dashboard showing username and account info
- Notes CRUD (Create, Read, Delete) - demonstrates DB operations
- Protected routes (must be logged in to access dashboard)

### Test It

1. Go to http://localhost:8080/register - Create an account
2. Go to http://localhost:8080/login - Login
3. Go to http://localhost:8080/dashboard - View dashboard, add/delete notes

## Useful Commands

```bash
# Start containers
docker-compose up -d

# Stop containers
docker-compose down

# View logs
docker-compose logs -f

# Run artisan commands
docker exec laravel_web php artisan <command>

# Access MySQL CLI
docker exec -it laravel_db mysql -u laravel -psecret laravel

# Rebuild containers
docker-compose up -d --build
```
