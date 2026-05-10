# Mini CRM

> A small CRM API in **Laravel 10** that demonstrates clean role separation between admin and employees, Sanctum-based auth, and validation through custom Form Requests.

## Domain

- **Admins** can manage employees and customers, and assign customers to specific employees.
- **Employees** can add their own customers and log actions on each customer (call, visit, follow-up) along with the result of the action.

## Features

- Role-aware access: admin vs employee
- Customer assignment from admin → employee
- Action logging on customers (call / visit / follow-up) with result tracking
- Sanctum API authentication
- Custom Form Requests for input validation

## Tech stack

- PHP 8.1+ / Laravel 10
- Laravel Sanctum
- MySQL

## Quick start

```bash
git clone https://github.com/khaledtarek54/mini-crm.git
cd mini-crm

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed

php artisan serve
```

## API overview

| Method | Endpoint | Auth | Description |
|--------|----------|------|-------------|
| POST   | `/api/auth/login` | — | Issue Sanctum token |
| POST   | `/api/employees` | admin | Add an employee |
| POST   | `/api/customers` | admin/employee | Add a customer |
| POST   | `/api/customers/{id}/assign` | admin | Assign a customer to an employee |
| POST   | `/api/customers/{id}/actions` | employee | Log an action (call / visit / follow-up) |

## Run the tests

```bash
php artisan test
```

## License

MIT

---

Built by [Khaled Tarek](https://github.com/khaledtarek54) · [LinkedIn](https://www.linkedin.com/in/khaled-tarek-eng)
