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
    | Update the Teams resource navigation details.
    */
    "team_navigation_group" => "Filament Teams",
    "team_navigation_label" => "Teams",
    "team_navigation_icon" => "heroicon-o-user-group",
    /*
    |--------------------------------------------------------------------------
    | When set to true, the association in team_users will be made automatically when the owner is saved. This helps ensure that owners will appear in all relationship methods.
    */
    "sync_owner_as_team_member" => true,

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
    | Path to the invitations Filament widgets
    */
    "invitations_send_widget" =>
        JeffGreco13\FilamentTeams\Widgets\FilamentTeamsSendInvites::class,
    "invitations_manage_widget" =>
        JeffGreco13\FilamentTeams\Widgets\ManageInvites::class,
    /*
    | The team invitations table in your database.
    */
    "team_invites_table" => "team_invites",
];
