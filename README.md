# Team and user associations for Filament.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffgreco13/filament-teams.svg?style=flat-square)](https://packagist.org/packages/jeffgreco13/filament-teams)
[![Tests](https://github.com/jeffgreco13/filament-teams/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/jeffgreco13/filament-teams/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffgreco13/filament-teams.svg?style=flat-square)](https://packagist.org/packages/jeffgreco13/filament-teams)

This package is heavily influenced by the great work of Mpociot and Dharrin.

## Installation

Install the package via composer:

```bash
composer require jeffgreco13/filament-teams
```

Publish the config file:

```bash
php artisan vendor:publish --tag="filament-teams-config"
```

Publish the migrations using:

```bash
php artisan vendor:publish --tag="filament-teams-migrations"
```

Adjust all `*_table` settings within the configuration file, as needed, or adjust the migration. Then run your migrations:

```bash
php artisan migrate
```

### User Model

Add the `UserHasTeams` trait to your existing model:

```php
<?php namespace App;

use JeffGreco13\FilamentTeams\Traits\UserHasTeams;

class User extends Model
{
    use UserHasTeams; // Add this trait to your model
}
```

Don't forget to dump composer autoload

```bash
composer dump-autoload
```

## Usage

This package is extensively "borrowed" from the wonderful work of Marcel Pociot and the [Teamwork](https://github.com/mpociot/teamwork) package. You can get a full understanding of the capabilities by reviewing the [Teamwork docs](https://github.com/mpociot/teamwork#readme).

Similar to the `Teamwork` facade, you can access the same methods in the following way:

```php
use JeffGreco13\FilamentTeams\FilamentTeams;

Teamwork::inviteToTeam($email, $team, function ($invite) {
    // Send email to user / let them know that they got invited
});
```

### Custom Models & Resources

You can use your own Team model and resource. After publishing the config, simply update the following settings:

```php
"team_model" => JeffGreco13\FilamentTeams\Models\FilamentTeam::class,
...
"team_resource" => JeffGreco13\FilamentTeams\Resources\FilamentTeamResource::class,
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Jeff Greco](https://github.com/jeffgreco13)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
