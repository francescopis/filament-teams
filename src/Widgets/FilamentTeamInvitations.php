<?php

namespace JeffGreco13\FilamentTeams\Widgets;

use Filament\Widgets\Widget;
use Filament\Forms;
use JeffGreco13\FilamentTeams\FilamentTeams;
use JeffGreco13\FilamentTeams\Models\TeamInvite;

class FilamentTeamInvitations extends Widget implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $view = "filament-teams::filament.widgets.filament-team-invitations";

    public $currentTeamInvites = [];
    public $email;

    protected function refreshInvites()
    {
        $this->currentTeamInvites = auth()->user()->currentTeam->invites;
    }
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make("email")
                ->label(false)
                ->email()
                ->required(),
        ];
    }

    public function mount()
    {
        $this->refreshInvites();
    }

    public function sendInvite()
    {
        $this->currentTeamInvites->push(
            FilamentTeams::inviteToTeam($this->email)
        );
    }
    public function cancelInvite(TeamInvite $invite)
    {
        FilamentTeams::denyInvite($invite);
        $this->refreshInvites();
    }
}
