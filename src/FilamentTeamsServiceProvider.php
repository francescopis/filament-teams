<?php

namespace JeffGreco13\FilamentTeams;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentTeamsServiceProvider extends PluginServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name("filament-teams")
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration("create_filament_teams_tables");
    }

    protected function getResources(): array
    {
        if (
            config("filament-teams.team_resource") ===
            Resources\FilamentTeamResource::class
        ) {
            return [config("filament-teams.team_resource")];
        } else {
            return [];
        }
    }
    protected function getWidgets(): array
    {
        return [Widgets\FilamentTeamInvitations::class];
    }
}
