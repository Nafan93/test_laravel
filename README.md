Test Laravel
1. Deploy the Laravel framework (minimum version 8)
2. Make entities (tables): User, Department, Position
A user can be in several departments, but still have only one position (use connections)
3. Implement CRUD
4. The user must be able to upload photos
5. Display data in the table view, you can use ready-made css frameworks, such as Bootstrap, Uikit, TailWind
6. Make the permissions for Admin, Manager, User.
Admin - has all the rights
Manager-can change data, add data, but cannot delete records
User - can only view data
7. Date output format DD.MM.YYYY
8. The progress of work is displayed by commits in the GIT.
9. To demonstrate the result of the work, use one of the popular repositories GitHub, BitBucket, or others.

*******

User Role       Email               Password

Admin           admin@mail.com      12345678

Manager         manager@mail.com    12345678

User            user@mail.com       12345678


******
1. git clone git@github.com:Nafan93/test_laravel.git //clone repository
2. cp .env.example .env nano .env //edit .env file  
3. docker-compose build && docker-compose up -d cd //build and  
4. sudo chmod -R 775 test_laravel && sudo chown -R $USER:$USER test_laravel/ 
5. cd test_laravel/ 
6. composer install 
7. docker compose exec app php artisan key:generay
8. docker-compose exec app php artisan migrate:fresh --seed