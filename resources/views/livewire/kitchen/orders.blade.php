<div class="container-fluid mt-4 px-4" wire:poll.5000ms>
    <div class="row">
        <div class="col-sm-2">
            <div class="card">
                <div class="card-header">
                    New Orders
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        @forelse ($new_orders as $index => $order)
                            <li class="my-3 d-grid"><button class="btn btn-block btn-lg btn-danger"
                                    wire:click="receiveOrder({{ $order }})">New Order No.
                                    {{ $index + 1 }}</button></li>
                            <audio autoplay>
                                <source src="{{ asset('files/zen.mp3') }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        @empty
                            <li>
                                <h4>No New Order</h4>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Received Orders
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            @forelse ($received_orders as $index => $order)
                                <table class="table table-condensed mb-5">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Quantity</th>
                                        </tr>
                                    <tbody>
                                        @foreach ($order['order_details'] as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item['title'] }}</td>
                                                <td>{{ $item['quantity'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                TakeAway: <strong>{{ $item['order']['is_take_away'] ? 'Yes' : 'No' }}</strong> | 
                                                 Time: {{ $item['created_at']->diffForHumans() }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Note: </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                <button class="btn btn-danger px-4"
                                                    wire:click="cancelOrder({{ $order['order'] }})">Cancel Order</button>
                                                <button class="btn btn-primary px-4"
                                                    wire:click="processOrder({{ $order['order'] }})">Process
                                                    Order</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    </thead>
                                </table>
                                <hr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        <h4 class="text-center">
                                            No Orders Received Currently
                                        </h4>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    Processed Orders
                </div>
                <div class="card-body">
                    <table class="table">
                        @forelse ($processed_orders as $order)
                            <table class="table table-condensed mb-4">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item['title'] }}</td>
                                            <td>{{ $item['quantity'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @empty
                            <h4>No Processed Order Currently</h4>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
