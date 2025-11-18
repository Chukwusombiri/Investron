# 🚀 Investron - Laravel + Livewire + Alpine.js + React/Inertia + TailwindCSS + MySQL (Dockerized)

![Laravel](https://img.shields.io/badge/Laravel-11.x-ff2d20?logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.3-blue?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-00618a?logo=mysql&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-Ready-2496ed?logo=docker&logoColor=white)
![React](https://img.shields.io/badge/React-18.x-61DAFB?logo=react&logoColor=white)
![Livewire](https://img.shields.io/badge/Livewire-3.x-ff2d20)
![License](https://img.shields.io/badge/license-MIT-green)
![Status](https://img.shields.io/badge/Status-Active-success)

A **modern investment platform demo** built with **Laravel 11**, showcasing two distinct frontends:

- 💼 **Guest Interface:** React + Inertia.js + TailwindCSS  
- 🧭 **User/Admin Dashboard:** Laravel Livewire + Alpine.js  

Fully containerized with **Docker** for production-grade reliability, complete with automatic migrations, caching, and optimized builds.

> 🧠 Designed to demonstrate a professional, multi-stack Laravel architecture ready for portfolio or real-world deployment.

---

## 🧩 Features

✅ Laravel 11 + PHP 8.3 (FPM)  
✅ React + Inertia.js (guest interface)  
✅ Livewire 3 + Alpine.js (admin & user dashboards)  
✅ TailwindCSS + Vite asset pipeline  
✅ MySQL 8 database container  
✅ Nginx web server optimized for Laravel
✅ adminer database GUI container for viewing application's stored data
✅ One-command build via Docker Compose  


---

# ⚙️ Quick Start

## Clone the repository
git clone https://github.com/Chukwusombiri/Investron.git
cd investron

---

## local development

```bash
cp .env.example .env 

composer install

php artisan key:generate && php artisan migrate --force

npm install && npm run dev

# open separate terminal in the same directory and start php server
php artisan serve 

```

---

## Build and run with Docker

### Multi-Stage Docker Build
1️⃣ Frontend Stage (Node 18) → React/Vite/Tailwind build
2️⃣ Backend Stage (PHP 8.3 FPM) → Laravel application
3️⃣ Webserver Stage (Nginx) → Serves the application

text

### Service Containers
┌─────────────┐ ┌─────────────┐ ┌─────────────┐ ┌─────────────┐
│ Nginx │ │ Laravel │ │ MySQL │ │ Adminer │
│ (Webserver)│◄──►│ (PHP-FPM) │◄──►│ (Database) │◄──►│ (DB GUI) │
│ :5000 │ │ :9000 │ │ :3307 │ │ :8080 │
└─────────────┘ └─────────────┘ └─────────────┘ └─────────────┘

text

### Prerequisites
- Docker & Docker Compose
- git 

### Environment Configuration
```bash
# Copy environment file
cp .env.example .env.docker
```

> The application will automatically generate Laravel key on first build

### Build and Launch
```bash
# Build and start all services in detached mode
docker compose up -d --build
docker compose exec app php artisan migrate

```

### Access the Application
| Service               | URL                              | Purpose                  |
| --------------------- | -------------------------------- | ------------------------ |
| **Main Application**  | http://localhost:5000            | Laravel application      |
| **Database Admin**    | http://localhost:8080            | Adminer (DB management)  |
		
		
### 🛠️ Development Commands
Docker Management

```bash
# Start services
docker compose up -d

# Stop services
docker compose down

# Stop and remove volumes (fresh start)
docker compose down -v

# View logs
docker compose logs -f

# Rebuild specific service
docker compose build app
```

### Application Commands (Run inside container)
```bash
# Access app container
docker exec -it investron-app bash

# Run migrations
docker exec -it investron-app php artisan migrate

# Generate Laravel key
docker exec -it investron-app php artisan key:generate

# Install composer dependencies
docker exec -it investron-app composer install

# Run tests
docker exec -it investron-app php artisan test
```

### 🗄️ Database Configuration
- Connection Details
    | Property                           | Value                                    |
    | ---------------------------------- | ---------------------------------------- |
    | Host                               | db (container name) or 127.0.0.1         |
    | Port                               | 3307 (external) / 3306 (internal)        |
    | Database                           | investron_db                             |
    | Username                           | investron_user                           |
    | Password                           | secret_password                          |
    | Root Password                      | root                                     |


- Accessing MySQL
    ```bash
    # Direct access via MySQL client
    mysql -h 127.0.0.1 -P 3307 -u investron_user -p investron_db
    
    # Viewing Database Content After logging into MySQL    
    SHOW TABLES;
    SELECT * FROM users LIMIT 10;
    
    ```
    Or use Adminer web interface at http://localhost:8080

### 🐳 Docker Services Overview
Services Breakdown

    | Service	       | Container Name	        | Ports	                   | Description                  |
    | ---------------- | ---------------------- | ------------------------ | ---------------------------- |
    | app	           | investron-app	        | 9000	                   | Laravel PHP-FPM application  |
    | nginx	           | investron-web	        | 5000:80	               | Nginx web server             |
    | db	           | investron-db	        | 3307:3306	               | MySQL 8.0 database           |
    | adminer	       | investron-adminer      | 8080:8080	               | Database management GUI      |

### Development Features
Hot-reload: File changes are synchronized automatically

Persistent data: MySQL data persists in Docker volume

Optimized builds: Multi-stage Dockerfile for production readiness

---

## 📁 Project Structure
text
investron/
├── docker/
│   └── nginx/
│       └── default.conf          # Nginx configuration
├── resources/
│   ├── js/                       # React/Inertia components
│   ├── views/                    # Blade templates
│   └── css/                      # Tailwind styles
├── public/
│   └── build/                    # Compiled assets (from Docker build)
├── Dockerfile                    # Multi-stage build configuration
├── compose.yaml                  # Docker Compose services
├── .env.docker                   # Docker environment variables
├── vite.config.js               # Vite configuration
└── tailwind.config.js           # TailwindCSS configuration

---

## 🔧 Configuration Files
### Docker Compose Services
- app: Laravel backend with PHP 8.3, auto-reload on file changes

- nginx: Optimized Laravel server configuration

- db: MySQL 8.0 with persistent volume

- adminer: Web-based database management

### Nginx Configuration
- Optimized for Laravel applications

- PHP-FPM integration with app container

- Security headers enabled

- Proper error handling and logging

## 🛡️ Security Notes
> Default passwords should be changed in production

> .env.docker contains development credentials

> Security headers are configured in Nginx

> X-Powered-By header is hidden

> CSRF protection enabled via Laravel

## 🔄 Development Workflow
### Making Changes
- Code changes are automatically synced to the container

- Composer dependencies trigger rebuild on composer.json changes

- Frontend assets can be rebuilt inside container or locally

### Database Changes
```bash
# Create new migration
docker exec -it investron-app php artisan make:migration create_users_table

# Run migrations
docker exec -it investron-app php artisan migrate

# Rollback migrations
docker exec -it investron-app php artisan migrate:rollback
```


## 🐛 Troubleshooting
Common Issues
- *Port already in use*
Change ports in compose.yaml if 5000, 3307, or 8080 are occupied

- *Docker build fails*

```bash
# Clear Docker cache
docker compose build --no-cache
```

- *Database connection issues*

```bash
# Check if MySQL container is running
docker ps | grep investron-db

# View database logs
docker logs investron-db
```

- *Permission issues*

```bash
# Fix Laravel storage permissions
docker exec -it investron-app chown -R www-data:www-data storage bootstrap/cache
```

## 🤝 Contributing
- Fork the repository

- Create a feature branch: git checkout -b feature/amazing-feature

- Commit changes: git commit -m 'Add amazing feature'

- Push to branch: git push origin feature/amazing-feature

- Open a Pull Request


## Development Guidelines
- Follow Laravel coding standards

- Include tests for new features

- Update documentation accordingly

- Ensure Docker setup remains functional


## 📄 License
This project is open-sourced under the MIT License.


## 🙏 Acknowledgments
Laravel Community - For the excellent framework

Docker Team - Containerization platform

CORIENT - Platform adaptation for educational purposes

Disclaimer: This project is for educational and portfolio purposes only.

## 👨‍💻 Maintainer
Bounty Tech - 
https://github.com/Chukwusombiri

> "Code as if the next person to maintain it is a future version of you."