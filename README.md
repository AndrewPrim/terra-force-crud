## Steps to install project
* Clone this project
* Rename `.env.example` to `.env`
* Change `env` database connection credential
* run `composer install`
* run `npm install`
* run `npm run dev`
* run migrations `php artisan migrate`
* run seeds `php artisan db:seed`
  *  UserSeeder will create 2 preprepared users with role Admin and User and 4 more random users
  *  Admin user credentianl: login `superadmin@terraforce.app` and password is `secret`
  *  Common user hase same password but login is set to `user@terraforce.app`
    * Admin user has rights to edit and delete posts created by any user
    * User can delete and update only his own posts
