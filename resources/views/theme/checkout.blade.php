@extends('theme.layouts.layout')
@section('body')
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-sm-12">
            <h1>Checkout</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <form method="POST" action="{!! URL::route('paypal') !!}">
        <input type="hidden" value="amount" name="120">
        @csrf

        {{--  @php
            $order_ids = explode(',',$user_cart->user_certificate_orders_id);
            $total = 0;
            foreach($order_ids as $order_id):
            $certificate = \App\Models\UserCertificateOrder::find($order_id);
            $total += ($certificate->document_price * $certificate->document_quantity);
        @endphp  --}}

        <div class="row">
            <div class="col-sm-12">
                <h3 style="background-color: purple;" class="text-white p-15">
                    <strong>Billing details</strong>
                </h3>
            </div>
            <div class="col-sm-6">
                <label class="custom_label">First Name</label>
                <input type="text" name="first_name" class="form-control">
            </div>
            <div class="col-sm-6">
                <label class="custom_label">Last Name</label>
                <input type="text" name="last_name" class="form-control">
            </div>
            <div class="col-sm-12 mar-top">
                <label class="custom_label">Company name (optional)</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="form-group col-sm-4 mar-top">
                <label class="custom_label">Country</label>
                <select class="form-control" name="registry_offices_id">heading
                    {{--  @if(!$data==null)
                    @foreach($data as $d)
                    <option value="{{$d->id}}">{{$d->name}}</option>
                    @endforeach
                    @endif  --}}
                </select>
            </div>
            <div class="col-sm-12">
                <label class="custom_label">Address Line 1</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="col-sm-12 mar-top">
                <label class="custom_label">Apartment address(optional)</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="col-sm-12 mar-top">
                <label class="custom_label">City</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="col-sm-6 mar-top">
                <label class="custom_label">Postcode</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="col-sm-6 mar-top">
                <label class="custom_label">County(optional)</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="col-sm-6 mar-top">
                <label class="custom_label">Email address</label>
                <input type="email" name="" class="form-control">
            </div>
            <div class="col-sm-6 mar-top">
                <label class="custom_label">Phone</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="col-sm-12 mar-top">
            <input type="checkbox" value="1" class="shipping_details" name="shipping_details" onchange="valueChanged()" />
            <span><strong>Ship to a different address?</strong></span>
            </div>
        </div>

        <br>

        <div class="row ship" style="display: none">
            <div class="col-sm-12">
                <h3 style="background-color: purple;" class="text-white p-15">
                    <strong>Shipping details</strong>
                </h3>
            </div>
            <div class="col-sm-6">
                <label class="custom_label">First Name</label>
                <input type="text" name="first_name" class="form-control">
            </div>
            <div class="col-sm-6">
                <label class="custom_label">Last Name</label>
                <input type="text" name="last_name" class="form-control">
            </div>
            <div class="col-sm-12 mar-top">
                <label class="custom_label">Company name (optional)</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="form-group col-sm-4 mar-top">
                <label class="custom_label">Country/Region</label>
                <select class="form-control" name="registry_offices_id">heading
                    {{--  @if(!$data==null)
                    @foreach($data as $d)
                    <option value="{{$d->id}}">{{$d->name}}</option>
                    @endforeach
                    @endif  --}}
                </select>
            </div>
            <div class="col-sm-12">
                <label class="custom_label">Street address</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="col-sm-12 mar-top">
                <label class="custom_label">Town / City</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="col-sm-6 mar-top">
                <label class="custom_label">Postcode / ZIP</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="col-sm-6 mar-top">
                <label class="custom_label">State / County (optional)</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="col-sm-6 mar-top">
                <label class="custom_label">Order notes (optional)</label>
                <br>
                <textarea name="" id="" cols="30" rows="4"></textarea>
            </div>
        </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Your order</h1>
                </div>
                <table class="table table-model-2 table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-sm-2">
                                <span>
                                    product details
                                </span>
                            </td>
                            <td class="col-sm-2">
                                <span>
                                    price
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">
                                <span>
                                    Subtotal
                                </span>
                            </td>
                            <td class="col-sm-2">
                                <span>
                                    price
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">
                                <span>
                                    Shipping
                                </span>
                            </td>
                            <td class="col-sm-2">
                                <span>
                                    shipping details
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">
                                <span>
                                    Total
                                </span>
                            </td>
                            <td class="col-sm-2">
                                <span>
                                    price
                                </span>
                            </td>
                        </tr>
                        {{--  @endforeach  --}}
                    </tbody>
                </table>
            </div>

        </div>
        <div class="">
            <button type="submit" class="btn btn-primary btn-single">Pay with PayPal</button>
        </div>
    </div>
</form>
</div>
@endsection
@section('custom_scripts')
<script type="text/javascript">
    function valueChanged()
    {
        if($('.shipping_details').is(":checked"))
            $(".ship").show();
        else
            $(".ship").hide();
    }
</script>

@endsection
