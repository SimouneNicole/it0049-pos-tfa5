# POS Foundations (Laravel)

A clean, minimalist Point of Sale (POS) foundation rebuilt in Laravel for **IT0049 (Web System Technologies) - Technical Formative Assessment 5 (TFA5)**. This project establishes the core application architecture, explicit routing, shared layout templating with a Liquid Glass design system, and static datasets for customer and staff user accounts.

- **GitHub Repository**: [SimouneNicole/it0049-pos-tfa5](https://github.com/SimouneNicole/it0049-pos-tfa5)
- **Live Deployment**: [http://it0049-tfa5.freehosting.dev/](http://it0049-tfa5.freehosting.dev/)

---

## System Requirements

- **PHP**: 8.2 or higher (configured with `pdo_sqlite`, `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`)
- **Composer**: 2.0 or higher
- **Web Server**: Apache / Nginx / PHP built-in server

---

## Installation & Setup

1. **Clone the repository**:
   ```bash
   git clone https://github.com/SimouneNicole/it0049-pos-tfa5.git
   cd it0049-pos-tfa5
   ```

2. **Install Composer dependencies**:
   ```bash
   composer install
   ```

3. **Configure Environment**:
   Copy `.env.example` to `.env` and generate an application encryption key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Prepare Database & Seeds**:
   ```bash
   touch database/database.sqlite
   php artisan migrate:fresh --seed
   ```

5. **Start the Development Server**:
   ```bash
   php artisan serve --port 8080
   ```
   Open [http://localhost:8080](http://localhost:8080) in your browser.

---

## Application Routes

| Method | Route | Controller Action | Description |
|---|---|---|---|
| `GET` | `/` | `\App\Http\Controllers\PageController@home` | Overview landing page with mineral glass lens hero |
| `GET` | `/about` | `\App\Http\Controllers\PageController@about` | System architecture and platform description |
| `GET` | `/customers` | `\App\Http\Controllers\CustomerController@index` | Customer accounts listing (6 records) |
| `GET` | `/users` | `\App\Http\Controllers\UserController@index` | Staff user accounts directory with roles (6 records) |

---

## Design System

The interface uses the **Liquid Glass** aesthetic:
- **Floating Navigation Capsule**: Semi-translucent pill navigation bar (`.nav-capsule`) with backdrop blur and active-route highlighting.
- **Glass Mineral Lens**: Multi-layered circular specular highlight and ambient glow on the landing overview.
- **Translucent Data Containers**: Responsive glass card containers (`.glass-table-container`) housing tabular customer and staff directories.
- **Palette**: Mineral canvas (`#EFF4F7`), ink typography (`#17212B`), muted labels (`#5F6C78`), and subtle forest accent (`#3D7068`).

---

## Automated Testing

Run the feature test suite using PHPUnit:
```bash
php artisan test
```

Verification covers:
- Landing page HTTP 200 and visual landmark elements
- About page HTTP 200 and architectural statements
- Customer directory HTTP 200 and static data rendering
- User directory HTTP 200 and staff records rendering
- Undefined routes returning standard HTTP 404 responses

---

## Database Artifacts

In compliance with laboratory submission requirements:
- **Migrations**: `database/migrations/` defining `customers` and `staff_users` tables.
- **Seeders**: `database/seeders/CustomerSeeder.php` and `UserSeeder.php` pre-populating all 6 customer and 6 staff records.
- **SQL Export**: `database/schema_export.sql` providing raw DDL table structures and DML data insertion statements.

---

## InfinityFree Deployment

This project includes production packaging and automated deployment scripts:
1. `build-infinityfree-zip.sh`: Packages application code, optimized production dependencies (`composer install --no-dev`), dual-mirrored CSS assets, and pre-seeded SQLite database into `it0049-pos-tfa5-infinityfree.zip`.
2. `extract.php`: Self-extracting unpacking script that deploys the archive on InfinityFree shared hosting (`/htdocs`), sets storage permissions, and self-cleans.
3. `deploy-infinityfree.sh`: Automated FTP deployment script communicating with `ftpupload.net`.

---

## License

This project is open-source software licensed under the [MIT License](LICENSE).
