<?php

namespace JeffGreco13\FilamentTeams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use JeffGreco13\FilamentTeams\Traits\FilamentTeamTrait;

class FilamentTeam extends Model
{
    use FilamentTeamTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * @var array
     */
    protected $fillable = ["name", "owner_id"];

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config("filament-teams.teams_table");
    }
}
