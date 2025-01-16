# Laravel + Lunar + Meilisearch
Example/testing e-commerce application using [Laravel Scout](https://laravel.com/docs/11.x/scout), [Meilisearch](https://www.meilisearch.com/with/laravel), and [Lunar](https://lunarphp.io/).

## Setup With Docker Compose & Traefik
### Installation
1. Create a standalone container for [Traefik](https://doc.traefik.io/traefik/getting-started/quick-start/) (within a directory outside of the Laravel project, Ex. `/projects/traefik/docker-compose.yml`)
    - Clone/reference this [example implementation](https://github.com/connorabbas/traefik-docker-compose/blob/master/docker-compose.yml).
    - Spin up the container
        ```
        docker compose up -d
        ```

2.  Clone or download the project
    ```
    git clone https://github.com/connorabbas/ecommerce.git
    ```

3.  Setup `.env`
    ```
    cp .env.example .env
    ```
    If you have other sail services running locally, adjust values as needed to avoid conflicting ports:
    ```
    # Ex. Update ports to different values
    APP_PORT=8001
    VITE_PORT=5174
    FORWARD_DB_PORT=5433
    FORWARD_MEILISEARCH_PORT=7701
    ```

4.  Build the Laravel app container using one of the following techniques:
    - Build manually using docker compose CLI
    - Use [Laravel Sail](https://laravel.com/docs/master/sail)
    - Build as a [VS Code Dev Container](https://code.visualstudio.com/docs/devcontainers/tutorial) using the `Dev Containers: Reopen in Container` command

5. Download vendor packages
    ```
    composer install
    ```
    ```
    npm i
    npm run build
    ```

6. Generate app key
    ```
    php artisan key:generate
    ```

7. Setup Lunar admin
    ```
    php artisan lunar:install
    ```

8. Run database migrations and optionally seed data
    ```
    php artisan migrate
    ```
    ```
    php artisan db:seed
    ```

9. Link public storage disk for images
    ```
    php artisan storage:link
    ```

### Services
Laravel application: http://ecommerce.localhost/
Meilisearch dashboard: http://meilisearch.ecommerce.localhost/