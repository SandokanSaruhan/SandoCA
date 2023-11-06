# SandoCA
SandoCA - Amazon Web Clone
Welcome to SandoCA, an Amazon Web Clone application written in pure PHP and JavaScript. This application allows you to create an e-commerce platform similar to Amazon, with a focus on providing a user-friendly shopping experience. Before getting started, please take a moment to review the following instructions.

Table of Contents
Introduction
Installation
Database Configuration
Admin User Setup
Customization
Features
Credits
1. Introduction
SandoCA is a web application that replicates the core functionalities of Amazon, including user registration, product listings, and a shopping cart. In this improved version, additional features like an admin panel, brand and category management, and advanced product search capabilities have been added.

2. Installation
To get started, follow these steps:

Clone the repository to your web server.

Make sure you have a MySQL database ready for use. You can import the initial database structure from the db.sql file included in this repository.

Update the database connection settings in the dbconnect.php file to match your database credentials.

Ensure that the directory paths in dbconnect.php are correctly set for your server environment.

Navigate to the application's URL in your web browser to start using SandoCA.

3. Database Configuration
The application uses MySQL as its database. You can find the initial database structure in the db.sql file. To import it, use the following command:

sql
Copy code
mysql -u your_username -p your_database_name < db.sql
Make sure to replace your_username with your MySQL username and your_database_name with the name of your database.

4. Admin User Setup
To set up an admin user, follow these steps:

Log in to the application using the default admin credentials (if not already changed by the previous developer):

Username: admin
Password: admin
After logging in, you can navigate to the admin panel.

Create a new admin user or modify the existing admin user to secure your application.

5. Customization
You can further customize SandoCA to suit your specific needs. You can modify the application's appearance, add new features, or extend its functionality as necessary.

6. Features
User Roles: The application has user roles, including admin and normal users.
Admin Panel: Admins have access to the admin panel, where they can manage brands, categories, and users.
Advanced Search: Users can search for products based on popularity, lowest price, and price range.
7. Credits
This project is based on the work of user @ArkaBando. Thank you for your contribution to the open-source community.

Thank you for choosing SandoCA as your Amazon Web Clone. We hope you find this application helpful and are excited to see what you can build with it. 
