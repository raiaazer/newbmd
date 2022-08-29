@extends('theme.layouts.layout')
@section('body')
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-6">
            <h1>Certified Death Copy</h1>
            <img src="{{asset('assets\images\Certified-Birth-Copy.gif')}}" width="500px" height="540px">
        </div>
        <div class="col-md-6">
            <h2><strong>£179.00 £79.00</strong></h2>
            <div class="panel-group" id="accordion-test-2">
            <form>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseOne-2"class="collapsed">
                                Description
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne-2" class="panel-collapse collapse">
                        <div class="panel-body">
                            A Certified Birth Copy is used for a wide range of applications among many other requirements, you can order and access digital and hard copies available on the general register.Apostille service for each document ordered available.
                            The certified copy of birth usually contains:
                            <ul>
                                <li>
                                    Parents’ names, ages, jobs, and residence
                                </li>
                                <li>
                                    Birthplaces for both the child and parents
                                </li>
                                <li>
                                    Baptism or religious information
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseTwo-2" class="collapsed">
                                FAQs
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo-2" class="panel-collapse collapse">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseThree-2" class="collapsed">
                                Delivery and Processing Times
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree-2" class="panel-collapse collapse">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseThree-3" class="collapsed">
                                Need Help?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree-3" class="panel-collapse collapse">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-single">Order Now</button>
                </form>
            </div>
        </div>
    </div>
    <form method="POST" action="{{route('submit-form')}}" >
        <input type="hidden" value="death" name="certificate_type">
		@csrf
        <div class="row">
			<div class="col-sm-12">
				<h3 style="background-color: purple;" class="text-white p-15">
					<strong>Options</strong>
				</h3>
			</div>
			<div class="form-group col-sm-4">
				<label class="custom_label">Registry Office</label>
				<select class="form-control" name="registry_offices_id">heading
					@if(!$data==null)
					@foreach($data as $d)
					<option value="{{$d->id}}">{{$d->name}}</option>
					@endforeach
					@endif
				</select>
			</div>
			<div class="form-group col-sm-4">
                <label class="custom_label">Processing Speed</label>
				<div class="radio">
					<label>
						<input type="radio" name="processing_speed" value="Priority Processing - Reviewed with-in 24 hours" checked>
						Priority Processing - Reviewed with-in 24 hours
					</label>
					<br>
					<label>
						<input type="radio" name="processing_speed" value="Standard Processing - Reviewed with-in 15 working days">
                        Standard Processing - Reviewed with-in 15 working days
					</label>
				</div>
			</div>
			<div class="form-group col-sm-4">
                <label class="custom_label">Add Digital Copy</label>
				<div class="radio">
					<label>
						<input type="radio" name="digital_copy" value="yes" checked>
						Yes
					</label>
					<br>
					<label>
						<input type="radio" name="digital_copy" value="no">
						No
					</label>
				</div>
			</div>
		</div>
        <div class="row">
            <div class="col-sm-12">
				<h3 style="background-color: purple;" class="text-white p-15">
					<strong>Details of the Death Certificate</strong>
				</h3>
			</div>
            <div class="col-sm-4">
                <label class="custom_label">Date of Death</label>
                <input type="text" name="d_o_death" class="form-control datepicker" data-format="dd mm yyyy">
            </div>
            <div class="col-sm-4">
                <label class="custom_label">IS THE PERSON IN ENQUIRY A FEMALE?</label>
                <div class="radio">
                    <label>
                        <input type="radio" value="yes" name="deceased_gender">
                        Yes
                    </label>
                    <br>
                    <label>
                        <input type="radio" value="no" name="deceased_gender">
                        No
                    </label>
                </div>
            </div>
            <div class="col-sm-4 status" style="display: none">
                <label class="custom_label">MARITAL STATUS (IF FEMALE)</label>
                <div class="radio">
                    <label>
                        <input type="radio" value="single" name="marital_status">
                        Single
                    </label>
                    <br>
                    <label>
                        <input type="radio" value="married" name="marital_status">
                        Married
                    </label>
                    <br>
                    <label>
                        <input type="radio" value="divorced" name="marital_status">
                        Divorced
                    </label>
                    <br>
                    <label>
                        <input type="radio" value="widowed" name="marital_status">
                        Widowed
                    </label>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="custom_label">AGE AT DEATH IN YEARS</label>
                <input type="number" placeholder="If less than 1 year old, Please enter 0" class="form-control" name="age_at_death">
            </div>
            <div class="col-sm-12 p-top">
                <label class="custom_label">NAME OF THE DECEASED</label>
            </div>
            <div class="col-sm-6">
                <label class="">First Name(s) of the Deceased</label>
                <input type="text" class="form-control" name="first_name">
            </div>
            <div class="col-sm-6">
                <label class="">Surname of the Deceased</label>
                <input type="text" class="form-control" name="last_name">
            </div>
            <div class="col-sm-12 p-top">
                <label class="custom_label">PLACE OF DEATH OR LAST KNOWN ADDRESS</label>
                <input type="text" class="form-control" name="death_place">
            </div>
            <div class="col-sm-6 p-top">
                <label class="custom_label">OCCUPATION OF DECEASED</label>
                <input type="text" class="form-control" name="deceased_occupation">
            </div>
            <div class="col-sm-12">
                <h3 style="background-color: purple;" class="text-white p-15">
                    <strong>Legalisation/Apostille</strong>
                </h3>
                <label class="custom_label p-top">GET YOUR DOCUMENT LEGALISED/APOSTILLED</label>
                <h4>Have your document legalised with a stamped official certificate (an ‘apostille’) by the legalisation office.</h4>
                <input type="checkbox" class="" value="1" name="document_legalize">
                <h4>Subtotal</h4>
                <h4>£79.00</h4>
                <br>
                <h4>Options</h4>
                <h4>£0.00</h4>
                <input type="number" value="1" min="1" max="31" name="document_quantity" placeholder="">
                <button type="submit" class="btn btn-primary btn-single">Add to Cart</button>
            </div>
        </div>
    </form>
</div>
<br>
<br>
@endsection

@section('custom_scripts')
<script type="text/javascript">
	$("input[name='deceased_gender']").change(function(){
    let opt = $("input[name='deceased_gender']:checked").val();
    if(opt == 'yes'){
		$('.status').show();
    }else{
		$('.status').hide();
    }
});
</script>
@endsection
