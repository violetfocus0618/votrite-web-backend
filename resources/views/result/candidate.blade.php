@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title">
		Result
		</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
						Ballot Result Table
						</div>
					</div>
					<div class="portlet-body">
						<div class="table-toolbar">
							<div class="row">
								<div class="col-md-6 select_options">
									<div class="col-md-4 form-group">
										<label class="col-sm-3 control-label select_name">Ballot:</label>
										<div class="col-sm-9">
											<select class="form-control" name="cand_ballot_name" id="result_cand_ballot_name">
											@if(empty($ballots->data))
												<option value="-1">No Ballot</opiton>
											@else
												@foreach($ballots->data as $ballot)
												<option value="{{ $ballot->ballot_id }}">{{ $ballot->election }}</opiton>
												@endforeach
											@endif
											</select>
										</div>
									</div>
									<div class="col-md-4 form-group ">
										<label class="col-sm-3 control-label select_name">Race:</label>
										<div class="col-sm-9 race_option">
											<select class="form-control" name="cand_race_name" id="result_cand_race_name">
											@if(empty($races->data))
												<option value="-1">No Race</opiton>
											@else
												@foreach($races->data as $race)
												<option value="{{ $race->race_id }}" data-type="{{ $race->race_type }}" >{{ $race->race_name }}</opiton>
												@endforeach
											@endif
											</select>
										</div>
									</div>
									<div class="col-md-4 form-group ">
										<button class="btn yellow showDetail" data-toggle="modal"><i class="fa fa-eye"></i> <span> Ballot Detail</span></button>
									</div>
								</div>
								<div class="col-md-6">
									
								</div>
							</div>
						</div>
                        <div id='change_table_candidate'>
							<h4 class="modal-title text-center">Candidate</h4>
							<table class="table table-striped table-bordered table-hover" id="result_candidate_table">
								<thead>
									<tr>
										<th>
											Candidate Name
										</th>
										<th style="width: 50%;">
											Total Votes
										</th>
										<th class="hidden">
											Candidate id
										</th>
										<th class="hidden">
											Candidate val
										</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div id='change_table_party'>
							<h4 class="modal-title text-center">Party</h4>
							<table class="table table-striped table-bordered table-hover" id="result_party_table">
								<thead>
									<tr>
										<th>
											Party Name
										</th>
										<th style="width: 50%;">
											Total Votes
										</th>
										<th class="hidden">
											Party id
										</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="detailModal" class="modal fade" tabindex="-1" data-width="1020">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
    </div>
    <div class="modal-body">
		<div class="scroller" style="height:600px" data-always-visible="1" data-rail-visible1="1">
			<div class="row">
				<div class="col-md-6" style="border-right: 1px dashed;">
					<h4 class="modal-title text-center">Ballot</h4>
					<div class="form-group form-md-line-input">
						<label class="col-md-3 control-label" for="form_control_1">Election : </label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="form_election" disabled >
							<div class="form-control-focus">
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input">
						<label class="col-md-3 control-label" for="form_control_1">Address : </label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="form_address" disabled >
							<div class="form-control-focus">
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input">
						<label class="col-md-3 control-label" for="form_control_1">Client : </label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="form_client" disabled >
							<div class="form-control-focus">
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input">
						<label class="col-md-3 control-label" for="form_control_1">Board : </label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="form_board" disabled >
							<div class="form-control-focus">
							</div>
						</div>
					</div>

					<h4 class="modal-title text-center">Race</h4>
					<div class="form-group form-md-line-input">
						<label class="col-md-3 control-label" for="form_control_1">Title : </label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="form_title" disabled >
							<div class="form-control-focus">
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input">
						<label class="col-md-3 control-label" for="form_control_1">Name : </label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="form_name" disabled >
							<div class="form-control-focus">
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input">
						<label class="col-md-3 control-label" for="form_control_1">Position : </label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="form_position" disabled >
							<div class="form-control-focus">
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input">
						<label class="col-md-3 control-label" for="form_control_1">Type : </label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="form_type" disabled >
							<div class="form-control-focus">
							</div>
						</div>
					</div>
					
				</div>
				<div class="col-md-6" style="border-left: 1px dashed;">
					<h4 class="modal-title text-center">Proposition</h4>
					<ul id="form_prop" class="props">
						<li >
							Prob1
							<ul>
								<li>
									Yes
								</li>
								<li>
									No
								</li>
							</ul>
						</li>
					</ul>
					<h4 class="modal-title text-center">Mass Proposition</h4>
					<ul id="form_massprop" class="props">
						<li >
							Prob1
							<ul>
								<li>
									Yes
								</li>
								<li>
									No
								</li>
							</ul>
						</li>
					</ul>
					<h4 class="modal-title text-center">Candidate</h4>
					<div class="row" id='cand_detail'></div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-warning" data-dismiss="modal">
				<span class='glyphicon glyphicon-remove'></span> Close
			</button>
		</div>
    </div>
</div>

@endsection
@section('script')
<script>
	function getImg(data, type, full, meta) {
		return '<img src='+data+' />';
	}
	@if(empty($ballots->data))
	var ballot_id = '';
	var race_id = '';
	var race_type = '';
	@else
	var ballot_id = '{{ $ballots->data[0]->ballot_id }}';
	var race_id = '{{ $races->data[0]->race_id }}';
	var race_type = '{{ $races->data[0]->race_type }}';
	@endif

	var typerpc = 'candidate';	

	var handleRecords = function (ballot_id, race_id, typerpc) {

		// if(race_id == '' || race_id == -1){
			// propurl = baseurl+'result/'+typerpc+'?ballot_id='+ballot_id;
		// }else{
			propurl = baseurl+'result/'+typerpc+'?ballot_id='+ballot_id+'&race_id='+race_id;
		// }
		var tablename = '#result_'+typerpc+'_table';
		var table = $(tablename);
		if(typerpc == 'candidate'){
			table.dataTable({
	
				"language": {
					"aria": {
						"sortAscending": ": activate to sort column ascending",
						"sortDescending": ": activate to sort column descending"
					},
					"emptyTable": "No data available in table",
					"info": "Showing _START_ to _END_ of _TOTAL_ entries",
					"infoEmpty": "No entries found",
					"infoFiltered": "(filtered1 from _MAX_ total entries)",
					"lengthMenu": "Show _MENU_ entries",
					"search": "Search:",
					"zeroRecords": "No matching records found",
					"processing": "No Result"
				},
				destroy: true,
				"bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
				// "ajax":{
				//     type: 'GET',
				//     url: baseurl+'result/all',
				//     crossDomain: true,
				//     dataType: 'json',
				// },
				ajax: function (data, callback, settings) {
					$.ajax({
						url: propurl,
						type: 'GET',
						dataType: 'json',
						success:function(data){
							console.log(data);
							if(data.data != undefined){
								callback(data);
							}else{
								callback({data:[]});
							}
						}
					});
				},
				"columns": [
					{ "data": "candidate_name" },
					{ "data": "cast_counter" },
					{ "data": "candidate_id" },
					{ "data": "cast_value" },
				],
				"lengthMenu": [
					[5, 15, 20, -1],
					[5, 15, 20, "All"] // change per page values here
				],
				// set the initial value
				"pageLength": 5,
				"language": {
					"lengthMenu": " _MENU_ records"
				},
				"columnDefs": [{  // set default column settings
					'orderable': false,
					'targets': [0]
				},{  // set default column settings
					'orderable': 'desc',
					'targets': [1]
				}]
			});
		}else{
			table.dataTable({
				
				"language": {
					"aria": {
						"sortAscending": ": activate to sort column ascending",
						"sortDescending": ": activate to sort column descending"
					},
					"emptyTable": "No data available in table",
					"info": "Showing _START_ to _END_ of _TOTAL_ entries",
					"infoEmpty": "No entries found",
					"infoFiltered": "(filtered1 from _MAX_ total entries)",
					"lengthMenu": "Show _MENU_ entries",
					"search": "Search:",
					"zeroRecords": "No matching records found",
					"processing": "No Result"
				},
				destroy: true,
				"bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
				// "ajax":{
				//     type: 'GET',
				//     url: baseurl+'result/all',
				//     crossDomain: true,
				//     dataType: 'json',
				// },
				ajax: function (data, callback, settings) {
					$.ajax({
						url: propurl,
						type: 'GET',
						dataType: 'json',
						success:function(data){
							console.log(data);
							if(data.data != undefined){
								callback(data);
							}else{
								callback({data:[]});
							}
						}
					});
				},
				"columns": [
					{ "data": "party_name" },
					{ "data": "cast_counter" },
					{ "data": "party_id" },
				],
				"lengthMenu": [
					[5, 15, 20, -1],
					[5, 15, 20, "All"] // change per page values here
				],
				// set the initial value
				"pageLength": 5,
				"language": {
					"lengthMenu": " _MENU_ records"
				},
				"columnDefs": [{  // set default column settings
					'orderable': false,
					'targets': [0]
				},{  // set default column settings
					'orderable': 'desc',
					'targets': [1]
				}]
			});
		}

	}	
	jQuery(document).ready(function() {		
		// handleRecords(ballot_id, race_id, typerpc);
		// handleRecords(ballot_id, race_id, 'party');
		var order = {
			"election" : "%%"
		};
		$.ajax({
			type: 'POST',
			url: baseurl+'ballot/active',
			crossDomain: true,
			dataType: 'json',
			data: JSON.stringify(order),
			success: function(responseData, textStatus, jqXHR) {
				var text = "";
				var x;
				for (x in responseData.data) {
					var selected = responseData.data[x]['ballot_id'] == ballot_id ? " selected" : " ";
					text += "<option value="+responseData.data[x]['ballot_id']+selected+">"+responseData.data[x]['election']+"</opiton>";
				}
				$('#result_cand_ballot_name').html(text);
				
			},
			error: function (responseData, textStatus, errorThrown) {
				alert('POST failed.');
			}
		});			
		// $.ajax({
		// 	type: 'GET',
		// 	url: baseurl+'race?ballot_id='+ballot_id,
		// 	crossDomain: true,
		// 	dataType: 'json',
		// 	success: function(responseData, textStatus, jqXHR) {
		// 		var text = "";
		// 		var x;
		// 		if(responseData.data != null){
		// 			race_id = responseData.data[0]['race_id'];
		// 			race_type = responseData.data[0]['race_type'];
		// 		}
		// 	},
		// 	error: function (responseData, textStatus, errorThrown) {
		// 		alert('POST failed.');
		// 	}
		// });
		if(ballot_id != '' || ballot_id != -1){
			switch(race_type) {
				case 'R':
					typerpc = 'candidate';
					console.log(typerpc);
					handleRecords(ballot_id, race_id, typerpc);
					$('#change_table_candidate').show();
					$('#change_table_party').hide();
					break;
				case 'P':
					typerpc = 'party';
					console.log(typerpc);
					handleRecords(ballot_id, race_id, typerpc);
					$('#change_table_candidate').hide();
					$('#change_table_party').show();
					break;
				case 'C':
					typerpc = 'candidate';
					console.log(typerpc);
					handleRecords(ballot_id, race_id, typerpc);
					typerpc = 'party';
					console.log(typerpc);
					handleRecords(ballot_id, race_id, typerpc);
					$('#change_table_candidate').show();
					$('#change_table_party').show();
					break;
			}
		}	
	});

	$(document).on('click', '.showDetail', function(e){
		// var candidate_id = $(this).find('td:nth-child(3)').text();
		// $('#cand_name').text($(this).find('td:nth-child(1)').text());
		// $('#cand_cnt').text($(this).find('td:nth-child(2)').text());
		// $('#cand_val').text($(this).find('td:nth-child(4)').text());
		console.log(race_type);
		if($('#result_'+typerpc+'_table tbody tr').text() != 'No data available in table' && race_type != 'C'){
			$.ajax({
				type: 'GET',
				url: baseurl+'ballot?ballot_id='+ballot_id,
				crossDomain: true,
				dataType: 'json',
				success: function(responseData, textStatus, jqXHR) {
					// console.log(responseData);
					$('#form_election').val(responseData.data[0]['election']);
					$('#form_address').val(responseData.data[0]['address']);
					$('#form_client').val(responseData.data[0]['client']);
					$('#form_board').val(responseData.data[0]['board']);
				},
				error: function (responseData, textStatus, errorThrown) {
					alert('POST failed.');
				}
			});
			$.ajax({
				type: 'GET',
				url: baseurl+'race?race_id='+race_id,
				crossDomain: true,
				dataType: 'json',
				success: function(responseData, textStatus, jqXHR) {
					// console.log(responseData);
					$('#form_title').val(responseData.data[0]['race_title']);
					$('#form_name').val(responseData.data[0]['race_name']);
					$('#form_position').val(responseData.data[0]['race_voted_position']);
					switch(responseData.data[0]['race_type']) {
						case 'R':
							$('#form_type').val('Rank');
							break;
						case 'P':
							$('#form_type').val('Primary');
							break;
						case 'C':
							$('#form_type').val('Complex');
							break;
					}
				},
				error: function (responseData, textStatus, errorThrown) {
					alert('POST failed.');
				}
			});
			$.ajax({
				type: 'GET',
				url: baseurl+'result/proposition?ballot_id='+ballot_id+'&prop_type=P'+'&race_id='+race_id,
				crossDomain: true,
				dataType: 'json',
				success: function(responseData, textStatus, jqXHR) {
					console.log(responseData);
					var text = "";
					var x;
					for (x in responseData.data) {
						if(responseData.data[x]['prop_answer_type'] == "1"){
							text += "<li >"+responseData.data[x]['prop_name']+"<ul ><li > Yes : "+responseData.data[x]['cast_yes']+"</li><li > No : "+responseData.data[x]['cast_no']+"</li></ul></li>";
						}else{
							text += "<li >"+responseData.data[x]['prop_name']+"<ul ><li > For : "+responseData.data[x]['cast_yes']+"</li><li > Against : "+responseData.data[x]['cast_no']+"</li></ul></li>";
						}
					}
					$('#form_prop').html(text);
				},
				error: function (responseData, textStatus, errorThrown) {
					alert('POST failed.');
				}
			});
			$.ajax({
				type: 'GET',
				url: baseurl+'result/proposition?ballot_id='+ballot_id+'&prop_type=M'+'&race_id='+race_id,
				crossDomain: true,
				dataType: 'json',
				success: function(responseData, textStatus, jqXHR) {
					console.log(responseData);
					var text = "";
					var x;
					for (x in responseData.data) {
						if(responseData.data[x]['prop_answer_type'] == "1"){
							text += "<li >"+responseData.data[x]['prop_name']+"<ul ><li > Yes : "+responseData.data[x]['cast_yes']+"</li><li > No : "+responseData.data[x]['cast_no']+"</li></ul></li>";
						}else{
							text += "<li >"+responseData.data[x]['prop_name']+"<ul ><li > For : "+responseData.data[x]['cast_yes']+"</li><li > Against : "+responseData.data[x]['cast_no']+"</li></ul></li>";
						}
					}
					$('#form_massprop').html(text);
				},
				error: function (responseData, textStatus, errorThrown) {
					alert('POST failed.');
				}
			});
			$.ajax({
				url: baseurl+'result/'+typerpc+'?ballot_id='+ballot_id+'&race_id='+race_id,
				type: 'GET',
				dataType: 'json',
				success:function(responseData, textStatus, jqXHR){
					console.log(responseData);
					var text = "";
					var x;
					for (x in responseData.data) {
						if(typerpc == 'candidate'){
							text += "<div class='col-md-4' >"+responseData.data[x]['candidate_name']+"</div ><div class='col-md-4' > "+responseData.data[x]['cast_counter']+"</div><div class='col-md-4' > "+responseData.data[x]['cast_value']+"</div>";
						}else{
							text += "<div class='col-md-6' >"+responseData.data[x]['party_name']+"</div ><div class='col-md-6' > "+responseData.data[x]['cast_counter']+"</div>";
						}
					}
					$('#cand_detail').html(text);
				}
			});
			var modal = $('#detailModal');
			modal.modal('show');
		}else{
			if($('#result_candidate_table tbody tr').text() != 'No data available in table' || $('#result_party_table tbody tr').text() != 'No data available in table'){
				$.ajax({
					type: 'GET',
					url: baseurl+'ballot?ballot_id='+ballot_id,
					crossDomain: true,
					dataType: 'json',
					success: function(responseData, textStatus, jqXHR) {
						// console.log(responseData);
						$('#form_election').val(responseData.data[0]['election']);
						$('#form_address').val(responseData.data[0]['address']);
						$('#form_client').val(responseData.data[0]['client']);
						$('#form_board').val(responseData.data[0]['board']);
					},
					error: function (responseData, textStatus, errorThrown) {
						alert('POST failed.');
					}
				});
				$.ajax({
					type: 'GET',
					url: baseurl+'race?race_id='+race_id,
					crossDomain: true,
					dataType: 'json',
					success: function(responseData, textStatus, jqXHR) {
						// console.log(responseData);
						$('#form_title').val(responseData.data[0]['race_title']);
						$('#form_name').val(responseData.data[0]['race_name']);
						$('#form_position').val(responseData.data[0]['race_voted_position']);
						switch(responseData.data[0]['race_type']) {
							case 'R':
								$('#form_type').val('Rank');
								break;
							case 'P':
								$('#form_type').val('Primary');
								break;
							case 'C':
								$('#form_type').val('Complex');
								break;
						}
					},
					error: function (responseData, textStatus, errorThrown) {
						alert('POST failed.');
					}
				});
				$.ajax({
					type: 'GET',
					url: baseurl+'result/proposition?ballot_id='+ballot_id+'&prop_type=P'+'&race_id='+race_id,
					crossDomain: true,
					dataType: 'json',
					success: function(responseData, textStatus, jqXHR) {
						// console.log(responseData);
						var text = "";
						var x;
						for (x in responseData.data) {
							text += "<li >"+responseData.data[x]['prop_name']+"<ul ><li > Yes : "+responseData.data[x]['cast_yes']+"</li><li > No : "+responseData.data[x]['cast_no']+"</li></ul></li>";
						}
						$('#form_prop').html(text);
					},
					error: function (responseData, textStatus, errorThrown) {
						alert('POST failed.');
					}
				});
				$.ajax({
					type: 'GET',
					url: baseurl+'result/proposition?ballot_id='+ballot_id+'&prop_type=M'+'&race_id='+race_id,
					crossDomain: true,
					dataType: 'json',
					success: function(responseData, textStatus, jqXHR) {
						console.log(responseData);
						var text = "";
						var x;
						for (x in responseData.data) {
							text += "<li >"+responseData.data[x]['prop_name']+"<ul ><li > Yes : "+responseData.data[x]['cast_yes']+"</li><li > No : "+responseData.data[x]['cast_no']+"</li></ul></li>";
						}
						$('#form_massprop').html(text);
					},
					error: function (responseData, textStatus, errorThrown) {
						alert('POST failed.');
					}
				});
				var text = '';
				$.ajax({
					url: baseurl+'result/candidate?ballot_id='+ballot_id+'&race_id='+race_id,
					type: 'GET',
					dataType: 'json',
					success:function(responseData, textStatus, jqXHR){
						console.log(responseData);
						var x;
						for (x in responseData.data) {
							text += "<div class='col-md-4' >"+responseData.data[x]['candidate_name']+"</div ><div class='col-md-4' > "+responseData.data[x]['cast_counter']+"</div><div class='col-md-4' > "+responseData.data[x]['cast_value']+"</div>";
						}
						$('#cand_detail').html(text);
					}
				});
				$.ajax({
					url: baseurl+'result/party?ballot_id='+ballot_id+'&race_id='+race_id,
					type: 'GET',
					dataType: 'json',
					success:function(responseData, textStatus, jqXHR){
						console.log(responseData);
						var x;
						for (x in responseData.data) {
							text += "<div class='col-md-6' >"+responseData.data[x]['party_name']+"</div ><div class='col-md-6' > "+responseData.data[x]['cast_counter']+"</div>";
						}
						$('#cand_detail').html(text);
					}
				});
				var modal = $('#detailModal');
				modal.modal('show');			
			}
		}
	}); 

	$('#result_cand_ballot_name').change(function(){
		ballot_id = $(this).val();
		race_id = -1;
		$.ajax({
			type: 'GET',
			url: baseurl+'race?ballot_id='+ballot_id,
			crossDomain: true,
			dataType: 'json',
			success: function(responseData, textStatus, jqXHR) {
				var text = "";
				var x;
				if(responseData.data != null){
					race_id = responseData.data[0]['race_id']
				}
				for (x in responseData.data) {
					text += "<option value="+responseData.data[x]['race_id']+" data-type="+responseData.data[x]['race_type']+">"+responseData.data[x]['race_name']+"</opiton>";
				}
				$('#result_cand_race_name').html(text);
				
				if(ballot_id != '' || ballot_id != -1){
					handleRecords(ballot_id, race_id, typerpc);
				}
			},
			error: function (responseData, textStatus, errorThrown) {
				alert('POST failed.');
			}
		});
	});

	$(document).on('change','#result_cand_race_name',function(){
		race_id = $(this).val();
		race_type = $(this[this.selectedIndex]).data('type');
		console.log(race_type);

		if(ballot_id != '' || ballot_id != -1){
			switch(race_type) {
				case 'R':
					typerpc = 'candidate';
					console.log(typerpc);
					handleRecords(ballot_id, race_id, typerpc);
					$('#change_table_candidate').show();
					$('#change_table_party').hide();
					break;
				case 'P':
					typerpc = 'party';
					console.log(typerpc);
					handleRecords(ballot_id, race_id, typerpc);
					$('#change_table_candidate').hide();
					$('#change_table_party').show();
					break;
				case 'C':
					typerpc = 'candidate';
					console.log(typerpc);
					handleRecords(ballot_id, race_id, typerpc);
					typerpc = 'party';
					console.log(typerpc);
					handleRecords(ballot_id, race_id, typerpc);
					$('#change_table_candidate').show();
					$('#change_table_party').show();
					break;
			}
		}
	});
</script>
@endsection
