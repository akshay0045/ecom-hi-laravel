<div class="col-3">
    <ul class="list-group">
        <li class="list-group-item active" aria-current="true"><a class="text-white" href="{{ route('user.customer',['type' => "account"]) }}">My Account</a></li>
        <li class="list-group-item"><a href="{{ route('user.customer',['type' => "address"]) }}">My Address</a></li>
        <li class="list-group-item"><a href="{{ route('user.customer',['type' => "order"]) }}">My Order List</a></li>
    </ul>
</div>