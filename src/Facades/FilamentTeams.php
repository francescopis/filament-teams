<?php

namespace JeffGreco13\FilamentTeams\Facades;

class FilamentTeams extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return "filament-teams";
    }
}
