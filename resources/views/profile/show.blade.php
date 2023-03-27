<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2> -->

        @if (Auth::user()->role == "conducteur")
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile Conducteur') }}
            </h2>
            
            <form action="{{ route('activate.account')}}" method="post">
                @csrf
                <button type="submit" id="ActivateAccountButton">Activer mon compte</button>
            </form>
        @endif

        @if (Auth::user()->role == "client")
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile Client') }}
            </h2>
        @endif

        @if (Auth::user()->role == "administrateur")
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile Administrateur') }}
            </h2>
        @endif
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Auth::user()->role == "conducteur")
                <div class="mt-10 sm:mt-0">
                    <h2>Disponibilite</h2>
                    <form method="POST" action="{{ route('changeDisponibility') }}">
                        @csrf
                        <x-label for="disponibility" value="{{ __('Disponibilite') }}" />
                        <select id="disponibility" name="disponibility">
                        <option value="">-------</option>
                            <option value="1">disponible</option>
                            <option value="0">non disponible</option>
                        </select>
                        <button type="submit">changer</button>
                    </form>
                    <!-- @if(isset($disponibility))
                    <div>
                        @if($disponibility->disponibility == "0")
                        <h4>actuellement vous etes <strong>non disponible</strong> </h4>
                        @endif

                        @if($disponibility->disponibility == "1")
                        <h4>actuellement vous etes <strong>disponible</strong> </h4>
                        @endif
                    </div>
                    @endif -->
                </div>


                <x-section-border />
            @endif

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <!-- <x-section-border /> -->

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
