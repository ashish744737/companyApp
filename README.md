# CompanyApp

Steps : 
1. use the command : composer install
2. rename .env.example to .env 
3. For detabase setup please follow below setup in .env

------ for mysql database ---------
<br>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=database_name<br>
DB_USERNAME=root<br>
DB_PASSWORD=<br>

------ for postgreSQL database ---------
<br>
DB_CONNECTION=pgsql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=5432<br>
DB_DATABASE=database_name<br>
DB_USERNAME=user_name<br>
DB_PASSWORD=your_choosen_password<br>

you can use any of these
<hr>

4. use "php artisan migrate" command to migrate database
5. use "php artisan db:seed" command to seed the user data.
6. use command to regenerate jwt secret in case its not in .env file : "php artisan jwt:secret"
7. to run the program use the command : "php artisan serve"

<hr>
For authentication use below credentials :
User : admin@admin.com
Password : password
<hr>

APIS : for all apis we have shared postman collection here just need to import it into your postman
File : CompanyApp.postman_collection.json     (in root directory)