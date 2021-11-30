# Vue JS

## Built With

- [Vue.js](https://vuejs.org/)
- [Laravel](https://laravel.com)
- [Bootstrap](https://getbootstrap.com)

## Installation

1. Clone the repo
   ```sh
   git clone https://github.com/rdhhauzan/Sistem-data-pendidik.git
   ```
2. Move to laravel Directory
   ```sh
   cd laravel
   ```
3. Run this code
   ```sh
   composer install
   ```
   ```sh
   php artisan migrate --seed
   ```
   ```sh
   php artisan key:generate
   ```
4. After That, Move to Vue JS Directory
   ```sh
   cd vuejs
   ```
5. Run this code
   ```sh
   npm install
   ```

## Run The Project

    Make Sure you already done the installation

1. Move to laravel directory and run the server
   ```sh
   cd laravel
   ```
   ```sh
   php artisan serve
   ```
2. Move Vue JS directory and run the server
   ```sh
   cd vuejs
   ```
   ```sh
   npm run serve
   ```

## Notes

    ### Make sure you run the laravel with 8000 port, and Vue JS on 8080 Port
    ### You Need you run the laravel and vue js server at the same time for run the project

See [Configuration Reference](https://cli.vuejs.org/config/).
