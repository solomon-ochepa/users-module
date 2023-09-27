# users-module
Laravel Users module

## Installation
```
composer require solomon-ochepa/user-module
```

### Enable the module
```
php artisan module:enable
```

### Run the artisan migration command
```
php artisan migrate
```

## Required
- nwidart/laravel-modules - https://nwidart.com/laravel-modules/v6/introduction

## Update composer.json
Add the following property to composer.json
```json
"Modules\\": "Modules/"
```
  ```json
  "autoload": {
    "psr-4": {
      "App\\": "app/",
      "Database\\Factories\\": "database/factories/",
      "Database\\Seeders\\": "database/seeders/",
      "Modules\\": "Modules/"
    }
  }
  ```

  ## Update composer autoload
  ```
  composer dumpautoload
  ```

## Recommended
- Replace `/config/modules.php` with - https://drive.google.com/file/d/1y0RdfQ0LJ_12yxN5qHrZvIQqZJgWJhrd/view?usp=sharing
- Replace `/stubs/nwidart-stubs` with - https://drive.google.com/file/d/1-FuBcvv2JJtNBjVJIEW9jMh6wS-DJhJW/view?usp=sharing
---
