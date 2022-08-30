@extends('theme.layouts.layout')
@section('body')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <strong>Certificate Details</strong>
        <form action="{{ route('update_cart') }}" method="POST">
            @csrf
            <table class="table table-model-2 table-hover">
                <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Thumbnail</th>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $order_ids = explode(',',$user_cart->user_certificate_orders_id);
                        $total = 0;
                        foreach($order_ids as $order_id):
                        $certificate = \App\Models\UserCertificateOrder::find($order_id);
                        $total += ($certificate->document_price * $certificate->document_quantity);
                    @endphp
                    <tr>
                        <td class="col-sm-1">
                            <a class="fa fa-remove" href="{{ route('delete_form', $certificate->id) }}"></a>
                        </td>
                        <td class="col-sm-2">
                            <span>
                                <img src="{{asset('assets\images\Certified-Birth-Copy.gif')}}" alt="Thumbnail" width="100px" height="120px">
                            </span>
                        </td>
                        <td class="col-sm-5">

                            <span>
                                Certificate {{ ucfirst($certificate->certificate_type) }} Copy
                                <br>
                                @php
                                $first_name = '';
                                if($certificate->certificate_type == 'birth')
                                    $first_name = 'Name of the Person: ';

                                elseif($certificate->certificate_type == 'marriage')
                                    $first_name = 'Name of the Husband: ';

                                elseif($certificate->certificate_type == 'death')
                                    $first_name = 'Name of the Deceased: ';

                                elseif($certificate->certificate_type == 'divorce' && $certificate->divorce_information != 'Court Name & Case Number')
                                    $first_name = 'Full name of the applicant: ';


                                @endphp
                                {!! $certificate->reg_office ? 'Registry Office: '.$certificate->reg_office->name.'<br/>' : ''  !!}

                                {{--  {!! $reg->name ? 'Registry Office: '.$reg->name.'<br/>' : ''  !!}  --}}

                                {!! $certificate->processing_speed ? 'Processing Speed: '.$certificate->processing_speed.'<br/>' : ''  !!}
                                {!! $certificate->digital_copy ? 'Add Digital Copy? '.$certificate->digital_copy.'<br/>' : ''  !!}
                                {!! $certificate->d_o_b ? 'Date of Birth: '.$certificate->d_o_b.'<br/>' : ''  !!}
                                {!! $certificate->adopted_person ? 'Is the certificate for an adopted person? '.$certificate->adopted_person.'<br/>' : ''  !!}
                                {!! $certificate->birth_place ? 'Place of Birth: '.$certificate->birth_place.'<br/>' : ''  !!}
                                {{--  {!! $certificate->first_name ? 'Name of the Person: '.$certificate->first_name.'<br/>' : ''  !!}  --}}
                                {!! $first_name != '' ? $first_name.$certificate->first_name.'<br/>' : ''  !!}
                                {!! $certificate->father_first_name ? 'Father’s Name: '.$certificate->father_first_name.'<br/>' : ''  !!}
                                {!! $certificate->mother_first_name ? 'Mother’s Name: '.$certificate->mother_first_name.'<br/>' : ''  !!}
                                {!! $certificate->mother_maiden_name ? 'Mother’s Maiden Name: '.$certificate->mother_maiden_name.'<br/>' : ''  !!}
                                {!! $certificate->wife_first_name ? 'Name of the Wife: '.$certificate->wife_first_name.'<br/>' : ''  !!}
                                {!! $certificate->d_o_marriage ? 'Date of Marriage: '.$certificate->d_o_marriage.'<br/>' : ''  !!}
                                {!! $certificate->marriage_place ? 'Marriage Place: '.$certificate->marriage_place.'<br/>' : ''  !!}

                                {!! $certificate->marital_status ? 'Marital Status (if Female): '.$certificate->marital_status.'<br/>' : ''  !!}
                                {!! $certificate->age_at_death ? 'Age at Death in Years: '.$certificate->age_at_death.'<br/>' : ''  !!}
                                {!! $certificate->death_place ? 'Place of Death or Last Known Address: '.$certificate->death_place.'<br/>' : ''  !!}
                                {!! $certificate->deceased_occupation ? 'Occupation of Deceased: '.$certificate->deceased_occupation.'<br/>' : ''  !!}
                                {!! $certificate->d_o_death ? 'Date of Death: '.$certificate->d_o_death.'<br/>' : ''  !!}

                                {!! $certificate->court_name ? 'Name of court: '.$certificate->court_name.'<br/>' : ''  !!}
                                {!! $certificate->case_number ? 'Case number: '.$certificate->case_number.'<br/>' : ''  !!}
                                {!! $certificate->divorce_information ? 'What information do you know about the divorce: '.$certificate->divorce_information.'<br/>' : ''  !!}
                                {!! $certificate->search_period ? 'Search Period: '.$certificate->search_period.'<br/>' : ''  !!}
                                {!! $certificate->repondent_first_name ? 'Full name of the respondent: '.$certificate->repondent_first_name.'<br/>' : ''  !!}

                                {!! $certificate->decree_optional && $certificate->decree_optional->d_o_marriage ? 'Date of marriage: '.$certificate->decree_optional->d_o_marriage. '<br/>' : ''  !!}
                                {!! $certificate->decree_optional && $certificate->decree_optional->court_filed ? 'The court where it was filed: '.$certificate->decree_optional->court_filed. '<br/>' : ''  !!}
                                {!! $certificate->decree_optional && $certificate->decree_optional->court_pronounced ? 'The court where it was pronounced: '.$certificate->decree_optional->court_pronounced. '<br/>' : ''  !!}
                                {!! $certificate->decree_optional && $certificate->decree_optional->d_o_separation ? 'Date of separation: '.$certificate->decree_optional->d_o_separation. '<br/>' : ''  !!}
                                {!! $certificate->decree_optional && $certificate->decree_optional->d_o_petition_filed ? 'Date or year the petition was filed: '.$certificate->decree_optional->d_o_petition_filed. '<br/>' : ''  !!}

                                {!! $certificate->decree_optional && $certificate->decree_optional->d_o_decree_nisi ? 'Date or year the decree nisi was pronounced: '.$certificate->decree_optional->d_o_decree_nisi. '<br/>' : ''  !!}

                                {{--  {!! $certificate->d_o_decree_nisi ? 'Date or year the decree nisi was pronounced: '.$certificate->decree_optional->d_o_decree_nisi. '<br/>' : ''  !!}  --}}
                                {!! $certificate->document_legalize ? 'Get your document legalised/apostilled: '.$certificate->document_legalize.'<br/>' : ''  !!}

                            </span>
                        </td>
                        <td class="col-sm-1">
                            <span id="num1" class="sb-total">{{ $certificate->document_price }}</span>
                        </td>
                        <td class="col-sm-1">
                            {{--  <span><input value="{{ $certificate->document_quantity }}" name="document_quantity" min="0" type="number">  --}}

                            <span><input value="{{ $certificate->document_quantity }}" name="quantity[]" min="0" type="number">
                            <input type="hidden" name="id[]" value="{{$certificate->id}}" />
                            </span>
                        </td>
                        <td>
                            <span id="num2" class="col-sm-2">{{ $certificate->document_price }}</span>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">
                        {{--  <span><input value="0" type="number"></span>  --}}
                        {{--  <button class="btn btn-primary">Apply Coupon</button>  --}}
                        <button class="btn btn-primary pull-right" type="submit">Update Cart</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        </div>
    </div>
</div>
<div class="panel panel-default col-sm-4">
    <div class="panel-body">
        <div class="row">
            <strong>Total Price</strong>
            <table class="table table-model-2 table-hover">
                <thead>
                    <tr>
                        <th class="sub-total">Sub Total</th>
                        <th id="answer">{{ $total }}</th>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <th>{{ $total }}</th>
                    </tr>
                </thead>
            </table>
            <button class="btn btn-primary">Proceed To Checkout</button>
        </div>
    </div>
</div>
@endsection

@section('custom_scripts')


@endsection
