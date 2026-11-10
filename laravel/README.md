# Chirper – Danielius Bauza

Mikroblogų programa, sukurta pagal oficialų Laravel mokomąjį kursą.

## Reikalavimai
PHP 8.2+, Composer, Node.js, Git

## Paleidimas
    git clone https://github.com/danielius-bauza/AtsiskaitomiejiDarbai.git
    cd AtsiskaitomiejiDarbai/laravel
    composer install
    npm install
    copy .env.example .env
    php artisan key:generate
    php artisan migrate
    npm run build
    php artisan serve

Programa veikia adresu http://127.0.0.1:8000
