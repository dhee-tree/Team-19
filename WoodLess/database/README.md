# Information

## Migrations
Migration files define database tables used for this project.
Any schema changes we want for our database can be modified here so that it'll easily work with version control.
Please review migrations to make sure you are happy with them, each one is currently a table from the design document.

See (https://laravel.com/docs/10.x/migrations)

The default file [create_users_table](./migrations/2014_10_12_000000_create_users_table.php) was modified to fit our design document.
(Idk if this will cause any problems)

## (Local) Database Setup
### Building Database
1. Modify [.env](../.env) to connect to your target database.
2. Open the [WoodLess](../../WoodLess/) folder in terminal, run `php artisan migrate`. This will create the tables in your database.

### Adding Test Data
The file [DatabaseSeeder](./seeders/DatabaseSeeder.php) currently populates tables `users` and `products` with 10 rows of dummy data, so that elements can be tested before real data is added.

Test data is defined by [factories](./factories/). See (https://laravel.com/docs/10.x/eloquent-factories).

1. Open the [WoodLess](../../WoodLess/) folder in terminal 
2. Run `php artisan db:seed` to add (more) data to the database, or `php artisan migrate:refresh --seed` to both clear all tables and add fresh new data.

