<p align="center">
    <a href="http://220216407.cs2410-web01pvm.aston.ac.uk/" target="_blank"><img src="public_html/images/logo_plain_cropped.svg" width="350" alt="Woodless">
    </a>
</p>
<p align="center">
    <img alt="GitHub Actions Workflow Status" src="https://img.shields.io/github/actions/workflow/status/dhee-tree/Team-19/tests.yml?logo=github&label=tests&branch=development">
    <img alt="GitHub Actions Workflow Status" src="https://img.shields.io/github/actions/workflow/status/dhee-tree/Team-19/main.yml?logo=github&branch=development">
    <img alt="GitHub Downloads (all assets, all releases)" src="https://img.shields.io/github/downloads/dhee-tree/Team-19/total">
    <img alt="GitHub repo size" src="https://img.shields.io/github/repo-size/dhee-tree/Team-19">
    <img alt="GitHub commit activity (branch)" src="https://img.shields.io/github/commit-activity/t/dhee-tree/Team-19/development">
    <img alt="GitHub last commit (branch)" src="https://img.shields.io/github/last-commit/dhee-tree/Team-19/development">
    <img alt="GitHub License" src="https://img.shields.io/github/license/dhee-tree/Team-19">
</p>

<strong><p align="center">Disclaimer: WoodLess is a fictional service. Orders will not be fufilled. Do not enter personal or sensitive information on Official Deployment.</p></strong> 

#

Developed using Laravel, WoodLess is an E-commerce website intended to facilitate the online transactions and sales of an eco-friendly furniture company. 

It's aim is the distribution of furniture, designed with the environment in mind. This includes the use of sustainable materials, eco-friendly manufacturing processes, and targeting consumers who prioritize environmentally responsible products. 

WoodLess strives to offer a user-friendly experience, enabling users to make safe and easy purchases on a range of available furniture products.

### Official Deployment
As of 26/02/2024, A public deployment of the website is available at: [20216407.cs2410-web01pvm.aston.ac.uk](http://220216407.cs2410-web01pvm.aston.ac.uk/). 

## Features
### User Experience
WoodLess has a complete and in-depth user experience, from login to checkout:
- Fully responsive UI using CSS and Bootstrap
- Authentication and Registration
- Email Verification
- User Account Management
- Navigation of Catalogue
- Search and Filtering
- Store and Modify Products in Basket
- Purchase Products via Checkout
- Track Orders
- Leave Reviews of Product/Service
- Contact Support or Business
- Create Support Tickets
- **Add any other features here**

### Admin Features
WoodLess offers robust administration features, while remaining accessible and user-friendly:
- **Add features here**

### Database Management
WoodLess uses the powerful Eloquent ORM to ensure safe and streamlined database interactions, enabling rapid deployment and full CRUD functionality. For testing, WoodLess comes with built-in products and model factories that can be seeded to a target database.
- For more information, see the guide on [Database](./WoodLess/database).

### Documentation
To make our work as accessible as possible, all models and methods written by the team have proper documenting with PHPDoc and/or commenting. 

## Guide
This project contains guides to speed up development and deployment.
- [Getting Started](#getting-started) - Instructions for deploying WoodLess on your web server.
- [Database](./WoodLess/database) - Instructions and information on WoodLess' database.
- [Testing](./WoodLess/tests) - Instructions and information on testing WoodLess.
- For Laravel or other built-in features, please refer to the [relevant documentation](https://laravel.com/docs/10.x).

## Getting Started
This guide assumes you are familiar with PHP web development environments (such as XAMMP) and have cloned/copied the repository to one. You will also need access to a MySQL server and [Composer](https://getcomposer.org/download/). 

- The [.github](./.github) folder is not neccessary for WoodLess to be functional.

### Environment Setup
The file .env declares the app environment, so it is important to set this up first. 
1. Rename [`.env.example`](./WoodLess/.env.example) in the project root folder to `.env`.
2. In `.env`, modify `APP_URL` (Line 5) to your server's domain name. This can usually be left as `http://localhost` if you are running locally.
3. Inside `.env`, modify lines 12-17 to match the information of your target database. This will be the database that the project will use and connect to.
4. Go to the WoodLess directory in a terminal. Run `composer install` to ensure the project is set up correctly. You may also wish to run `composer update`.
5. Run the command `php artisan key:generate`. This will generate an app key unique to your project installation.

### Database Setup
Before you can run the website, the database needs to be setup.
1. Ensure your target MySQL server is running, and you have created a database that matches the one specifed in `.env`.
2. Go to the WoodLess directory in a terminal. Run `php artisan migrate`. This will build the tables required by the website in your database.
- For additonal database information and commands, including test data, see the guide on [Database](./WoodLess/database).

### Accessing the Website
- Go to the WoodLess directory in a terminal. Run `php artisan serve`. 
- If everything is setup correctly, you will be able to access WoodLess with the provided link in your terminal.

## Contributors
WoodLess was developed by eight students at Aston University, who possess a strong understanding of Web Development, PHP and Laravel.
### Ighomena Odebala
### Lewis Neiland
### Zaakir Mohammad
### Ismaeel Noor 
### Ndumiso Mbangeleli
### Abdulhamid Mustapha
### Umer Mohammed
### Matteo Crozat

## License
WoodLess is open-sourced software licensed under the [MIT Licence](./LICENSE).