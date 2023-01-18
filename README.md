## Build project guide
Do please below step after you checkout the repo

1. Copy content of `.env.example` to `.env` file
2. Config `.env` file to be fit with the environment that using for the project (prefer to use local database with mysql & local server at this time) _ such as: DB_DATABASE, DB_USERNAME, DB_PASSWORD, MIX_APP_URL ..
3. In the root folder of the project, call: `composer install && composer update`, to add the dependency libs
4. Generate the key by command: `php artisan key:generate`
5. Create the database and migrate: `php artisan migrate`
6. Create storage link by command: `php artisan storage:link`
7. Install dependencies of front-end: `npm install`
8. Load back-end helpers functions, run: `composer dump-autoload` 
9. Run the server by command: `php artisan serve` , and test with the browser.
10. Call "npm run watch" to rebuild js

## Create sample data for web
1. (In terminal) Run command: `php artisan db:seed --class=DatabaseSeeder`
2. Refresh website on browser to see the result
