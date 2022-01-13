<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Auth / User configs
    |--------------------------------------------------------------------------
    | This is the Auth model used by Filament Teams.
    */
    "user_model" => config(
        "auth.providers.users.model",
        App\Models\User::class
    ),
    /*
    |--------------------------------------------------------------------------
    | The users table in your database.
    */
    "users_table" => "users",

    /*
    |--------------------------------------------------------------------------
    | Teams configurations
    |--------------------------------------------------------------------------
    | The path to your Team model. Update this to extend or override the Team model.
    */
    "team_model" => JeffGreco13\FilamentTeams\Models\FilamentTeam::class,

    /*
    |--------------------------------------------------------------------------
    | Set the path to the Filament Resource for your Team model. Change this to something like App\Filament\Resources\TeamResource::class to use your own resource object.
    */
    "team_resource" => App\Filament\Resources\TeamResource::class,
    "team_navigation_icon" => "heroicon-o-user-group",

    /*
    |--------------------------------------------------------------------------
    | Teams teams Table
    |--------------------------------------------------------------------------
    |
    | This is the teams table name used by Teams to save teams to the database.
    |
    */
    "teams_table" => "teams",

    /*
    |--------------------------------------------------------------------------
    | Teams team_user Table
    |--------------------------------------------------------------------------
    |
    | This is the team_user table used by Teams to save assigned teams to the
    | database.
    |
    */
    "team_user_table" => "team_user",

    /*
    |--------------------------------------------------------------------------
    | User Foreign key on Teams's team_user Table (Pivot)
    |--------------------------------------------------------------------------
    */
    "user_foreign_key" => "id",

    /*
    |--------------------------------------------------------------------------
    | Teams Team Invite Model
    |--------------------------------------------------------------------------
    |
    | This is the Team Invite model used by Teams to create correct relations.
    | Update the team if it is in a different namespace.
    |
    */
    "invite_model" => JeffGreco13\FilamentTeams\Models\TeamInvite::class,

    /*
    |--------------------------------------------------------------------------
    | Teams team invites Table
    |--------------------------------------------------------------------------
    |
    | This is the team invites table name used by Teams to save sent/pending
    | invitation into teams to the database.
    |
    */
    "team_invites_table" => "team_invites",
];
