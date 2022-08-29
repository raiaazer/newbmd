@extends('theme.layouts.layout')
@section('body')
<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
    <div class="main-content">
        @if($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
        <div class="col-md-12">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active">
                    <a href="#birth" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa-home"></i></span>
                        <span class="hidden-xs">Birth</span>
                    </a>
                </li>
                <li class="">
                    <a href="#marriage" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa-user"></i></span>
                        <span class="hidden-xs">Marriage</span>
                    </a>
                </li>
                <li class="">
                    <a href="#death" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa-envelope-o"></i></span>
                        <span class="hidden-xs">Death</span>
                    </a>
                </li>
                <li class="">
                    <a href="#divorce" data-toggle="tab" aria-expanded="true">
                        <span class="visible-xs"><i class="fa-cog"></i></span>
                        <span class="hidden-xs">Divorce</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="birth">
                    <form method="POST" action="{{ route('certificate-register') }}" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="certificate_type" value="birth" >
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">{{ __('First Name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="field-1" value="{{ old('first_name') }}" autocomplete="name" >
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">{{ __('Last Name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="field-1" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">Enter Email </label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="field-3" placeholder="Enter your email…">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">Confirm Email </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="field-3" placeholder="Enter your email…">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-single" style="float: right;">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="marriage">
                    <form method="POST" action="{{ route('certificate-register') }}" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="certificate_type" value="marriage">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">Husband's First Name </label>
                            <div class="col-sm-10">
                                <input type="text" name="first_name" class="form-control" id="field-1" placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">Husband's Surname </label>
                            <div class="col-sm-10">
                                <input type="text" name="last_name" class="form-control" id="field-1" placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">Wife's First Name </label>
                            <div class="col-sm-10">
                                <input type="text" name="wife_first_name" class="form-control" id="field-1" placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">Wife's Surname </label>
                            <div class="col-sm-10">
                                <input type="text" name="wife_last_name" class="form-control" id="field-1" placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">Enter Email </label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="field-3" placeholder="Enter your email…">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">Confirm Email </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="field-3" placeholder="Enter your email…">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-single" style="float: right;">Search</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="death">
                    <form method="POST" action="{{ route('certificate-register') }}" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="certificate_type" value="death">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">First Name of the Deceased</label>
                            <div class="col-sm-10">
                                <input type="text" name="first_name" class="form-control" id="field-1" placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">Surname of the Deceased</label>

                            <div class="col-sm-10">
                                <input type="text" name="last_name" class="form-control" id="field-1" placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">Enter Email </label>

                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="field-3" placeholder="Enter your email…">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">Confirm Email </label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="field-3" placeholder="Enter your email…">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-single" style="float: right;">Search</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="divorce">
                    <form method="POST" action="{{ route('certificate-register') }}" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="certificate_type" value="divorce">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">First Name of the Applicant</label>
                            <div class="col-sm-10">
                                <input type="text" name="first_name" class="form-control" id="field-1" placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">Surname of the Applicant</label>
                            <div class="col-sm-10">
                                <input type="text" name="last_name" class="form-control" id="field-1" placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">First Name of the Respondant</label>
                            <div class="col-sm-10">
                                <input type="text" name="respondent_first_name" class="form-control" id="field-1" placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">Surname of the Respondant</label>
                            <div class="col-sm-10">
                                <input type="text" name="respondent_last_name" class="form-control" id="field-1" placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">Enter Email </label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="field-3" placeholder="Enter your email…">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">Confirm Email </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="field-3" placeholder="Enter your email…">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-single" style="float: right;">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
