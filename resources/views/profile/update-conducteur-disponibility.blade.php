@extends('show')

@section('conducteur')
    <x-form-section submit="updateConducteurDisponibility">
        <x-slot name="title">
            {{ __('Conducteur Disponibility') }}
        </x-slot>

        <x-slot name="form">
            <!-- Disponibility -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="disponibility" value="{{ __('Disponibilite') }}" />
                <x-input id="disponibility" type="text" class="mt-1 block w-full" wire:model.defer="state.disponibility" autocomplete="disponibility" />
                <x-input-error for="disponibility" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>

            <x-button wire:loading.attr="disabled" wire:target="photo">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-form-section>
@endsection