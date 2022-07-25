# Oscar Car Rental App
## _Cars processing_


The APP creates & displays a catalog of cars for renting. In order to upload/create the cars, the app can read JSON & CSV files and saves the different kind of specifications of each car. It is also possible to create & visualize cars via GET/POST requests to the API. The App was created with Vanilla PHP.

## Usage

- To create cars from a CSV or JSON file, POST Request to <host>/<app>/api/v1/upload_file sending a form-data with key => file, value => file to upload.
- To create a single car, POST Request to <host>/<app>/api/v1/create_single sending for example the following format 
__{"License plate":"PJ9273542","Car km":30000,"Location":"Rønde","Car year":2022,"Number of doors":5,"Number of seats":5,"Inside height":2.5,"Inside length":3,"Inside width":2.3,"Car Brand":"Fiat","Car Model":"Panda","Car Type":"Small car","Fuel Type":"Petrol","Transmission":"Manual" }__
- To read all the cars, make a GET request to <host>/<app>/api/v1/upload_file.

## Tech

This APP uses a number of open source projects to work properly:

- [PHP](https://www.php.net/) - Programming language
- [Javascript](https://www.javascript.com/) - Programming language
- [Snyk](https://snyk.io/) - Tool to check the code's security

## Application Structure
__api/__ - Contains the app's API functionality, separated by versions.
__api/v1/__ - Contains the app's endpoints.
__api/v1/services/__ - Contains the app's business logic
__models/__ - Contains the app's models.
__config/__ - Contains the app configuration.
__tests/__ - Contains the app's tests.
__.htaccess__ - File with environment variables & other apache permissions
## Installation

This APP requires composer to run the tests.

Install & run it locally.

```sh
Install a Xampp environment and put clone the project into htdocs or configure your own environment and create a virtualhost for the project. *As the env variables are set in Apache, if you want to use another we server, like  Nginx, you should create a .env file with the variables from .htaccess and install Dotenv to access securely to this variables.
Mount the database.
git clone https://github.com/dbores3/OSCARAPI
Configure the env variables in the .htaccess
cd OSCARAPI
composer install
```

## Dependencies

This APP's testing is currently extended with the following dependencies.
Instructions on how to use them in your own application are linked below.

| Dependency | URL |
| ------ | ------ |
| Guzzle | https://docs.guzzlephp.org/en/stable/ |

127.0.0.1
`