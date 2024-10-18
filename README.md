## Getting Started

1-clone the application first

    git clone https://github.com/eman-m0hamed/laravel-week-2-3.git

2-open cmd inside the application then run this command to Install Dependencies (vendor folder):

    composer install

3-copy .env.example and rename the copy to .env

4-Update the .env file with your database.

5-generate application key

    php artisan key:generate

6-run migration file

    php artisan migrate
   
7- run seeder files for creating fake data in database tables



    php artisan db:seed --class=SeederName  
    
**For users Table**

    php artisan db:seed --class=UserSeeder  
    
**For posts Table**

    php artisan db:seed --class=PostSeeder   
***Warning***

**you can't use PostSeeder before using UserSeeder if users table is Empty**
    

## Running
To run the project write this command in project terminal
    
    php artisan serve


