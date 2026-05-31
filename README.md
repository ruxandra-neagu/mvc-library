# Universul Cărților

Aplicație web de tip librărie online dezvoltată cu **Laravel 12** și **MariaDB**. Utilizatorii pot naviga printr-un catalog de cărți, adăuga produse în coș, plasa comenzi și urmări statusul acestora. Platforma include și un panou de administrare pentru urmărirea comenzilor și gestionarea profilului de utilizator.

## Tehnologii

- PHP 8.2 + Laravel 12
- MariaDB (XAMPP)
- Tailwind CSS 3
- Laravel Breeze (autentificare)

## Instalare

```bash
git clone https://github.com/USERNAME/universul-cartilor.git
cd universul-cartilor
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
```

## Baza de date

Se creează o bază de date MariaDB, se configurează credențialele în `.env`, apoi se rulează:

```bash
php artisan migrate
php artisan db:seed --class=BookSeeder
```

## Pornire server

```bash
php artisan serve
```

Aplicația va fi disponibilă la `http://127.0.0.1:8000`.

## Licenta

Framework-ul Laravel este un software open-source licențiat sub [licența MIT](https://opensource.org/licenses/MIT).
