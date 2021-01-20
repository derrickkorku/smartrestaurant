<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    Create New Menu Category
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store()">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" wire:model="name" name="name" id="name" class="form-control
                            @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type">Type</label>
                            <select name="type" id="type" wire:model="type"
                                class="form-select @error('type') is-invalid @enderror">
                                <option value="">Select Type</option>
                                <option value="food">Food</option>
                                <option value="drink">Drink</option>
                            </select>
                            @error('type')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="main-dish">
                                Main Dish
                                <input type="checkbox" class="form-check-input @error('is_main_dish') is-invalid @enderror"
                                    wire:model="is_main_dish" id="main-dish">
                                @error('is_main_dish')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </label>
                            <span class="mx-4"></span>
                            <label for="side-dish">
                                Side Dish
                                <input type="checkbox" class="form-check-input @error('is_side_dish') is-invalid @enderror"
                                    wire:model="is_side_dish" id="side-dish">
                            </label>
                            @error('is_side_dish')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="d-grid mt-4">
                            <button class="btn btn-info" type="submit">Add Menu Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-9">
            <div class="card">
                <div class="card-header">
                    Menu Category List
                </div>
                <livewire:tables.menu-category-data-table />
            </div>
        </div>
    </div>
</div>
