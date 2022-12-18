@extends('layouts.website')
@section('title')
    Checkout
@endsection
@section('content')
    <!-- ==================== Checkout Area start ==================== -->
	<section>
		<div class="checkout-content-body mt-5 mb-5">
            <form class="register-form" role="form" action="{{ route('customPaymentSubmit') }}" method="POST">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="checkout-form-body-left">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="checkout-main-title text-center mb-4">
                                            <h4>Shipping Address</h4>
                                        </div>
                                    </div>






                                    <div class="col-sm-6">
                                        <div class="checkout-form-right">
                                            <div class="single-checkout-form">
                                                <div class="form-group mb-2">
                                                    <label class="checkout-label">Name<span class="star">*</span></label>
                                                    <input type="text" class="form-control" name="shipping_name" value="{{ Auth::user()->name }}" data-validation="required">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label class="checkout-label">Email<span class="star">*</span></label>
                                                    <input type="email" class="form-control" name="shipping_email" value="{{ Auth::user()->email }}" data-validation="required">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label class="checkout-label">Phone<span class="star">*</span></label>
                                                    <input type="text" class="form-control" name="shipping_phone" value="{{ Auth::user()->phone }}" data-validation="required">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label class="checkout-label">Post Code<span class="star">*</span></label>
                                                    <input type="number" class="form-control" name="post_code" placeholder="post code" data-validation="required">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="checkout-form-right">
                                            <div class="form-group mb-2">
                                                <label class="checkout-label">Select Division<span class="star">*</span></label>
                                                <select class="form-control" name="division_id" data-validation="required">
                                                    <option label="Choose one"></option>
                                                    @foreach ($divisions as $item)
                                                        <option value="{{ $item->id }}">{{ ucwords($item->division_name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="checkout-label">Select District<span class="star">*</span></label>
                                                <select class="form-control" name="district_id" data-validation="required">
                                                    <option label="Choose one"></option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="checkout-label">Select State<span class="star">*</span></label>
                                                <select class="form-control" name="state_id" data-validation="required">
                                                    <option label="Choose one"></option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="checkout-label">Notes</label>
                                                <textarea class="form-control" name="notes" id=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="checkout-form-body-right">
                                <div class="checkout-main-title text-center mb-4">
                                    <h4>Your Checkout Progress</h4>
                                </div>
                                <div class="checkout-progress-list">
                                    <ul>
                                        @foreach ($carts as $item)
                                            <li>
                                                <span class="checkout-progress">Image:</span>
                                                <img src="{{ asset($item->options->image) }}" alt="" style="height: 50px; width:50px;">
                                                <span class="checkout-progress">Qty: </span>
                                                {{ $item->qty }}
                                                <span class="checkout-progress">Color:</span>
                                                {{ $item->options->color }}
                                            </li>
                                        @endforeach

                                        <hr>

                                        <li>
                                            @if (Session::has('coupon'))
                                                <span class="checkout-progress">Subtotal: </span>{{ $cartTotal }} TK
                                                {{-- <input type="text" name="amount" value="{{ $cartTotal }}"> --}}
                                                <br>
                                                <span class="checkout-progress">Coupon Name: </span> {{ session()->get('coupon')['coupon_name'] }} ({{ session()->get('coupon')['coupon_discount'] }}%)<br>

                                                <span class="checkout-progress">Coupon Discount: </span> -{{ session()->get('coupon')['discount_amount'] }} TK <br>
                                                <span class="checkout-progress">GrandTotal: </span>  {{ session()->get('coupon')['total_amount'] }} TK
                                                <input type="hidden" name="amount" value="{{ session()->get('coupon')['total_amount'] }}">
                                            @else
                                                <span class="checkout-progress">Subtotal: </span> {{ $cartTotal }} TK
                                                <input type="hidden" name="amount" value="{{ $cartTotal }}">
                                                <br>
                                                <span class="checkout-progress">GrandTotal: </span>  {{ $cartTotal }} TK
                                            @endif



                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="checkout-form-body-right mt-3">
                                <div class="checkout-main-title text-center mb-4">
                                    <h4>Please Input Ttransaction Id With Payment Method</h4>
                                </div>
                                <div class="checkout-method-card" style="display: block;overflow: hidden;">




                                    <form>
                                        <div class="form-group">
                                          <select class="form-control" name="payment_method" required>
                                            <option value="1">BKASH - ( 01852669486 )</option>
                                            <option value="2">NAGOD - ( 01852669486 )</option>
                                            <option value="3">ROCKET - ( 01852669486 )</option>
                                          </select>
                                          <input class="form-control" type="text" name="transaction_id" placeholder="Transaction ID" required>
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-payment-method float-right">Submit</button>
                                        </div>
                                    </form>



                                    {{-- <div class="accordion" id="accordionExample">
                                        <div class="card">
                                          <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                              <button class="btn btn-link btn-block text-left p-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <img src="{{ asset('contents/website') }}/assets/images/payment/bkash.png" alt="" width="50" height="">
                                              </button>
                                            </h2>
                                          </div>

                                          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <input class="form-control" type="text" name="payment_method" value="1"  placeholder="Ttransaction Id">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="card">
                                          <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                              <button class="btn btn-link btn-block text-left collapsed p-0" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <img src="{{ asset('contents/website') }}/assets/images/payment/nogod.png" alt="" width="50" height="">
                                              </button>
                                            </h2>
                                          </div>
                                          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <input class="form-control" type="text" name="payment_method" value="2"  placeholder="Ttransaction Id">
                                            </div>
                                          </div>
                                        </div>


                                        <div class="card">
                                          <div class="card-header" id="headingThree">
                                            <h2 class="mb-0">
                                              <button class="btn btn-link btn-block text-left collapsed p-0" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <img src="{{ asset('contents/website') }}/assets/images/payment/roket.png" alt="" width="50" height="">
                                              </button>
                                            </h2>
                                          </div>
                                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <input class="form-control" type="text" name="payment_method" value="3"  placeholder="Ttransaction Id">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="card">
                                          <div class="card-header" id="headingThreeii">
                                            <h2 class="mb-0">
                                              <button style="text-decoration: none" class="btn btn-link btn-block text-left collapsed p-0" type="button" data-toggle="collapse" data-target="#collapseThreepp" aria-expanded="false" aria-controls="collapseThreepp">
                                                Cash On Delevery
                                              </button>
                                            </h2>
                                          </div>
                                          <div id="collapseThreepp" class="collapse" aria-labelledby="headingThreeii" data-parent="#accordionExample">
                                            <div class="card-body" style="text-align: center;margin-bottom:20px">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                            </div>
                                          </div>
                                        </div>


                                      </div>

                                      <div class="mt-3">
                                            <button type="submit" class="btn btn-payment-method float-right">Payment Submit</button>
                                      </div>
 --}}




                                      {{-- <ul>
                                        <li>
                                            <input type="radio" name="payment_method" value="stripe">
                                            <img src="{{ asset('contents/website') }}/assets/images/payment/2.jpeg" alt="" width="50" height="">
                                        </li>

                                        <li>
                                            <input type="radio" name="payment_method" value="sslHost">
                                            <label for="">SSL HostedPayment</label>
                                        </li>
                                        <button type="submit" class="btn btn-payment-method float-right">Payment Step</button>
                                    </ul> --}}





                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
		</div>
	</section>
	<!-- ==================== Checkout Area start ==================== -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('messege'))
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('messege') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                break;
            }
        @endif
    </script>


    <script src="{{ asset('contents/website') }}/assets/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function(){
                var division_id = $(this).val();
                if(division_id) {
                    $.ajax({
                        url: "{{  url('/user/district/ajax') }}/"+division_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {

                            $('select[name="state_id"]').empty();
                            $('select[name="district_id"]').empty();

                            $.each(data, function(key, value){
                                $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            $('select[name="district_id"]').on('change', function(){
                var district_id = $(this).val();
                if(district_id) {
                    $.ajax({
                        url: "{{  url('/user/state-get/ajax') }}/"+district_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {

                            $('select[name="state_id"]').empty();

                            $.each(data, function(key, value){
                                $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

        });
    </script>


@endsection
