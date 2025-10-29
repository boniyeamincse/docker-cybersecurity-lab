
# DVWA Single Container Lab

**Author:** Boni Yeamin, **Email:** boniyeamin.cse@gmail.com

## Description

This project provides a single Docker container running a complete DVWA (Damn Vulnerable Web Application) lab environment with:

- **DVWA (Damn Vulnerable Web Application)**: A PHP/MySQL web application that is intentionally vulnerable
- **Apache Web Server**: Serves the DVWA application
- **PHP 7.4**: Runtime environment with necessary extensions for DVWA
- **MariaDB Database**: Stores DVWA data and user information

The container is designed for educational purposes to practice web application security testing and penetration testing in a safe, isolated environment.

## ⚠️ Security Warning

**This container is intentionally vulnerable and should NEVER be exposed to the internet or used in production environments.**

- All services run with default credentials
- Multiple known vulnerabilities are present
- Use only in isolated lab environments with proper network segmentation

## Prerequisites

- Docker installed on your system
- At least 2GB free RAM for the container
- Basic understanding of Docker commands

## Quick Start

### 1. Build the Container

```bash
cd "01 project/DVWA"
docker build -t dvwa-lab .
```

### 2. Run the Container

Basic run command:
```bash
docker run -d -p 8080:80 --name dvwa-lab dvwa-lab
```

With persistent uploads volume (recommended):
```bash
docker run -d -p 8080:80 \
  -v $(pwd)/uploads:/var/www/html/hackable/uploads \
  --name dvwa-lab dvwa-lab
```

### 3. Access DVWA

Open your web browser and navigate to: **http://localhost:8080**

## Default Credentials

- **DVWA Admin Panel**: Username: `admin` / Password: `password`
- **Database**: Username: `dvwa` / Password: `password`

## Project Structure

```
01 project/DVWA/
├── Dockerfile              # Container build instructions
├── init-dvwa-db.sh        # Database initialization script
├── config/
│   └── config.inc.php     # DVWA configuration file
├── uploads/               # Host-mounted uploads directory (optional)
├── html/                  # Local HTML overrides (optional)
├── .dockerignore          # Docker build ignore file
└── README.md             # This file
```

## Configuration Files

### Dockerfile
- Uses Ubuntu 20.04 as base image
- Installs Apache, PHP 7.4 with required extensions, and MariaDB
- Downloads DVWA from official GitHub repository
- Configures PHP settings for vulnerability demonstrations
- Sets up proper permissions and directories

### init-dvwa-db.sh
- Initializes MariaDB database
- Creates DVWA database and user
- Imports DVWA database schema
- Secures MariaDB installation

### config/config.inc.php
- Contains database connection settings
- Configures DVWA security levels
- Sets default locale and other application settings

## Troubleshooting

### Container Won't Start
1. Check Docker service is running: `docker ps -a`
2. View container logs: `docker logs dvwa-lab`
3. Ensure port 8080 is not in use by other services

### Can't Access Web Interface
1. Verify container is running: `docker ps`
2. Check if port mapping is correct
3. Try accessing via container IP: `docker inspect dvwa-lab | grep IPAddress`

### Database Connection Issues
1. Wait for database initialization (may take 30-60 seconds)
2. Check logs for MariaDB startup errors
3. Verify config.inc.php has correct database credentials

## Usage Tips

- Start with the "Impossible" security level to learn proper secure coding
- Gradually lower security levels to understand vulnerabilities
- Use browser developer tools to inspect requests/responses
- Combine with tools like Burp Suite for advanced testing

## Contributing

Feel free to submit issues or pull requests to improve this lab environment.

## License

This project is for educational purposes. DVWA is released under GPL license.
