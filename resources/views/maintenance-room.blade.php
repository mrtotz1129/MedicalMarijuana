@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Room Maintenance</h4>
				</div>
				<div class="col s6 right">
					<a class="right waves-effect waves-light modal-trigger btn-floating btn-large red darken-2 left white-text tooltipped" 
					href="#create" style="position: relative; top: 40px; right: 1%;" 
					data-tooltip="Create"><i class="material-icons">add</i></a>
				</div>
			</div>	
		<div class="container" style="margin-left: -30px;">
		<br>
				<table id="example" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th>Room ID</th>
				                <th>Type</th>
				                <th>Details</th>
				                <th>Price</th>
				                <th>Actions</th>
				            </tr>
				        </thead>
				        
				        <tbody>
				        	@foreach($rooms as $room)
				        	<tr>
				        		<td>{!! $room->intRoomId !!}</td>
				        		<td>{!! $room->strRoomTypeDesc !!}</td>
				        		<td>{!! $room->txtRoomDescription != null ? $room->txtRoomDescription : '---' !!}</td>
				        		<td>{!! number_format($room->deciRoomPrice, 2) . 'Php' !!}</td>
				        		<td>
				        			<a href="javascript:updateId({!! $room->intRoomId !!})" class="tooltipped" data-tooltip="Update Room Details"><i class="material-icons">mode_edit</i></a>
				        			<a href="javascript:deactivateId({!! $room->intRoomId !!})" class="tooltipped" data-tooltip="Deactivate Room Details"><i class="material-icons">delete</i></a>
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
				<!-- Create Room Modal -->
				   <div id="create" class="modal modal-fixed-footer" style="width: 1000px !important; border-radius: 10px; height: 450px !important; margin-top: 30px;">
				    <form class="col s12 form" method="post" id="createEmpForm" action="{!! url('room') !!}" enctype="multipart/form-data">
				    <input type="hidden" id="createRoomFormToken" name="_token" value="{!! csrf_token() !!}" />
				      <div class="modal-content" style="padding-bottom: 0px !important;">		       
				              <h4 class="thin center">Create Room</h4>
				       			<div class="row">
				       				<div class="col s6">
				       					  <div class="input-field col s12">
				       					     <select id="buildingCreate" name="selectedJob" required>
				       					         <option disabled selected>Building</option>
				       					         @foreach($buildings as $building)
				       					         <option value="{!! $building->intBuildingId !!}">{!! $building->strBuildingName !!}</option>
				       					         @endforeach
				       					     </select>
				       					     <label>Building</label>
				       					 </div>
				       					 <div class="input-field col s12">
				       					     <select  id="floorCreateSelect" name="floorCreateSelect" required>
				       					         <option disabled selected>Floor</option>
				       					     </select>
				       					     <label>Floor</label>
				       					 </div>
				       					  <div class="input-field col s12">
				       					     <select id="roomTypeCreateSelect" name="roomTypeCreate" required>
				       					         <option disabled selected>Room Type</option>
				       					         @foreach($roomTypes as $roomType)
				       					         <option value="{!! $roomType->intRoomTypeId !!}">{!! $roomType->strRoomTypeDesc !!}</option>
				       					         @endforeach
				       					     </select>
				       					     <label>Room Type</label>
				       					 </div>
				       					 <br>
				       					 <div class="col s12 center" style="margin-top: 20px; margin-left: 30px;">
				       					  <a href="#addRoomTypeModal" class="waves-effect waves-light btn-flat modal-trigger indigo darken-1 white-text col s6 center"><i class="material-icons">add</i></a>
				       					</div>
				       				</div>

				       				<div class="col s6">
				       					 <div class="input-field col s12">
				       					     <input name="txtRoomDescription" placeholder="Ex: Aquino" id="roomDesc" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				       					     <label for="roomDesc" class="active">Room Description</label>
				       					 </div>

				       					 <div class="input-field col s12">
				       					     <input name="dblPrice" placeholder="Ex: Aquino" id="dblPrice" type="number" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				       					     <label for="dblPrice" class="active">Room Price<span class="red-text"><b>*</b></span></label>
				       					 </div>

				       					 <div class="input-field col s12">
				       					     <input name="intNumBed" placeholder="Ex: Aquino" id="dblPrice" type="number" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				       					     <label for="dblPrice" class="active">Number of Beds<span class="red-text"><b>*</b></span></label>
				       					 </div>

				       					 <div class="input-field col s12">
				       					    <select id="slct1" name="nurseStationSelect">
				       					        <option disabled selected>Nurse Station</option>
				       					        @foreach($nurseStations as $nurseStation)
				       					        <option value="{!! $nurseStation->intNurseStationId !!}">{!! $nurseStation->intNurseStationId !!}</option>
				       					        @endforeach
				       					    </select>
				       					    <label>Nurse Station</label>
				       					</div>
				       				</div>
				       			</div>
				        </div>
				      <div class="modal-footer">
				          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
				          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">CREATE</button>
				      </div>
				      </form>
				</div>

				<!-- Update Room Modal -->
				   <div id="updateRoomModal" class="modal modal-fixed-footer" style="width: 1000px !important; border-radius: 10px; height: 450px !important; margin-top: 30px;">
				    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				      <h4 class="center">Update Rooms</h4>
				      		<div class="row">
				      			<div class="col s6">
				      				<div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>
				                    <div class="input-field col s12">
				                       <select id="" name="selectedJob" required>
				                           <option disabled selected>Building</option>
				                       </select>
				                       <label>Building</span></label>
				                   </div>
				                   <div class="input-field col s12">
				                       <select id="" name="selectedJob" required>
				                           <option disabled selected>Floor</option>
				                       </select>
				                       <label >Floor</label>
				                   </div>

				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Cojuangco" id="roomName" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="roomName" class="active">Room Name</label>
				                    </div>
				                    <div class="input-field col s12">
				                       <select id="slct1" name="selectedJob" required>
				                           <option disabled selected>Room Type</option>
				                           
				                       </select>
				                       <label>Room Type</label>
				                   </div>
				      			</div>

				      			<div class="col s6">
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Aquino" id="roomDesc" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="roomDesc" class="active">Room Description<span class="red-text"><b>*</b></span></label>
				                    </div>

				                    <div class="input-field col s12">
				                        <input name="dblPrice" placeholder="Ex: Aquino" id="dblPrice" type="number" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="dblPrice" class="active">Room Price<span class="red-text"><b>*</b></span></label>
				                    </div>

				                    <div class="input-field col s12">
				                        <input name="dblPrice" placeholder="Ex: Aquino" id="dblPrice" type="number" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="dblPrice" class="active">Number of Beds<span class="red-text"><b>*</b></span></label>
				                    </div>

				                    <div class="input-field col s12">
				                       <select id="slct1" name="selectedJob" required>
				                           <option disabled selected>Nurse Station</option>
				                       </select>
				                       <label>Nurse Station</label>
				                   </div>
				      			</div>
				      		</div>
				                  
				      <div class="modal-footer">
				          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
				          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">CREATE</button>
				      </div>
				     </div>
				   </form>
				</div>
		</div>
	</article>

<!-- add option -->
   <div id="addRoomTypeModal" class="modal" style="margin-top: 30px; border-radius: 10px; width: 500px !important;">
     <form id="addRoomTypeForm">
     	<input type="hidden" id="roomTypeFormToken" value="{!! csrf_token() !!}" />
       <div class="modal-content">
         <h4 class="thin center">Add Room Type</h4>
             <div class="input-field col s8 offset-s2">
               <select id="roomTypeList" size="10">
               		<option disabled="disabled" selected="">Choose Room</option>
                   @foreach($roomTypes as $roomType)
                   <option value="{!! $roomType->intRoomTypeId !!}">{!! $roomType->strRoomTypeDesc !!}</option>
                   @endforeach
               </select>
               <label>Room</label>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="text" class="validate tooltipped specialoption" placeholder="Ex: Cashier" name="addOptionName" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$" id="roomTypeNameInput">
               <label for="addOptionName" class="active">Room Type Name</label>
             </div>
             <div class="input-field col s8 offset-s2 center">
               <button type="submit" value="Submit" id="createAddPosition" class="waves-effect waves-light indigo darken-3 btn-flat white-text">SAVE</button>
             </div>
       </div>
     </form>
   </div>

{{-- Modal Deactivate START --}}
<div id="deactivate_room_modal" class="modal">
	<input type="hidden" id="deactivate_room_token" value="{!! csrf_token() !!}" />
    <div class="modal-content">
      <h4>Deactivate Room Details</h4>
      <p>Are you sure?</p>
    </div>
    <div class="modal-footer">
      <a class="modal-action waves-effect waves-green btn-flat" id="deactivate_room_btn">Yes</a>
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

	document.getElementById('buildingCreate').onchange = function() {
		$.ajax({
			url: "{!! url('building/changed') !!}",
			type: 'POST',
			data: {
				_token: document.getElementById('createRoomFormToken').value,
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
	};
	
	document.getElementById('addRoomTypeForm').onsubmit = function(event) {
		event.preventDefault();

		$.ajax({
			url: "{!! url('room-type/create') !!}",
			type: "POST",
			data: {
				_token: document.getElementById('roomTypeFormToken').value,
				roomTypeName: document.getElementById('roomTypeNameInput').value
			},
			success: function(data) {
				var option = document.createElement('option');
				option.text = data.strRoomTypeDesc;
				option.value = data.intRoomTypeId;

				document.getElementById('roomTypeCreateSelect').appendChild(option);

				option = document.createElement('option');
				option.text = data.strRoomTypeDesc;
				option.value = data.intRoomTypeId;

				document.getElementById('roomTypeList').appendChild(option); 

				document.getElementById('roomTypeNameInput').value = null;
				$('#addRoomTypeModal').closeModal();
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	};

	function updateId($id)
	{
		$('#updateRoomModal').openModal();
	}

	function deactivateId(id) 
	{
		$('#deactivate_room_modal').openModal();

		document.getElementById('deactivate_room_btn').onclick = function() {
			$.ajax({
				url: "room/" + id,
				type: "POST",
				data: {
					_token: document.getElementById('deactivate_room_token').value,
					_method: "DELETE"
				},
				success: function(data) {
					window.location.href = "{!! url('room') !!}";
				},
				error: function(xhr) {
					console.log(xhr);
				}
			});
		};
	}
</script>
 
@endsection