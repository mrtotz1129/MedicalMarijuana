@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo lighten-1" style="margin-left: -10px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Room Maintenance</h4>
				</div>
				<div class="col s6 right">
					<a class="right waves-effect waves-light modal-trigger btn-floating btn-large red darken-2 left white-text tooltipped" 
					href="#create" style="position: relative; top: 40px; right: 1%;" 
					data-tooltip="Create"><i class="material-icons">add</i></a>
				</div>
			</div>	
		<div class="container">
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
				   <div id="create" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="createEmpForm" action="{!! url('room') !!}" enctype="multipart/form-data">
				    <input type="hidden" id="createRoomFormToken" name="_token" value="{!! csrf_token() !!}" />

				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Create Room</h4>
				        </div>


				                <div class="aside aside2 z-depth-0">

				                <!-- second -->
				                  <div class="row">
				                    <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>
				                    <div class="input-field col s12">
				                       <select class="browser-default" id="buildingCreate" name="selectedJob" required>
				                           <option disabled selected>Building</option>
				                           @foreach($buildings as $building)
				                           <option value="{!! $building->intBuildingId !!}">{!! $building->strBuildingName !!}</option>
				                           @endforeach
				                       </select>
				                       <label for="slct1" class="active">Building<span class="red-text">*</span></label>
				                   </div>
				                   <div class="input-field col s12">
				                       <select class="browser-default" id="floorCreateSelect" name="floorCreateSelect" required>
				                           <option disabled selected>Floor</option>
				                           
				                       </select>
				                       <label for="slct1" class="active">Floor<span class="red-text">*</span></label>
				                   </div>

				                    <!-- <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Cojuangco" id="roomName" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="roomName" class="active">Room Name</label>
				                    </div> -->
				                    <div class="input-field col s8">
				                       <select class="browser-default" id="roomTypeCreateSelect" name="roomTypeCreate" required>
				                           <option disabled selected>Room Type</option>
				                           @foreach($roomTypes as $roomType)
				                           <option value="{!! $roomType->intRoomTypeId !!}">{!! $roomType->strRoomTypeDesc !!}</option>
				                           @endforeach
				                       </select>
				                       <label for="slct1" class="active">Room Type<span class="red-text">*</span></label>
				                   </div>

				                   <div class="input-field col s4">
				                    <a href="#addRoomTypeModal" class="waves-effect waves-light btn-flat modal-trigger indigo darken-1 white-text"><i class="material-icons">add</i></a>
				                  </div>
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
				                       <select class="browser-default" id="slct1" name="nurseStationSelect">
				                           <option disabled selected>Nurse Station</option>
				                           @foreach($nurseStations as $nurseStation)
				                           <option value="{!! $nurseStation->intNurseStationId !!}">{!! $nurseStation->intNurseStationId !!}</option>
				                           @endforeach
				                       </select>
				                       <label for="slct1" class="active">Nurse Station</label>
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
				   <div id="create" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Update Rooms</h4>
				        </div>
				              <div class="aside aside1 z-depth-0">

 						<div class="aside aside1 z-depth-0">
				                <!-- second -->
				                  <div class="row">
				                    <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>
				                    <div class="input-field col s12">
				                       <select class="browser-default" id="slct1" name="selectedJob" required>
				                           <option disabled selected>Building</option>
				                           
				                       </select>
				                       <label for="slct1" class="active">Building<span class="red-text">*</span></label>
				                   </div>
				                   <div class="input-field col s12">
				                       <select class="browser-default" id="slct1" name="selectedJob" required>
				                           <option disabled selected>Floor</option>
				                           
				                       </select>
				                       <label for="slct1" class="active">Floor<span class="red-text">*</span></label>
				                   </div>

				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Cojuangco" id="roomName" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="roomName" class="active">Room Name</label>
				                    </div>
				                    <div class="input-field col s12">
				                       <select class="browser-default" id="slct1" name="selectedJob" required>
				                           <option disabled selected>Room Type</option>
				                           
				                       </select>
				                       <label for="slct1" class="active">Room Type<span class="red-text">*</span></label>
				                   </div>
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
				                       <select class="browser-default" id="slct1" name="selectedJob" required>
				                           <option disabled selected>Nurse Station</option>
				                         
				                       </select>
				                       <label for="slct1" class="active">Nurse Station<span class="red-text">*</span></label>
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
		</div>
	</article>

<!-- add option -->
   <div id="addRoomTypeModal" class="modal" style="margin-top: 30px;">
     <form id="addRoomTypeForm">
     	<input type="hidden" id="roomTypeFormToken" value="{!! csrf_token() !!}" />
       <div class="modal-content">
         <h4>Add Room Type</h4>
         <div class="row">
           <div class="col s12">
             <div class="input-field col s8 offset-s2">
               <select id="roomTypeList" class="browser-default" size="10">
                 <!-- <c:forEach items="${empCategory}" var="name"> -->
                     <!-- <option value="${name.strCategoryName}">${name.strCategoryName }</option> -->
                   <!-- </c:forEach> -->
                   @foreach($roomTypes as $roomType)
                   <option value="{!! $roomType->intRoomTypeId !!}">{!! $roomType->strRoomTypeDesc !!}</option>
                   @endforeach
               </select>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="text" class="validate tooltipped specialoption" placeholder="Ex: Cashier" name="addOptionName" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$" id="roomTypeNameInput">
               <label for="addOptionName" class="active">Room Type Name</label>
             </div>
             <div class="input-field col s8 offset-s2 center">
               <button type="submit" value="Submit" id="createAddPosition" class="waves-effect waves-light purple darken-3 btn-flat white-text">SAVE</button>
             
             </div>
           </div>
         </div>
       </div>
     </form>
   </div>

   <!-- add Bed Modal -->
   <div id="addBed" class="modal" style="margin-top: 30px;">
     <form id="createOption">
       <div class="modal-content">
         <h4>Add Bed</h4>
         <div class="row">
           <div class="col s12">
             <div class="input-field col s8 offset-s2">
               <select id="addBedSelect" class="browser-default" size="10">
                     <option value="${name.strCategoryName}">${name.strCategoryName }</option>
               </select>
               <label for="addBedSelect" class="active">Available Beds</label>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="text" class="validate tooltipped specialoption" placeholder="Ex: Cashier" id="addOptionName" name="addOptionName" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
               <label for="addOptionName" class="active">Desciption</label>
             </div>
             <div class="input-field col s8 offset-s2 center">
               <button type="submit" value="Submit" id="createAddPosition" class="waves-effect waves-light purple darken-3 btn-flat white-text">SAVE</button>
             
             </div>
           </div>
         </div>
       </div>
     </form>
   </div>

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
</script>
 
@endsection