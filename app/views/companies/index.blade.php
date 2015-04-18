@extends('layouts.default')
@section('content')
<!-- BEGIN PAGE CONTENT INNER -->
<div class="col-md-12">
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					Search Companies
				</div>
				
			</div>
			<div class="portlet-body form" style="padding-bottom:10px !important;border-radius:0px !important">
				<!---->
				<!-- BEGIN FORM-->
				<form action="" class="horizontal-form">
					<div class="form-body">
						<h3 class="form-section">Search fields</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Roc Office</label>
									<select class="form-control" name="roc_office_id" id="roc_office_id">
									<option value="">Select...</option>
									<?php foreach ($roc_officess as $ro): ?>
										<option value="<?php echo $ro['id']; ?>"><?php echo $ro['name']; ?></option>
									<?php endforeach ?>
								</select>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Company Type</label>
									<select class="form-control" name="company_type_id" id="company_type_id">
									<option value="">Select...</option>
									<?php foreach ($company_types as $ct): ?>
										<option value="<?php echo $ct['id']; ?>"><?php echo $ct['type']; ?></option>
									<?php endforeach ?>
								</select>
								</div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Incorporation Date Range</label>
									<div class="input-group">
										<input type="text" placeholder="dd/mm/yyyy" name="incorporation_date_from" id="incorporation_date_from" class="form-control " data-date-format="dd/mm/yyyy">
										<span class="input-group-addon">
											 To 
										</span>
										<input type="text" placeholder="dd/mm/yyyy" name="incorporation_date_to" id="incorporation_date_to" class="form-control" data-date-format="dd/mm/yyyy">
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Last Balance Sheet Date Range</label>
									<div class="input-group">
										<input type="text" placeholder="dd/mm/yyyy" name="last_balance_sheet_date_from" id="last_balance_sheet_date_from" class="form-control " data-date-format="dd/mm/yyyy">
										<span class="input-group-addon">
											 To 
										</span>
										<input type="text" placeholder="dd/mm/yyyy" name="last_balance_sheet_date_to" id="last_balance_sheet_date_to" class="form-control" data-date-format="dd/mm/yyyy">
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Authorized Capital Range</label>
									<div class="input-group">
										<input type="text" placeholder="00" name="authorized_capital_from" id="authorized_capital_from" class="form-control ">
										<span class="input-group-addon">
											 To 
										</span>
										<input type="text" placeholder="00" name="authorized_capital_to" id="authorized_capital_to" class="form-control" >
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">PaidUp Capital Range</label>
									<div class="input-group">
										<input type="text" placeholder="00" name="paidup_capital_from" id="paidup_capital_from" class="form-control ">
										<span class="input-group-addon">
											 To 
										</span>
										<input type="text" placeholder="00" name="paidup_capital_to" id="paidup_capital_to" class="form-control" >
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Selling Price Range</label>
									<div class="input-group">
										<input type="text" placeholder="00" name="sell_price_from" id="sell_price_from" class="form-control ">
										<span class="input-group-addon">
											 To 
										</span>
										<input type="text" placeholder="00" name="sell_price_to" id="sell_price_to" class="form-control" >
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Is in Loss</label>
									<select class="form-control" name="in_lost" id ="in_lost">
										<option value="both">All</option>
										<option value="1">In Loss</option>
										<option value="0">Not in Loss</option>
									</select>
									{{-- <div class="input-group">
										<input type="checkbox" name="in_lost" id="in_lost" class="make-switch" data-size="normal" data-on-text="Yes" data-off-text="No" data-on-color="default" data-off-color="danger">
									</div> --}}
								</div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
					</div>
					<div class="form-actions right">
						{{-- <button type="button" class="btn default">Cancel</button> --}}
						<button type="submit" class="btn blue-hoki"><i class="fa fa-search"></i> Search</button>
						<button type="submit" class="btn red" id="reset_btn">Reset</button>
					</div>
				</form>
				<!-- END FORM-->
			</div>
			<!-- ---------------------------------------------- -->
			<div class="portlet-body">
			{{-- <div class="table-responsive"> --}}
			{{-- <table class="table table-striped flip-content" id="balance_sheet_data">
				<thead class="flip-content">
					<tr>
						<th>
							 Last BalanceSheet Date
						</th>
						<th>
							 Incorporation Date
						</th>
						
						<th class="numeric" align="right" style=" text-align: right;">
							 Authorized Capital
						</th>
						<th class="numeric" align="right" style=" text-align: right;">
							 PaidUp Capital
						</th>

						<th>
							 Number OF Charges
						</th>
						<th class="numeric" align="right" style=" text-align: right;">
							 Selling price
						</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>28/02/2015 </td>
						<td>04/03/201 </td>
						<td class="numeric" align="right">78800.00</td>
						<td class="numeric" align="right">56800.00</td>
						<td> 4</td>
						<td class="numeric" align="right">67000.00</td>
						<td><button type="button" class="btn red pull-right btn-xs" onclick="$(this).parent().parent().remove();">&nbsp;&times&nbsp;</button></td>
					</tr>
					<tr>
						<td>28/02/2015 </td>
						<td>04/03/201 </td>
						<td class="numeric" align="right">78800.00</td>
						<td class="numeric" align="right">56800.00</td>
						<td> 4</td>
						<td class="numeric" align="right">67000.00</td>
						<td><button type="button" class="btn red pull-right btn-xs" onclick="$(this).parent().parent().remove();">&nbsp;&times&nbsp;</button></td>
					</tr>
					<tr>
						<td>28/02/2015 </td>
						<td>04/03/201 </td>
						<td class="numeric" align="right">78800.00</td>
						<td class="numeric" align="right">56800.00</td>
						<td> 4</td>
						<td class="numeric" align="right">67000.00</td>
						<td><button type="button" class="btn red pull-right btn-xs" onclick="$(this).parent().parent().remove();">&nbsp;&times&nbsp;</button></td>
					</tr>
					<tr>
						<td>28/02/2015 </td>
						<td>04/03/201 </td>
						<td class="numeric" align="right">78800.00</td>
						<td class="numeric" align="right">56800.00</td>
						<td> 4</td>
						<td class="numeric" align="right">67000.00</td>
						<td><button type="button" class="btn red pull-right btn-xs" onclick="$(this).parent().parent().remove();">&nbsp;&times&nbsp;</button></td>
					</tr>
					<tr>
						<td>28/02/2015 </td>
						<td>04/03/201 </td>
						<td class="numeric" align="right">78800.00</td>
						<td class="numeric" align="right">56800.00</td>
						<td> 4</td>
						<td class="numeric" align="right">67000.00</td>
						<td><button type="button" class="btn red pull-right btn-xs" onclick="$(this).parent().parent().remove();">&nbsp;&times&nbsp;</button></td>
					</tr>
				</tbody>
			</table> --}}

			<!-- ------------------------MMM-------------------------- -->
			<table class="table table-striped {{-- table-condensed --}} flip-content table-hover" id="company_search_table">
				<thead class="flip-content">
					<tr>
						<th>
							 Last BalanceSheet Date
						</th>
						<th>
							 Incorporation Date
						</th>
						
						<th class="numeric" align="right" style=" text-align: right;">
							 Authorized Capital
						</th>
						<th class="numeric" align="right" style=" text-align: right;">
							 PaidUp Capital
						</th>

						<th width="5%">
							 Number OF Charges
						</th>
						<th class="numeric" align="right" style=" text-align: right;">
							 Selling price
						</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($companies as $company): ?>
					<tr>
						<td>{{date('d/m/Y',strtotime($company->last_balance_sheet_date))}}</td>
						<td>{{date('d/m/Y',strtotime($company->incorporation_date))}}</td>
						<td class="numeric" align="right">{{number_format($company->authorized_capital,2)}}</td>
						<td class="numeric" align="right">{{number_format($company->paidup_capital,2)}}</td>
						<td class="numeric" align="right">{{$company->number_of_charge}}</td>
						<td class="numeric" align="right">{{number_format($company->sell_price,2)}}</td>
						<td>
						<a href="javascript:;" data-placement="left" class="popovers btn blue btn-xs" data-container="body" data-html="true" data-content="Email: {{$company->user->email}}<br>Name: {{$company->user->first_name}}" data-original-title="Contact Detail">
							&nbsp;<i class="fa fa-info"></i>&nbsp;
						</a>
						{{-- <button type="button" class="btn red pull-right btn-xs" onclick="$(this).parent().parent().remove();">&nbsp;&times&nbsp;</button> --}}
						</td>
					</tr>
					<?php endforeach ?>
					@if(!count($companies))
					@endif
					{{-- <tr>
						<td>28/03/2015 </td>
						<td>04/03/2011 </td>
						<td class="numeric" align="right">78800.00</td>
						<td class="numeric" align="right">56800.00</td>
						<td class="numeric" align="right"> 4</td>
						<td class="numeric" align="right">67000.00</td>
						<td><button type="button" class="btn red pull-right btn-xs" onclick="$(this).parent().parent().remove();">&nbsp;&times&nbsp;</button></td>
					</tr> --}}
				</tbody>
			</table>
			<!-- -------------------------------------------------- -->
			
			{{-- </div> --}}
			</div>
			<!-- ---------------------------------------------- -->
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
<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
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
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
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
	var CompanySearch = function () {

		//validation end==========================================================
		var  incrementVar = 1;

		var	companySearchTable = $("#company_search_table");

			// begin first table

					jQuery.extend( jQuery.fn.dataTableExt.oSort, {
					    "date-uk-pre": function ( a ) {
					        if (a == null || a == "") {
					            return 0;
					        }
					        var ukDatea = a.split('/');
					        return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
					    },
					 
					    "date-uk-asc": function ( a, b ) {
					        return ((a < b) ? -1 : ((a > b) ? 1 : 0));
					    },
					 
					    "date-uk-desc": function ( a, b ) {
					        return ((a < b) ? 1 : ((a > b) ? -1 : 0));
					    }
					} );
					jQuery.extend( jQuery.fn.dataTableExt.oSort, {
					    "numeric-comma-pre": function ( a ) {
					        var x = (a == "-") ? 0 : a.replace( /,/, "." );
					        return parseFloat( x );
					    },
					 
					    "numeric-comma-asc": function ( a, b ) {
					        return ((a < b) ? -1 : ((a > b) ? 1 : 0));
					    },
					 
					    "numeric-comma-desc": function ( a, b ) {
					        return ((a < b) ? 1 : ((a > b) ? -1 : 0));
					    }
					} );
			        companySearchTable.dataTable({

			            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
			            "language": {
			                "aria": {
			                    "sortAscending": ": activate to sort column ascending",
			                    "sortDescending": ": activate to sort column descending"
			                },
			                "emptyTable": "No data available in",
			                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
			                "infoEmpty": "No entries found",
			                "infoFiltered": "(filtered1 from _MAX_ total entries)",
			                "lengthMenu": "Show _MENU_ entries",
			                "search": "Search:",
			                "zeroRecords": "No matching records found"
			            },

			            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
			            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
			            // So when dropdowns used the scrollable div should be removed. 
			            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

			            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.

			            "columns": [{
			                "orderable": true
			            }, {
			                "orderable": true
			            }, {
			                "orderable": true
			            }, {
			                "orderable": true
			            }, {
			                "orderable": true
			            }, {
			                "orderable": true
			            }, {
			                "orderable": false
			            }],
			            "lengthMenu": [
			                [10, 15, 20, -1],
			                [10, 15, 20, "All"] // change per page values here
			            ],
			            // set the initial value
			            "pageLength": 10,            
			            "pagingType": "bootstrap_full_number",
			            "language": {
			                "search": "My search: ",
			                "lengthMenu": "  _MENU_ records",
			                "paginate": {
			                    "previous":"Prev",
			                    "next": "Next",
			                    "last": "Last",
			                    "first": "First"
			                }
			            },
			            "columnDefs": [
							 {
							    "searchable": false,
							    "targets": [0]
							},
							{ "type": "date-uk", targets: [0,1] },
							{ "type": "numeric-comma", targets: [2,3,5] }
			            ],
			            "order": [
			                [1, "asc"]
			            ], // set first column as a default sort by asc
			            //new settings and options
						"searching": false

			        });

	    return {
	        //main function to initiate the module
	        init: function () {

	        	searchFields = {{json_encode($searchFields)}};

	        	for(var searchIndex in searchFields){
	        		//if(searchIndex == 'in_lost'){
	        			//$("#"+searchIndex).attr("checked",true);
	        			//$('input[name="in_lost"]').bootstrapSwitch('state',true,false);
	        		//}else{
						$("#"+searchIndex).val(searchFields[searchIndex]);
	        		//}
	        	}

	        	$('#roc_office_id,#company_type_id').select2({
		            placeholder: "Select an option",
		            allowClear: true
		        });
		        //initialize datepicker
	            $('#incorporation_date_from').datepicker({
	                rtl: Metronic.isRTL(),
	                autoclose: true,
	                onClose: function( selectedDate ) {
	                	$( "#incorporation_date_to" ).datepicker( "option", "minDate", selectedDate );
	                }
	            });
	            $('#incorporation_date_to').datepicker({
	                rtl: Metronic.isRTL(),
	                autoclose: true,
	                onClose: function( selectedDate ) {
	                	$( "#incorporation_date_from" ).datepicker( "option", "maxDate", selectedDate );
	                }
	            });
	            $('#last_balance_sheet_date_from').datepicker({
	                rtl: Metronic.isRTL(),
	                autoclose: true,
	                onClose: function( selectedDate ) {
	                	$( "#last_balance_sheet_date_to" ).datepicker( "option", "minDate", selectedDate );
	                }
	            });
	            $('#last_balance_sheet_date_to').datepicker({
	                rtl: Metronic.isRTL(),
	                autoclose: true,
	                onClose: function( selectedDate ) {
	                	$( "#last_balance_sheet_date_from" ).datepicker( "option", "maxDate", selectedDate );
	                }
	            });

	        	},
	        reset : function(){
	        	$("input[type='text']").val('');

	        	$("#roc_office_id").select2('val', '');
	        	$("#company_type_id").select2('val', '');

	        	
	        	incrementVar = 1;
	        	
	        	
	        	$('#in_lost').val('both');

	        }

	    };

	}();
</script>
<script type="text/javascript">
	$(document).ready(function(){
		CompanySearch.init();

		$('#reset_btn').click(function(){
			CompanySearch.reset();
			return false;
		});
	});
</script>
@stop