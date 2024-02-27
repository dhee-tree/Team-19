<p align="center">
    <a href="http://220216407.cs2410-web01pvm.aston.ac.uk/" target="_blank"><img src="public_html/images/logo_plain.png" width="400" alt="Woodless">
    </a>
</p>
<p align="center">
    <img alt="GitHub Actions Workflow Status" src="https://img.shields.io/github/actions/workflow/status/dhee-tree/Team-19/main.yml">
    <img alt="GitHub Downloads (all assets, all releases)" src="https://img.shields.io/github/downloads/dhee-tree/Team-19/total">
    <img alt="GitHub repo size" src="https://img.shields.io/github/repo-size/dhee-tree/Team-19">
    <img alt="GitHub commit activity (branch)" src="https://img.shields.io/github/commit-activity/t/dhee-tree/Team-19/development">
    <img alt="GitHub last commit (branch)" src="https://img.shields.io/github/last-commit/dhee-tree/Team-19/development">
    <img alt="GitHub License" src="https://img.shields.io/github/license/dhee-tree/Team-19">

</p>

## About Woodless

Developed using Laravel, Woodless is an E-commerce website that facilitates the online transactions and sales of an eco-friendly furniture company. The aims include a user-friendly experience, information and education, marketing, and promotion, with the primary aim being to enable users to make safe and easy purchases of a range of furniture products available. 

The business domain of the eco-friendly furniture business involves creating and selling furniture that's designed with the environment in mind. This includes using sustainable materials, implementing eco-friendly manufacturing processes, and targeting consumers who prioritize environmentally responsible products. 

The scope of this domain incorporates a range of factors, such as the specific eco-friendly furniture products offered, the sourcing and use of sustainable materials, following the environmental certifications, and efforts to minimize the environmental footprint through initiatives like waste collection and reusability.

### Official Deployment
As of 26/02/2024, A public deployment of the website is available for anyone to visit at: [20216407.cs2410-web01pvm.aston.ac.uk](http://220216407.cs2410-web01pvm.aston.ac.uk/).

## Features
### User Experience
Woodless has a complete and in-depth user experience, from login to checkout:
- Fully responsive UI using CSS and Bootstrap
- Register/Login
- Manage user account
- Browse available products and search by filters
- Edit/add products in basket
- Purchase products via checkout
- Leave reviews of product/service
- Contact support or business
- Create support tickets
- **Add any other features here**

### Admin Features
Woodless offers robust administration features, while remaining accessible and user-friendly:
- **Add features here**

### Database Management
Woodless uses the powerful Eloquent ORM to ensure safe and streamlined database interactions, enabling rapid deployment and full CRUD functionality. For testing, Woodless comes with built-in products and model factories that can be seeded to the target database.
- See Database Readme. 

### Documentation
To make our work as accessible as possible, all models and methods written by the team have proper documenting with PHPDoc and/or commenting. 
- For Laravel or other built-in features, please refer to the relevant documentation.

## Setup
This guide assumes you are familiar with PHP web development environments (such as XAMMP) and have cloned/copied the repository to one. You will also need access to a MySQL server and [Composer](https://getcomposer.org/download/).

### .env Setup
The file .env declares the app environment, so it is important to set this up first. 
1. Rename [`.env.example`](./WoodLess/.env.example) in the project root folder to `.env`.
2. Inside `.env`, modify lines 12-17 to match the information of your target database. This will be the database that the project will use and connect to.
3. Go to the WoodLess directory in a terminal. Run `composer install` to ensure the project is set up correctly. You may also wish to run `composer update`.
4. Run the command `php artisan key:generate`. This will generate an app key unique to your project installation.

### Database Setup
Before you can run the website, the database needs to be setup.
1. Ensure your target MySQL server is running, and you have created a database that matches the one specifed in `.env`.
2. Go to the WoodLess directory in a terminal. Run `php artisan migrate`. This will build the tables required to run the website in the database.
- For additonal database information and commands, including test data, see the database readme.

### Accessing the Website
- Go to the WoodLess directory in a terminal. Run `php artisan serve`. 
- If everything is setup correctly, you will be able to access WoodLess with the provided terminal link.

### Additional Information
See below additional information

## Contributors
Woodless was developed by eight students at Aston University, who possess a strong understanding of PHP and Laravel.
### Ighomena Odebala
### Lewis Neiland
### Zaakir Mohammad
### Ismaeel Noor 
### Ndumiso Mbangeleli
### Abdulhamid Mustapha
### Umer Mohammed
### Matteo Crozat