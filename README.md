#   Laravel ajax review example with backend
#   Contributors: Charanpreet Singh
#   Demo link : http://166.62.80.110/laravelTest/public/

##  Purpose of this Project 
This application is creating ajax review with captcha feature. User can submit their review and it will be publish if admin confirm the review. This application is developed on Laravel and Bootstrap.


### To know more about Laravel (https://laravel.com/docs/5.4/)




-------------------------------------------------------------------------------------------------------------------
steps to setup the project 

#1  get the clone of the repository in your working directory

i.e. your working directory path > git clone  https://github.com/ultrabytes/laravelTest.git

# 2 Move to your directory by > cd LaravelTest
# 3 Run command - composer install 

# 4 Create .env file on root directory and edit with database credentials

#### e.g 
#### DB_CONNECTION=mysql
#### DB_HOST=127.0.0.1
#### DB_PORT=3306
#### DB_DATABASE=reviews
#### DB_USERNAME=root
#### DB_PASSWORD=


## 5 This application uses google captcha. You can generate the secret and key for captcha. (https://www.google.com/recaptcha/admin#list). 
#### NOCAPTCHA_SECRET=XXXXXXXXXXX
#### NOCAPTCHA_SITEKEY=XXXXXXXXXX

# 6 Run command - php artisan key:generate
# 7 Run command - php artisan migrate:refresh --seed

## Now open the project on your browser (http://localhost/laravelTest/public) and ready to use

## Admin url  : http://localhost/laravelTest/public/admin/login

#### email :admin@example.com
#### password :123456

