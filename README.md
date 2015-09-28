# Larciproid
## Laravel City Province ID

Provides cities and provinces data of Indonesia. Use only on Laravel 5.x project.

### Installation

Using composer, run this command from your Laravel's project root directory:

```bash
composer require matriphe/laraciproid:~1.0
```

### Configuration

#### Laravel 5.1

Open `config/app.php` and add this line on autoloaded service providers section.

```php
'providers' => [
	...
	Matriphe\Laraciproid\ServiceProvider::class,
	...
],
```

#### Laravel 5.0

Open `config/app.php` and add this line on autoloaded service providers section.

```php
'providers' => [
        ...
        'Matriphe\Laraciproid\ServiceProvider',
        ...
],
```

### Publish Vendor

```bash
php artisan vendor:publish
```

Or if you want to more specific, and want to force the vendor publishing.

```bash
php artisan vendor:publish --provider="Matriphe\Laraciproid\ServiceProvider" --force
```

This command will add these files to your project:

 * `config/laraciproid.php`, the configuration file containing tables name.
 * `database/migrations/2015_09_28_175100_create_city_province_tables`, the migration file.
 * `database/sql/city.sql`, SQL file for city seed.
 * `database/sql/province.sql`, SQL file for province seed.
 * `database/seeds/LaraciproidSeeder.php`, table seeder file, read the SQL data.
 * `app/Models/City.php`, city model file.
 * `app/Models/Province.php`, province model file.
 
### Run Migration

```bash
php artisan migrate
```

### Run Database Seeder

```bash
php artisan db:seed --class=LaraciproidSeeder
```
You can add this file to your `database/seeds/DatabaseSeeder.php` to make it auto loaded on seeding command.

```php
public function run()
{
    Model::unguard();

    $this->call('LaraciproidSeeder');
}
```

### License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
