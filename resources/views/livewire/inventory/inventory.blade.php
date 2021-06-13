<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Inventory
    </h2>
</x-slot>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <x-jet-button wire:click="create()" class="btn btn-primary">
                {{ __('New Inventory') }}
            </x-jet-button>
        </div>
    </div><!-- end of row -->

    <div class="row">
        <div class="col">
            @if ($modal_open)
            @include('livewire.inventory.inventory-modal')
        @endif
        @if ($delete_modal)
            @include('livewire.shared.delete-item-modal')
        @endif
        <livewire:tables.inventory exportable hideable="select" />
        </div>
    </div><!-- end of col -->
</div>
