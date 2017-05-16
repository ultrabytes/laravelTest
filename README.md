##  laravel test with ajax pagination,scrolling,sorting
# Contributors: charanpreet singh
# Donate link : http://www.bytesultra.com/

##  Purpoese of this Project 
This application  just for simple laravel test with creating of reviews and listed recent review with scroll pagination on frontend , after appproving all reviews from backend .In backend used the ajax sorting ,ajax pagination .


## About Laravel
 You can Install the laravel from the link (https://laravel.com/docs/5.4/)




-------------------------------------------------------------------------------------------------------------------
steps to install the project 

#1  get the clone of the repository in your working directory

i.e. your working directory path > git clone  https://example@bitbucket.org/bit_username/laravelTest.git

#2 Run command - composer install 

#3 Then create or copy the .envExamples file on root and edit with database credentials

#### e.g 
#### DB_CONNECTION=mysql
#### DB_HOST=127.0.0.1
#### DB_PORT=3306
#### DB_DATABASE=reviews
#### DB_USERNAME=root


#4 Run command -php artisan migrate:refresh --seed





## 7 Need to update the key and secret of nocaptcha by making api from google .
#### NOCAPTCHA_SECRET=XXXXXXXXXXX
#### NOCAPTCHA_SITEKEY=XXXXXXXXXX


## Now hit the url iwth your directory (/public) and ready to use

## Admin url  : yourProject/admin/login

#### email :admin@example.com
#### password :123456

---------------------------------------FrontEnd work flow---------------------------------
## Creating Reviews 

Create Form with Name ,Email ,Description and save it into database with ajax and client side validation

save Method called from Frontend/ReviewController in laravel 

## Listing recent reviews
createReview  Method called from Frontend/ReviewController in laravel  

listed the name ,description ,created date of reviews if they proved from the backend  according to created date Descending up to 10 per page

For This included the recentReviewData page in which declared all reviews

## Scroll pagination 

Added the scroll pagination for further recent review up to 10 per page

-------------------------End frontEnd work flow-------------------------------------

-------------------------Start Backend work flow-------------------------------------

Admin login url 

youProjectUrl/admin/login

then insert the username and password after successfully login it will redirect you reviews page where all reviews will listed 

you can approve them by click on 'confirm' button and can  disapprove them by click on 'confirmed' button 

after approving it i will display on 'recent reviews section' on frontend 

In reviews page listed the 20 records per page and added the ajax pagination for it 

You can sort the record by created date in both 'Ascending' and 'descending' order ,for this functionality used the ajax.









