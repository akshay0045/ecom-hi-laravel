@extends('layout.master')
@section('style')
    <style type="text/css">
        body {
            margin-top: 20px;
            background-color: #f1f3f7;
        }

        .card {
            margin-bottom: 24px;
            -webkit-box-shadow: 0 2px 3px #e4e8f0;
            box-shadow: 0 2px 3px #e4e8f0;
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #eff0f2;
            border-radius: 1rem;
        }

        .activity-checkout {
            list-style: none
        }

        .activity-checkout .checkout-icon {
            position: absolute;
            top: -4px;
            left: -24px
        }

        .activity-checkout .checkout-item {
            position: relative;
            padding-bottom: 24px;
            padding-left: 35px;
            border-left: 2px solid #f5f6f8
        }

        .activity-checkout .checkout-item:first-child {
            border-color: #3b76e1
        }

        .activity-checkout .checkout-item:first-child:after {
            background-color: #3b76e1
        }

        .activity-checkout .checkout-item:last-child {
            border-color: transparent
        }

        .activity-checkout .checkout-item.crypto-activity {
            margin-left: 50px
        }

        .activity-checkout .checkout-item .crypto-date {
            position: absolute;
            top: 3px;
            left: -65px
        }



        .avatar-xs {
            height: 1rem;
            width: 1rem
        }

        .avatar-sm {
            height: 2rem;
            width: 2rem
        }

        .avatar {
            height: 3rem;
            width: 3rem
        }

        .avatar-md {
            height: 4rem;
            width: 4rem
        }

        .avatar-lg {
            height: 5rem;
            width: 5rem
        }

        .avatar-xl {
            height: 6rem;
            width: 6rem
        }

        .avatar-title {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background-color: #3b76e1;
            color: #fff;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            font-weight: 500;
            height: 100%;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 100%
        }

        .avatar-group {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding-left: 8px
        }

        .avatar-group .avatar-group-item {
            margin-left: -8px;
            border: 2px solid #fff;
            border-radius: 50%;
            -webkit-transition: all .2s;
            transition: all .2s
        }

        .avatar-group .avatar-group-item:hover {
            position: relative;
            -webkit-transform: translateY(-2px);
            transform: translateY(-2px)
        }

        .card-radio {
            background-color: #fff;
            border: 2px solid #eff0f2;
            border-radius: .75rem;
            padding: .5rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: block
        }

        .card-radio:hover {
            cursor: pointer
        }

        .card-radio-label {
            display: block
        }

        .edit-btn {
            width: 35px;
            height: 35px;
            line-height: 40px;
            text-align: center;
            position: absolute;
            right: 25px;
            margin-top: -50px
        }

        .card-radio-input {
            display: none
        }

        .card-radio-input:checked+.card-radio {
            border-color: #3b76e1 !important
        }


        .font-size-16 {
            font-size: 16px !important;
        }

        .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        a {
            text-decoration: none !important;
        }


        .form-control {
            display: block;
            width: 100%;
            padding: 0.47rem 0.75rem;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #545965;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #e2e5e8;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.75rem;
            -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        }

        .edit-btn {
            width: 35px;
            height: 35px;
            line-height: 40px;
            text-align: center;
            position: absolute;
            right: 25px;
            margin-top: -50px;
        }

        .ribbon {
            position: absolute;
            right: -26px;
            top: 20px;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            color: #fff;
            font-size: 13px;
            font-weight: 500;
            padding: 1px 22px;
            font-size: 13px;
            font-weight: 500
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('user.placeorder') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <ol class="activity-checkout mb-0 px-4 mt-3">
                                <li class="checkout-item">
                                    <div class="avatar checkout-icon p-1">
                                        <div class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bxs-truck text-white font-size-20"></i>
                                        </div>
                                    </div>
                                    <div class="feed-item-list">
                                        <div>
                                            <h5 class="font-size-16 mb-1">Shipping Info</h5>
                                            <p class="text-muted text-truncate mb-4">Neque porro quisquam est</p>
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div data-bs-toggle="collapse">
                                                            <label class="card-radio-label mb-0">
                                                                <input type="radio" name="shipping-address"
                                                                    id="info-address1" class="card-radio-input"
                                                                    checked="">
                                                                <div class="card-radio text-truncate p-3">
                                                                    <span class="fs-14 mb-4 d-block">Billing Address</span>
                                                                    <span
                                                                        class="fs-14 mb-2 d-block">{{ $order['billing-name'] }}</span>
                                                                    <span
                                                                        class="text-muted fw-normal text-wrap mb-1 d-block">{{ $order['billing-address'] }},{{ $order['billing-city'] }},{{ $order['billing-country'] }},{{ $order['billing-zip-code'] }}</span>

                                                                    <span class="text-muted fw-normal d-block">Mo.
                                                                        {{ $order['billing-phone'] }}</span>
                                                                </div>
                                                            </label>
                                                            <div class="edit-btn bg-light  rounded">
                                                                <a href="#" data-bs-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-bs-original-title="Edit">
                                                                    <i class="bx bx-pencil font-size-16"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-sm-6">
                                                        <div>
                                                            <label class="card-radio-label mb-0">
                                                                <input type="radio" name="shipping-address"
                                                                    id="info-address2" class="card-radio-input">
                                                                <div class="card-radio text-truncate p-3">
                                                                    <span class="fs-14 mb-4 d-block">Shipping Address</span>
                                                                    <span
                                                                        class="fs-14 mb-2 d-block">{{ $order['shipping-name'] }}</span>
                                                                    <span
                                                                        class="text-muted fw-normal text-wrap mb-1 d-block">{{ $order['shipping-address'] }},{{ $order['shipping-city'] }},{{ $order['shipping-zip-code'] }},{{ $order['shipping-country'] }}</span>

                                                                    <span class="text-muted fw-normal d-block">
                                                                        {{ $order['shipping-phone'] }}</span>
                                                                </div>
                                                            </label>
                                                            <div class="edit-btn bg-light  rounded">
                                                                <a href="#" data-bs-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-bs-original-title="Edit">
                                                                    <i class="bx bx-pencil font-size-16"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="checkout-item">
                                    <div class="avatar checkout-icon p-1">
                                        <div class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bxs-wallet-alt text-white font-size-20"></i>
                                        </div>
                                    </div>
                                    <div class="feed-item-list">
                                        <div>
                                            <h5 class="font-size-16 mb-1">Payment Info</h5>
                                            <p class="text-muted text-truncate mb-4">Duis arcu tortor, suscipit eget</p>
                                        </div>
                                        <div>
                                            <h5 class="font-size-14 mb-3">Payment method :</h5>
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <label class="card-radio-label">
                                                            <input type="radio" name="pay-method" id="pay-methodoption3"
                                                                class="card-radio-input" checked=""
                                                                value="Cash on Delivery">

                                                            <span class="card-radio py-3 text-center text-truncate">
                                                                <i class="bx bx-money d-block h2 mb-3"></i>
                                                                <span>{{ $order['pay-method'] }}</span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col">
                            <a href="{{ url('/') }}" class="btn btn-link text-muted">
                                <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                        </div> <!-- end col -->
                    </div> <!-- end row-->

                </div>
                <div class="col-xl-4">
                    <div class="card checkout-order-summary">
                        <div class="card-body">
                            <div class="p-3 bg-light mb-3">
                                <h5 class="font-size-16 mb-0">Order Summary
                                    {{-- <span class="float-end ms-2">#MN0124</span> --}}
                                </h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-centered mb-0 table-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0" style="width: 110px;" scope="col">Product</th>
                                            {{-- <th class="border-top-0" scope="col">Product Desc</th> --}}
                                            <th class="border-top-0" scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderitems as $item)
                                            <tr>
                                                {{-- <th scope="row"><img src="{{ $item->products->product_gallary }}"
                                                        alt="product-img" title="product-img" class="avatar-lg rounded">
                                                </th> --}}
                                                <td>
                                                    <h5 class="font-size-16 text-truncate"><a href="#"
                                                            class="text-dark">{{ $item->product_name }}</a></h5>
                                                    <p class="text-muted mb-0">
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star-half text-warning"></i>
                                                    </p>
                                                    <p class="text-muted mb-0 mt-1">$ {{ $item->product_price }}
                                                        x{{ $item->product_qty }}</p>
                                                </td>
                                                <td>{{ $item->product_price * $item->product_qty }}</td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
                                        <th scope="row"><img src="https://www.bootdey.com/image/280x280/FF00FF/000000"
                                                alt="product-img" title="product-img" class="avatar-lg rounded"></th>
                                        <td>
                                            <h5 class="font-size-16 text-truncate"><a href="#"
                                                    class="text-dark">Smartphone Dual Camera</a></h5>
                                            <p class="text-muted mb-0">
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                            </p>
                                            <p class="text-muted mb-0 mt-1">$ 260 x 1</p>
                                        </td>
                                        <td>$ 260</td>
                                    </tr> --}}
                                        <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Sub Total :</h5>
                                            </td>
                                            <td>
                                                $ {{ $order->subtotal }}
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Discount :</h5>
                                        </td>
                                        <td>
                                            - $ 78
                                        </td>
                                    </tr> --}}

                                        <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Shipping Charge :</h5>
                                            </td>
                                            <td>
                                                $ {{ $order->shipping_charges }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">GSt 18% (Including) :</h5>
                                            </td>
                                            <td>
                                                $ {{ $order->tax }}
                                            </td>
                                        </tr>

                                        <tr class="bg-light">
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Total:</h5>
                                            </td>
                                            <td>
                                                $ {{ $order->total }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </form>
    </div>
@endsection
