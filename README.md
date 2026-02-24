# Inventory Management System

A simple Inventory Management System with accounting journal entries and date-wise financial reporting, built with Laravel.

---

## 🔹 Features

- Add Products with:
  - Name
  - Purchase Price
  - Sell Price
  - Stock
- Make Sales with:
  - Quantity
  - Discount
  - VAT (5%)
  - Partial or Full Payment
- Automatic Journal Entries for every sale:
  - Accounts Receivable
  - Sales Revenue
  - VAT Payable
  - Cash
- Date-wise Financial Report:
  - Total Sell
  - Total Expense
  - Filter by date range
- Atomic transaction support (no partial sale in DB)
- Bootstrap frontend with validation messages
- Deployment-ready

---

## 🔹 Installation

### Requirements

- PHP >= 8.1
- Composer
- MySQL or MariaDB
- Web server (Apache/Nginx/WAMP/XAMPP)

### Steps

1. Clone the repository:

```bash
git clone inventory-system
cd inventory-system
```
2. Install dependencies:

```bash
composer install
```
3. Copy .env.example to .env and configure your database:

```bash
cp .env.example .env
```
4. Edit .env:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory_db
DB_USERNAME=root
DB_PASSWORD=
```
5. Generate application key:

```bash
php artisan key:generate
```
6. Run migrations:

```bash
php artisan migrate
```
7. Serve the application:

```bash
php artisan serve
```
### Usage
## Product Management

- Go to / (home page)
- Add products with Name, Purchase Price, Sell Price, Stock
- View existing products

## Make Sale

- Click Make Sale button
- Select product, enter quantity, discount, and paid amount
- Sale is saved, stock reduced, and journal entries automatically created

## Financial Report

- Click Report button
- Select date range to filter sales

## Journal Entries

- Click Journal Entries button
- View all debit/credit entries generated automatically for sales

### Example Sale Calculation

- Product Sell Price: 200 TK
- Quantity Sold: 10
- Discount: 50 TK
- VAT: 5%

## Calculation:

- Gross Sale: 10 × 200 = 2000 TK
- After Discount: 2000 - 50 = 1950 TK
- VAT: 1950 × 5% = 97.5 TK
- Total Amount: 1950 + 97.5 = 2047.5 TK
- Customer Paid: 1000 TK → Due = 1047.5 TK
