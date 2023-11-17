## About Laravel

An api that can enable hosting businesses to manage their in-house information and tracking , periodicaly.
Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Materials
- POS sale section : https://www.youtube.com/watch?v=2OXAZasseaI&list=PLIeKz8l1eVaP4A4rN129dUqKhBAeBvN3z




## Features (APIs)
## Active Modules
- Branches
- Brands
  - Add Brand
  - Manage Brand
- Products
  - Add Unit
  - Manage Units
  - Add parent Category
  - Manage Parent Categories
  - Add Category
  - Manage  Categories
  - Add Product
  - Manage Products

- Suppliers
- Clients
- Sales ( should be done later , after expenses, debtors, purchases, calculator)





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
php artisan make:controller Api/v1/Branches/BranchesApiController -r

## Creating Models
php artisan make:model Package -m
