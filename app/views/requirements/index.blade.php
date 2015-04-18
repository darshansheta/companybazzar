@extends('layouts.default')
@section('content')
<!-- BEGIN PAGE CONTENT INNER -->
<div class="col-md-12">
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					Search Requirements
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
									<label class="control-label">Incorporation Date </label>
									<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
										<input type="text" placeholder="dd/mm/yyyy" class="form-control" name="incorporation_date" id="incorporation_date">
										<span class="input-group-btn">
										<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
										</span>
									</div>
									
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Last Balance Sheet Date Range</label>
									<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
										<input type="text" placeholder="dd/mm/yyyy" class="form-control" name="last_balance_sheet_date" id="last_balance_sheet_date">
										<span class="input-group-btn">
										<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
										</span>
									</div>
									
								</div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Authorized Capital</label>
									<div class="input-group">
											<input type="text" class="form-control" name="authorized_capital" id="authorized_capital" placeholder="Authorized Capital">
											<span class="input-group-addon">
												.00
											</span>
									</div>
									
									
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">PaidUp Capital</label>
									<div class="input-group">
											<input type="text" class="form-control" name="paidup_capital" id="paidup_capital" placeholder="PaidUp Capital">
											<span class="input-group-addon">
												.00
											</span>
										</div>
									
								</div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Selling Price</label>
									<div class="input-group">
											<input type="text" class="form-control" name="sell_price" id="sell_price" placeholder="Selling Price">
											<span class="input-group-addon">
												.00
											</span>
										</div>
								</div>
							</div>
							<!--/span-->
							{{-- <div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Is in Loss</label>
									<select class="form-control" name="in_lost" id ="in_lost">
										<option value="both">All</option>
										<option value="1">In Loss</option>
										<option value="0">Not in Loss</option>
									</select>
									
								</div>
							</div> --}}
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
			

			<!-- ------------------------MMM-------------------------- -->
			<table class="table table-striped {{-- table-condensed --}} flip-content table-hover" id="company_requirement_search_table">
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

						<th class="numeric" align="right" style=" text-align: right;">
							 Buying price range
						</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($company_requirements as $company_requirement): ?>
					<tr>
						<td>{{date('d/m/Y',strtotime($company_requirement->last_balance_sheet_date_from))." - ".date('d/m/Y',strtotime($company_requirement->last_balance_sheet_date_to))}}</td>
						<td>{{date('d/m/Y',strtotime($company_requirement->incorporation_date_from))." - ".date('d/m/Y',strtotime($company_requirement->incorporation_date_to))}}</td>
						<td class="numeric" align="right">{{number_format($company_requirement->authorized_capital_from,2)." - ".number_format($company_requirement->authorized_capital_to,2)}}</td>
						<td class="numeric" align="right">{{number_format($company_requirement->paidup_capital_from,2)." - ".number_format($company_requirement->paidup_capital_to,2)}}</td>
						<td class="numeric" align="right">{{number_format($company_requirement->sell_price_from,2)." - ".number_format($company_requirement->sell_price_to,2)}}</td>
						<td>
						<a href="javascript:;" data-placement="left" class="popovers btn blue btn-xs" data-container="body" data-html="true" data-content="Email: {{$company_requirement->user->email}}<br>Name: {{$company_requirement->user->first_name}}" data-original-title="Contact Detail">
							&nbsp;<i class="fa fa-info"></i>&nbsp;
						</a>
						{{-- <button type="button" class="btn red pull-right btn-xs" onclick="$(this).parent().parent().remove();">&nbsp;&times&nbsp;</button> --}}
						</td>
					</tr>
					<?php endforeach ?>
					@if(!count($company_requirements))
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
	var CompanyRequirementSearch = function () {

		//validation end==========================================================
		var  incrementVar = 1;

		var	companyRequirementSearchTable = $("#company_requirement_search_table");

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
					    "dash-numeric-comma-pre": function ( a ) {
					    	a = a.split(' -');
					    	a = a[0];
					    	console.log(a);
					        var x = (a == "-") ? 0 : a.replace( /,/, "." );
					        return parseFloat( x );
					    },
					 
					    "dash-numeric-comma-asc": function ( a, b ) {
					        return ((a < b) ? -1 : ((a > b) ? 1 : 0));
					    },
					 
					    "dash-numeric-comma-desc": function ( a, b ) {
					        return ((a < b) ? 1 : ((a > b) ? -1 : 0));
					    }
					} );
			        companyRequirementSearchTable.dataTable({

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
			                "orderable": false
			            }, {
			                "orderable": false
			            }, {
			                "orderable": false
			            }, {
			                "orderable": false
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
							{ "type": "dash-numeric-comma", targets: [4] }
			            ],
			            "order": [
			                [4, "asc"]
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
	             $('.date-picker').datepicker({
					rtl: Metronic.isRTL(),
					autoclose: true
	            });

	        	},
	        reset : function(){
	        	$("input[type='text']").val('');

	        	$("#roc_office_id").select2('val', '');
	        	$("#company_type_id").select2('val', '');

	        	
	        	incrementVar = 1;
	        	
	        	
	        	$//('#in_lost').val('both');

	        }

	    };

	}();
</script>
<script type="text/javascript">
	$(document).ready(function(){
		CompanyRequirementSearch.init();

		$('#reset_btn').click(function(){
			CompanyRequirementSearch.reset();
			return false;
		});
	});
</script>
@stop