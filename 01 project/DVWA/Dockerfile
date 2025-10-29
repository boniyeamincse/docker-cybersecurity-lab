# DVWA Single Container Dockerfile
# Author: Boni Yeamin, email: boniyeamin.cse@gmail.com
# Description: This Dockerfile creates a single container running DVWA (Damn Vulnerable Web Application),
#              Apache web server, PHP 7.4, and MariaDB database for a complete vulnerable lab environment.

# Use Ubuntu 20.04 as base image for stability and package availability
FROM ubuntu:20.04

# Set environment variables to avoid interactive prompts during package installation
ENV DEBIAN_FRONTEND=noninteractive

# Update package lists and install required packages:
# - apache2: Web server
# - php7.4 and extensions: PHP runtime with modules needed for DVWA
# - mariadb-server: Database server for DVWA data storage
# - wget, unzip: For downloading and extracting DVWA
# - git: For cloning DVWA repository (alternative to wget)
RUN apt-get update && apt-get install -y \
    apache2 \
    php7.4 \
    php7.4-mysql \
    php7.4-mysqli \
    php7.4-gd \
    php7.4-curl \
    php7.4-xml \
    php7.4-mbstring \
    mariadb-server \
    wget \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

# Configure PHP for DVWA requirements:
# - Allow URL include for vulnerability demonstrations
# - Set upload max size
# - Configure other security settings for lab purposes
RUN sed -i 's/allow_url_include = Off/allow_url_include = On/' /etc/php/7.4/apache2/php.ini && \
    sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 10M/' /etc/php/7.4/apache2/php.ini && \
    sed -i 's/post_max_size = 8M/post_max_size = 10M/' /etc/php/7.4/apache2/php.ini && \
    sed -i 's/display_errors = Off/display_errors = On/' /etc/php/7.4/apache2/php.ini

# Download and extract DVWA
# Using the official DVWA repository from GitHub
WORKDIR /tmp
RUN git clone https://github.com/digininja/DVWA.git && \
    mv DVWA/* /var/www/html/ && \
    rm -rf DVWA

# Copy custom configuration files
# config.inc.php: DVWA database configuration
# init-dvwa-db.sh: Database initialization script
COPY config/config.inc.php /var/www/html/config/config.inc.php
COPY init-dvwa-db.sh /usr/local/bin/init-dvwa-db.sh

# Make the init script executable
RUN chmod +x /usr/local/bin/init-dvwa-db.sh

# Create uploads directory with proper permissions
RUN mkdir -p /var/www/html/hackable/uploads && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Optional: Copy local HTML overrides if present
# Note: Commenting out this copy since html directory appears empty and causes build issues
# COPY html/ /var/www/html/

# Expose port 80 for web access
EXPOSE 80

# Health check to verify services are running
HEALTHCHECK --interval=30s --timeout=10s --start-period=60s --retries=3 \
    CMD curl -f http://localhost/ || exit 1

# Start services and initialize database
# Use entrypoint script to ensure proper startup order
CMD service mysql start && \
    sleep 5 && \
    /usr/local/bin/init-dvwa-db.sh && \
    apachectl -D FOREGROUND