#!/bin/bash
sudo chown -R ubuntu /var/www/html
sudo chmod -R 0777 /var/www/html/

cd ~
curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

cd /var/www/html
#Updating Write permission
sudo chown -R ubuntu /var/opt

   if [ ! -d  /var/opt/ssl ]; then
    sudo mkdir /var/opt/ssl
    echo "SSL Directory Created"
  fi

sudo \cp -rf siteConfig/psg.ng.crt /var/opt/ssl/
sudo \cp -rf siteConfig/psg.ng.key /var/opt/ssl/

sudo chown -R root.root /var/opt

sudo \cp -rf siteConfig/000-default.conf /etc/apache2/sites-available/
sudo \cp -rf siteConfig/default-ssl.conf /etc/apache2/sites-available/
sudo \cp -rf siteConfig/ssl-params.conf /etc/apache2/conf-available/

sudo ln -s /etc/apache2/sites-available/default-ssl.conf /etc/apache2/sites-enabled/default-ssl.conf

curl -sS https://getcomposer.org/installer | php
php composer.phar install

sudo a2enmod ssl
sudo a2enmod headers
sudo a2enconf ssl-params
sudo a2ensite default-ssl

sudo systemctl reload apache2

sudo chown -R www-data:www-data /var/www/html
sudo chmod -R 0777 /var/www/html/
# Add cronJobs to Service
#These are piped through the sort command to remove duplicate lines.
#but we can achieve a less destructive de-duplication with awk:
#cd ~
#(crontab -l; echo "* * * * * /usr/bin/php /var/www/html/cronJobs/index.php")|awk '!x[$0]++'|crontab -
#(crontab -l; echo "* * * * * root /usr/bin/wget -O - http://localhost/cronJobs/index.php")|awk '!x[$0]++'|crontab -
