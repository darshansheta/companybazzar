@extends('layouts.default')
@section('content')
<!-- BEGIN PAGE CONTENT INNER -->
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Form Actions On Top
				</div>
				
			</div>
			<div class="portlet-body ">
				<!-- BEGIN FORM-->
				<div class="form">
				<form action="javascript:;" class="form-horizontal">

					<div class="form-actions top">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<!-- <h4>Basic Detail</h4> -->
							</div>
						</div>
					</div>
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Roc Office</label>
							<div class="col-md-4">
								<select class="form-control" name="roc_office_id" id="roc_office_id">
									<option value="">Select...</option>
									<option value="Option 1">Option 1</option>
									<option value="Option 2">Option 2</option>
									<option value="Option 3">Option 3</option>
									<option value="Option 4">Option 4</option>
								</select>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Company Type</label>
							<div class="col-md-4">
								<select class="form-control" name="company_type_id" id="company_type_id">
									<option value="">Select...</option>
									<option value="Option 1">Option 1</option>
									<option value="Option 2">Option 2</option>
									<option value="Option 3">Option 3</option>
									<option value="Option 4">Option 4</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Incorporation Date</label>
							<div class="col-md-4">
								<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
									<input type="text" class="form-control" name="incorporation_date" id="incorporation_date">
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Last Balance Sheet Date</label>
							<div class="col-md-4">
								<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
									<input type="text" class="form-control" name="last_balance_sheet_date" id="last_balance_sheet_date">
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Incorporation Date</label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</span>
									<input type="email" class="form-control" placeholder="Email Address">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Password</label>
							<div class="col-md-4">
								<div class="input-group">
									<input type="password" class="form-control" placeholder="Password">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Left Icon</label>
							<div class="col-md-4">
								<div class="input-icon">
									<i class="fa fa-bell-o"></i>
									<input type="text" class="form-control" placeholder="Left icon">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Right Icon</label>
							<div class="col-md-4">
								<div class="input-icon right">
									<i class="fa fa-microphone"></i>
									<input type="text" class="form-control" placeholder="Right icon">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Input With Spinner</label>
							<div class="col-md-4">
								<input type="password" class="form-control spinner" placeholder="Password">
							</div>
						</div>
						<div class="form-group last">
							<label class="col-md-3 control-label">Static Control</label>
							<div class="col-md-4">
								<p class="form-control-static">
									email@example.com
								</p>
							</div>
						</div>
					</div>
					<div class="form-actions fluid">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn green" type="submit">Submit</button>
								<button class="btn default" type="button">Cancel</button>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-group last">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-4">
								<p class="form-control-static">
								</p>
							</div>
						</div>
					</div>
				</form>
				</div>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>

								
<!-- END PAGE CONTENT INNER -->
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/global/plugins/bootstrap-datepicker/css/datepicker.css"/>
@stop

@section('js')
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
	var CompanyForm = function () {


	    return {
	        //main function to initiate the module
	        init: function () {
	        	$('#roc_office_id,#company_type_id').select2({
		            placeholder: "Select an option",
		            allowClear: true
		        });
		        //initialize datepicker
	            $('.date-picker').datepicker({
	                rtl: Metronic.isRTL(),
	                autoclose: true
	            });
	            // use select2 dropdown instead of chosen as select2 works fine with bootstrap on responsive layouts.
	            /*$('.select2_category').select2({
		            placeholder: "Select an option",
		            allowClear: true
		        });

	            $('.select2_sample1').select2({
	                placeholder: "Select a State",
	                allowClear: true
	            });

	            $(".select2_sample2").select2({
	                placeholder: "Type to select an option",
	                allowClear: true,
	                minimumInputLength: 1,
	                query: function (query) {
	                    var data = {
	                        results: []
	                    }, i, j, s;
	                    for (i = 1; i < 5; i++) {
	                        s = "";
	                        for (j = 0; j < i; j++) {
	                            s = s + query.term;
	                        }
	                        data.results.push({
	                            id: query.term + i,
	                            text: s
	                        });
	                    }
	                    query.callback(data);
	                }
	            });

	            $(".select2_sample3").select2({
	                tags: ["red", "green", "blue", "yellow", "pink"]
	            });*/

	        }

	    };

	}();
</script>
<script type="text/javascript">
	$(document).ready(function(){
		CompanyForm.init();
	});
</script>
@stop