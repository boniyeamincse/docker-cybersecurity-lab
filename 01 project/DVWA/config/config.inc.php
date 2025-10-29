<?php

# DVWA Configuration File
# Author: Boni Yeamin, email: boniyeamin.cse@gmail.com
# Description: This file contains the database configuration for DVWA.
#              It defines the connection parameters for the MariaDB database.

# Database connection settings
$_DVWA = array();
$_DVWA[ 'db_server' ]   = 'localhost';
$_DVWA[ 'db_database' ]  = 'dvwa';
$_DVWA[ 'db_user' ]      = 'dvwa';
$_DVWA[ 'db_password' ]  = 'password';

# Only used with PostgreSQL or SQLite database selection.
$_DVWA[ 'db_port' ] = '3306';

# ReCAPTCHA settings
# Get keys from: https://www.google.com/recaptcha/admin
$_DVWA[ 'recaptcha_public_key' ]  = '';
$_DVWA[ 'recaptcha_private_key' ] = '';

# Default security level: 'impossible', 'high', 'medium', 'low'
$_DVWA[ 'default_security_level' ] = 'impossible';

# Default PHPIDS status: 'enabled' or 'disabled'
$_DVWA[ 'default_phpids_level' ] = 'disabled';

# Verbose PHPIDS messages: 'true' or 'false' - Default 'false'
$_DVWA[ 'default_phpids_verbose' ] = 'false';

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
