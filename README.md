# LV Press [![Build Status](https://travis-ci.org/dadleyy/lvpress.svg?branch=master)](https://travis-ci.org/dadleyy/lvpress)

Laravel and wordpress together.

## Migrations

Instead of running the wordpress installation, this package gives you the laravel-equivalent of it's migrations. From your application root, run

```
php artisan migrate --package="dadleyy/lvpress"
```

and your database will be populated with a full laravel db schema. 
