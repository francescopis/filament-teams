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
    | The teams table in your database.
    */
    "teams_table" => "teams",
    /*
    |--------------------------------------------------------------------------
    | The team_user assoc. table in your database.
    */
    "team_user_table" => "team_user",
    /*
    |--------------------------------------------------------------------------
    | Set the path to the Filament Resource for your Team model. Change this to something like App\Filament\Resources\TeamResource::class to use your own resource object.
    */
    "team_resource" =>
        JeffGreco13\FilamentTeams\Resources\FilamentTeamResource::class,
    /*
    |--------------------------------------------------------------------------
    | Update the Teams resource navigation icon.
    */
    "team_navigation_icon" => "heroicon-o-user-group",
    /*
    |--------------------------------------------------------------------------
    | When using Teams, the application will fail whenever current_team_id is null. This will find the next team assigned to the user, or abort with error 403 if no team is found. If you set this to false you will need to write your own logic.
    */
    "ensures_a_current_team" => true,

    /*
    |--------------------------------------------------------------------------
    | User Foreign key on Teams's team_user Table (Pivot)
    |--------------------------------------------------------------------------
    */
    "user_foreign_key" => "id",

    /*
    |--------------------------------------------------------------------------
    | Teams Invitations
    |--------------------------------------------------------------------------
    |
    | This is the Team Invite model used by Teams to create correct relations.
    | Update the team if it is in a different namespace.
    |
    */
    "invite_model" => JeffGreco13\FilamentTeams\Models\TeamInvite::class,
    /*
    | The team invitations table in your database.
    */
    "team_invites_table" => "team_invites",
];
