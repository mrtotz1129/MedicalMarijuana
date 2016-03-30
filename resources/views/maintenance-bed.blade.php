@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Bed Maintenance</h4>
				</div>
				<div class="col s6 right">
					<a class="right waves-effect waves-light modal-trigger btn-floating btn-large red darken-2 left white-text tooltipped" 
					href="#create" style="position: relative; top: 40px; right: 1%;" 
					data-tooltip="Create"><i class="material-icons">add</i></a>
				</div>
		</div>	
		<div class="container"  style="margin-left: -30px;">
		<br>
				<table id="example" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th>Bed ID</th>
				                <th>Room</th>
				                <th>Actions</th>
				            </tr>
				        </thead>
				        
				        <tbody>
				        	@foreach($beds as $bed)
				        	<tr>
				        		<td>{!! $bed->intBedId !!}</td>
				        		<td>{!! $bed->intRoomIdFK !!}</td>
				        		<td>
				        			<a href="javascript:updateId({!! $bed->intBedId !!})" class="tooltipped" data-tooltip="Update Bed Details"><i class="material-icons">mode_edit</i></a>
				        			<a href="javascript:deactivateId({!! $bed->intBedId !!})" class="tooltipped" data-tooltip="Deactivate Bed Details"><i class="material-icons">delete</i></a>
				        		</td>
				        	</tr>
				        	@endforeach
				        </tbody>
				    </table>
				</div>

				<script type="text/javascript">
					$(document).ready(function() {
					    $('#example').DataTable( {
					        dom: 'Bfrtip',
					        buttons: [
					            'copyHtml5',
					            'excelHtml5',
					            'csvHtml5',
					            'pdfHtml5'
					        ]
					    } );
					} );
				</script>
				<!-- Create Bed Modal -->
				   <div id="create" class="modal modal-fixed-footer" style="width: 500px !important; border-radius: 10px; height: 400px !important;">
				    <form class="col s12 form" method="post" id="createEmpForm" action="{!! url('bed') !!}" enctype="multipart/form-data">
				      <div class="modal-content">
				      <input type="hidden" id="bedCreateFormToken" name="_token" value="{!! csrf_token() !!}" />
				      	<div class="row center">
				      		<h4 class="thin">Add Bed</h4>
				      	</div>
		                  <div class="row">
		                   	<div class="input-field col s12">
		                      <select  id="buildingSelect" name="selectedJob" required>
		                          <option disabled selected>Building</option>
		                         @foreach($buildings as $building)
		                         <option value="{!! $building->intBuildingId !!}">{!! $building->strBuildingName !!}</option>
		                         @endforeach
		                      </select>
		                      <label>Building</label>
		                 	</div>
							<div class="input-field col s12">
								<select id="floorCreateSelect" name="selectedJob" required>
									<option disabled selected>Floor</option>
								</select>
								<label>Floor</label>
							</div>
							<div class="input-field col s12">
								  <select id="createRoomSelect" name="createRoomSelect" required>
								      <option disabled selected>Room</option>
								  </select>
								  <label>Room</label>
							</div>
		                	</div>
				        </div>
				      <div class="modal-footer">
				          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
				          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">CREATE</button>
				      </div>
				      </form>
				</div>

				<!-- Update Bed Modal -->
				   <div id="updateBedModal" class="modal modal-fixed-footer" style="width: 500px !important; border-radius: 10px; height: 400px !important;">
				    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				              <h4 class="grey-text text-darken-1 center	">Update Bed</h4>
								<div class="col s12" style="margin-bottom: 5px;">
				                    <label class="red-text left">(*) Indicates required field</label>
				                </div>
				                   <div class="input-field col s12">
				                      <select id="slct1" name="selectedJob" required>
				                          <option disabled selected>Building</option>
				                          @foreach($buildings as $building)
				                         <option value="{!! $building->intBuildingId !!}">{!! $building->strBuildingName !!}</option>
				                         @endforeach
				                      </select>
				                      <label>Building</label>
				                  </div>
				                  <div class="input-field col s12">
				                      <select id="slct1" name="selectedJob" required>
				                          <option disabled selected>Floor</option>
				                      </select>
				                      <label>Floor</label>
				                  </div>
				                  <div class="input-field col s12">
				                      <select id="slct1" name="selectedJob" required>
				                          <option disabled selected>Room</option>
				                      </select>
				                      <label>Room</label>
				                  </div>
				        </div>
				      <div class="modal-footer">
				          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
				          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">CREATE</button>
				      </div>
				      </form>
				</div>
		</div>
	</article>

{{-- Modal Deactivate START --}}
<div id="deactivate_bed_modal" class="modal">
	<input type="hidden" id="deactivate_bed_token" value="{!! csrf_token() !!}" />
    <div class="modal-content">
      <h4>Deactivate Bed Details</h4>
      <p>Are you sure?</p>
    </div>
    <div class="modal-footer">
      <a class="modal-action waves-effect waves-green btn-flat" id="deactivate_bed_btn">Yes</a>
      <a class=" modal-action modal-close waves-effect waves-green btn-flat">No</a>
    </div>
</div>
{{-- Modal Deactivate END --}}

<script type="text/javascript">
	function readURL(input) {

	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#employeeimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$("#fileUpload").change(function(){
	    readURL(this);
	});


	document.getElementById('buildingSelect').onchange = function() {
		$.ajax({
			url: "{!! url('building/changed') !!}",
			type: 'POST',
			data: {
				_token: document.getElementById('bedCreateFormToken').value,
				buildingId: this.value
			},
			success: function(data) {
				$('#floorCreateSelect').empty();

				for(var i = 0; i < data.length; i++) {
					var option = document.createElement('option');
					option.text = data[i].intFloorDesc;
					option.value = data[i].intFloorId;

					document.getElementById('floorCreateSelect').appendChild(option);
				}
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	}

	document.getElementById('floorCreateSelect').onchange = function()
	{
		$.ajax({
			url: "{!! url('floor/changed') !!}",
			type: 'POST',
			data: {
				_token: document.getElementById('bedCreateFormToken').value,
				floorId: this.value
			},
			success: function(data) {
				$('#createRoomSelect').empty();

				for(var i = 0; i < data.length; i++) {
					var option = document.createElement('option');
					option.text = data[i].intRoomId;
					option.value = data[i].intRoomId;

					document.getElementById('createRoomSelect').appendChild(option);
				}
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});	
	};

	function updateId(id)
	{
		$('#updateBedModal').openModal();

		// $.ajax({
		// 	url: "bed/" + id,
		// 	type: "GET",
		// 	success: function(data)
		// 	{

		// 	},
		// 	error: function(xhr)
		// 	{
		// 		console.log(xhr);
		// 	}
		// });
	}

	function deactivateId(id)
	{
		$('#deactivate_bed_modal').openModal();

		document.getElementById('deactivate_bed_btn').onclick = function()
		{
			$.ajax({
				url: "bed/" + id,
				type: "POST",
				data: {
					_method: 'DELETE',
					_token: document.getElementById('deactivate_bed_token').value
				},
				success: function(data) {
					window.location.href = '{!! url("bed") !!}';
				},
				error: function(xhr) {
					console.log(xhr);
				}
			});
		};
	}
</script>
 
@endsection