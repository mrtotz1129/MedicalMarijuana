@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo lighten-1" style="margin-left: -10px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Building Maintenance</h4>
				</div>
				<div class="col s6 right">
					<a class="right waves-effect waves-light modal-trigger btn-floating btn-large red darken-2 left white-text tooltipped" 
					href="#addBuildling" style="position: relative; top: 40px; right: 1%;" 
					data-tooltip="Create"><i class="material-icons">add</i></a>
				</div>
			</div>	
		<div class="container">
		<br>
					<table id="example" class="display" cellspacing="0" width="100%">
						<thead>
							
				                <th>Name</th>
				                <th>Address</th>
				                <th>No. of floors</th>
				                <th>Actions</th>
				            </tr>
				        </thead>
				        
				        <tbody>
				        	@foreach($buildings as $building)
				        	<tr>
				        		
				        		<td>{!! $building->strBuildingName !!}</td>
				        		<td>{!! $building->strBuildingLocation !!}</td>
				        		<td>
				        			<a href="javascript:updateId({!! $building->intBuildingId !!})" class="tooltipped" data-tooltip="Update Building Details"><i class="material-icons">mode_edit</i></a>
				        			<a href="javascript:deactivateId({!! $building->intBuildingId !!})" class="tooltipped" data-tooltip="Deactivate Building Details"><i class="material-icons">delete</i></a>
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
				<!-- Create Building Modal -->
				   <div id="addBuildling" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="createEmpForm" action="{!! url('building') !!}" enctype="multipart/form-data">
				    	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Create Building</h4>
				        </div>
				           
				                <div class="aside aside1 z-depth-0">
				                <!-- second -->
				                  <div class="row">
				                    <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="strBuildingName" placeholder="Ex: Cojuangco" id="buidingName" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2" required>
				                        <label for="buidingName" class="active">Building Name<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="strBuildingLocation" placeholder="Ex: Aquino" id="buildingLocation" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="buildingLocation" class="active">Building Location<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s10" style="margin-top: 28px !important; margin-left: 10px;">
				                      <input name="intFloorDesc" placeholder="Ex: 5" type="number" id="numberOfFloors" class="validate tooltipped" minlength="10" maxlength="10" data-position="bottom" data-delay="30" data-tooltip="Ex:4">
				                      <label for="numberOfFloors" style="margin-left: -35px;">Number of floors</label>
					                </div>
				                  	<div class="input-field col s12">
				                        <input name="txtBuildingDesc" placeholder="Ex: Cojuangco" id="buidingName" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="buidingName" class="active">Buidling Description</label>
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

				<!-- Update Building Modal -->
				   <div id="updateBuilding" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="updateBuildingForm" action="{!! url('fee') !!}" enctype="multipart/form-data">
				    	<input type="hidden" name="_token" id="updateBuildingToken" value="{!! csrf_token() !!}" />
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Update Building</h4>
				        </div>
				           
				                <div class="aside aside1 z-depth-0">
				                <!-- second -->
				                  <div class="row">
				                    <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Cojuangco" id="buidingNameUpdate" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="buidingNameUpdate" class="active">Building Name</label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Aquino" id="buildingLocationUpdate" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="buildingLocationUpdate" class="active">Building Location<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s10" style="margin-top: 28px !important; margin-left: 10px;">
				                      <input name="" placeholder="Ex: 5" type="number" id="numberOfFloorsUpdate" class="validate tooltipped" minlength="10" maxlength="10" data-position="bottom" data-delay="30" data-tooltip="Ex:4">
				                      <label for="numberOfFloorsUpdate" style="margin-left: -35px;">Number of floors</label>
					                </div>
				                  	<div class="input-field col s12">
				                        <input name="" placeholder="Ex: Cojuangco" id="buildingDescUpdate" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="buildingDescUpdate" class="active">Building Description</label>
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

<!-- add option -->
   <div id="addOption" class="modal" style="margin-top: 30px;">
     <form id="createOption">
       <div class="modal-content">
         <h4>Add Another Position</h4>
         <div class="row">
           <div class="col s12">
             <div class="input-field col s8 offset-s2">
               <select id="addOptionSelect" class="browser-default" size="10">
                 <c:forEach items="${empCategory}" var="name">
                     <option value="${name.strCategoryName}">${name.strCategoryName }</option>
                   </c:forEach>
               </select>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="text" class="validate tooltipped specialoption" placeholder="Ex: Cashier" id="addOptionName" name="addOptionName" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
               <label for="addOptionName" class="active">Position</label>
             </div>
             <div class="input-field col s8 offset-s2 center">
               <button type="submit" value="Submit" id="createAddPosition" class="waves-effect waves-light purple darken-3 btn-flat white-text">SAVE</button>
             
             </div>
           </div>
         </div>
       </div>
     </form>
   </div>
 
{{-- Modal Deactivate START --}}
<div id="deactivate_building_modal" class="modal">
	<input type="hidden" id="deactivate_building_token" value="{!! csrf_token() !!}" />
    <div class="modal-content">
      <h4>Deactivate Building Details</h4>
      <p>Are you sure?</p>
    </div>
    <div class="modal-footer">
      <a class="modal-action waves-effect waves-green btn-flat" id="deactivate_building_btn" onclick="deactivateClick()">Yes</a>
      <a class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
    </div>
</div>
{{-- Modal Deactivate END --}}

<script type="text/javascript">
	var tempId = 0;

	function updateId(id)
	{
		tempId = id;

		$.ajax({
			url: "building/" + id,
			type: "GET",
			success: function(data) {
				document.getElementById('buidingNameUpdate').value = data.strBuildingName;
				document.getElementById('buildingLocationUpdate').value = data.strBuildingLocation;
				document.getElementById('numberOfFloorsUpdate').value = data.intFloorDesc;
				document.getElementById('buildingDescUpdate').value = data.txtBuildingDesc;

				$('#updateBuilding').openModal();
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	}

	function deactivateId(id)
	{
		tempId = id;

		$('#deactivate_building_modal').openModal();
	}

	function deactivateClick()
	{
		$.ajax({
			url: "building/" + tempId,
			type: "POST",
			data: {
				_token: document.getElementById('deactivate_building_token').value,
				_method: "DELETE"
			},
			success: function(data) {
				window.location.href = "{!! url('building') !!}";
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	}

	$('#updateBuildingForm').on('submit', function(event) {
		event.preventDefault();

		$.ajax({
			url: 'building/' + tempId,
			type: "POST",
			data: {
				_token: document.getElementById('updateBuildingToken').value,
				_method: 'PUT',
				buildingName: document.getElementById('buidingNameUpdate').value,
				buildingLocation: document.getElementById('buildingLocationUpdate').value,
				floorNumber: document.getElementById('numberOfFloorsUpdate').value,
				buildingDesc: document.getElementById('buildingDescUpdate').value
			},
			success: function(data) {
				window.location.href = "{!! url('building') !!}";
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	})
</script>
@endsection