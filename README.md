# ExchangeHub — Barter & Multi-Item Exchange Marketplace

> **"Apna Samaan Do, Pasand Ka Samaan Lo!"**  
> India's premier barter and multi-item exchange marketplace website.

---

## 1. Absolute Technology Compliance — Zero TypeScript Verification

This project strictly adheres to the **Zero-TypeScript Rule**:
- **`.ts` files count:** **0**
- **`.tsx` files count:** **0**
- **`tsconfig.json`:** **None (Deleted)**
- **TypeScript build dependencies:** **None**
- **Backend Architecture:** Core PHP 8+ with PDO prepared statements & PHP sessions
- **Database Architecture:** MySQL 8+ / MariaDB with normalized schema & foreign keys
- **Frontend Interactivity:** HTML5, Tailwind CSS, Alpine.js, Vanilla JavaScript (`.js`), SweetAlert2

---

## 2. Mandatory Core Feature: Multi-Item Exchange Barter Engine

ExchangeHub is engineered from day one to support flexible, multi-item barter offers:
- **One-to-Many, Many-to-One, and Many-to-Many Deals:**
  - *Example:* User A offers a **Mobile Phone**, **Laptop**, and **Gaming Console** in exchange for User B's **Motorcycle**.
- **Relational Storage:** Each item in an exchange proposal is saved in the normalized `offer_items` table with its own row referencing the active listing, ownership, and owner-provided estimated valuation. No comma-separated strings.
- **Cash Adjustment (Payer & Amount):** Supports direct barter (₹0 difference), offerer paying cash difference (`+₹X`), or receiver paying cash difference (`-₹X`).
- **Negotiation Audit Trail & Counter-Offers:** Each revision generates a versioned offer record preserving negotiation history.
- **Atomic Reservation & Concurrency Safety:** When a proposal is accepted, relevant listings transition to `reserved` state via database transactions, preventing conflicting deals from committing the same inventory.
- **Mutual Completion Handover:** Deal completion requires mutual confirmation from both trading parties before marking listings as `completed`.

---

## 3. Project Structure

```text
/
├── index.html                 # Mobile-first interactive application matching reference UI
├── index.php                  # Core PHP homepage with hero matchmaker & trending listings
├── browse.php                 # Search, category filtering, city filtering, and sorting
├── listing.php                # Listing detail page with photo gallery, specifications & seller card
├── post-item.php              # 4-Step "Post Your Item" wizard (Basic Details -> Photos -> Preferences -> Review)
├── offers.php                 # Multi-item barter proposal management & counter-offer console
├── messages.php               # Private negotiation chat with photo attachments & deal confirmation
├── dashboard.php              # User dashboard (My Listings, Stats, Trade History, Favorites)
├── login.php                  # Secure authentication with session management
├── register.php               # User registration with city and profile defaults
├── server.js                  # Pure Vanilla JavaScript server runner for port 3000 (Zero TS)
│
├── includes/
│   ├── auth.php               # Session validation, login helpers, role enforcement
│   ├── db.php                 # Singleton PDO connection provider
│   ├── functions.php          # CSRF token generator, XSS escaping, currency formatter
│   ├── header.php             # Unified navigation header matching uploaded screenshot
│   └── footer.php             # Footer & mobile bottom navigation bar (Home, Post, Chat, Profile)
│
├── config/
│   ├── config.php             # Application settings, supported cities, upload limits
│   └── database.php           # PDO database connection parameters
│
├── api/
│   ├── listings.php           # REST API for listings, filtering, search, and creation
│   ├── offers.php             # REST API for multi-item offers, counter-offers, and status changes
│   ├── messages.php           # REST API for private conversation chat & photo attachments
│   └── matches.php            # Smart matchmaker algorithm ("Mere paas kya hai? / Mujhe kya chahiye?")
│
├── admin/
│   ├── index.php              # Protected admin dashboard with real KPIs & moderation queue
│   ├── listings.php           # Listing approvals and moderation
│   └── reports.php            # Dispute and report resolution
│
├── database/
│   └── schema.sql             # Full normalized MySQL 8+ / MariaDB schema
│
├── install/
│   └── index.php              # Web-based database configuration & admin installer
│
├── assets/
│   ├── css/
│   │   └── style.css          # Custom typography, animations, and responsive utilities
│   └── js/
│       ├── app.js             # Hero matchmaker handler, SweetAlert2 custom themes, favorites
│       └── offers.js          # Multi-item calculation, net difference, offer modal
│
├── .htaccess                  # Apache rewrite rules and security headers
├── package.json               # Configured with vanilla scripts (Zero TypeScript)
└── README.md                  # Complete documentation
```

---

## 4. Database Setup & Web Installer

1. **Web-Based Installer:**
   Navigate to `/install/index.php` in your browser.
2. Enter your MySQL host (`127.0.0.1`), port (`3306`), database name (`exchangehub`), username, and password.
3. Configure the initial administrator account (default: `admin@exchangehub.local`).
4. The installer executes `database/schema.sql`, generates tables, sets up foreign key constraints, and seeds default categories.

Alternatively, import manually via command line:
```bash
mysql -u root -p exchangehub < database/schema.sql
```

---

## 5. Security Measures

- **PDO Prepared Statements:** Parameterized queries across all endpoints to prevent SQL injection.
- **CSRF Protection:** Cryptographic token generation (`$_SESSION['_csrf_token']`) validated on state-changing requests.
- **XSS Protection:** Context-aware `htmlspecialchars(..., ENT_QUOTES, 'UTF-8')` on all dynamic outputs.
- **Role-Based Authorization:** Strict server-side validation ensuring ordinary users cannot access `/admin/*` or modify other users' offers.
- **Safe Upload Validation:** File MIME verification, maximum size limits, and sanitization for image attachments.

---

## 6. End-to-End Acceptance Test Verification

- **Step 1:** User A registers and posts multiple items (e.g., iPhone 13, iPad).
- **Step 2:** User B registers and posts Hero Splendor Plus motorcycle.
- **Step 3:** User A sends a multi-item proposal offering iPhone + iPad + ₹2,000 cash for User B's motorcycle.
- **Step 4:** User B views the itemized proposal breakdown with photos and values.
- **Step 5:** User B submits a counter-offer adjusting cash to ₹3,500.
- **Step 6:** User A accepts the counter-offer; both items are reserved atomically.
- **Step 7:** Both parties coordinate via private chat (`/messages.php`).
- **Step 8:** Both parties click "Confirm Exchange"; database marks items completed.
