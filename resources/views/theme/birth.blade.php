@extends('theme.layouts.layout')
@section('body')
<div class="container" style="margin-top: 10px;">
	<div class="row">
		<div class="col-md-6">
			<h1>Certified Birth Copy</h1>
			<img src="{{asset('assets\images\Certified-Birth-Copy.gif')}}" width="500px" height="540px">
		</div>
		<div class="col-md-6">
			<h2><strong>£179.00 £79.00</strong></h2>
			<div class="panel-group" id="accordion-test-2">
				<form class="" method="">
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


	<form method="POST" action="{{route('submit-form')}}">
        <input type="hidden" value="birth" name="certificate_type">
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
            <strong>Details of the Person</strong>
        </h3>
    </div>
    <div class="col-sm-6">
        <label class="custom_label">DATE OF BIRTH</label>
        <input type="text" name="d_o_b" class="form-control datepicker" data-format="dd mm yyyy">
    </div>
    <div class="col-sm-6">
        <label class="custom_label">CERTIFICATE FOR AN ADOPTED PERSON?</label>
        <div class="radio">
            <label>
                <input type="radio" name="adopted_person" value="yes" checked>
                Yes
            </label>
            <br>
            <label>
                <input type="radio" name="adopted_person" value="no">
                No
            </label>
        </div>
    </div>
    <div class="col-sm-6">
        <label class="custom_label">PLACE OF BIRTH</label>
        <input type="text" class="form-control" name="birth_place">
    </div>
    <div class="col-sm-12">
        <label class="custom_label p-top">NAME OF THE PERSON</label>
    </div>
    <div class="col-sm-6">
        <label class="">First Name(s) at Birth</label>
        <input type="text" class="form-control" name="first_name">
    </div>
    <div class="col-sm-6">
        <label class="">Surname at Birth</label>
        <input type="text" class="form-control" name="last_name">
    </div>
    <div class="col-sm-12">
        <label class="custom_label p-top">FATHER'S NAME</label>
    </div>
    <div class="col-sm-6">
		<label class="">Father's First Name(s)</label>
		<input type="text" class="form-control" name="father_first_name">
	</div>
	<div class="col-sm-6">
		<label class="">Father's Surname</label>
		<input type="text" class="form-control" name="father_last_name">
	</div>
    <div class="col-sm-12">
        <label class="custom_label p-top">MOTHER'S NAME</label>
    </div>
    <div class="col-sm-6">
        <label class="">Mother's First Name(s)</label>
        <input type="text" class="form-control" name="mother_first_name">
    </div>
    <div class="col-sm-6">
        <label class="">Mother's Surname at Time of the Birth
        </label>
        <input type="text" class="form-control" name="mother_last_name">
    </div>
    <div class="col-sm-12">
        <label class="custom_label p-top">MOTHER'S MAIDEN SURNAME</label>
        <input type="text" class="form-control" name="mother_maiden_name">
    </div>
    <div class="col-sm-12">
        <h3 style="background-color: purple;" class="text-white p-15">
            <strong>Legalisation/Apostille</strong>
        </h3>
        <label class="custom_label p-top">GET YOUR DOCUMENT LEGALISED/APOSTILLED</label>
        <h4>Have your document legalised with a stamped official certificate (an ‘apostille’) by the legalisation office.</h4>
        <input type="checkbox" value="yes" class="" name="document_legalize">
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
