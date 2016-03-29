@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Nurse Station Maintenance</h4>
				</div>
				<div class="col s6 right">
					<a class="right waves-effect waves-light modal-trigger btn-floating btn-large red darken-2 left white-text tooltipped" 
					href="#create" style="position: relative; top: 40px; right: 1%;" 
					data-tooltip="Create"><i class="material-icons">add</i></a>
					<!-- <a href="#viewNurse" class="modal-trigger btn btn-large green darken-2">VIEW NURSES</a> -->
				</div>
			</div>	
		<div class="container" style="margin-left: -30px;">
		<br>
				<table id="nurseList" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				            	<th>Nurse Station ID</th>
				                <th>Building</th>
				                <th>Floor</th>
				                <th>Nurse</th>
				                <th>Actions</th>
				            </tr>
				        </thead>
						
						<tbody>
							@foreach($nurseStations as $nurseStation)
							<tr>
								<td>{!! $nurseStation->intNurseStationId !!}</td>
								<td>{!! $nurseStation->strBuildingName !!}</td>
								<td>{!! $nurseStation->intFloorDesc !!}</td>
								<td>
									<a href="javascript:viewId({!! $nurseStation->intNurseStationId !!})" class="btn btn-large green darken-2">VIEW NURSES</a>
								</td>
								<td>
									<a href="javascript:updateId({!! $nurseStation->intNurseStationId !!})" class="tooltipped" data-tooltip="Update Nurse Station Details"><i class="material-icons">mode_edit</i></a>
				        			<a href="javascript:deactivateId({!! $nurseStation->intNurseStationId !!})" class="tooltipped" data-tooltip="Deactivate Nurse Station Details"><i class="material-icons">delete</i></a>
								</td>
							</tr>
							@endforeach
						</tbody>        	
				    </table>
				</div>

				<script type="text/javascript">
					$(document).ready(function() {
					    $('#nurseList').DataTable( {
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
				<!-- Create Nurse Modal -->
				   <div id="create" class="modal modal-fixed-footer" style="width: 700px !important;">
				    <form class="col s12 form" method="post" action="{!! url('nurse-station') !!}" enctype="multipart/form-data">
				    	<input type="hidden" id="nurseStationFormToken" value="{!! csrf_token() !!}" />
				      <div class="modal-content">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Add Nurse Station</h4>
				        </div>
				                <div class="aside aside1 z-depth-0">
				                <!-- second -->
				                  <div class="row">
				                    <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>

				                    <div class="input-field col s12">
				                      <select class="browser-default" id="buildingCreateSelect" name="selectedJob" required>
				                          <option disabled selected>Building</option>
				                          @foreach($buildingList as $building)
				                          <option value="{!! $building->intBuildingId !!}">{!! $building->strBuildingName !!}</option>
				                          @endforeach
				                      </select>
				                      <label for="slct1" class="active">Building<span class="red-text">*</span></label>
				                  </div>
				                  <div class="input-field col s12">
				                      <select class="browser-default" id="floorCreate" name="floorCreateSelect" required>
				                          <option disabled selected>Floor</option>
				                      </select>
				                      <label for="slct1" class="active">Floor<span class="red-text">*</span></label>
				                  </div>

				                  <div class="input-field col s12">
				                    <select multiple name="nurses[]">
				                      <option value="" disabled selected>Choose your option</option>
				                      @foreach($nurses as $nurse)
				                      <option value="{!! $nurse->intEmployeeId !!}">{!! $nurse->name !!}</option>
				                      @endforeach
				                    </select>
				                    <label>Select Nurses</label>
				                  </div>
         
				                </div>
				              </div>

				              <!-- END ASIDE 2 -->
				            </div>
				        </div>
				      <div class="modal-footer">
				          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
				          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">CREATE</button>
				      </div>
				      </form>
				</div>

				<!-- Update Fee Modal -->
				   <div id="updateNurseStationModal" class="modal modal-fixed-footer" style="width: 700px !important;">
				    <form id="updateNurseStationForm" class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
				    	<input type="hidden" id="updateNurseStationFormToken" value="{!! csrf_token() !!}" />
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Update Nurse Station</h4>
				        </div>
				              
				                <div class="aside aside2 z-depth-0">
				                <!-- second -->
				                  <div class="row">
				                   <div class="input-field col s12">
				                      <select class="browser-default" id="updateBuildingSelect" name="updateBuildingSelect" required>
				                          <option disabled selected>Building</option>
				                          @foreach($buildingList as $building)
				                          <option value="{!! $building->intBuildingId !!}">{!! $building->strBuildingName !!}</option>
				                          @endforeach
				                      </select>
				                      <label for="slct1" class="active">Building<span class="red-text">*</span></label>
				                  </div>
				                  <div class="input-field col s12">
				                      <select class="browser-default" id="floorUpdateSelect" name="floorUpdateSelect" required>
				                          <option disabled selected>Floor</option>
				                      </select>
				                      <label for="slct1" class="active">Floor<span class="red-text">*</span></label>
				                  </div>

				                  <div class="input-field col s12">
				                    <select multiple id="nurseUpdateSelect" name="nurseUpdateSelect[]">
				                      <option value="" disabled selected>Choose your option</option>
				                     	@foreach($nurses as $nurse)
				                      <option value="{!! $nurse->intEmployeeId !!}">{!! $nurse->name !!}</option>
				                      @endforeach
				                    </select>
				                    <label>Select Nurses</label>
				                  </div>
				                </div>
				              </div>
				              <!-- END ASIDE 2 --> 
				            </div>
				        </div>
				      <div class="modal-footer">
				          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
				          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">UPDATE</button>
				      </div>
				      </form>
				</div>
		</div>
	</article>

<!-- view nurse -->
   <div id="viewNurse" class="modal" style="margin-top: 30px;">
     <form id="createOption">
       <div class="modal-content">
         <h4>Nurses in this Station</h4>
         <div class="row container">
          	<table id="example" class="display" cellspacing="0" width="100%">
          	        <thead>
          	            <tr>
          	                <th>Nurse Name</th>
          	            </tr>
          	        </thead>
          	        
          	        <tbody>
          	        	
          	        </tbody>
          	    </table>
          	</div>
         </div>
       </div>
     </form>
   </div>

{{-- Modal Deactivate START --}}
<div id="deactivate_nursestation_modal" class="modal">
	<input type="hidden" id="deactivate_employee_token" value="{!! csrf_token() !!}" />
    <div class="modal-content">
      <h4>Deactivate Nurse Station Details</h4>
      <p>Are you sure?</p>
    </div>
    <div class="modal-footer">
      <a class="modal-action waves-effect waves-green btn-flat" id="deactivate_nursestation_btn">Yes</a>
      <a class=" modal-action modal-close waves-effect waves-green btn-flat">No</a>
    </div>
</div>
{{-- Modal Deactivate END --}}

<script type="text/javascript">
	
  $(document).ready(function() {
    $('select').material_select();
  });
          
</script>

<script type="text/javascript">
	var tempId = 0;

          		    var nurseTable = $('#example').DataTable( {
          		        dom: 'Bfrtip',
          		        buttons: [
          		            'copyHtml5',
          		            'excelHtml5',
          		            'csvHtml5',
          		            'pdfHtml5'
          		        ]
          		    } );

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

	document.getElementById('buildingCreateSelect').onchange = function() {
		$.ajax({
			url: "{!! url('building/changed') !!}",
			type: 'POST',
			data: {
				_token: document.getElementById('nurseStationFormToken').value,
				buildingId: this.value
			},
			success: function(data) {
				$('#floorCreate').empty();

				for(var i = 0; i < data.length; i++) {
					var option = document.createElement('option');
					option.text = data[i].intFloorDesc;
					option.value = data[i].intFloorId;

					document.getElementById('floorCreate').appendChild(option);
				}
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	};

	function viewId(id)  {
		console.log(id);

		$.ajax({
			url: "{!! url('nurse-station/changed') !!}",
			type: "POST",
			data: {
				_token: document.getElementById('nurseStationFormToken').value,
				nurseStationId: id
			},
			success: function(data) {
				console.log(data);

				nurseTable.clear().draw();

				for(var i = 0; i < data.length; i++) {
					nurseTable.row.add([data[i].strLastName + ', ' + data[i].strFirstName + (data[i].strMiddleName != null ? (" " + data[i].strMiddleName) : "")]).draw(false);
				}

				$('#viewNurse').openModal();
			},
			error: function(xhr) {
				console.log(xhr);
			}
		})
	}

	function updateId(id) {
		tempId = id;

		$.ajax({
			url: "nurse-station/" + id,
			type: "GET",
			success: function(data) {
				document.getElementById('updateBuildingSelect').value = data[0].intBuildingId;

				$('#floorUpdateSelect').empty();

				for(var i = 0; i < data[1].length; i++) {
					var option = document.createElement('option');
					option.text = data[1][i].intFloorDesc;
					option.value = data[1][i].intFloorId;

					document.getElementById('floorUpdateSelect').appendChild(option);
				}

				document.getElementById('floorUpdateSelect').value = data[0].intFloorId;

				for(var i = 0; i < data[2].length; i++) {
					var nurseUpdate = document.getElementsByName('nurseUpdateSelect');

					nurseUpdate.checked
				}

				$('#updateNurseStationModal').openModal();
				console.log(data);
			},
			error: function(xhr) {
				console.log(xhr);
			}
		})
	}

	function deactivateId(id) {
		$('#deactivate_nursestation_modal').openModal();

		document.getElementById('deactivate_nursestation_btn').onclick = function() {
			$.ajax({
				url: "nurse-station/" + id,
				type: "POST",
				data: {
					_method: "DELETE",
					_token: document.getElementById('nurseStationFormToken').value
				},
				success: function(data) {
					window.location.href = "{!! url('nurse-station') !!}";
				},
				error: function(xhr) {
					console.log(xhr);
				}
			});
		}
	}

	document.getElementById('updateNurseStationForm').onsubmit = function(event) {
		event.preventDefault();

		$.ajax({
			url: "nurse-station/" + tempId,
			type: "POST",
			data: {
				_method: "PUT",
				_token: document.getElementById('updateNurseStationFormToken').value,
				formData: $('#updateNurseStationForm').serialize()
			}, 
			success: function(data) {
				window.location.href = "{!! url('nurse-station') !!}";
				// console.log(data);
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	};
</script>
 
@endsection