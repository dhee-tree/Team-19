# Testing
This guide goes over test files, and how to set up the testing environment.

## Environment Setup
[`.env.testing`](../.env.testing.example) Is the app enviroment that is used for testing. We will need to set this up so that we can run tests locally. When you add the `--env=testing` modifer to artisan commands, it will use this file instead.

1. First, copy or rename `.env.testing.example` to `.env.testing`.
2. Generate an app key using `php artisan key:generate --env=testing`.
3. Inside of `.env.testing`, modify lines 12-17 to match the information of a target database different to that of the one in `.env`. We don't want to use the same database as testing is very volatile.
4. Modify lines 31-48 to match those of an email account that the website will use.

## Database Setup
1. Ensure your target MySQL server is running, and you have created a database that matches the one specifed in `.env.testing`.
2. Go to the WoodLess directory in a terminal. Run `php artisan migrate --env=testing`. This will build tables in the database specified in `.env.testing`.

## Running Tests
Now that our testing environment is setup, you are able to run tests.
- To run all tests, run `php artisan test` in your terminal in the WoodLess directory. Laravel automatically knows to use `.env.testing` and will run tests in that environment.