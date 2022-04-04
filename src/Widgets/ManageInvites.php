<?php

namespace JeffGreco13\FilamentTeams\Widgets;

use Filament\Widgets\Widget;
use JeffGreco13\FilamentTeams\FilamentTeams;
use JeffGreco13\FilamentTeams\Models\TeamInvite;

class ManageInvites extends Widget
{
    protected static string $view = "filament-teams::filament.widgets.manage-invites";

    public $currentTeamInvites = [];

    public static function canView(): bool
    {
        return !auth()
            ->user()
            ->invites->isEmpty();
    }

    protected function refreshInvites()
    {
        $this->currentTeamInvites = TeamInvite::whereEmail(
            auth()->user()->email
        )->get();
    }

    public function mount()
    {
        $this->refreshInvites();
    }

    public function acceptInvite(TeamInvite $invite)
    {
        FilamentTeams::acceptInvite($invite);
        $this->refreshInvites();
    }
    public function cancelInvite(TeamInvite $invite)
    {
        FilamentTeams::denyInvite($invite);
        $this->refreshInvites();
    }
}
