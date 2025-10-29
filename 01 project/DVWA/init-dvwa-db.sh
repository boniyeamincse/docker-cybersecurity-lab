#!/bin/bash

# DVWA Database Initialization Script
# Author: Boni Yeamin, email: boniyeamin.cse@gmail.com
# Description: This script initializes the MariaDB database for DVWA,
#              creates the necessary database and user, and sets up the schema.

# Exit on any error to prevent partial initialization
set -e

# Database configuration variables
DB_ROOT_PASSWORD="admin"
DB_NAME="dvwa"
DB_USER="dvwa"
DB_PASSWORD="password"

# Function to wait for MariaDB to be ready
wait_for_mysql() {
    echo "Waiting for MariaDB to be ready..."
    for i in {1..30}; do
        if mysqladmin ping -h localhost --silent; then
            echo "MariaDB is ready!"
            return 0
        fi
        echo "Attempt $i/30: MariaDB not ready yet..."
        sleep 2
    done
    echo "Error: MariaDB did not become ready within 60 seconds"
    exit 1
}

# Secure the MariaDB installation and set root password
mysql_secure_installation <<EOF

n
y
$DB_ROOT_PASSWORD
$DB_ROOT_PASSWORD
y
y
y
y
EOF

# Wait for MariaDB to restart after securing
sleep 5

# Create DVWA database and user
mysql -u root -p"$DB_ROOT_PASSWORD" <<EOF
-- Create the DVWA database if it doesn't exist
CREATE DATABASE IF NOT EXISTS $DB_NAME;

-- Create DVWA user and grant privileges
CREATE USER IF NOT EXISTS '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASSWORD';
GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'localhost';

-- Also grant privileges for connections from any host (useful in containerized environments)
GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'%' IDENTIFIED BY '$DB_PASSWORD';

-- Flush privileges to apply changes
FLUSH PRIVILEGES;
EOF

# Import DVWA database schema
if [ -f "/var/www/html/database/dvwa.sql" ]; then
    echo "Importing DVWA database schema..."
    mysql -u $DB_USER -p"$DB_PASSWORD" $DB_NAME < /var/www/html/database/dvwa.sql
    echo "DVWA database schema imported successfully."
else
    echo "Warning: DVWA database schema file not found at /var/www/html/database/dvwa.sql"
    echo "You may need to initialize the database manually through the DVWA web interface."
fi

echo "DVWA database initialization completed successfully!"
echo "Default DVWA credentials: admin / password"
