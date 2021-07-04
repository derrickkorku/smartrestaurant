<!-- Add New Product Modal -->
<x-jet-dialog-modal>
    <x-slot name="title">
        {{ __('Add/Edit Inventory') }}
    </x-slot>

    <x-slot name="content">
        <form>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                    <div class="mb-4">
                        <label for="item_type" class="block text-gray-700 text-sm font-bold mb-2">Item Type:</label>
                        <select wire:model.defer="item_type"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="item_type">
                            <option value="">Select Item Type</option>
                            <option value="food">Food</option>
                            <option value="drink">Drink</option>
                        </select>
                        @error('item_type') <span class="text-red-500">{{ $message }}</span>@enderror

                    </div>
                    <div class="mb-4">
                        <label for="warehouse_id" class="block text-gray-700 text-sm font-bold mb-2">Warehouse</label>
                        <select wire:model.defer="warehouse_id" id="warehouse_id"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Select warehouse</option>
                            @foreach ($warehouses as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('warehouse_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="menu_id" class="block text-gray-700 text-sm font-bold mb-2">Item</label>
                        <select wire:model.defer="menu_id" id="menu_id"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Select Item</option>
                            @foreach ($menu_items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('menu_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="starting_stock" value="{{ __('Quantity') }}" />
                        <x-jet-input id="starting_stock" type="text" class="mt-1 block w-full" wire:model.defer="starting_stock"
                            placeholder="Starting Stock" />
                        <x-jet-input-error for="starting_stock" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="inventory_date" value="{{ __('Inventory Date') }}" />
                        <x-jet-input id="inventory_date" type="date" class="mt-1 block w-full"
                            wire:model.defer="inventory_date" placeholder="Inventory Date" />
                        <x-jet-input-error for="inventory_date" class="mt-2" />
                    </div>
                </div>
            </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="closeModal()" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click.prevent="store()" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
        </form>
    </x-slot>
</x-jet-dialog-modal>
