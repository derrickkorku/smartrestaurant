<x-jet-button wire:click="edit({{ $model->id }})">{{ __('Edit') }}</x-jet-button>
<x-jet-danger-button wire:click="confirmDelete({{ $model->id }})">{{ __('Delete') }}
</x-jet-danger-button>
