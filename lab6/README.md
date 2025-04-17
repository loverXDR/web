# MVC Framework - Laboratory Work 6

This repository contains the implementation of laboratory work 6 on MVC frameworks.

## Implementation Details

The following tasks have been implemented:

### 1. Framework Setup
- The framework files were extracted to the root folder of the website
- Database connection was configured in `/project/config/connection.php`

### 2. Controllers, Actions, and Routes
- Created `TestController` with `act1`, `act2`, and `act3` actions accessible via `/test1/`, `/test2/`, and `/test3/` routes
- Created `NumController` with `sum` action to calculate the sum of three numbers: `/nums/:n1/:n2/:n3/`
- Created `UserController` with:
  - `show` action to display user details: `/user/:id/`
  - `info` action to display specific user information: `/user/:id/:key/`
  - `all` action to list all users: `/user/all/`
  - `first` action to show the first N users: `/user/first/:n/`

### 3. MVC Views
- Created `ProductController` with:
  - `show` action to display product details: `/product/:n/`
  - `all` action to list all products: `/products/all/`
- Views were implemented with a consistent styling using CSS
- Layouts were implemented to provide a consistent look and feel across all pages

## How to Run
1. Set up your web server (Apache, Nginx, etc.)
2. Configure the database connection in `/project/config/connection.php`
3. Navigate to the website's URL
4. The application should be accessible via the following URLs:
   - Home: `/hello/`
   - Test routes: `/test1/`, `/test2/`, `/test3/`
   - Numbers calculator: `/nums/10/20/30/` (replace with your own numbers)
   - User routes: `/user/1/`, `/user/1/name/`, `/user/all/`, `/user/first/3/`
   - Product routes: `/product/1/`, `/products/all/` 