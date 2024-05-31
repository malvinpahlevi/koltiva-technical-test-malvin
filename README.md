
# HOW TO RUN THIS APP ?
1. run ```composer update```
2. run ```composer install```
3. create new database and configure MySQL with db name "socmeds_db" with user <USER_DB> pass <PASSWORD_DB> on [.env] and [database.php]  
4. run ```php artisan queue:table```
5. run ```php artisan migration```
6. run ```npm run dev``` 
7. open a new terminal and run ```php artisan serve```
  * So that application is running localy, but dont forget to open new terminal to run queue work
8. run ```php artisan queue:work```
9. Run app on your browser with [http://127.0.0.1:8000/all]
  * Now you can register or login with your mail
10. If your mail are not registered yet, go to menu register and verify mail on [mailtrap.cop](https://mailtrap.io/) with credentials
  * user : malvinfrog@gmail.com
  * pass : Malvinpahlevi13
  * Go to Email Testing > Inboxes. These are all verification mail inboxes, you can verify with clik button verify
  * Congratulation ur email has been registerd and login
11. You can post with button Create Post and post comment and replies

# HOW TO RUN UNIT TEST?
1. Stop all terminal run recently
2. run ```vendor/bin/phpunit --filter=SendConfirmationEmailTest```

# HOW TO CLEAR CACHE IF ERROR 
1. php artisan cache:clear
2. php artisan config:clear
3. php artisan route:clear
4. php artisan view:clear

# REQUIREMENT
PHP 8.1
Laravel 10.10
