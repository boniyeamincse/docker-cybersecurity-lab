# Docker Cybersecurity Lab Projects

**Author:** Boni Yeamin  
**Email:** boniyeamin.cse@gmail.com  
**GitHub:** https://github.com/boniyeamincse  
**Docker Hub:** https://hub.docker.com/repositories/boniyeamin

A comprehensive collection of cybersecurity lab environments containerized with Docker for educational and testing purposes. Each project focuses on different aspects of web application security, penetration testing, and vulnerability assessment.

## ⚠️ Security Warning

**All projects in this repository contain intentional vulnerabilities and security weaknesses for educational purposes only.**

- Never expose these containers to the internet
- Use only in isolated lab environments with proper network segmentation
- These are for learning and training purposes only
- Do not use in production environments

## 📋 Projects Overview

| Project | Project Name | Description | Status | Link |
|---------|-------------|-------------|--------|------|
| 01 | DVWA Single Container Lab | Damn Vulnerable Web Application in a single Docker container with Apache, PHP, and MariaDB | ✅ Complete | [01 project/](01%20project/) |
| 02 | Project Name | Brief description of the project | 🔄 In Progress | [02 Project/](02%20Project/) |
| 03 | Project Name | Brief description of the project | 📋 Planned | [03 Project/](03%20Project/) |
| 04 | Project Name | Brief description of the project | 📋 Planned | [04 Project/](04%20Project/) |
| 05 | Project Name | Brief description of the project | 📋 Planned | [05 Project/](05%20Project/) |
| 06 | Project Name | Brief description of the project | 📋 Planned | [06 Project/](06%20Project/) |
| 07 | Project Name | Brief description of the project | 📋 Planned | [07 Project/](07%20Project/) |
| 08 | Project Name | Brief description of the project | 📋 Planned | [08 Project/](08%20Project/) |
| 09 | Project Name | Brief description of the project | 📋 Planned | [09 Project/](09%20Project/) |
| 10 | Project Name | Brief description of the project | 📋 Planned | [10 Project/](10%20Project/) |

## 🏗️ Project Structure

```
docker-cybersecurity-lab/
├── README.md                    # This main index file
├── 01 project/                  # DVWA Single Container Lab
│   ├── README.md               # Project-specific documentation
│   └── DVWA/                   # Docker container files
│       ├── Dockerfile          # Container build instructions
│       ├── init-dvwa-db.sh     # Database initialization script
│       ├── config/             # Configuration files
│       └── ...
├── 02 Project/                 # Future project directory
├── 03 Project/                 # Future project directory
└── ...                         # Additional project directories
```

## 🚀 Quick Start

### Prerequisites
- Docker installed and running
- Git (for cloning repositories)
- At least 2GB free RAM for containers
- Basic understanding of Docker commands

### Running a Lab Environment

1. **Clone this repository:**
   ```bash
   git clone https://github.com/boniyeamincse/docker-cybersecurity-lab.git
   cd docker-cybersecurity-lab
   ```

2. **Navigate to a project directory:**
   ```bash
   cd "01 project/DVWA"
   ```

3. **Build and run the container:**
   ```bash
   # Build the image
   docker build -t <project-name> .

   # Run the container
   docker run -d -p 8080:80 --name <project-name> <project-name>

   # Optional: With persistent volumes
   docker run -d -p 8080:80 \
     -v $(pwd)/uploads:/var/www/html/uploads \
     --name <project-name> <project-name>
   ```

4. **Access the application:**
   Open your browser and navigate to `http://localhost:8080`

## 🐳 Docker Hub Images

All completed projects are available as pre-built Docker images on Docker Hub:

- **DVWA Lab**: `docker pull boniyeamin/dvwa-lab:latest`

## 📖 Detailed Project Information

### Project 01: DVWA Single Container Lab
- **Technology Stack**: Apache, PHP 7.4, MariaDB, DVWA
- **Vulnerabilities**: SQL Injection, XSS, CSRF, File Upload, Command Injection
- **Default Credentials**: admin / password
- **Container Size**: ~554MB
- **Documentation**: [01 project/README.md](01%20project/README.md)

## 🛠️ Development Guidelines

### Adding a New Project

1. **Create a new directory** following the naming convention (e.g., `03 project/`)
2. **Add a comprehensive README.md** with:
   - Project description and objectives
   - Technology stack details
   - Build and run instructions
   - Default credentials and access information
   - Security warnings and usage guidelines
3. **Include Docker files**:
   - `Dockerfile` with detailed comments
   - Configuration files
   - Initialization scripts
   - `.dockerignore` file
4. **Update this main README.md** table with project information
5. **Test thoroughly** in isolated environments
6. **Publish to Docker Hub** with appropriate tagging
7. **Commit and push** changes to GitHub

### Code Standards

- Use detailed comments in all configuration files
- Include author information in all files
- Provide comprehensive documentation
- Follow Docker best practices
- Test containers before publishing

## 🔐 Ethical Use and Legal Notice

- These projects are for educational purposes only
- Use only in controlled, isolated environments
- Obtain proper authorization before testing on any systems
- Respect applicable laws and regulations
- Do not use for malicious purposes

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/new-project`)
3. Add your project following the established structure
4. Update the main README.md table
5. Test thoroughly
6. Submit a pull request

## 📞 Contact

- **Email**: boniyeamin.cse@gmail.com
- **GitHub**: [boniyeamincse](https://github.com/boniyeamincse)
- **Docker Hub**: [boniyeamin](https://hub.docker.com/repositories/boniyeamin)

## 📄 License

This repository is for educational purposes. Individual projects may have their own licenses. DVWA is released under GPL license.

---

*Last updated: October 29, 2025*