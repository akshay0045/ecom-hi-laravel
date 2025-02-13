<div class="col-9">
    <ul class="list-group">
        <li class="list-group-item active" aria-current="true">Resent Order</li>
        <li class="list-group-item">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Order</th>
                        <th scope="col">Date</th>
                        <th scope="col">Ship To</th>
                        <th scope="col">Order Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $order)
                        <tr>
                            <th scope="row">#{{ $order->id }}</th>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order['shipping-name'] }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->status }}</td>
                            <td><a href="{{ route('customer.order.view',['id'=> $order->id ]) }}">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </li>
    </ul>
</div>
