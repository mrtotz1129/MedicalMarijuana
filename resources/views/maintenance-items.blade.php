@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Items Maintenance</h4>
				</div>
				<div class="col s6 right">
					<a class="right waves-effect waves-light modal-trigger btn-floating btn-large red darken-2 left white-text tooltipped" 
					href="#create" style="position: relative; top: 40px; right: 1%;" 
					data-tooltip="Create"><i class="material-icons">add</i></a>
				</div>

				<div class="col s4">
					<a href="#setPrice" class="btn modal-trigger btn-floating red"><i class="material-icons">money</i></a>
				</div>
					<div class="col s4">
					<a href="#viewPrice" class="btn modal-trigger btn-floating green"><i class="material-icons">money</i></a>
				</div>
			</div>	
		<div class="container" style="margin-left: -30px;">
		<br>
				<table id="example" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th>Name</th>
				                <th>Category</th>
				                <th>Generic Name</th>
				                <th>Actions</th>
				            </tr>
				        </thead>
				        	
				        <tbody>
				        @foreach($itemList as $item)
				        	<tr>
				        		<td>{!! $item->strItemName !!}</td>
				        		<td>{!! $item->strItemCategoryDesc !!}</td>
				        		<td>{!! $item->strGenericName !!}</td>
				        		<td>
				        			<a href="javascript:viewPrice({!! $item->intItemId !!})" class="btn-floating green"><i class="material-icons">money</i></a>
				        			<a href="javascript:addPrice({!! $item->intItemId !!})" class="btn btn-floating red"><i class="material-icons">money</i></a>
									<a href="javascript:updateId({!! $item->intItemId !!})" class="tooltipped" data-tooltip="Update Fee Details"><i class="material-icons">mode_edit</i></a>
				        			<a href="javascript:deactivateId({!! $item->intItemId !!})" class="tooltipped" data-tooltip="Deactivate Fee Details"><i class="material-icons">delete</i></a>
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

				
				<!-- Create Item Modal -->
				   <div id="create" class="modal modal-fixed-footer" style="height: 450px !important; width: 800px !important; border-radius: 10px;">
				    <form class="col s12 form" method="post" id="createEmpForm" action="{!! url('item') !!}" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				            <h4 class="thin center">Add Item</h4>
							<div class="row">
								<div class="col s4">
									<div class="input-field col s12">
									     <img name="image" id="employeeimg" class="circle" style="width: 100px; height: 100px;" src="{!! asset('img/jerald.jpg') !!}" alt=""/>
									 </div>
									 <div class="input-field col s12">
									     <div class="file-field input-field">
									           <div class="btn">
									             <span>Upload</span>
									             <input type="file" id="fileUpload">
									           </div>
									           <div class="file-path-wrapper">
									             <input class="file-path validate" type="text">
									           </div>
									         </div>
									 </div>
								</div>

								<div class="col s8">
									 <div class="input-field col s12">
									      <input name="strItemName" placeholder="Ex: Aquino" id="drugName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
									      <label for="drugName" class="active">Item Name<span class="red-text"><b>*</b></span></label>
									  </div>
									<div class="row">
				                    	<div class="input-field col s9">
				                        <select id="itemCategorySelect" name="strItemCategoryDesc" required>
				                            <option disabled selected>Choose Category</option>
				                        	@foreach($itemCategoryList as $itemCategory)
												<option value="{!! $itemCategory->strItemCategoryDesc !!}">{!! $itemCategory->strItemCategoryDesc !!}</option>
				                        	@endforeach
				                        </select>
				                        <label >Item Category</label>
				                    </div>
				                    <div class="col s3">
				                    	<a href="#addCategory" class="modal-trigger btn green"><i class="material-icons">add</i></a>
				                    </div>
				                    </div>
				                    
				                    <div class="row">
				                    	<div class="input-field col s9">
				                        <select id="genericName" name="intGenericNameId" required>
				                            <option disabled selected>Choose Generic name</option>
				                            @foreach($genericList as $generic)
				                            	<option value="{!! $generic->intGenericNameId !!}">{!! $generic->strGenericName !!}</option>
				                    		@endforeach
				                        </select>
				                        <label>Generic Name</label>
				                    </div>
				                    <div class="col s3">
				                    	<a href="#addGeneric" class="modal-trigger btn green"><i class="material-icons">add</i></a>
				                    </div>
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

				<!-- Update Item Modal -->
				   <div id="update" class="modal modal-fixed-footer" style="height: 450px !important; width: 800px !important; border-radius: 10px;">
				    <form class="col s12 form" method="post" id="createEmpForm" action="{!! url('item') !!}" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				            <h4 class="thin center">Add Item</h4>
							<div class="row">
								<div class="col s4">
									<div class="input-field col s12">
									     <img name="image" id="employeeimg" class="circle" style="width: 100px; height: 100px;" src="{!! asset('img/jerald.jpg') !!}" alt=""/>
									 </div>
									 <div class="input-field col s12">
									     <div class="file-field input-field">
									           <div class="btn">
									             <span>Upload</span>
									             <input type="file" id="fileUpload">
									           </div>
									           <div class="file-path-wrapper">
									             <input class="file-path validate" type="text">
									           </div>
									         </div>
									 </div>
									
								</div>

								<div class="col s8">
									 <div class="input-field col s12">
									      <input name="strItemName" placeholder="Ex: Aquino" id="drugName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
									      <label for="drugName" class="active">Item Name<span class="red-text"><b>*</b></span></label>
									  </div>
									<div class="row">
				                    	<div class="input-field col s9">
				                        <select id="itemCategorySelect" name="strItemCategoryDesc" required>
				                            <option disabled selected>Choose Category</option>
				                        	@foreach($itemCategoryList as $itemCategory)
												<option value="{!! $itemCategory->strItemCategoryDesc !!}">{!! $itemCategory->strItemCategoryDesc !!}</option>
				                        	@endforeach
				                        </select>
				                        <label >Item Category</label>
				                    </div>
				                    <div class="col s3">
				                    	<a href="#addCategory" class="modal-trigger btn green"><i class="material-icons">add</i></a>
				                    </div>
				                    </div>
				                    
				                    <div class="row">
				                    	<div class="input-field col s9">
				                        <select id="genericName" name="intGenericNameId" required>
				                            <option disabled selected>Choose Generic name</option>
				                            @foreach($genericList as $generic)
				                            	<option value="{!! $generic->intGenericNameId !!}">{!! $generic->strGenericName !!}</option>
				                    		@endforeach
				                        </select>
				                        <label>Generic Name</label>
				                    </div>
				                    <div class="col s3">
				                    	<a href="#addGeneric" class="modal-trigger btn green"><i class="material-icons">add</i></a>
				                    </div>
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
				
		</div>
	</article>

<!-- add option -->
   <div id="addCategory" class="modal" style="margin-top: 30px;">
     <form id="createItemCategoryForm" action="{!! url('item-category') !!}" method="POST">
       <div class="modal-content">
         <h4>Add Item Category</h4>
         <div class="row">
           <div class="col s12">
             <div class="input-field col s8 offset-s2">
               <select id="addItemCategorySelect" class="browser-default" size="10">
               		@foreach($itemCategoryList as $itemCategory)
						<option value="{!! $itemCategory->strItemCategoryDesc !!}">{!! $itemCategory->strItemCategoryDesc !!}</option>
           			@endforeach
               </select>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="text" class="validate tooltipped specialoption" placeholder="Ex: Medicine" id="strItemCategory" name="strItemCategoryDesc" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
               <label for="strItemCategory" class="active">Item Category</label>
             </div>
             <div class="input-field col s8 offset-s2 center">
               <button type="submit" value="Submit" id="createAddPosition" class="waves-effect waves-light purple darken-3 btn-flat white-text">SAVE</button>
             </div>
           </div>
         </div>
       </div>
     </form>
   </div>


     <!-- add option -->
   <div id="addGeneric" class="modal" style="margin-top: 30px;">
     <form id="createGenericForm">
       <div class="modal-content">
         <h4>Add Generic Name</h4>
         <div class="row">
           <div class="col s12">
             <div class="input-field col s8 offset-s2">
               <select id="selectGeneric" class="browser-default" size="10">
               		@foreach($genericList as $generic)
						<option value="{!! $generic->intGenericNameId !!}">{!! $generic->strGenericName !!}</option>
         			@endforeach
               </select>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="text" class="validate tooltipped specialoption" placeholder="Ex: Cashier" id="strGenericName" name="strGenericName" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
               <label for="strGenericName" class="active">Generic Name</label>
             </div>
             <div class="input-field col s8 offset-s2 center">
               <button type="submit" value="Submit" id="createGeneric" class="waves-effect waves-light purple darken-3 btn-flat white-text">SAVE</button>
             </div>
           </div>
         </div>
       </div>
     </form>
   </div>

   <!-- Set Price -->
   <div id="setPrice" class="modal" style="margin-top: 30px; border-radius: 10px;">
     <form id="createOption" action="{!! url('item-price') !!}" method="POST">
   		<input type="hidden" id="itemId" name="intItemId">
       <div class="modal-content">
         <h4>Set Item Price</h4>
         <div class="container">
         	<div class="row">
         		  <div class="input-field col s6">
         		    <select class="browser-default" id="measurementSelect" name="intMeasurementId" required>
         		        <option disabled selected>Choose Measurement</option>
         		        @foreach($measurementList as $measurement)
							<option value="{!! $measurement->intUnitOfMeasurementId !!}">{!! $measurement->strUnitOfMeasurementName !!}</option>
         		        @endforeach
         		    </select>
         		    <label for="measurementSelect" class="active">Set Measurement<span class="red-text">*</span></label>
         			</div>

         			<div class="input-field col s6" style="margin-top: 20px;">
         		    <input type="number" class="validate tooltipped specialoption" placeholder="Ex: 1,000" id="itemPrice" name="dblPrice" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
         		    <label for="itemPrice" class="active">Item Price</label>
         		  	</div>
         	</div>
            
             <div class="col s12 center">
				 <button type="submit" value="Submit" id="createGeneric" class="waves-effect waves-light purple darken-3 btn-flat white-text">SAVE</button>
             </div>
         </div>
       </div>
     </form>
   </div>


   <!-- View Price -->
   <div id="viewPrice" class="modal" style="margin-top: 30px; border-radius: 10px;">
     <form id="createOption">
       <div class="modal-content">
         <h4>View Item Price</h4>
         <div class="container">
         	<div class="row">
         		<h5 class="thin">Biogesic</h5>
         		  <table id="view" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th>Item ID</th>
				                <th>Type</th>
				                <th>Name</th>
				                <th>Generic Name</th>
				                <th>Details</th>
				                <th>Price</th>
				                <th>Actions</th>
				            </tr>
				        </thead>
				        	
				    </table>
				</div>

				<script type="text/javascript">
					$(document).ready(function() {
					    $('#view').DataTable( {
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
         	</div>
            
             <div class="col s12 center">
				 <a class="waves-effect waves-light btn col s4 center indigot darken-2">SAVE</a>
			</div>
         </div>
       </div>
     </form>
   </div>

{{-- Modal Deactivate START --}}
<div id="deactivate_item_modal" class="modal">
	<input type="hidden" id="deactivate_item_token" value="{!! csrf_token() !!}" />
    <div class="modal-content">
      <h4>Deactivate Item Details</h4>
      <p>Are you sure?</p>
    </div>
    <div class="modal-footer">
      <a class="modal-action waves-effect waves-green btn-flat" id="deactivate_item_btn">Yes</a>
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

	$('#createItemCategoryForm').on('submit', function(event) {
		event.preventDefault();
		$.ajax({
				url: "item-category",
				type: "POST",
				data: {
					strItemCategoryDesc: document.getElementById('strItemCategory').value
				},
				success: function(data) {
					$('#itemCategorySelect').html('');
					var dropDown = $('#itemCategorySelect');
					$.each(data, function(i, itemCategory){
						dropDown.append(
					        $('<option></option>').val(itemCategory.strItemCategoryDesc).html(itemCategory.strItemCategoryDesc)
					    );
					});
					$('#itemCategorySelect').html('');
					var itemCategorySelect = $('#itemCategorySelect');
					$.each(data, function(i, itemCategory){
						itemCategorySelect.append(
					        $('<option></option>').val(itemCategory.strItemCategoryDesc).html(itemCategory.strItemCategoryDesc)
					    );
					});
					$('#strItemCategory').val('');
					$('#addCategory').closeModal();
				},
				error: function(xhr) {
					alert('error');
					console.log(xhr);
				}
			});
	});

	$('#createGenericForm').on('submit', function(event) {
		event.preventDefault();
		$.ajax({
				url: "generic",
				type: "POST",
				data: {
					strGenericName: document.getElementById('strGenericName').value
				},
				success: function(data) {
					$('#selectGeneric').html('');
					var dropDown = $('#selectGeneric');
					$.each(data, function(i, generic){
						dropDown.append(
					        $('<option></option>').val(generic.intGenericNameId).html(generic.strGenericName)
					    );
					});
					$('#genericName').html('');
					var itemCategorySelect = $('#genericName');
					$.each(data, function(i, generic){
						itemCategorySelect.append(
					        $('<option></option>').val(generic.intGenericNameId).html(generic.strGenericName)
					    );
					});
					$('#strGenericName').val('');
					$('#addGeneric').closeModal();
				},
				error: function(xhr) {
					alert('error');
					console.log(xhr);
				}
			});
	});

	function addPrice(id){
		$('#setPrice').openModal();
		$('#itemId').val(id);
	}

	function viewPrice(id){
		$('#viewPrice').openModal();
	}

	function deactivateId(id)
	{
		$('#deactivate_item_modal').openModal();

		document.getElementById('deactivate_item_btn').onclick = function()
		{
			$.ajax({
				url: "{!! url('item') !!}" + '/' + id,
				type: "POST",
				data: {
					_method: 'DELETE',
					_token: document.getElementById('deactivate_item_token').value
				},
				success: function(data) {
					window.location.href = '{!! url("item") !!}';
				},
				error: function(xhr) {
					console.log(xhr);
				}
			});
		};
	}

</script>

 
@endsection