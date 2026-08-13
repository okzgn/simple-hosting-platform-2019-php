# Simple Hosting Platform

![PHP](https://img.shields.io/badge/PHP-7.4%20%7C%208.x-777BB4?style=flat&logo=php&logoColor=white)

A high-performance, lightweight, multi-tenant, multi-site web hosting and CMS engine built in native PHP without database dependencies.

---

## 📋 Overview

**Simple Hosting Platform** is a self-contained, multi-tenant, multi-site web hosting and lightweight CMS engine. It handles automated tenant provisioning, real-time resource metering (bandwidth and disk usage), access control, and tenant management without relying on database systems.

All platform data—including configurations, accounts, resource quotas, and sessions—is managed via **flat files** using thread-safe file-locking mechanisms (`flock`) to maintain data integrity under concurrent requests.

---

## 📌 Key Features

* **Multi-Tenant Architecture:** Centralized core (`/c3`) serving multiple isolated tenant environments. Updates to the core instantly apply across all tenant sites.
* **Database-Free (Flat-File):** Serialized array storage utilizing file-locking mechanisms (`flock`) for thread-safe operations in high-concurrency scenarios.
* **Real-Time Resource Metering:**
  * *Bandwidth:* Precise byte-counting per HTTP response.
  * *Disk Usage:* Real-time directory storage calculations.
  * *Automated Quota Enforcement:* Suspends or restricts access upon exceeding allocated limits.
* **Native Brute-Force Defense:** Built-in rate-limiting firewall (`security.php`) that dynamically throttles and blocks suspicious IP addresses based on request frequency.
* **Password Security:** Implements native PHP `password_hash()` (Bcrypt) and `password_verify()` across all administration panels.
* **Built-In File Manager & WYSIWYG Editor:** Fully integrated file browser (navigation, upload, rename, move, delete) and `TinyMCE` visual editor for HTML manipulation (can be replaced with another like `Monaco`).
* **Automated Tenant Provisioning:** Instant site creation via ZIP template extraction with configurable trial periods (10-minute default / coupon extension support).

---

## 🛠️ System Requirements

* **PHP Version:** PHP 7.4 or PHP 8.x.
* **Required PHP Extensions:**
  * `php-zip`
  * `php-json`
  * `php-session`
  * `php-mbstring`
  * `php-gd` (optional)
* **Web Server:** [Turbo](https://turbo.okzgn.com) (included, v2.3.rc3, for Windows & Linux, AMD64).

---

## 📂 Directory Structure

**localhost:**
```text
├── #                                   # Wildcard subdomain sites handler
│   └── @
│       ├── c3/                         # CENTRAL CORE ENGINE
│       │   ├── adapter.php             # Routing & request adapter
│       │   ├── apanel/                 # Tenant client admin panel
│       │   ├── requests/               # Static/Dynamic request handlers
│       │   ├── security/               # Anti-brute-force rate limiter
│       │   └── uses/                   # Sessions, timezone, and utilities
│       │
│       ├── legacy.localhost/           # HOSTING SITE (Admin & Order Console)
│       │   ├── cfg/docs/               # Hosting administration panels
│       │   ├── dynamics.php            # Hosting primary dynamic router
│       │   └── ...                     # Hosting static assets (e.g., editor)
│       │
│       ├── prueba.localhost/           # HOSTED TENANT Site Demo
│       │
│       └── ...                         # Hosting config & cost files (do not edit manually)
│
├── @                                   # MAIN SITE landing page & assets
```
**NOTE:** Folder names like `@` or `#` are Turbo server conventions. You can visit its [documentation](https://turbo.okzgn.com) or check out the [repository](https://github.com/okzgn/turbo-go).

---

## 🚀 Quick Start & Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/okzgn/simple-hosting-platform-2019-php.git
   ```

2. **Run Server:**
   Enter the project directory and execute the Turbo server binary:

   * **On Linux / macOS:**
     ```bash
     cd ./simple-hosting-platform-2019-php/
     chmod +x ./turbo
     ./turbo
     ```
   * **On Windows (Command Prompt / PowerShell):**
     ```cmd
     cd simple-hosting-platform-2019-php
     turbo.exe
     ```

3. **Wildcard Subdomain Sites Handler PHP Configuration:**
   * Open your browser and navigate to the Turbo Admin Panel: `http://localhost/admin:`
   * Navigate to `localhost` and select the wildcard (`*`) subdomain.
   * Configure the Preprocessor for the `php` extension, pointing to your local PHP binary (e.g., `C:\php\php-cgi.exe` or `/usr/bin/php-cgi`).

4. **Save Server Configuration & Test It:**
   * Access the Main Site at `http://localhost/` or the Hosting Site at `http://legacy.localhost/` to place orders.
   * To manage orders, visit `http://legacy.localhost/orders/panel`.
   * To access the master admin panel, visit `http://legacy.localhost/admin/panel`.
   * Default credentials:
     * **User:** `admin`
     * **Password:** `adminpwd`

   > ⚠️ **IMPORTANT:** Change the default credentials (`admin` / `adminpwd`) immediately after logging in for the first time at `http://legacy.localhost/admin/panel`.

   > 💡 **Local Subdomains Note:** Modern browsers automatically resolve `*.localhost` to `127.0.0.1`. If your system does not, add `127.0.0.1 legacy.localhost` to your system's `hosts` file.

   * **NOTE:** The Turbo server root folder must be set to the parent directory of the project's `localhost` folder, usually `simple-hosting-platform-2019-php`.

---

## 🌐 Production & Custom Domain Configuration

By default, the codebase references `legacy.localhost` as the master domain for local development and testing. When preparing for production:

* Perform an exhaustive global search-and-replace across the entire project for `legacy.localhost` and replace all occurrences with your actual master domain (e.g., `yourdomain.com`).
* Ensure your DNS provider includes a Wildcard A/AAAA record (`*.yourdomain.com`) pointing to your server's IP address so automated tenant subdomains resolve correctly.

---

## 📄 License

This project is licensed under the **GNU Affero General Public License v3.0** (AGPL-3.0). See the `LICENSE` file for full details.

Copyright (c) 2019-2026 [OKZGN](https://okzgn.com)
