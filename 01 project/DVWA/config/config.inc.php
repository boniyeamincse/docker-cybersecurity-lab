<?php

# DVWA Configuration File
# Author: Boni Yeamin, email: boniyeamin.cse@gmail.com
# Description: This file contains the database configuration for DVWA.
#              It defines the connection parameters for the MariaDB database.

# Database connection settings
$_DVWA = array();

# Database server hostname or IP address
$_DVWA['db_server'] = 'localhost';

# Database username
$_DVWA['db_user'] = 'dvwa';

# Database password
$_DVWA['db_password'] = 'password';

# Database name
$_DVWA['db_database'] = 'dvwa';

# Database port (default MySQL/MariaDB port is 3306)
$_DVWA['db_port'] = '3306';

# Path to database file for SQLite (not used in this setup)
$_DVWA['db_file'] = '';

# MySQLi connection details array
$db_config = array(
    'host' => $_DVWA['db_server'],
    'user' => $_DVWA['db_user'],
    'pass' => $_DVWA['db_password'],
    'db' => $_DVWA['db_database'],
    'port' => $_DVWA['db_port']
);

# Security settings for DVWA
# These settings control the security level of the application
# Available levels: 'impossible', 'high', 'medium', 'low'
$_DVWA['default_security_level'] = 'impossible';

# Default PHPIDS settings (PHP Intrusion Detection System)
$_DVWA['default_phpids_level'] = 'disabled';

# Verbose error reporting (useful for debugging in lab environment)
$_DVWA['default_phpids_verbose'] = 'false';

# ReCAPTCHA settings (disabled by default for lab use)
$_DVWA['recaptcha_public_key'] = '';
$_DVWA['recaptcha_private_key'] = '';

# Default locale setting
$_DVWA['default_locale'] = 'en';

# Note: This configuration is for a vulnerable lab environment.
# Do not use these credentials in production systems.
# Default DVWA admin credentials: admin / password

?>
