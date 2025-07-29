#!/bin/bash

# Variables
WORDPRESS_DIR="/var/www/html/wordpress"
DB_NAME="wordpress_db"
DB_USER="wp_user"
DB_PASSWORD="secure_password"

# Step 1: Install WordPress
wget https://wordpress.org/latest.tar.gz
tar -xzvf latest.tar.gz
mv wordpress $WORDPRESS_DIR
cp $WORDPRESS_DIR/wp-config-sample.php $WORDPRESS_DIR/wp-config.php

# Step 2: Configure Database
sed -i "s/database_name_here/$DB_NAME/" $WORDPRESS_DIR/wp-config.php
sed -i "s/username_here/$DB_USER/" $WORDPRESS_DIR/wp-config.php
sed -i "s/password_here/$DB_PASSWORD/" $WORDPRESS_DIR/wp-config.php

# Step 3: Set Permissions
chown -R www-data:www-data $WORDPRESS_DIR
chmod -R 755 $WORDPRESS_DIR

# Step 4: Install Plugins
wp plugin install popularfx --activate
wp plugin install pagelayer --activate
wp plugin install speedy-cache-pro --activate
wp plugin install litespeed-cache --activate
wp plugin install woocommerce --activate
wp plugin install loginizer --activate
wp plugin install backuply --activate
wp plugin install gitium --activate
wp plugin install zero-bs-crm --activate

# Step 5: Configure Gitium
git config --global user.name "Handsome Gato"
git config --global user.email "admin@handsomegato.com"
wp gitium install

echo "WordPress and plugins installed successfully!"