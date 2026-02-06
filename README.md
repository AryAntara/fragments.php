
<div align="center">
  <h1>Fragments<span>.</span></h1>
  <p><strong>PHP, without the magic.</strong></p>
  <p>Fragments is a minimalist PHP framework focused on explicit execution, predictable performance, and zero hidden behavior.</p>
</div>

---

## Philosophy

Most modern PHP frameworks rely on heavy "magic"—service containers, dependency injection via reflection, global state, and complex lifecycle hooks. While convenient, this often makes code hard to reason about and debug.

**Fragments takes the opposite approach:**
*   **Explicit over Implicit**: If your code uses a database, you declare it. If it needs a user context, you inject it.
*   **No Service Container**: Dependencies are manually wired or passed via explicit Contexts.
*   **No Reflection**: Code is statically analyzable and extremely fast.
*   **Pay for what you use**: Core logic only runs what you specifically define in your route's `uses()` clause.

## Getting Started

### Prerequisites
*   PHP 8.2 or higher
*   Composer (optional, for future dependencies)

### Installation

1.  Clone the repository:
    ```bash
    git clone https://github.com/aryantara/fragments-php.git
    cd fragments-php
    ```

2.  Start the development server:
    ```bash
    ./scripts/start.sh
    ```
    This will serve the application at `http://localhost:8000`.

## Architecture Overview

Overview of the request lifecycle:

1.  **Entry Point** (`public/index.php`): Loads the dispatcher and defines routes.
2.  **Dispatcher**: Matches the incoming request (Method + Path) against defined routes.
3.  **Fragments**: Small units of logic (Database, HTTP, Auth) that are "booted" only when needed.
4.  **Context**: A strongly-typed state object (`ContextInterface`) that carries dependencies and request data through the execution.
5.  **Handler**: The final function that executes your business logic and returns a response.

## Usage

### Directory Structure
*   `Fragments/`: Core framework code.
*   `app/Features/`: Your application logic, organized by feature (Vertical Slice Architecture).
*   `public/`: Web server entry point.

### Defining Routes

Routes are defined using `RouterFactory`. You explicitly declare which **Context** the route uses and which **Fragments** it requires.

Example from `app/Features/User/UserRoutes.php`:

```php
use Fragments\Factories\RouterFactory;
use Fragments\Parts\FragmentFactory;
use App\Features\User\UserContext;

$get_user = RouterFactory::get(
    '/user', 
    function (UserContext $ctx) {
        // Dependencies are fully typed and available on the context
        $service = $ctx?->service;
        $user = $service->getUserById(1);
        
        return $ctx->res->json((array) $user);
    }
)
    // 1. Define the Context class to bind
    ->useCtx(UserContext::class)
    // 2. Explicitly load required fragments
    ->uses(
        FragmentFactory::response(),
        FragmentFactory::database(),
        // Boot custom feature fragments
        ...FragmentFactory::boot('user')
    );
```

### Creating a Feature

1.  **Create a Context**: Extend `Context` to define what data your feature needs.
2.  **Create Fragments**: Implement `FragmentInterface` to hook into the `boot()` process and populate the context.
3.  **Define Routes**: Map URLs to your handlers using the constructs above.

## Todo

### Fragments 
- [x] Add Custom Context
- [ ] Add Error Handling Fragment
- [ ] Add Logging Fragment
- [ ] Add Configuration Fragment
- [ ] Add Templating Fragment
- [ ] Add more Database support (NoSQL, ORM, etc)
- [ ] Add Caching Fragment (Redis, Memcached, etc)
- [ ] Add Authentication Fragment (JWT, OAuth, etc)
- [ ] Add Validation Fragment (Input validation, Sanitization, etc)
- [ ] Add Rate Limiting Fragment
- [ ] Add Unit and Integration Tests
- [ ] Support for composer (Custom Fragment, the name should be like "FragmentExtensions")

### Core
- [ ] Create Default repository methods and make it more efficient
- [ ] Add Middleware support
- [x] Add more HTTP Methods (PUT, DELETE, PATCH, etc)
- [ ] Add Unit Tests
- [ ] Improve Request object if it's POST (JSON, FORM_DATA, and Multipart support)
- [ ] Improve Response object (Headers, Status Codes, etc)
- [x] Improve Documentation and Examples
- [ ] Create a Website for the Framework
