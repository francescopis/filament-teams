# Team and user associations for Filament.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffgreco13/filament-teams.svg?style=flat-square)](https://packagist.org/packages/jeffgreco13/filament-teams)
[![Tests](https://github.com/jeffgreco13/filament-teams/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/jeffgreco13/filament-teams/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffgreco13/filament-teams.svg?style=flat-square)](https://packagist.org/packages/jeffgreco13/filament-teams)

This package is heavily influenced by the great work of [Mpociot](https://github.com/mpociot) and requires the best TALL stack admin panel, [Filament](https://filamentadmin.com/).

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

Adjust all `*_table` settings within the configuration file, as needed, or adjust the migration to add new columns. Reminder: if you're adding new columns to the teams table, you will need to create your own resource to add the new columns.
When ready, run your migrations:

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

### User Model & Resource

With the `UserHasTeams` trait added to the User model, you expose many new methods including the `teams()` relationship.
For example, to display a user's teams and the current team name in the resource table, you can add the following columns:

```php
Tables\Columns\BadgeColumn::make("current_team_id")->label(
    "Current team"
)->getStateUsing(fn($record) => $record->currentTeam?->name),
Tables\Columns\TagsColumn::make("teams")->getStateUsing(
    fn($record) => $record
        ->teams()
        ->pluck("name")
        ->toArray()
),
```

You can manage a User's current team and/or team associations with the following form components:

```php
Forms\Components\Select::make("current_team_id")
    ->label("Current team")
    ->options(fn($record) => $record->teams()->pluck("name", "id")),
Forms\Components\BelongsToManyMultiSelect::make("teams")
    ->relationship("teams", "name"),
```

### Custom Models, Resources & Widgets

You can extend any of the models, resources and widgets like so:

```php
use JeffGreco13\FilamentTeams\Resources\FilamentTeamResource;

class TeamResource extends FilamentTeamResource
{
    protected static function getNavigationIcon(): string
    {
        return "heroicon-o-lock-open";
    }

    // You can override any Resource method to use your own instead of those provided by FilamentTeams
    public static function getPages(): array
    {
        return [
            "index" => Pages\ListUsers::route("/"),
            "create" => Pages\CreateUser::route("/create"),
            "edit" => Pages\EditUser::route("/{record}/edit"),
        ];
    }
}
```

Then, simply update the path in your config file to override:

```php
"team_model" => JeffGreco13\FilamentTeams\Models\FilamentTeam::class,
...
"team_resource" => JeffGreco13\FilamentTeams\Resources\FilamentTeamResource::class,
...
"invitations_widget" => JeffGreco13\FilamentTeams\Widgets\::class,
```

### Custom Configurations & Nuances

A few things to be aware of:

1. When a Team is deleted, this change does not cascade to `current_team_id` on the User model.
1. When a User is deleted, this change does not cascade to `owner_id` on the Team model.
1. The `current_team_id` value on the User model is not automatically set in any way. You are responsible for writing your own logic to control this.

#### Middleware

You can add the MustHaveAValidTeam middleware to your Filament config in the 'auth' array after Authenticate if you wish to force a user to have a valid team. The app will abort with error 403 if no valid team is found for the user. It will also attempt to find the next valid associated team for that user and set it as the current team.

You can also add the TeamOwner middleware if you want to limit Filament access to Owners of teams only.

If this doesn't quite fit your need, feel free to write your own middleware and include it here.

```php
"middleware" => [
    "auth" => [
        Authenticate::class,
        \JeffGreco13\FilamentTeams\Middleware\MustHaveAValidTeam::class,
        ...
        \JeffGreco13\FilamentTeams\Middleware\TeamOwner::class,
    ],
    ...
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
