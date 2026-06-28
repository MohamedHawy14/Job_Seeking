#  Job Seeking Platform

A sleek, modern, and high-performance job board platform built with **Laravel**. This project moves away from traditional monolithic controller structures, implementing **Clean Architecture** and SOLID design principles heavily inspired by enterprise environments like `.NET Core`.

---

##  Key Features

* **Full Localization (Multi-language):** Dynamic English & Arabic support. The application automatically detects the current locale to seamlessly handle text translation and layout directions (**RTL / LTR**).
* **Thin Controllers:** Business and core application logic are completely decoupled from controllers and abstracted into a dedicated Service Layer.
* **Complete Job Management (CRUD):**
  * **Employers:** Can fully create, read, update, and delete (CRUD) only their own job listings.
  * **Job Seekers:** Can browse jobs, use advanced filter queries (by Tags), and search listings smoothly via integrated Pagination.
* **Modern UI/UX Design:** Refreshed with a contemporary **Sky Blue / Indigo** theme, clean shadows (`shadow-sm/md/lg`), smooth borders (`rounded-xl`), and optimized typography using **Inter** (for English) and **Cairo** (for Arabic) Google fonts.

---

##  Architecture & Advanced Patterns

To ensure high maintainability, strict scalability, and seamless testability, the project implements the following architectural patterns:

### 1. Service Layer & Dependency Injection (DI)
All database interactions, session modifications, and file operations are extracted into specific Services that implement loose coupling via Interfaces (Contracts). These are injected directly into the controller constructors using Laravel's IoC Service Container:
* `ListingServiceInterface` $\rightarrow$ `ListingService`
* `AuthServiceInterface` $\rightarrow$ `AuthService`

### 2. The Observer Pattern (Single Responsibility)
To respect the **Single Responsibility Principle (SRP)**, file management is entirely offloaded from both the Controller and Service layers. A dedicated `ListingObserver` actively listens to Eloquent Model Events:
* **`updating` event:** Automatically intercepts the cycle if a new logo is uploaded, instantly deleting the redundant old logo from disk.
* **`deleted` event:** When a listing is removed, it automatically deletes its associated files from the storage and cleans up the directory if it becomes empty, preventing server file accumulation ("orphan files").

### 3. Advanced Request Validation
Input parsing, data sanitization, and basic authorization checks are abstracted into dedicated Form Request classes (`Listingstoreandupdate`, `Login`, `Register`), protecting the Service layer from receiving malformed input data.

---

##  Key Directory Structure

```text
app/
├── Contracts/              # Interfaces (Architectural Contracts)
│   ├── AuthServiceInterface.php
│   └── ListingServiceInterface.php
├── Services/               # Concrete Implementations of Business Logic
│   ├── AuthService.php
│   └── ListingService.php
├── Observers/              # Model Observers tracking file cleanup pipelines
│   └── ListingObserver.php
├── Http/
│   ├── Controllers/        # Light, decoupled Thin Controllers
│   └── Requests/           # Strict Form Input Validation Rules
└── Providers/
    └── AppServiceProvider.php  # Binding Interfaces to Services (AddScoped Equivalent)
