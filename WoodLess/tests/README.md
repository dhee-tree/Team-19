# Testing
This guide goes over test files, and how to set up the testing environment.
- This does not go over test methods. Please use the sections on https://laravel.com/docs/11.x/testing after reading this.

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
These are tests that test a chain of methods (Such as the process of a user logging in). When you want test the larger functionality of the system, use this folder.
- To create a new feature test file, run `php artisan make:test TestName`

## Unit Tests 
These are tests intended to test a single method (Such as retrieving a model relationship).
- To create a new unit test file, run `php artisan make:test TestName --unit`
- Note that most if not all the tests you create will likely be feature tests.

## File Structure
See below the intended file structure. This applies for both Unit and Feature tests.

- As follows: `tests` > `Feature` or `Unit` > `Folder` > `FileNameTest`
1. `tests` - The folder where tests are created. This is located in the root of WoodLess (You are in it right now!).
2. `Feature` or `Unit` folder - The type of test. Tests are outputted here accordingly when you create them.
3. `Folder` - What is being tested. Group your tests in folders the same way files are grouped in the project. When you create a test, move it into one. 
    - Make new folders when necessary.
    - Example: if you've created a feature test to test a `Controller` you move the test into `tests/Feature/Controllers/`.
4. `FileNameTest` - The name of the test should match the name of the file you are testing, simplified to what's unique, and appended with `Test`. 
    - Example: If we were making a feature test for a `Controller` named `ProductController`, we would name the test `ProductTest` and put it in like so: `tests/Feature/Controllers/ProductTest`.
    - Example: If we were making a unit test for a `Middleware` named `Admin`, we would name the test `AdminTest` and put it in like so: `tests/Feature/Middleware/Admin` folder.


## Running Tests
Now that our testing environment is setup, you are able to run tests.
- To run all tests, run `php artisan test` in your terminal in the WoodLess directory. Laravel automatically knows to use `.env.testing` and will run tests in that environment.

## Additional Information

### Test Format
In your test file, you write your tests in methods. When creating test methods, name them as so:
```
test_thing_does_thing
```
Here are a couple of example snippets from tests used in [Feature/Models/UserTest](./Feature/Models/UserTest.php):
```
/**
* Test if the user can get cards.
*/
public function test_user_model_can_get_cards(): void
{   
    // Create a Card instance
    Card::factory()->create([
        'user_id' => $this->user->id //Same id as the User instance in this test
    ]);

    //Checking we can retrieve the same Card from the database
    $card = $this->user->cards->first();

    //Checking that cards() returns a Card instance
    $this->assertInstanceOf(Card::class, $card);

    //Checking that it is the same Product
    $this->assertEquals($this->user->id, $card->user_id);
}

/**
* Test if the user is not an admin.
*/
public function test_user_model_without_admin_privileges(): void
{   
    //Checking the default access_level value has been set correctly
    $this->assertFalse((bool)($this->user->isAdmin()));
}
```

Test involving a pivot table from [Feature/Models/CategoryTest](./Feature/Models/CategoryTest.php):
```
/**
* Test to see if the model can its products.
*/
public function test_category_model_can_get_products(): void
{
    //Creating a product and attaching it to the category using it's id
    $this->category->products()->attach(Product::factory()->create(['title' => 'test'])->id);

    //Checking we can retrieve the same Product from the database
    $product = $this->category->products()->first();

    //Checking that products() returns a Product instance
    $this->assertInstanceOf(Product::class, $product);
    
    //Checking that it is the same Product using the title
    $this->assertEquals('test', $product->title);
}
```

### Assertions
This will be your main point of knowing what you've tested is working as intended. These are methods that are used to check that the outcome of a test is the expected one. They usually go at certain points or at the end of your test.

- See https://phpunit.de/manual/6.5/en/appendixes.assertions.html as there are too many assertions to go over. Some may need to be imported to your file.
- For assertions for HTTP requests (I.e. Controllers) see https://laravel.com/docs/11.x/http-tests


### Refreshing the Database
If you are running tests involving database interactions, add `use RefreshDatabase` to the start of the test class and import `Illuminate\Foundation\Testing\RefreshDatabase`. This will clear the database after so that it is ready for the next tests.
- See (https://laravel.com/docs/10.x/database-testing#resetting-the-database-after-each-test) for more information.

### Initialization
Adding the method `protected setUp(){}` before your tests Will allow you to initialize any necessary data before running each test in the file:
```
use Illuminate\Foundation\Testing\RefreshDatabase;
class UserTest extends TestCase
{
    //Will refresh the database after each test
    use RefreshDatabase;

    //The model instance to be used for each test
    protected $user;

    /**
     * Set up the user before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        //Creating the User instance
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