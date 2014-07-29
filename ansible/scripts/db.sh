#/bin/sh
sudo mysql -u root -e "USE syntara; INSERT INTO groups (name, permissions, created_at, updated_at) VALUES ('Admin', '{\"superuser\": 1}', NOW(), NOW());"