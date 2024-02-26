# Woodless
#### [Setup](README.md#Setup)
#### [Team Members](README.md#team-members)

## Introduction
### About Woodless
Woodless is an E-commerce website that facilitates the online transactions and sales of an eco-friendly furniture company. The aims include a user-friendly experience, information and education, marketing, and promotion, with the primary aim being to enable users to make safe and easy purchases of a range of furniture products available. 

The business domain of the eco-friendly furniture business involves creating and selling furniture that's designed with the environment in mind. This includes using sustainable materials, implementing eco-friendly manufacturing processes, and targeting consumers who prioritize environmentally responsible products. 

The scope of this domain incorporates a range of factors, such as the specific eco-friendly furniture products offered, the sourcing and use of sustainable materials, following the environmental certifications, and efforts to minimize the environmental footprint through initiatives like waste collection and reusability.

### Development
Woodless was developed by eight students at Aston University using Laravel, who possess a strong understanding of PHP and the framework.

#### Official Deployment
As of 26/02/2024, A public deployment of the website is available for anyone to visit at: [20216407.cs2410-web01pvm.aston.ac.uk](20216407.cs2410-web01pvm.aston.ac.uk).

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
- **Add features here as a list**

### Database Management
Woodless uses the powerful Eloquent ORM to ensure safe and streamlined database interactions, enabling rapid deployment on supported environments and enabling full CRUD functionality. For testing, Woodless comes with built-in product and model factories that can be seeded to the target database.
- See Database Readme. 

### Documentation
To make our work as accessible as possible, all models and methods written for Woodless have proper documenting with PHPDoc and/or commenting. 
- For Laravel or other features, please refer to the relevant documentation.

## Setup
### Introduction
This guide assumes you are familiar with PHP web development environments (such as XAMMP) and have cloned/copied the repository to one. You will also need access to a MySQL server and [Composer](https://getcomposer.org/download/).

### Setup the .env file
The file .env declares the app environment, so it is important to set this up first. 
1. Rename [`.env.example`](./WoodLess/.env.example) in the project root folder to `.env`.
2. Inside `.env`, modify lines 12-17 to match the information of your target database. This will be the database that the project will use and connect to.
3. Go to the WoodLess directory in a terminal. Run `composer install` to ensure the project is set up correctly. You may also wish to run `composer update`.
4. Run the command `php artisan key:generate`. This will generate an app key unique to your project installation.

### Setup the Database
Before you can run the website, the project must have a database setup.
1. Ensure your target MySQL server is running, and you have created a database that matches the one specifed in `.env`.
2. Go to the WoodLess directory in a terminal. Run `php artisan migrate`. This will build the tables required to run the website in the database.
- For additonal database information and commands, including test data, see the database readme.

### Accessing the website
1. Go to the WoodLess directory in a terminal. Run `php artisan serve`. This will create a server that you can access the website with. If everything is setup correctly, you will be able to access WoodLess.


## Team Members

### 1. Name: Ighomena Odebala
### 2. Name: Lewis Neiland
### 3. Name: Zaakir Mohammad
### 4. Name: Ismaeel Noor 
### 5. Name: Ndumiso Mbangeleli
### 6. Name: Abdulhamid Mustapha
### 7. Name: Umer Mohammed
### 8. Name: Matteo Crozat