<div>
    <x-filament::card>

        <div>
            <form wire:submit.prevent="sendInvite">
                {{ $this->form }}

                <x-filament::button type="submit">
                    Send
                </x-filament::button>
            </form>
        </div>
        <div class="divide-y">
            @forelse ($currentTeamInvites as $invite)
                <div class="flex justify-between py-3 px-5">
                    <div>
                        <p>{{$invite->email}}</p>
                        <p class="text-sm text-gray-500">{{$invite->updated_at->diffForHumans()}}</p>
                    </div>
                    <button type="button" wire:click="cancelInvite({{$invite->id}})">
                        <x-heroicon-o-x class="w-4 text-danger-500" />
                    </button>
                </div>
            @empty
            @endforelse
        </div>

    </x-filament::card>
</div>
