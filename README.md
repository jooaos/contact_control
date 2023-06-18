
### About application
Hello! How are you?

This application is made for you control a contact system. Here you can:

- Create contacts;
- Edit self profile;
- Search contacts using custom filters and
- View some data on dashboards

An interface is provided to facilitate interaction with the platform.

### Dependencies
To run this application on *localhost* you need to have the **docker** and **docker-compose** on your machine.

### Installing
In the folder where you want to install the project, run the following commands in your terminal:
```sh
git clone git@github.com:jooaos/contact_control.git
cd contact_control
docker compose up --build -d
```
After that, access the container through `docker compose exec app /bin/bash` and perform the following commands:
```sh
composer install
php artisan key:generate
php artisan migrate:fresh --seed
```


Now just access the URL: (http://localhost/login)[http://localhost/login]. The users created are as follows:

| Email | Password | Role |
|--|--|--|
| user1@example.test | 12345678 | Super Admin |
| user2@example.test | 12345678 | Admin |
| user3@example.test | 12345678 | Member |


