# Mini CRM System

This is a Mini CRM system built using Laravel framework. The system allows an admin user to manage employees and customers, assign customers to employees, and allow employees to perform actions on customers (such as calls, visits, or follow-ups) and record the results of these actions.

## Features

- Admin can add employees and customers.
- Admin can assign customers to specific employees.
- Employees can add new customers.
- Employees can perform actions on customers with types (call, visit, or follow-up).
- Employees can record the results of their actions.
- Authentication using Laravel Sanctum.
- Custom form requests for validation.

## Installation Steps

### 1. Clone the repository

```bash
git clone https://github.com/khaledtarek54/mini-crm.git
```

### 2. Set Up Environment Variables

```bash
cp .env.example .env
```

### 3. Install Dependencies

```bash
composer install
npm install
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Seed the Database

```bash
php artisan db:seed
```

### 5. Run the Development Server

```bash
php artisan serve
```

Thanks for your time :saluting_face: 




