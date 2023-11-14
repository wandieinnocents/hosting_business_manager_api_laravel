## About Laravel

An api that can enable hosting businesses to manage their in-house information and tracking , periodicaly.
Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Materials
- POS sale section : https://www.youtube.com/watch?v=2OXAZasseaI&list=PLIeKz8l1eVaP4A4rN129dUqKhBAeBvN3z




## Features (APIs)
## Active Modules
- Branches
- Products
  - Add Brand
  - Manage Brand
  - Add Unit
  - Manage Units
  - Add parent Category
  - Manage Parent Categories
  - Add Category
  - Manage Categories
  - Add Product
  - Manage Products
- Sales
- Clients
- Suppliers

## Pending Modules
- Expenses
- Debtors
- Quotations
- Reports
- Purchases
- Calculator

- POS Module (supermarkets Screen kind)

## Tools and Practices
- Laravel swagger documentation

## Creating controllers
php artisan make:controller Api/v1/Packages/PackagesApiController -r
php artisan make:controller Api/v1/ProductCategories/ProductCategoriesApiController -r

## Creating Models
php artisan make:model Package -m
