# Bangladesh Geocode
Division, District and Upazila data of Bangladesh for Laravel application.
Migration and seeders are ready. Just publish migrations and seeders and then migrate the db and run the seed command.

## Do not hesitate to share your thought, create issue or send pull request.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/devfaysal/laravel-bangladesh-geocode.svg?style=flat-square)](https://packagist.org/packages/devfaysal/laravel-bangladesh-geocode)
[![Build Status](https://img.shields.io/travis/devfaysal/laravel-bangladesh-geocode/master.svg?style=flat-square)](https://travis-ci.org/devfaysal/laravel-bangladesh-geocode)
[![Quality Score](https://img.shields.io/scrutinizer/g/devfaysal/laravel-bangladesh-geocode.svg?style=flat-square)](https://scrutinizer-ci.com/g/devfaysal/laravel-bangladesh-geocode)
[![Total Downloads](https://img.shields.io/packagist/dt/devfaysal/laravel-bangladesh-geocode.svg?style=flat-square)](https://packagist.org/packages/devfaysal/laravel-bangladesh-geocode)

## Laravel Version Compatibility

 Laravel  | Package
:---------|:----------
 5.5.x    | 0.4.x
 5.6.x    | 0.4.x
 5.7.x    | 0.4.x
 5.8.x    | 0.4.x
 6.x.x    | 0.4.x
 7.x.x    | 0.4.x
 8.x.x    | 0.5.x

## Installation

You can install the package via composer:

```bash
composer require devfaysal/laravel-bangladesh-geocode
```

Publish Migration and seeders

```bash
php artisan vendor:publish --provider="Devfaysal\BangladeshGeocode\BangladeshGeocodeServiceProvider"

#If you need to overrride previously published migrationa and seeders
php artisan vendor:publish --provider="Devfaysal\BangladeshGeocode\BangladeshGeocodeServiceProvider" --force

php artisan migrate

composer dump-autoload

php artisan db:seed --class=DivisionSeeder
php artisan db:seed --class=DistrictSeeder
php artisan db:seed --class=UpazilaSeeder

```

## Usage

``` php
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;

$divisions = Division::all();
$districts = District::all();
$upazilas = Upazila::all();

$division = Division::find(1);
$districts = $division->districts;

$district = District::find(1);
$upazilas = $district->upazilas;

//Use any Laravel model functions...
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email devfaysal@gmail.com instead of using the issue tracker.

## Credits

- [Faysal Ahamed](https://github.com/devfaysal)
- [All Contributors](../../contributors)
- Special Thanks to [Nuhil Mehdy](https://github.com/nuhil/bangladesh-geocode). All of the Division, District and Upazila data of this package is from his repo.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
