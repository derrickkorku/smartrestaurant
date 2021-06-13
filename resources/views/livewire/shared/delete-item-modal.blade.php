<x-jet-confirmation-modal>
    <x-slot name="title">
        {{ __("Delete Item") }}
    </x-slot>

    <x-slot name="content">
        {{ __("Are you sure you would like to delete this Item?") }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="closeDeleteModal()" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="delete()" wire:loading.attr="disabled">
            {{ __('Delete') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>

