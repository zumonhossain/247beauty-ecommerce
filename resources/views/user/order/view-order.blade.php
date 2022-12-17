@extends('layouts.website')
@section('title')
    View Order
@endsection
@section('content')
    <div class="body-content mt-5 mb-5">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-3 ">
                    @include('user.includes.profile-sidebar')
                    </div>
                    <div class="col-md-9 mt-2">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item active text-center" style="background-color: #d7537b;color:#ffffff;border:1px solid #d7537b">Shipping Information</li>
                                    <li class="list-group-item">
                                        <span class="checkout-progress">Name:</span>
                                        {{ $order->name }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="checkout-progress">Phone:</span>
                                        {{ $order->phone }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="checkout-progress">Email:</span>
                                        {{ $order->email }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="checkout-progress">Division:</span>
                                        {{ $order->division->division_name }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="checkout-progress">District:</span>
                                        {{ $order->district->district_name }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="checkout-progress">State:</span>
                                        {{ $order->state->state_name }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="checkout-progress">Post Code:</span>
                                        {{ $order->post_code }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="checkout-progress">Order Date:</span>
                                        {{ $order->order_date }}
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item active text-center" style="background-color: #d7537b;color:#ffffff;border:1px solid #d7537b">Order Information</li>
                                    <li class="list-group-item">
                                        <span class="checkout-progress">Name:</span>
                                        {{ $order->user->name }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="checkout-progress">Phone:</span>
                                        {{ $order->user->phone }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="checkout-progress">Payment By:</span>
                                        {{ $order->payment_method }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="checkout-progress">TNX Id:</span>
                                        {{ $order->transaction_id }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="checkout-progress">Invoice No:</span>
                                        {{ $order->invoice_no }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="checkout-progress">Order Total:</span>
                                        ${{ $order->amount }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="checkout-progress">Order Status:</span>
                                        <span class="badge badge-pill" style="background-color: #d7537b;color:#ffffff">{{ $order->status }}</span> <br>
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-3">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr style="background: #d7537b;color:#ffffff;">
                                                    <td class="col-md-1">
                                                        <label style="color:#ffffff;">Image</label>
                                                    </td>
                                                    <td class="col-md-3">
                                                        <label style="color:#ffffff;">Poduct Name</label>
                                                    </td>
                                                    <td class="col-md-3">
                                                        <label style="color:#ffffff;">Poduct Code</label>
                                                    </td>
                                                    <td class="col-md-2">
                                                        <label style="color:#ffffff;">Color</label>
                                                    </td>
                                                    <td class="col-md-2">
                                                        <label style="color:#ffffff;">Size</label>
                                                    </td>
                                                    <td class="col-md-2">
                                                        <label style="color:#ffffff;">Quantity</label>
                                                    </td>
                                                    <td class="col-md-1">
                                                        <label style="color:#ffffff;">Price</label>
                                                    </td>
                                                    @if ($order->status == 'Delivered')
                                                        <td class="col-md-1">
                                                            <label style="color:#ffffff;">Review</label>
                                                        </td>
                                                    @endif
                                                </tr>
                                                @foreach ($orderItems as $item)
                                                    <tr>
                                                        <td class="col-md-1"><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;" alt="imga"></td>
                                                        <td class="col-md-3">
                                                            <div class="product-name"><span class="checkout-progress">{{ $item->product->product_name }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="col-md-2">
                                                            <span class="checkout-progress">{{ $item->product->product_code }}</span>
                                                        </td>
                                                        <td class="col-md-2">
                                                            <span class="checkout-progress">{{ $item->color }}</span>
                                                        </td>
                                                        <td class="col-md-2">
                                                            <span class="checkout-progress">{{ $item->size }}</span>
                                                        </td>
                                                        <td class="col-md-2">
                                                            <span class="checkout-progress">{{ $item->qty }}</span>
                                                        </td>
                                                        <td class="col-md-1">
                                                            <span class="checkout-progress">${{ $item->price }}</span>
                                                        </td>
                                                        @if ($order->status == 'Delivered')
                                                            <td class="col-md-1">
                                                                <a href="{{ url('user/review-create/'.$item->product_id) }}"><span style="text-decoration:underline;color:red">Review</span></a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @if ($order->status !== "Delivered")

                            @else

                                <div class="col-md-12">
                                    @php
                                        $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
                                    @endphp

                                    @if ($order)
                                        <form action="{{ route('user-return-order') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $order->id }}">
                                            <div class="form-group">
                                                <label for="label">Do You want To Return This Order?:</label>
                                                <textarea name="return_reason" id="label"  class="form-control" cols="30" rows="05" placeholder="Return Reason"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-danger">Submit</button>
                                        </form>
                                    @endif
                                </div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
