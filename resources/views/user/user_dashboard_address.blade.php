<div class="col-9">
    <ul class="list-group">
        <li class="list-group-item active" aria-current="true">Resent Order</li>
        <li class="list-group-item">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Pincode</th>
                        <th scope="col">Country</th>
                        <th scope="col">Mobile</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->useraddresses as $address)
                        <tr>
                            <th scope="row">{{ $data->name }}</th>
                            <td>{{ $address->address }}</td>
                            <td>{{ $address->city }}</td>
                            <td>{{ $address->state }}</td>
                            <td>{{ $address->zip_code }}</td>
                            <td>{{ $address->country }}</td>
                            <td>{{ $address->mobile }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </li>
    </ul>
</div>