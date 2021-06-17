<div class="container-fluid card">
    <div class="card-body">
        <div class="row mb-4 justify-items-center mx-auto">
            @if (Auth::user()->role == 'waiter' || Auth::user()->role == 'admin')
                <div class="col-sm-4 mb-2 d-grid">
                    <button type="button" class="btn btn-danger btn-lg" wire:click="changeView('food')">View Food Menu</button>
                </div><!-- end of col -->
            @endif

            @if (Auth::user()->role == 'bar' || Auth::user()->role == 'admin')
                <div class="col-sm-4 mb-2 d-grid">
                    <button type="button" class="btn btn-info btn-lg" wire:click="changeView('drink')">View Drinks Menu</button>
                </div>
            @endif

            <div class="col-sm-4 mb-2 d-grid">
                <button type="button" class="btn btn-success btn-lg" wire:click="changeView('cart')">View Cart
                    (Cart({{ $cart_count }}))</button>
            </div>
        </div><!-- end of row -->
        <div class="row" wire:init="setCartCount()">
            <div class="col">
                @if ($active_view == 'food')
                <div class="card border border-danger">
                    <div class="card-header">
                        Take Food Order
                    </div>
                    <div class="card-body">
                        <div class="accordion accordion-flush" id="accordionFood">
                            @foreach ($foods as $food)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading- {{ $food->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $food->id }}" aria-expanded="true"
                                        aria-controls="collapse-{{ $food->id }}">
                                        {{ $food->name }}
                                    </button>
                                </h2>
                                <div id="collapse-{{ $food->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading-{{ $food->id }}">
                                    <div class="row accordion-body g-3">
                                        @foreach ($food->menu as $menu)
                                        @if ($food->is_main_dish)
                                        <div class="accordion accordion-flush" id="accordionMainDish">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading-menu{{ $menu->id }}">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapse-menu{{ $menu->id }}" aria-expanded="true"
                                                        aria-controls="collapse-menu{{ $menu->id }}">
                                                        {{ $menu->name }} - <strong><em>GHS</em></strong>
                                                        {{ $menu->price }}
                                                    </button>
                                                </h2>
                                                <div id="collapse-menu{{ $menu->id }}" class="accordion-collapse collapse"
                                                    aria-labelledby="heading-menu{{ $menu->id }}"
                                                    data-bs-parent="#accordionMainDish">
                                                    <div class="accordion-body">
                                                        <ul class="list-unstyled">
                                                            @foreach ($side_dish as $sd)
                                                            <li class="d-grid my-2">
                                                                <a href="#" class="text-decoration-none text-dark" wire:click="addOrder({{ $menu }}, 1, {{ $sd }})">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            {{ $sd->name }} - <strong><em>GHS</em></strong>
                                                                    {{ $menu->price }}
                                                                        </div>
                                                                    </div>
                                                                 </a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <ul class="list-unstyled d-grid">
                                            <a href="#" wire:click="addOrder({{ $menu }}, 1)" class="text-decoration-none text-dark">
                                                <div class="card">
                                                    <div class="card-body">
                                                        {{ $menu->name }} - <strong><em>GHS</em></strong>
                                                        {{ $menu->price }}
                                                    </div>
                                                </div>
                                            </a>
                                        </ul>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @elseif($active_view == 'drink')
                <div class="card border border-info">
                    <div class="card-header">
                        Take Drinks Order
                    </div>
                    <div class="card-body">
                        <div class="accordion accordion-flush" id="accordionDrinks">
                            @foreach ($drinks as $drink)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-drinks{{ $drink->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-drinks{{ $drink->id }}" aria-expanded="true"
                                        aria-controls="collapse-drinks{{ $drink->id }}">
                                        {{ $drink->name }}
                                    </button>
                                </h2>
                                <div id="collapse-drinks{{ $drink->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading-drinks{{ $drink->id }}">
                                    <div class="accordion-body">
                                        <div class="row gx-3 gy-3">
                                            @foreach ($drink->menu as $menu)
                                            <ul class="d-grid">
                                                <a href="#" wire:click="addOrder({{ $menu }}, 0)"
                                                    class="text-decoration-none text-dark">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            {{ $menu->name }} - <strong><em>GHS</em></strong>
                                                    {{ $menu->price }}
                                                        </div>
                                                    </div>
                                                </a>
                                            </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @elseif ($active_view == 'cart')
                <div class="card border border-success">
                    <div class="card-header">
                        Send Order
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th width="2%">Quantity</th>
                                    <th width="40%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (\Cart::getContent() as $order)
                                <tr>
                                    <td>
                                        {{ $order['name'] }}
                                    </td>
                                    <td>
                                        {{ $order['quantity'] }}
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" type="button"
                                            wire:click.defer="increaseItem({{ $order }})">(+)</button>
                                        <button class="btn btn-warning" type="button"
                                            wire:click.defer="decreaseItem({{ $order }})">(-)</button>
                                        <button class="btn btn-danger" type="button"
                                            wire:click.defer="removeItem({{ $order }})">(X)</button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">
                                        <h4 class="text-center">No Order Added</h4>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <input type="text" wire:model.defer="order_note" placeholder="Enter order note here"
                                            class="form-control form-control-lg">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label class="form-check-label" for="taxable">Taxable</label>
                                        <input id="taxable" type="checkbox" wire:model.defer="taxable"
                                            class="form-check-input">
                                        <span class="mx-2"></span>
                                        |
                                        <span class="mx-2"></span>
                                        <label class="form-check-label" for="takeaway">TakeAway</label>
                                        <input id="takeaway" type="checkbox" wire:model.defer="takeaway"
                                            class="form-check-input">
                                    </td>
                                    <td>
                                        <button class="btn btn-danger px-3" wire:click.defer="clearItems()">
                                            X
                                        </button>
                                        <button class="btn btn-success px-3" wire:click.defer="saveOrder()">
                                            Send
                                        </button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div><!-- end of card-body -->
</div>
