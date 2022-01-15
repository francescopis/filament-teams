<?php

namespace JeffGreco13\FilamentTeams\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

trait FilamentTeamTrait
{
    /**

    Forces the Owner to also be sync'd as a team member.

    **/
    public static function bootFilamentTeamTrait()
    {
        static::saving(function (Model $team) {
            // Only if the config is true and the user isn't already on the team.
            if (
                config("filament-teams.sync_owner_as_team_member") &&
                !$team->hasUser($team->owner)
            ) {
                $team->users()->syncWithoutDetaching($team->owner_id);
            }
        });
    }
    /**
     * One-to-Many relation with the invite model.
     * @return mixed
     */
    public function invites()
    {
        return $this->hasMany(
            config("filament-teams.invite_model"),
            "team_id",
            "id"
        );
    }

    /**
     * Many-to-Many relations with the user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(
            config("filament-teams.user_model"),
            config("filament-teams.team_user_table"),
            "team_id",
            "user_id"
        )->withTimestamps();
    }

    /**
     * Has-One relation with the user model.
     * This indicates the owner of the team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function owner()
    {
        $userModel = config("filament-teams.user_model");
        $userKeyName = (new $userModel())->getKeyName();

        return $this->belongsTo($userModel, "owner_id", $userKeyName);
    }

    /**
     * Helper function to determine if a user is part
     * of this team.
     *
     * @param Model $user
     * @return bool
     */
    public function hasUser(Model $user)
    {
        return $this->users()
            ->where($user->getKeyName(), "=", $user->getKey())
            ->first()
            ? true
            : false;
    }
}
