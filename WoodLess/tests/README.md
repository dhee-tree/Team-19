# Testing
This guide goes over test files, and how to set up the testing environment.

## Environment Setup
[`.env.testing`](../.env.testing.example) Is the app enviroment that is used for testing. We will need to set this up so that we can run tests locally. When you add the `--env=testing` modifer to artisan commands, it will use this file instead.

1. First, copy or rename `.env.testing.example` to `.env.testing`.
2. Generate an app key using `php artisan key:generate --env=testing`.
3. Inside of `.env.testing`, modify lines 12-17 to match the information of a target database different to that of the one in `.env`. We don't want to use the same database as testing is very volatile.
4. Modify lines 31-48 to match those of an email acco
unt that the website will use.

## Database Setup
1. Ensure your target MySQL server is running, and you have created a database that matches the one specifed in `.env.testing`.
2. Go to the WoodLess directory in a terminal. Run `php artisan migrate --env=testing`. This will build tables in the database specified in `.env.testing`.

## Feature Tests
These are tests that test a chain of methods (Such as the process of a user logging in). When you want test the larger functionality of the system, use this folder. Seperate the tests into different files so their purpose is clear when tests are run.
- To create a new feature test file, run `php artisan make:test TestName`

## Unit Tests 
These are tests that test a single or small chain of methods (such as returning the user's basket).
- To create a new unit test file, run `php artisan make:test TestName --unit`
- In the new file, eplace `use PHPUnit\Framework\TestCase` with `use Tests\TestCase` for additonal testing methods.

## Running Tests
Now that our testing environment is setup, you are able to run tests.
- To run all tests, run `php artisan test` in your terminal in the WoodLess directory. Laravel automatically knows to use `.env.testing` and will run tests in that environment.

## Additonal Setup

### Refreshing the Database
If you are running tests involving database interactions, add `use Illuminate\Foundation\Testing\RefreshDatabase` to the start of the test class. This will clear the database after so that it is ready for the next tests.

### Initialization
Adding the method `protected setUp(){}` Will allow you to initalize any neccessary data before running your tests:
```
use Illuminate\Foundation\Testing\RefreshDatabase;
class UserTest extends TestCase
{
    use RefreshDatabase;
    protected $user;

    /**
     * Set up the user before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    // Additional code...
}
```