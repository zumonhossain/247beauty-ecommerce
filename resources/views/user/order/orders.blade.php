@extends('layouts.website')
@section('title')
    Return Order
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
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr style="background-color: #d7537b;color:#ffffff;border:1px solid #d7537b">
                                        <td class="col-md-1">
                                            <label style="color:#ffffff;">Date</label>
                                        </td>
                                        <td class="col-md-3">
                                            <label style="color:#ffffff;">Total</label>
                                        </td>
                                        {{-- <td class="col-md-2">
                                            <label style="color:#ffffff;">Payment</label>
                                        </td> --}}
                                        <td class="col-md-2">
                                            <label style="color:#ffffff;">Invoice</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label style="color:#ffffff;">Order </label>
                                        </td>
                                        <td class="col-md-1">
                                            <label style="color:#ffffff;">Action</label>
                                        </td>
                                    </tr>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="col-md-1">
                                                <span>{{ $order->order_date }}</span>
                                            </td>
                                            <td class="col-md-3">
                                                <span>${{ $order->amount }}</span>
                                            </td>
                                            {{-- <td class="col-md-2">
                                                <span>{{ $order->payment_method }}</span>
                                            </td> --}}
                                            <td class="col-md-2">
                                                <span>{{ $order->invoice_no }}</span>
                                            </td>
                                            <td class="col-md-2">
                                                <span class="badge badge-pill badge-warning" style="background: #418DB9; text:white;">{{ ucwords($order->status) }}</span> <br>
                                            </td>
                                            <td class="col-md-1">
                                                <a href="{{ url('user/order-view/'.$order->id) }}" class="btn btn-sm" style="background-color: #418DB9;color:#ffffff"><i class="fa fa-eye"></i> View</a>
                                                <a href="{{ url('user/invoice-download/'.$order->id) }}" style="margin-top: 5px;background-color:#d7537b;color:#ffffff"  class="btn btn-sm"><i class="fa fa-download" style="color:white;"></i> Invoice</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
