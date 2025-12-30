# Auth UI Pro – Mobile-First Laravel Authentication Template

Laravel 12 boilerplate focused on a mobile-first auth UI. Short name: Auth UI Pro.

## Screens & flows

- Sign in, register, forgot password, reset password, verify email, confirm password
- Two-step verification placeholder with OTP input and resend cooldown
- Dashboard + profile scaffold so signed-in views are represented
- Terms, privacy, and support pages with footer links

## UI kit highlights

- Mobile-first, single-column auth layout with premium blurred gradients and elevated cards
- Dark/light theme toggle with persistence and Tailwind tokens for easy theming
- Form components (fields, password reveal, OTP input, alerts, buttons, checkboxes) with loading states
- Accessible labels, aria hints, focus-visible rings, and sensible defaults throughout

## Included

- Laravel 12 + Blade
- Laravel Breeze (auth scaffolding)
- Tailwind CSS + Vite
- UI-only auth flows (no database required)
- Mobile-first auth UI kit components in `resources/views/components/auth/`
- Optional 2FA/OTP placeholder screen: `resources/views/auth/two-factor-challenge.blade.php`

## Requirements

- PHP 8.3+ with extensions: `openssl`, `mbstring`, `fileinfo`, `zip`, `pdo_sqlite`, `sqlite3`
- Node.js + npm

## Run locally

```powershell
# PHP deps (uses local composer.phar in the repo)
php composer.phar install

# Frontend deps
npm install

# Dev server (run in separate terminals)
php artisan serve
npm run dev
```

Auth routes: `/login`, `/register`, `/forgot-password`, `/verify-email`, `/dashboard`.

## UI-only vs Breeze mode

- UI-only demo mode (default): set `AUTH_UI_ONLY=true` in `.env` (no DB required; uses a session-only demo user)
- Breeze mode: set `AUTH_UI_ONLY=false` to use the standard Breeze controllers/middleware (requires real auth setup)

## Docs

Laravel: https://laravel.com/docs
