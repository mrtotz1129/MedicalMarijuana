@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Equipment Maintenance</h4>
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
				                <th>Type</th>
				                <th>Name</th>
				                <th>Actions</th>
				            </tr>
				        </thead>
				        	
				        <tbody>
				        	@foreach($equipments as $equipment)
				        	<tr>
				        		<td>{!! $equipment->strEquipmentCatName !!}</td>
				        		<td>{!! $equipment->strEquipmentCode !!}</td>
				        		<td>
				        			<a href="javascript:updateId({!! $equipment->intEquipmentId !!})" class="tooltipped" data-tooltip="Update Equipment Details"><i class="material-icons">mode_edit</i></a>
				        			<a href="javascript:deactivateId({!! $equipment->intEquipmentId !!})" class="tooltipped" data-tooltip="Deactivate Equipment Details"><i class="material-icons">delete</i></a>	
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
				<!-- Create Equipment Modal -->
				   <div id="create" class="modal modal-fixed-footer" style="width: 800px !important; height: 700px !important; border-radius: 10px;">
				    <form class="col s12 form" method="post" id="createEmpForm" action="{!! url('equipment') !!}" enctype="multipart/form-data">
				    	<input type="hidden" id="createEquipmentFormToken" name="_token" value="{!! csrf_token() !!}" />
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				              <h4 class="grey-text text-darken-1 center	">Create New Equipment</h4>
				              <div class="row">
				              	<div class="col s4">
				              		<div class="input-field col s12">
				                       <img name="image" id="employeeimg" class="circle" style="width: 150px; height: 150px;" src="{!! asset('img/no_image.png') !!}" alt=""/>
				                   </div>
				                   <div class="input-field col s12">
				                       <div class="file-field input-field">
			                             <div class="btn">
			                               <span>Upload</span>
			                               <input type="file" id="fileUpload" name="image">
			                             </div>
			                             <div class="file-path-wrapper">
			                               <input class="file-path validate" type="text">
			                             </div>
			                           </div>
				                   </div>
				              	</div>

				              	<div class="col s8">
				        
				                    <div class="input-field col s12">
				                        <input name="strEquipmentCode" placeholder="Ex: Benigno" id="equipmentID" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" minlength="2">
				                        <label for="equipmentID" class="active">Equipment Code<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s8">
				                        <select id="createEquipmentTypeSelect" data-position="bottom" data-delay="30" id="slct1" name="equipmentType" required>
				                            <option disabled selected>Equipment Type</option>
				                            @foreach($equipmentTypes as $equipmentType)
				                              <option value="{!! $equipmentType->intEquipmentCategoryId !!}">{!! $equipmentType->strEquipmentCatName !!}</option>
				                            @endforeach
				                        </select>
				                        <label>Type</label>
				                    </div>
				                    <div class="input-field col s4">
				                      <a href="#createEquipmentTypeModal" class="waves-effect waves-light btn-flat modal-trigger indigo darken-1 white-text"><i class="material-icons">add</i></a>
				                    </div>
				                   
				                    <div class="input-field col s12">
				                        <select id="slct1" name="supplier" required>
				                            <option disabled selected>Supplier</option>
				                            @foreach($suppliers as $supplier)
				                            <option value="{!! $supplier->intSupplierId !!}">{!! $supplier->strSupplierName !!}</option>
				                            @endforeach
				                        </select>
				                        <label>Supplier</label>
				                    </div>
				                    <div class="input-field col s12">
				                        <select id="createRoomSelect" name="room" required>
				                            <option disabled selected>Room</option>
				                            @foreach($rooms as $room)
				                            <option value="{!! $room->intRoomId !!}">{!! $room->intRoomId . '('. $room->txtRoomDescription . ')' !!}</option>
				                            @endforeach
				                        </select>
				                        <label >Room</label>
				                    </div>
				              	</div>
				              </div>   
				      <div class="modal-footer">
				          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
				          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">CREATE</button>
				      </div>
				      </form>
				</div>

				<!-- Update Equipment Modal -->
				   <div id="udpateEquipment" class="modal modal-fixed-footer" style="width: 800px !important; height: 700px !important; border-radius: 10px;">
				    <form class="col s12 form" method="post" id="createEmpForm" action="{!! url('equipment') !!}" enctype="multipart/form-data">
				    	<input type="hidden" id="createEquipmentFormToken" name="_token" value="{!! csrf_token() !!}" />
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				              <h4 class="grey-text text-darken-1 center	">Create New Equipment</h4>
				              <div class="row">
				              	<div class="col s4">
				              		<div class="input-field col s12">
				                       <img name="image" id="employeeimg" class="circle" style="width: 150px; height: 150px;" src="{!! asset('img/no_image.png') !!}" alt=""/>
				                   </div>
				                   <div class="input-field col s12">
				                       <div class="file-field input-field">
			                             <div class="btn">
			                               <span>Upload</span>
			                               <input type="file" id="fileUpload" name="image">
			                             </div>
			                             <div class="file-path-wrapper">
			                               <input class="file-path validate" type="text">
			                             </div>
			                           </div>
				                   </div>
				              	</div>

				              	<div class="col s8">
				        
				                    <div class="input-field col s12">
				                        <input name="strEquipmentCode" placeholder="Ex: Benigno" id="updateEquipmentID" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" minlength="2">
				                        <label for="equipmentID" class="active">Equipment Code<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s8">
				                        <select id="createEquipmentTypeSelect" data-position="bottom" data-delay="30" id="updateEquipmentType" name="equipmentType" required>
				                            <option disabled selected>Equipment Type</option>
				                            @foreach($equipmentTypes as $equipmentType)
				                              <option value="{!! $equipmentType->intEquipmentCategoryId !!}">{!! $equipmentType->strEquipmentCatName !!}</option>
				                            @endforeach
				                        </select>
				                        <label>Type</label>
				                    </div>
				                    <div class="input-field col s4">
				                      <a href="#createEquipmentTypeModal" class="waves-effect waves-light btn-flat modal-trigger indigo darken-1 white-text"><i class="material-icons">add</i></a>
				                    </div>
				                   
				                    <div class="input-field col s12">
				                        <select id="slct1" name="supplier" required>
				                            <option disabled selected>Supplier</option>
				                            @foreach($suppliers as $supplier)
				                            <option value="{!! $supplier->intSupplierId !!}">{!! $supplier->strSupplierName !!}</option>
				                            @endforeach
				                        </select>
				                        <label>Supplier</label>
				                    </div>
				                    <div class="input-field col s12">
				                        <select id="createRoomSelect" name="room" required>
				                            <option disabled selected>Room</option>
				                            @foreach($rooms as $room)
				                            <option value="{!! $room->intRoomId !!}">{!! $room->intRoomId . '('. $room->txtRoomDescription . ')' !!}</option>
				                            @endforeach
				                        </select>
				                        <label >Room</label>
				                    </div>
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
   <div id="createEquipmentTypeModal" class="modal" style="margin-top: 30px;">
     <form id="createEquipmentTypeForm">
     	<input type="hidden" id="createEquipmentTypeFormToken" value="{!! csrf_token() !!}" />
       <div class="modal-content">
         <h4>Add Another Equipment Type</h4>
         <div class="row">
           <div class="col s12">
             <div class="input-field col s8 offset-s2">
               <select id="createEquipmentTypeModalSelect" class="browser-default" size="10">
                 @foreach($equipmentTypes as $equipmentType)
                 <option value="{!! $equipmentType->intEquipmentCategoryId !!}">{!! $equipmentType->strEquipmentCatName !!}</option>
                 @endforeach
               </select>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="text" class="validate tooltipped specialoption" placeholder="Ex: Cashier" id="createEquipmentType" name="createEquipmentType" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
               <label for="addOptionName" class="active">Equipment Type</label>
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
<div id="deactivate_equipment_modal" class="modal">
	<input type="hidden" id="deactivate_equipment_token" value="{!! csrf_token() !!}" />
    <div class="modal-content">
      <h4>Deactivate Equipment Details</h4>
      <p>Are you sure?</p>
    </div>
    <div class="modal-footer">
      <a class="modal-action waves-effect waves-green btn-flat" id="deactivate_equipment_btn">Yes</a>
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

	document.getElementById('createEquipmentTypeForm').onsubmit = function(event)
	{
		event.preventDefault();

		$.ajax({
			url: "{!! url('equipment/create') !!}",
			type: "POST",
			data: 
			{
				_token: document.getElementById('createEquipmentTypeFormToken').value,
				formData: $('#createEquipmentTypeForm').serialize()
			},
			success: function(data)
			{	
				var option = document.createElement('option');
				option.text = data.strEquipmentCatName;
				option.value = data.intEquipmentCategoryId;
				document.getElementById('createEquipmentTypeSelect').appendChild(option);	

				option = document.createElement('option');
				option.text = data.strEquipmentCatName;
				option.value = data.intEquipmentCategoryId;
				document.getElementById('createEquipmentTypeModalSelect').appendChild(option);

				option = document.createElement('option');
				option.text = data.strEquipmentCatName;
				option.value = data.intEquipmentCategoryId;
				document.getElementById('updateEquipmentType').appendChild(option);

				document.getElementById('createEquipmentType').value = null;

				$('#createEquipmentTypeModal').closeModal();
			},
			error: function(xhr)
			{
				console.log(xhr);
			}
		});
	};

	document.getElementById('createBuildingSelect').onchange = function()
	{
		$.ajax({
			url: "{!! url('building/changed') !!}",
			type: 'POST',
			data: {
				_token: document.getElementById('createEquipmentFormToken').value,
				buildingId: this.value
			},
			success: function(data) {
				$('#createFloorSelect').empty();

				for(var i = 0; i < data.length; i++) {
					var option = document.createElement('option');
					option.text = data[i].intFloorDesc;
					option.value = data[i].intFloorId;

					document.getElementById('createFloorSelect').appendChild(option);
				}
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	};

	function updateId(id)
	{
		$('#udpateEquipment').openModal();
	}

	function deactivateId(id)
	{
		$('#deactivate_equipment_modal').openModal();

		document.getElementById('deactivate_equipment_btn').onclick = function()
		{
			$.ajax({
				url: "equipment/" + id,
				type: "POST",
				data: {
					_method: "DELETE",
					_token: document.getElementById('deactivate_equipment_token').value
				},
				success: function(data) {
					window.location.href = "{!! url('equipment') !!}";
				},
				error: function(xhr) {
					console.log(xhr);
				}
			});
		};
	}
</script>
 
@endsection