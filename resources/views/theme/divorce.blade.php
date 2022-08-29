@extends('theme.layouts.layout')
@section('body')
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-6">
            <h1>Certified Divorce/Decree Absolute Copy</h1>
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
        <input type="hidden" value="divorce" name="certificate_type">
		@csrf
        <div class="row">
            <div class="col-sm-12 p-top">
                <label class="custom_label">WHAT INFORMATION DO YOU KNOW ABOUT THE DIVORCE</label>
			</div>
            <div class="radio col-sm-12">
                <label>
                    <input type="radio" value="Court Name & Case Number" id="radio-1" name="divorce_information" checked="">
                    Court Name & Case Number
                </label>
                <br>
                <label>
                    <input type="radio" value="Court Name" id="radio-2" name="divorce_information">
                    Court Name
                </label>
                <br>
                <label>
                    <input type="radio" value="Neither" id="radio-3" name="divorce_information">
                    Neither
                </label>
            </div>
            <div class="nisi" style="display:none;">
                <div class="col-sm-6 p-top">
                    <label class="custom_label">DATE OR YEAR THE DECREE NISI WAS MADE ABSOLUTE</label>
                    <label class="">Provide an approximate year if exact date is not known</label>
                    <input type="text" class="form-control" name="">
                </div>
                <div class="col-sm-6 p-top">
                    <label class="custom_label">SEARCH PERIOD</label>
                        <br>
                        10 years: we will search 5 years on either side of the date you entered
                        <br>
                        20 years: we will search 10 years on either side of the date you entered
                        <br>
                        30 years: we will search 15 years on either side of the date you entered
                    <div class="radio form-group">
                    <label>
                        <input type="radio" id="radio-4" value="10 year period" name="search_period" checked="">
                        10 year period
                    </label>
                    <br>
                    <label>
                        <input type="radio" id="radio-5" value="20 year period" name="search_period">
                        20 year period
                    </label>
                    <br>
                    <label>
                        <input type="radio" id="radio-6" value="30 year period" name="search_period">
                        30 year period
                    </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 court">
                <label class="custom_label">NAME OF COURT</label>
                <input type="text" class="form-control" name="court_name">
            </div>
            <div class="col-sm-6 court case-number">
                <label class="custom_label">CASE NUMBER</label>
                <input type="text" class="form-control" name="case_number">
            </div>
            <div class="absolute-required" style="display:none;">
                <div class="col-sm-12">
                <h3 style="background-color: purple;" class="text-white p-15"><strong>Decree Absolute Required Details</strong></h3>
                </div>
                <div class="col-sm-12">
                    <label class="custom_label p-top">FULL NAME OF THE APPLICANT</label>
                </div>
                    <div class="col-sm-6">
                        <label class="">First Names</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="col-sm-6">
                        <label class="">Surname</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                <div class="col-sm-12">
                    <label class="custom_label p-top">FULL NAME OF THE RESPONDENT</label>
                </div>
                    <div class="col-sm-6">
                        <label class="">First Names</label>
                        <input type="text" class="form-control" name="repondent_first_name">
                    </div>
                    <div class="col-sm-6">
                        <label class="">Surname</label>
                        <input type="text" class="form-control" name="repondent_last_name">
                    </div>
            </div>
            <div class="absolute-optional" style="display:none;">
                <div class="col-sm-12">
                <h3 style="background-color: purple;" class="text-white p-15">
                    <strong>Decree Absolute Optional Details</strong>
                </h3>
                </div>
                <div class="col-sm-6">
                    <label class="custom_label p-top">THE COURT WHERE IT WAS FILED</label>
                    <input type="text" class="form-control" name="court_filed">
                </div>
                <div class="col-sm-6">
                    <label class="custom_label p-top">THE COURT WHERE IT WAS PRONOUNCED</label>
                    <input type="text" class="form-control" name="court_pronounced">
                </div>
            </div>
            <div class="date" style="display:none;">
                <div class="col-sm-6">
                    <label class="custom_label p-top">DATE OF MARRIAGE</label>
                    <input type="text" name="d_o_marriage" class="form-control datepicker" data-format="dd mm yyyy">
                </div>
                <div class="col-sm-6">
                    <label class="custom_label p-top">DATE OF SEPARATION</label>
                    <input type="text" name="d_o_separation" class="form-control datepicker" data-format="dd mm yyyy">
                </div>
                <div class="col-sm-6">
                    <label class="custom_label p-top">DATE OR YEAR THE DECREE NISI WAS PRONOUNCED</label>
                    <input type="text" class="form-control" name="d_o_decree_nisi">
                </div>
                <br>
                <div class="col-sm-6">
                    <label class="custom_label p-top">DATE OR YEAR THE PETITION WAS FILED</label>
                    <input type="text" class="form-control" name="d_o_petition_filed">
                </div>
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
	$("input[name='divorce_information']").change(function(){
    let opt = $("input[name='divorce_information']:checked").val();
    if(opt == 'Court Name & Case Number'){
		$('.absolute-required').hide();
		$('.absolute-optional').hide();
		$('.case-number').show();
        $('.court').show();
		$('.date').hide();
		$('.nisi').hide();

} else if(opt == 'Court Name'){
	$('.absolute-optional').hide();
	$('.case-number').hide();
	$('.nisi').show();
	$('.absolute-required').show();

}else if(opt == 'Neither'){
	$('.absolute-required').show();
	$('.absolute-optional').show();
	$('.case-number').hide();
	$('.nisi').show();
	$('.court').hide();
	$('.date').show();
}
});
</script>
@endsection

