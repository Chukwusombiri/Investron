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
✅ Automatic `php artisan migrate --force` on startup  
✅ One-command build via Docker Compose  

---

## ⚙️ Quick Start

### 1️⃣ Clone the repository
git clone https://github.com/yourusername/investron.git
cd investron

---

### 2️⃣ Configure environment
cp .env.example .env
php artisan key:generate

---

### 3️⃣ Build and run with Docker
docker compose up -d --build

Your app will be available at:
👉 http://localhost:8000

---

### 🧠 Common Commands
| Command                            | Description                              |
| ---------------------------------- | ---------------------------------------- |
| `docker compose up -d --build`     | Build and start all containers           |
| `docker compose down`              | Stop all containers                      |
| `docker compose down -v`           | Stop and remove volumes (fresh start)    |
| `docker exec -it laravel_app bash` | Access the app container shell           |
| `php artisan migrate`              | Run migrations manually inside container |

---

### 🗄️ Database Access
| Property | Value     |
| -------- | --------- |
| Host     | 127.0.0.1 |
| Port     | 3306      |
| Database | laravel   |
| Username | laravel   |
| Password | secret    |

---

### 🧰 Tech Stack
| Layer                 | Technology                       |
| --------------------- | -------------------------------- |
| **Backend**           | Laravel 11                       |
| **Frontend (Guest)**  | React + Inertia.js + TailwindCSS |
| **Dashboard (Admin)** | Livewire + Alpine.js             |
| **Server**            | PHP 8.3 (FPM) + Nginx            |
| **Database**          | MySQL 8                          |
| **Build Tool**        | Vite                             |
| **Containerization**  | Docker & Docker Compose          |

---

### 🐳 Docker Architecture
├── app       → PHP-FPM container (Laravel backend)
├── nginx     → Web server container (serves Laravel public/)
└── db        → MySQL database container (persistent volume)

- Each container communicates through an internal Docker network (investron_net).

---

### 🧱 Project Structure
├── app/
├── bootstrap/
├── config/
├── database/
├── docker/
│   └── nginx/
│       └── default.conf
├── public/
├── resources/
│   ├── js/        # React/Inertia frontend + Livewire components
│   ├── views/     # Blade templates
├── routes/
├── storage/
├── .env.example
├── Dockerfile
├── docker-compose.yaml
├── .dockerignore
└── README.md

---

### 🔐 Environment Setup Notes
- Your real .env file should not be committed — only .env.example is tracked.
- Default credentials are for demo use.
- Override environment variables in docker-compose.yaml or your host environment.

---

### 🧪 Development Notes
To rebuild frontend assets locally:

- npm install
- npm run dev

For production builds inside Docker:

npm run build

---

### 🤝 Contributing
Pull requests are welcome!

To contribute:

1. Fork the repo
2. Create a new branch
3. Submit a PR describing your changes

---

### 📄 License
This project is open-sourced under the [LICENSE](MIT License).

---

### ❤️ Built by [https://github.com/Chukwusombiri](Bounty Tech)
“Code as if the next person to maintain it is a future version of you.”


---

### Credits 
Huge credit to CORIENT whose platform i adapted and modified for learning purposes.
Disclaimer: This project is a educational resource only.