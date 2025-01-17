# BOARDING HOUSE MANAGEMENT

Boarding House Management system is a system/website used to manage boarding house for both owners and boarders.

## Boarding House Owners

Owners can create an account to show upload their boarding house vacancies for other people to see. They can also track the current occupancies of their boarding house and know which rooms are vacant or not yet filled to capacity. They can also see how long the boarder are staying in their room so that they can easily calculate the fee.

## Customers

Customers/potential boarders can also create an account to see the available boarding houses listed on the website. When they found the one that they like, they can apply for that room and wait for the owner to confirm. They can also easily determine the length of their stay and calculate the due payment accurately.

Note: This is still in development stage, and there are many incomplete parts yet.

### Prerequisites

-   PHP = 8.1.10
-   Composer
-   Node.js and npm
-   A database

### Installation Steps

1. Clone the repository
   in terminal:
   git clone https://github.com/jordimaano/bh-management.git
2. Install PHP Dependencies
   in terminal:
   composer install
3. Set Up Environment Variables
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
4. Set up database
   in terminal:
   php artisan migrate
5. Install nodes dependencies
   in terminal: npm run install
6. Build assets
   in terminal:
   npm run dev
7. Serve the application
   in terminal:
   php artisan serve

### Intallation Errors

When errors occurred during installation, you may:

1. Check for you PHP version, should be 8.1.10
2. Try configuring the env file
3. Setup the database manually for database-related errors
