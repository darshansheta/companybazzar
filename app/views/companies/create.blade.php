@extends('layouts.default')
@section('content')
<!-- BEGIN PAGE CONTENT INNER -->
<div class="col-md-12">
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					Register Company for Sell
				</div>
				
			</div>
			<div class="portlet-body form" style="padding-bottom:10px !important">
				<!-- BEGIN FORM-->
				<form action="javascript:;" class="form-horizontal" id="company_sell_form" method="post">
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
							<label class="col-md-3 control-label">Incorporation Date <span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
									<input type="text" class="form-control" name="incorporation_date" id="incorporation_date">
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Last Balance Sheet Date <span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
									<input type="text" class="form-control" name="last_balance_sheet_date" id="last_balance_sheet_date">
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Authorized Capital <span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" class="form-control" name="authorized_capital" id="authorized_capital" placeholder="Authorized Capital">
									<span class="input-group-addon">
										.00
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Paidup Capital <span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" class="form-control" name="paidup_capital" id="paidup_capital" placeholder="Paidup Capital">
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
								<h4><i class="fa fa-info-circle"></i> Compailance Details</h4>
							</div>
						</div>
					</div>
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Compailed Upto Date <span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
									<input type="text" class="form-control" name="compliance_upto_date" id="compliance_upto_date">
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
							</div>
						</div>
						
						<div class="form-group" id="add_compliance_element_wrapper">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<button type="button" class="btn blue-hoki pull-right" id="add_compliance_element"> + Add More</button>
							</div>
						</div>
						<div class="form-group compliance_element">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" class="form-control compliance_label check_comliance_label_date" name="compliance_label[0]" placeholder="Compailance" id="compliance_label_0">
									<span class="input-group-addon">
										<input type="checkbox" class="is_compliance" name="is_compliance[0]"> Is Compailance ?
									</span>
									<input type="text" value="" name="compliance_date[0]" size="16" data-date-format="dd/mm/yyyy" class="form-control date-picker compliance_date " style="display:none;" placeholder="dd/mm/yyyy">
									<span class="input-group-btn">
										<button type="button" class="btn red" onclick="$(this).closest('.compliance_element').remove()">&times;</button>
									</span>
									
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions pad-v-i top">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<h4><i class="fa fa-file"></i> Balance Sheets</h4>
							</div>
						</div>
					</div>
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Liability</label>
							<div class="col-md-6">
								<div class="input-group">
									<!-- <select class="form-control">
										<option>Liability</option>
									</select> -->
									<input type="text" class="form-control" id="add_liability" name="add_liability" placeholder="Liability">
									<span class="input-group-addon">
										Amount :
									</span>
									<input type="text" class="form-control" id="add_liability_amount" name="add_liability_amount" placeholder="0">
									<span class="input-group-addon">
										.00
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Asset</label>
							<div class="col-md-6">
								<div class="input-group">
									<!-- <select class="form-control">
										<option>Liability</option>
									</select> -->
									<input type="text" class="form-control" id="add_asset" name="add_asset" placeholder="Asset">
									<span class="input-group-addon">
										Amount :
									</span>
									<input type="text" class="form-control" id="add_asset_amount" name="add_asset_amount" placeholder="0">
									<span class="input-group-addon">
										.00
									</span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<button class="btn blue-hoki btn-block" type="button" id="add_balance_sheet_data"> <i class="fa fa-arrow-down fa-fw"></i> Add</button>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<!---------------------------------------------------------->
								<div class="table-responsive">
								<table class="table table-striped table-condensed flip-content" id="balance_sheet_data">
									<thead class="flip-content">
										<tr>
											<th>
												 Liability
											</th>
											
											<th class="numeric" align="right" style=" text-align: right;">
												 Amount
											</th>

											<th>
												 Asset
											</th>
											<th class="numeric" align="right" style=" text-align: right;">
												 Amount
											</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										{{-- <tr>
											<td>holaa </td>
											<td class="numeric" align="right">78800.00</td>
											<td> drecko</td>
											<td class="numeric" align="right">67000</td>
											<td><button type="button" class="btn red pull-right btn-xs" onclick="$(this).parent().parent().remove();">&nbsp;&times&nbsp;</button></td>
										</tr> --}}
									</tbody>
								</table>
								</div>
								<!---------------------------------------------------------->
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Is in Loss</label>
							<div class="col-md-6">
								<input type="checkbox" name="in_lost" id="in_lost" class="make-switch" data-size="normal" data-on-text="Yes" data-off-text="No" data-on-color="default" data-off-color="danger">
							</div>
						</div>
						<div class="form-group loss_detail_field">
							<label class="col-md-3 control-label">Loss Amount</label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" class="form-control" name="total_loss_amount" id="total_loss_amount" placeholder="Loss Amount">
									<span class="input-group-addon">
										.00
									</span>
								</div>
							</div>
						</div>
						<div class="form-group loss_detail_field">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<div class="input-group">
									<select class="form-control" name="add_year_end" id="add_year_end">
										<option value="" >Year End</option>
										<?php foreach (range((date('Y') - 10), date('Y')) as $key => $value): ?>
										<option value="<?php echo $value; ?>" ><?php echo $value; ?></option>
										<?php endforeach ?>
									</select>
									<span class="input-group-addon">
										Amount :
									</span>
									<input type="text" class="form-control" name="add_year_loss_amount" id="add_year_loss_amount" placeholder="0">
									<span class="input-group-addon">
										.00
									</span>
									<span class="input-group-btn">
										<button type="button" class="btn blue-hoki" id="add_loss_data"><i class="fa fa-arrow-down fa-fw"></i> Add</button>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group loss_detail_field">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<!---------------------------------------------------------->
								<div class="table-responsive">
								<table class="table table-striped table-condensed flip-content" id="loss_data">
									<thead class="flip-content">
										<tr>
											<th>
												 Year End
											</th>
											
											<th class="numeric" align="right" style=" text-align: right;">
												 Amount
											</th>

											<th></th>
										</tr>
									</thead>
									<tbody>
										{{-- <tr>
											<td>2014</td>
											<td class="numeric" align="right">78800.00</td>
											<td><button type="button" class="btn red pull-right btn-xs" onclick="$(this).parent().parent().remove();">&nbsp;&times&nbsp;</button></td>
										</tr> --}}
									</tbody>
								</table>
								</div>
								<!---------------------------------------------------------->
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Number Of Charges <span class="required"> * </span></label>
							<div class="col-md-6">
								<select class="form-control" name="number_of_charge" id="number_of_charge">
										<?php foreach (range(0, 50) as $key => $value): ?>
										<option value="<?php echo $value; ?>" ><?php echo $value; ?></option>
										<?php endforeach ?>
									</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Selling Price <span class="required"> * </span></label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" class="form-control" name="sell_price" id="sell_price" placeholder="Selling Price">
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
	var CompanyForm = function () {

		//validation for company submit form======================================
		    var companySubmitFormValidation = function() {

		    		//new validation method for compailance fields 
		    		$.validator.addMethod("check_comliance_label_date", function(value, element) {
	    				//return !this.optional(element) && !this.optional($(element).parent().prev().children("select")[0]);
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

	    			//new validtion method for check loss
	    			$.validator.addMethod("check_loss", function(value, element) {
	    				//return !this.optional(element) && !this.optional($(element).parent().prev().children("select")[0]);
	    				if($(element).val().trim() == '' && $('#in_lost').is(':checked') ){
	    					return false;
	    				}else{
	    					return true;
	    				}
	    			}, " ");

		            var companySellForm = $('#company_sell_form');
		            var error3 = $('.alert-danger', companySellForm);
		            var success3 = $('.alert-success', companySellForm);

		            
		            companySellForm.validate({
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
		                    incorporation_date: {
		                        required: true
		                    },
		                    last_balance_sheet_date: {
		                        required: true
		                    },
		                    authorized_capital: {
		                        required: true,
		                        digits: true
		                    },
		                    paidup_capital: {
		                        required: true,
		                        digits: true
		                    },
		                    compliance_upto_date: {
		                        required: false
		                    },
		                    sell_price: {
		                        required: true,
		                        digits: true
		                    },
		                    total_loss_amount: {
		                        digits: true,
		                        check_loss: true
		                    },
		                    number_of_charge: {
		                        required: true
		                    }
		                },

		                messages: { // custom messages for radio buttons and checkboxes
		                    membership: {
		                        required: "Please select a Membership type"
		                    },
		                    service: {
		                        required: "Please select  at least 2 types of Service",
		                        minlength: jQuery.validator.format("Please select  at least {0} types of Service")
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
							var liability_amount_total = 0
							$("input[name='liability_amount[]']").each(function(){
								liability_amount_total = liability_amount_total + parseInt($(this).val());
							});
							var asset_amount_total = 0
							$("input[name='asset_amount[]']").each(function(){
								asset_amount_total = asset_amount_total + parseInt($(this).val());
							});
							
							if(asset_amount_total != liability_amount_total){
								alert("Balance Sheet need to be tally");
								return false;
							}
		                    //success3.show();
		                    error3.hide();
		                    //companySellForm.submit(); // submit the form
		                    //console.log(JSON.parse(companySellForm.serialize()));
		                    Metronic.scrollTop();
							Metronic.blockUI({
								target: '#company_sell_form',
								boxed: true,
								textOnly: true,
								message: 'Processing...'
							});
		                    $.ajax({
		                    	url : "<?php echo URL::to('/submit-company'); ?>",
		                    	type:'post',
		                    	data:companySellForm.serialize(),
		                    	dataType:'json',
		                    	success : function(response){
		                    		if(response.success){
										Metronic.alert({
											container:'#company_sell_form .form-body:first',
											place: 'prepend', // append or prepent in container 
											type: 'success',  // alert's type
											message: response.message,  // alert's message
										});
										CompanyForm.reset();
		                    		}else{
		                    			Metronic.alert({
		                    				container:'#company_sell_form .form-body:first',
		                    				place: 'prepend', // append or prepent in container 
		                    				type: 'danger',  // alert's type
		                    				message: response.error,  // alert's message
		                    			});
		                    		}
		                    		Metronic.unblockUI('#company_sell_form');
		                    	},
		                    	error : function(){
		                    		Metronic.unblockUI('#company_sell_form');
		                    	}
		                    });
		                }

		            });

		             //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
		            $('.select2me', companySellForm).change(function () {
		                companySellForm.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
		            });

		            // initialize select2 tags
		            $("#select2_tags").change(function() {
		                companySellForm.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
		            }).select2({
		                tags: ["red", "green", "blue", "yellow", "pink"]
		            });

		            //initialize datepicker
		            $('.date-picker').datepicker({
		                rtl: Metronic.isRTL(),
		                autoclose: true
		            });
		            $('.date-picker .form-control').change(function() {
		                companySellForm.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
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
	            $(".portlet-body").on("change",".is_compliance",function(){
	            	var compliance_date = $(this).closest(".form-group").find(".compliance_date");
	            	if($(this).is(":checked")){
	            		compliance_date.show();
	            	}else{
	            		compliance_date.hide();
	            	}
	            });
	            /*$(".is_compliance").change(function(){
	            	var compliance_date = $(this).closest(".form-group").find(".compliance_date");
	            	if($(this).is(":checked")){
	            		compliance_date.show();
	            	}else{
	            		compliance_date.hide();
	            	}
	            });*/
	            $(".is_compliance").each(function(){
	            	var compliance_date = $(this).closest(".form-group").find(".compliance_date");
	            	if($(this).is(":checked")){
	            		compliance_date.show();
	            	}else{
	            		compliance_date.hide();
	            	}
	            });
				
	           	$("#add_compliance_element").click(function(){
                	var compliance_element = '<div class="form-group compliance_element">\
													<label class="col-md-3 control-label"></label>\
													<div class="col-md-6">\
														<div class="input-group">\
															<input type="text" id="compliance_label_'+incrementVar+'" class="form-control compliance_label check_comliance_label_date" name="compliance_label['+incrementVar+']" placeholder="Compailance">\
															<span class="input-group-addon">\
																<input type="checkbox" class="is_compliance" name="is_compliance['+incrementVar+']"> Is Compailance ?\
															</span>\
															<input type="text" value="" name="compliance_date['+incrementVar+']" size="16" data-date-format="dd/mm/yyyy" class="form-control date-picker compliance_date " style="display:none;" placeholder="dd/mm/yyyy">\
															<span class="input-group-btn">\
																<button type="button" class="btn red" onclick="$(this).closest(\'.compliance_element\').remove()">&times;</button>\
															</span>\
														</div>\
													</div>\
												</div>';
					incrementVar++;												
                	var compliance_element_last = $(".compliance_element:last");
                	if(compliance_element_last.length){
                		compliance_element_last.after(compliance_element);
                	}else{
                		$("#add_compliance_element_wrapper").after(compliance_element);
                	}
                	handleUniform();
            		if(jQuery().datepicker) {
                    	$('.date-picker').datepicker({
                        	rtl: Metronic.isRTL(),
                        	//orientation: "left",
                        	autoclose: true
                    		});
                		}
                		//notes : when doing validation some time we need to give field name like randum[1123] instead od randum[]
                		/*$('.compliance_label').each(function () { 
							$(this).rules("add", {
								required: true
							});
						});*/
                	return false;
                });
				
				$("#add_balance_sheet_data").click(function(){

					//validate data
					if($("#add_liability").val().trim() == '' ||  !$("#add_liability_amount").val().match(/^\d+$/)){

						$("#add_liability").closest(".input-group").addClass("has-error");
						//console.log('liability');
						return false;
					}
					$("#add_liability").closest(".input-group").removeClass("has-error");
					
					if($("#add_asset").val().trim() == '' ||  !$("#add_asset_amount").val().match(/^\d+$/)){

						$("#add_asset").closest(".input-group").addClass("has-error");
						//console.log('asset');
						return false;
					}
					$("#add_asset").closest(".input-group").removeClass("has-error");

					var balance_sheet_data_row = '<tr>\
											<td>'+$("#add_liability").val()+'<input type="hidden" value="'+$("#add_liability").val()+'" name="liability[]"></td>\
											<td class="numeric" align="right">'+$("#add_liability_amount").val()+'.00<input type="hidden" name="liability_amount[]" value="'+$("#add_liability_amount").val()+'"></td>\
											<td>'+$("#add_asset").val()+'<input type="hidden" value="'+$("#add_asset").val()+'" name="asset[]"></td>\
											<td class="numeric" align="right">'+$("#add_asset_amount").val()+'.00<input type="hidden" name="asset_amount[]" value="'+$("#add_asset_amount").val()+'"></td>\
											<td><button type="button" class="btn red pull-right btn-xs" onclick="$(this).parent().parent().remove();">&nbsp;&times&nbsp;</button></td>\
										</tr>';

					//append html td to table
					$("#balance_sheet_data tbody").append(balance_sheet_data_row);

					//reset value
					$("#add_liability").val('');
					$("#add_liability_amount").val('');
					$("#add_asset").val('');
					$("#add_asset_amount").val('');

				});
				$("#add_loss_data").click(function(){

					//validate data
					if($("#add_year_end").val().trim() == '' ||  !$("#add_year_loss_amount").val().match(/^\d+$/)){

						$("#add_year_end").closest(".input-group").addClass("has-error");
						//console.log('liability');
						return false;
					}
					$("#add_year_end").closest(".input-group").removeClass("has-error");
					//$(\"#add_year_end option[value=\''+$("#add_year_end").val()+'\']\").show();
					var loss_data_row = '<tr>\
											<td><input type="hidden" name="year_end[]" value="'+$("#add_year_end").val()+'">'+$("#add_year_end").val()+'</td>\
											<td class="numeric" align="right"><input type="hidden" name="loss_amount[]" value="'+$("#add_year_loss_amount").val()+'">'+$("#add_year_loss_amount").val()+'.00</td>\
											<td><button class="btn red pull-right btn-xs" onclick="$(this).parent().parent().remove();$(\'#add_year_end option[value='+$("#add_year_end").val()+']\').show();">&nbsp;&times&nbsp;</button></td>\
										</tr>';
					$("#add_year_end option:selected").hide();
					$("#add_year_end").val('')
					$("#add_year_loss_amount").val('')
					$("#loss_data tbody").append(loss_data_row);
					//append html td to table

					//reset value

				});

				//show-hide company loss detail fields
				$('input[name="in_lost"]').on('switchChange.bootstrapSwitch', function(event, state) {
					//console.log(this); // DOM element
					//console.log(event); // jQuery event
					//console.log(state); // true | false
					if(state){
						$(".loss_detail_field").slideDown();
					}else{
						$(".loss_detail_field").slideUp();
					}
				});

				//on page load check checkbox is checked or not
				if($('input[name="in_lost"]').bootstrapSwitch('state')){
					$(".loss_detail_field").show();
				}
	            // use select2 dropdown instead of chosen as select2 works fine with bootstrap on responsive layouts.
	            
	            //init validation
	            companySubmitFormValidation();

	            //add new element

	            $("#add_compliance_element").click();
				$("#add_compliance_element").click();

	            //addtional validation on submit button
	            /*$("#company_sell_form").submit(function(event){
	            	$(".compliance_label").each(function(){
	            		$(this).rules("add", 
	                   {
	                       required: true
	                   })
	            	});
	            	event.preventDefault();
					if($('#company_sell_form').validate().form()) {
						console.log("validates");
					} else {
						console.log("does not validate");
					}
					console.log("done");
					return false;
	            });*/

	        },
	        reset : function(){
	        	$("#company_sell_form input[type='text']").val('');

	        	$("#roc_office_id").select2('val', '');
	        	$("#company_type_id").select2('val', '');

	        	$(".compliance_element").remove();
	        	incrementVar = 1;
	        	$("#add_compliance_element").click();
	        	$("#add_compliance_element").click();

	        	$("#balance_sheet_data tbody").empty();
	        	//state, state, triggerEvent
	        	$('input[name="in_lost"]').bootstrapSwitch('state',false,false);
	        	$("#loss_data tbody").empty();
	        	$('#number_of_charge').val('0');

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