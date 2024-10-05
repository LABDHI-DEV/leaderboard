# Leaderboard

<!-- A brief description of your Laravel project. -->

## Getting Started

Follow these instructions to set up and run the project.

### Prerequisites

- PHP >= 8.0
- Composer
- Laravel 10.x
- MySQL

### Installation

1. **Clone the repository**

   ```bash
   	git clone https://github.com/LABDHI-DEV/leaderboard.git
   	cd leaderboard
   	composer install
   	copy .env.example .env
   	php artisan key:generate
   	php artisan migrate
		php artisan db:seed (To seed all seeder)
		php artisan db:seed --class=UserActivitySeeder( This seeder store data again into db (Optional))
		php artisan serve

