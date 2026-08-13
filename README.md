# Flat-File Hosting Platform

A high-performance, lightweight, multi-tenant multi-site web hosting and CMS engine built in native PHP without database dependencies.

[![License: AGPL v3](https://img.shields.io/badge/License-AGPL_v3-blue.svg)](https://www.gnu.org/licenses/agpl-3.0)
![PHP](https://img.shields.io/badge/PHP-7.4%20%7C%208.x-777BB4?style=flat&logo=php&logoColor=white)
![Architecture](https://img.shields.io/badge/Architecture-Flat--File%20%7C%20Multi--Tenant-orange)

---

## 📋 Overview

**Flat-File Hosting Platform** is a self-contained, multi-tenant multi-site web hosting and lightweight CMS engine. It handles automated tenant provisioning, real-time resource metering (bandwidth and disk usage), access control, and tenant management without relying on database systems.

All platform data—including configurations, accounts, resource quotas, and sessions—is managed via **flat-files** using thread-safe file-locking mechanisms (`flock`) to maintain data integrity under concurrent requests.

---

## ✨ Key Features

* **Multi-Tenant Architecture:** Centralized core (`/c3`) serving multiple isolated tenant environments. Updates to the core instantly apply across all tenant sites.
* **Database-Free (Flat-File):** Serialized array storage utilizing file-locking mechanisms (`flock`) for thread-safe operations in high-concurrency scenarios.
* **Real-Time Resource Metering:**
  * *Bandwidth:* Precise byte-counting per HTTP response.
  * *Disk Usage:* Real-time directory storage calculations.
  * *Automated Quota Enforcement:* Suspends or restricts access upon exceeding allocated limits.
* **Native Brute-Force Defense:** Built-in rate-limiting firewall (`security.php`) that dynamically throttles and blocks suspicious IP addresses based on request frequency.
* **Password Security:** Implements native PHP `password_hash()` (Bcrypt) and `password_verify()` across all administration panels.
* **Built-In File Manager & WYSIWYG Editor:** Fully integrated file browser (upload, rename, move, delete) and TinyMCE visual editor for HTML manipulation.
* **Automated Tenant Provisioning:** Instant site creation via zip template extraction with configurable trial periods (10-minute default / coupon extension support).

---

## 🛠️ System Requirements

* **Web Server:** [Turbo](https://turbo.okzgn.com).
* **PHP Version:** PHP 7.4 or PHP 8.x.
* **Required PHP Extensions:**
  * `php-zip`
  * `php-json`
  * `php-session`
  * `php-mbstring`
  * `php-gd` (optional)

---

## 📂 Directory Structure

**localhost:**
```text
├── #                                   # Wildcard-subdomains sites handler
│   └── @
│       ├── c3/                         # CENTRAL CORE ENGINE
│       │   ├── adapter.php             # Routing & request adapter
│       │   ├── apanel/                 # Tenant Client Admin Panel
│       │   ├── requests/               # Static/Dynamic request handlers
│       │   ├── security/               # Anti-brute-force rate limiter
│       │   └── uses/                   # Sessions, timezone, and utilities
│       │
│       ├── legacy.localhost/           # MASTER SITE (Order Console & Master Admin)
│       │   ├── cfg/docs/               # Master Administration Panels
│       │   └── dynamics.php            # Primary dynamic router
│       │
│       ├── prueba.localhost/           # Hosted Tenant Site 1
│       └── @/                          # Shared assets (CSS/JS)
│
├── @                                   # Main site handler & assets
```

---

## 🚀 Quick Start & Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/okzgn/flat-file-hosting-platform-php.git
   ```

2. **Main Site Server Configuration:**
   * Enter `http://localhost/admin:`.
   * Navigate to `localhost` site root.
   * Configure MIME for empty extension as `text/html; charset=UTF-8`.
   * Configure an Index named `inicio`.
   * Enable `Redirect to HTTPS` (testing SSL certificates).

3. **Wildcard-Subdomains Site Handler Configuration:**
   * Enter `http://localhost/admin:`.
   * Navigate to `localhost` wildcard subdomain.
   * Configure Rewrite for `/` to `/c3/requests.php?site={SITE}&first_site={FIRST_SITE}&dir={DIR}&file={FILE}&type={EXT}`.
   * Configure Rewrite for `/apanel/` to `/c3/apanel/requests.php?site={SITE}&first_site={FIRST_SITE}&dir={DIR}&file={FILE}&type={EXT}&request={REWRITE_COMPLEMENT}&query={FIRST_QUERY}`.
   * Configure Rewrite for `/cfg/` to `/c3/apanel/r/404.php`.
   * Configure Preprocessor for `php` extension to your PHP binary (e.g., `C:\php\php-cgi.exe` or `/usr/bin/php-cgi`).
   * Enable `Redirect to HTTPS` (testing SSL certificates).

4. **Production & Custom Domain Configuration Notes:**
   > 📌 **Important for Production Deployment:**  
   > By default, the codebase references `legacy.localhost` as the master domain for local development and testing. When preparing for production:
   > * Perform an exhaustive global search-and-replace across the entire project for `legacy.localhost` and replace all occurrences with your actual master domain (e.g., `yourdomain.com`).
   > * Ensure your DNS record includes a Wildcard A/AAAA record (`*.yourdomain.com`) pointing to your server's IP address so automated tenant subdomains resolve correctly.

5. **Save Server Configuration & Test It**
  **IMPORTANT:** Note that the Turbo web server root folder must be set to the parent directory of the project's localhost folder.

---

## 📄 License

This project is licensed under the **GNU Affero General Public License v3.0** (AGPL-3.0). See the `LICENSE` file for full details.

Copyright (c) 2019-2026 [OKZGN](https://okzgn.com)
