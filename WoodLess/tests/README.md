# Testing
This guide goes over test files, and how to set up the testing environment.

## Environment Setup
[`.env.testing`](../.env.testing.example) Is the app environment that is used for testing. We will need to set this up so that we can run tests locally. When you add the `--env=testing` modifier to artisan commands, it will use this file instead.

1. First, copy or rename `.env.testing.example` to `.env.testing`.
2. Generate an app key using `php artisan key:generate --env=testing`.
3. Inside of `.env.testing`, modify lines 12-17 to match the information of a target database different to that of the one in `.env`. We don't want to use the same database as testing is very volatile.
4. Modify lines 31-38 to match the information of an email account to be used by WoodLess for sending emails. 
5. Modify lines 61-62 to match the information of a Stripe public and private key. You will need to setup a [Stripe developer account](https://docs.stripe.com/keys?locale=en-GB) to generate these if you have not been provided any (if you are a developer this it's on our discord).

## Database Setup
1. Ensure your target MySQL server is running, and you have created a database that matches the one specified in `.env.testing`.
2. Go to the WoodLess directory in a terminal. Run `php artisan migrate --env=testing`. This will build tables in the database specified in `.env.testing`.

## Feature Tests
These are tests that test a chain of methods (Such as the process of a user logging in). When you want test the larger functionality of the system, use this folder. Seperate the tests into different files so their purpose is clear when tests are run.
- To create a new feature test file, run `php artisan make:test TestName`

## Unit Tests 
These are tests that test a single or small chain of methods.
- To create a new unit test file, run `php artisan make:test TestName --unit`
- Note that most if not all the tests you create will likely be feature tests.

## Running Tests
Now that our testing environment is setup, you are able to run tests.
- To run all tests, run `php artisan test` in your terminal in the WoodLess directory. Laravel automatically knows to use `.env.testing` and will run tests in that environment.

## Additional Information

### Test Format
When creating test methods, name them as so:
```
test_thing_does_thing
```
Here are a couple of example snippets from tests used in this project:
```
/**
* Test if the user is not an admin.
*/
public function test_user_is_not_admin(): void
{   
    $this->assertFalse((bool)($this->user->isAdmin()));
}

/**
* Test if the user has a basket.
*/
public function test_user_has_basket(): void
{   
    $this->assertNotNull($this->user->basket());
}
```

### Refreshing the Database
If you are running tests involving database interactions, add `use RefreshDatabase` to the start of the test class and import `Illuminate\Foundation\Testing\RefreshDatabase`. This will clear the database after so that it is ready for the next tests.
- See (https://laravel.com/docs/10.x/database-testing#resetting-the-database-after-each-test) for more information.

### Initialization
Adding the method `protected setUp(){}` Will allow you to initialize any necessary data before running your tests:
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

### Testing Stripe Payment
Please see (https://docs.stripe.com/testing).

## Code Coverage
This is how much of WoodLess' code have tests, so you know that our product is a high quality one.
By running `php artisan test --coverage` you will be able to view what has tests as well as the percentage of coverage.
- Note that you will need to install [xDebug](https://xdebug.org/docs/install) to your php installation. Ensure that xDebug is in coverage mode by modifying `php.ini` with something like the following:
```
[XDebug]
zend_extension = xdebug  ; You will likely have this already
xdebug.start_with_request=yes
xdebug.mode = coverage
```