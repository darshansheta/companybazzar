@extends('layouts.default')
@section('content')
<!-- BEGIN PAGE CONTENT INNER -->
<div class="col-md-12">
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					Submit Requirement of Company for purchase
				</div>
				
			</div>
			<div class="portlet-body form" style="padding-bottom:10px !important">
				<!-- BEGIN FORM-->
				<form action="javascript:;" class="form-horizontal" id="company_requirement_form" method="post">
					<div class="form-body">
						<div class="alert alert-danger display-hide">
							<button type="button" class="close" data-close="alert"></button>
							You have some form errors. Please check below.
						</div>
						<div class="alert alert-success display-hide hidden">
							<button type="button" class="close" data-close="alert"></button>
							Your form validation is successful!
						</div>
					</div>
					<div class="form-actions pad-v-i top">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<h4>Basic Details</h4>
							</div>
						</div>
					</div>
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Roc Office <span class="required"> * </span></label>
							<div class="col-md-6">
								<select class="form-control" name="roc_office_id" id="roc_office_id">
									<option value="">Select...</option>
									<?php foreach ($roc_officess as $ro): ?>
										<option value="<?php echo $ro['id']; ?>"><?php echo $ro['name']; ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Company Type <span class="required"> * </span></label>
							<div class="col-md-6">
								<select class="form-control" name="company_type_id" id="company_type_id">
									<option value="">Select...</option>
									<?php foreach ($company_types as $ct): ?>
										<option value="<?php echo $ct['id']; ?>"><?php echo $ct['type']; ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Incorporation Date From<span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
									<input type="text" class="form-control" data-input-type="date" name="incorporation_date_from" id="incorporation_date_from">
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Incorporation Date To<span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
									<input type="text" class="form-control" data-input-type="date" name="incorporation_date_to" id="incorporation_date_to">
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Last Balance Sheet Date From<span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
									<input type="text" class="form-control" data-input-type="date" name="last_balance_sheet_date_from" id="last_balance_sheet_date_from">
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Last Balance Sheet Date To<span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
									<input type="text" class="form-control" data-input-type="date" name="last_balance_sheet_date_to" id="last_balance_sheet_date_to">
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Authorized Capital From<span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" class="form-control" name="authorized_capital_from" id="authorized_capital_from" placeholder="Authorized Capital From">
									<span class="input-group-addon">
										.00
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Authorized Capital To<span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" class="form-control" name="authorized_capital_to" id="authorized_capital_to" placeholder="Authorized Capital To">
									<span class="input-group-addon">
										.00
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Paidup Capital From<span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" class="form-control" name="paidup_capital_from" id="paidup_capital_from" placeholder="Paidup Capital From">
									<span class="input-group-addon">
										.00
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Paidup Capital To<span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" class="form-control" name="paidup_capital_to" id="paidup_capital_to" placeholder="Paidup Capital To">
									<span class="input-group-addon">
										.00
									</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-actions pad-v-i top">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<h4><i class="fa fa-info-circle"></i> Other Details</h4>
							</div>
						</div>
					</div>
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Price  From<span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" class="form-control" name="sell_price_from" id="sell_price_from" placeholder=" Price From">
									<span class="input-group-addon">
										.00
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Price To<span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" class="form-control" name="sell_price_to" id="sell_price_to" placeholder="Price To">
									<span class="input-group-addon">
										.00
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Email address <span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" class="form-control" name="email" id="email" placeholder="Email">
									<span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Name <span class="required"> * </span></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
							</div>
						</div>
					</div>
					<div class="form-actions fluid">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn blue-hoki" type="submit">Submit</button>
								<button class="btn default" type="button">Cancel</button>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-group last">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<p class="form-control-static">
								</p>
							</div>
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>
</div>

								
<!-- END PAGE CONTENT INNER -->
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/global/plugins/bootstrap-datepicker/css/datepicker.css"/>
<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"/>
<style type="text/css">
	.loss_detail_field{
		display: none;
	}
</style>
@stop

@section('js')
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script type="text/javascript">
	var handleUniform = function() {
        if (!$().uniform) {
            return;
        }
        var test = $("input[type=checkbox]:not(.toggle, .make-switch, .icheck), input[type=radio]:not(.toggle, .star, .make-switch, .icheck)");
        if (test.size() > 0) {
            test.each(function() {
                if ($(this).parents(".checker").size() === 0) {
                    $(this).show();
                    $(this).uniform();
                }
            });
        }
    };
	var CompanyRequirementForm = function () {

		//validation for company submit form======================================
		    var companySubmitFormValidation = function() {
					
		    		//new validation method for compare less or equak 
		    		$.validator.addMethod("less_or_equal", function(value, element, param) {
		    			//return !this.optional(element) && !this.optional($(element).parent().prev().children("select")[0]);
	    				if(value.trim() == ""){
	    					return true;
	    				}
	    				if($('#'+param).val().trim() == ""){
	    					return true;
	    				}
	    				if($(element).attr("data-input-type") == "date"){
	    					var mainValue = value.split('/');
					        var mainValueNum = (mainValue[2] + mainValue[1] + mainValue[0]) * 1;
					        var cmpValue = $('#'+param).val().split('/');
					        var cmpValueNum = (cmpValue[2] + cmpValue[1] + cmpValue[0]) * 1;
					        if(mainValueNum <= cmpValueNum){
					        	return true;
					        }else{
					        	return false;
					        }
	    				}else{
	    					var mainValue = value *1;
					        var cmpValue = $('#'+param).val()*1;
					        if(mainValue <= cmpValue){
					        	return true;
					        }else{
					        	return false;
					        }
					    }
	    				if($(element).val().trim() == ''){
	    					return false;
	    				}else{
	    					if($(element).next().find('.is_compliance').is(':checked')){
	    						if($(element).next().next().val() == ''){
	    							return false;
	    						}else{
	    							return true;
	    						}
	    					}else{
	    						return true;
	    					}
	    				}
	    			}, " ");

					//new validation method for compare greater or equak 
					$.validator.addMethod("greater_or_equal", function(value, element, param) {
						if(value.trim() == ""){
	    					return true;
	    				}
	    				if($('#'+param).val().trim() == ""){
	    					return true;
	    				}
	    				if($(element).attr("data-input-type") == "date"){
	    					var mainValue = value.split('/');
					        var mainValueNum = (mainValue[2] + mainValue[1] + mainValue[0]) * 1;
					        var cmpValue = $('#'+param).val().split('/');
					        var cmpValueNum = (cmpValue[2] + cmpValue[1] + cmpValue[0]) * 1;
					        if(mainValueNum >= cmpValueNum){
					        	return true;
					        }else{
					        	return false;
					        }
	    				}else{
	    					var mainValue = value *1;
					        var cmpValue = $('#'+param).val()*1;
					        if(mainValue >= cmpValue){
					        	return true;
					        }else{
					        	return false;
					        }
					    }
	    				if($(element).val().trim() == ''){
	    					return false;
	    				}else{
	    					if($(element).next().find('.is_compliance').is(':checked')){
	    						if($(element).next().next().val() == ''){
	    							return false;
	    						}else{
	    							return true;
	    						}
	    					}else{
	    						return true;
	    					}
	    				}
	    			}, " ");

					var companyRequirementForm = $('#company_requirement_form');
		            var error3 = $('.alert-danger', companyRequirementForm);
		            var success3 = $('.alert-success', companyRequirementForm);

		            
		            companyRequirementForm.validate({
		                errorElement: 'span', //default input error message container
		                errorClass: 'help-block help-block-error', // default input error message class
		                focusInvalid: false, // do not focus the last invalid input
		                ignore: "", // validate all fields including form hidden input
		                rules: {
		                    name: {
		                        minlength: 2,
		                        required: true
		                    },
		                    email: {
		                        required: true,
		                        email: true
		                    },  
		                    roc_office_id: {
		                        required: true
		                    },
		                    company_type_id: {
		                        required: true
		                    },
		                    incorporation_date_from: {
		                        required: true,
		                        less_or_equal:'incorporation_date_to'
		                    },
		                    incorporation_date_to: {
		                        required: true,
		                        greater_or_equal:'incorporation_date_from'
		                    },
		                    last_balance_sheet_date_from: {
		                        required: true,
		                        less_or_equal:'last_balance_sheet_date_to'
		                    },
		                    last_balance_sheet_date_to: {
		                        required: true,
		                        greater_or_equal:'last_balance_sheet_date_from'
		                    },
		                    authorized_capital_from: {
		                        required: true,
		                        digits: true,
		                        less_or_equal:'authorized_capital_to'
		                    },
		                    authorized_capital_to: {
		                        required: true,
		                        digits: true,
		                        greater_or_equal:'authorized_capital_from'
		                    },
		                    paidup_capital_from: {
		                        required: true,
		                        digits: true,
		                        less_or_equal:'paidup_capital_to'
		                    },
		                    paidup_capital_to: {
		                        required: true,
		                        digits: true,
		                        greater_or_equal:'paidup_capital_from'
		                    },
		                    sell_price_from: {
		                        required: true,
		                        digits: true,
		                        less_or_equal:'sell_price_to'
		                    },
		                    sell_price_to: {
		                        required: true,
		                        digits: true,
		                        greater_or_equal:'sell_price_from'
		                    }
		                },
		                messages: {
		                    incorporation_date_from: {
		                        less_or_equal:'This field value must be less or equal to below field.'
		                    },
		                    incorporation_date_to: {
		                        greater_or_equal:'This field value must be greater or equal to above field.'
		                    },
		                    last_balance_sheet_date_from: {
		                        less_or_equal:'This field value must be less or equal to below field.'
		                    },
		                    last_balance_sheet_date_to: {
		                        greater_or_equal:'This field value must be greater or equal to above field.'
		                    },
		                    authorized_capital_from: {
		                        less_or_equal:'This field value must be less or equal to below field.'
		                    },
		                    authorized_capital_to: {
		                        greater_or_equal:'This field value must be greater or equal to above field.'
		                    },
		                    paidup_capital_from: {
		                        less_or_equal:'This field value must be less or equal to below field.'
		                    },
		                    paidup_capital_to: {
		                        greater_or_equal:'This field value must be greater or equal to above field.'
		                    },
		                    sell_price_from: {
		                        less_or_equal:'This field value must be less or equal to below field.'
		                    },
		                    sell_price_to: {
		                        greater_or_equal:'This field value must be greater or equal to above field.'
		                    }
		                },
						errorPlacement: function (error, element) { // render error placement for each input type
		                    if (element.parent(".input-group").size() > 0) {
		                        error.insertAfter(element.parent(".input-group"));
		                    } else if (element.attr("data-error-container")) { 
		                        error.appendTo(element.attr("data-error-container"));
		                    } else if (element.parents('.radio-list').size() > 0) { 
		                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
		                    } else if (element.parents('.radio-inline').size() > 0) { 
		                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
		                    } else if (element.parents('.checkbox-list').size() > 0) {
		                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
		                    } else if (element.parents('.checkbox-inline').size() > 0) { 
		                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
		                    } else {
		                        error.insertAfter(element); // for other inputs, just perform default behavior
		                    }
		                },

		                invalidHandler: function (event, validator) { //display error alert on form submit   
		                    success3.hide();
		                    error3.show();
		                    Metronic.scrollTo(error3, -200);
		                },

		                highlight: function (element) { // hightlight error inputs
		                   $(element)
		                        .closest('.form-group').addClass('has-error'); // set error class to the control group
		                },

		                unhighlight: function (element) { // revert the change done by hightlight
		                    $(element)
		                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
		                },

		                success: function (label) {
		                    label
		                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
		                },

		                submitHandler: function (form) {
		                    //success3.show();
		                    error3.hide();
		                    //companyRequirementForm.submit(); // submit the form
		                    //console.log(JSON.parse(companyRequirementForm.serialize()));
		                    Metronic.scrollTop();
							Metronic.blockUI({
								target: '#company_requirement_form',
								boxed: true,
								textOnly: true,
								message: 'Processing...'
							});
		                    $.ajax({
		                    	url : "<?php echo URL::to('/submit-requirement'); ?>",
		                    	type:'post',
		                    	data:companyRequirementForm.serialize(),
		                    	dataType:'json',
		                    	success : function(response){
		                    		if(response.success){
										Metronic.alert({
											container:'#company_requirement_form .form-body:first',
											place: 'prepend', // append or prepent in container 
											type: 'success',  // alert's type
											message: response.message,  // alert's message
										});
										CompanyRequirementForm.reset();
		                    		}else{
		                    			Metronic.alert({
		                    				container:'#company_requirement_form .form-body:first',
		                    				place: 'prepend', // append or prepent in container 
		                    				type: 'danger',  // alert's type
		                    				message: response.error,  // alert's message
		                    			});
		                    		}
		                    		Metronic.unblockUI('#company_requirement_form');
		                    	},
		                    	error : function(){
		                    		Metronic.unblockUI('#company_requirement_form');
		                    	}
		                    });
		                }

		            });

		             //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
		            $('.select2me', companyRequirementForm).change(function () {
		                companyRequirementForm.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
		            });

		            // initialize select2 tags
		            $("#select2_tags").change(function() {
		                companyRequirementForm.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
		            }).select2({
		                tags: ["red", "green", "blue", "yellow", "pink"]
		            });

		            //initialize datepicker
		            $('.date-picker').datepicker({
		                rtl: Metronic.isRTL(),
		                autoclose: true
		            });
		            $('.date-picker .form-control').change(function() {
		                companyRequirementForm.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
		            })
		    }
		//validation end==========================================================
		var  incrementVar = 1;
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
	            //init validation
	            companySubmitFormValidation();

	            
	        },
	        reset : function(){
	        	$("#company_requirement_form input[type='text']").val('');

	        	$("#roc_office_id").select2('val', '');
	        	$("#company_type_id").select2('val', '');

	        	incrementVar = 1;
	        	
			}

	    };

	}();
</script>
<script type="text/javascript">
	$(document).ready(function(){
		CompanyRequirementForm.init();
	});
</script>
@stop