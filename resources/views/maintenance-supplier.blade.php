@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Supplier Maintenance</h4>
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
				                <!-- <th>Supplier ID</th> -->
				                <th>Name</th>
				                <th>Address</th>
				                <th>Contact Number</th>
				                <th>Actions</th>
				            </tr>
				        </thead>
				        	
				        <tbody>
				        	@foreach($suppliers as $supplier)
				        	<tr>
				        		<td>{!! $supplier->strSupplierName !!}</td>
				        		<td>{!! $supplier->strSupplierAddress !!}</td>
				        		<td>{!! $supplier->strSupplierContactNo !!}</td>
				        		<td>
				        			<a href="javascript:updateId({!! $supplier->intSupplierId !!})" class="tooltipped" data-tooltip="Update Supplier Details"><i class="material-icons">mode_edit</i></a>
				        			<a href="javascript:deactivateId({!! $supplier->intSupplierId !!})" class="tooltipped" data-tooltip="Deactivate Supplier Details"><i class="material-icons">delete</i></a>
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
				<!-- Create Fee Modal -->
				   <div id="create" class="modal modal-fixed-footer" style="width: 800px !important; border-radius: 10px; height: 400px !important;">
				    <form class="col s12 form" method="post" id="createSupplierForm" action="{!! url('supplier') !!}" enctype="multipart/form-data">
				    	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
				      <div class="modal-content">
				              <h4 class="thin center">Add Supplier</h4>
				              <div class="row">
				              		<div class="col s4">
      				                  <div class="input-field col s12 center">
      				                       <img name="image" id="employeeimg" class="circle center" style="width: 100px; height: 100px;" src="{!! asset('img/no_image.png') !!}" alt=""/>
      				                   </div>
      				                   <div class="input-field col s12">
      				                       <div class="file-field input-field">
      			                             <div class="btn">
      			                               <span><i class="material-icons">add_a_photo</i></span>
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
				              			      <input name="strSupplierName" placeholder="Ex: Cojuangco" id="supplierName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				              			      <label for="supplierName" class="active">Supplier Name<span class="red-text"><b>*</b></span></label>
				              			  </div>
				              			  <div class="input-field col s12">
				              			      <input name="strSupplierAddress" placeholder="Ex: Aquino" id="supplierAddress" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				              			      <label for="supplierAddress" class="active">Supplier Address<span class="red-text"><b>*</b></span></label>
				              			  </div>
				              			  <div class="input-field col s12">
				              			    <input name="strSupplierContactNo" placeholder="Ex: 9268806979" type="text" id="createContact" class="validate tooltipped" minlength="10" maxlength="10" data-position="bottom" data-delay="30" data-tooltip="Ex: 9268806979<br/>( 10 numbers only )" pattern="^[0-9]{10,10}$">
				              			    <label for="createContact">Contact Number</label>
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

				<!-- Update Supplier Modal -->
				   <div id="updateSupplierModal" class="modal modal-fixed-footer" style="width: 800px !important; border-radius: 10px; height: 400px !important;">
				    <form class="col s12 form" method="post" id="updateSupplierFormId" action="{!! url('supplier') !!}" enctype="multipart/form-data">
				    	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
				      <div class="modal-content">
				              <h4 class="thin center">Add Supplier</h4>
				              <div class="row">
				              		<div class="col s4">
      				                  <div class="input-field col s12 center">
      				                       <img name="image" id="updateEmployeeImg" class="circle center" style="width: 100px; height: 100px;" src="{!! asset('img/no_image.png') !!}" alt=""/>
      				                   </div>
      				                   <div class="input-field col s12">
      				                       <div class="file-field input-field">
      			                             <div class="btn">
      			                               <span><i class="material-icons">add_a_photo</i></span>
      			                               <input type="file" id="updateSupplierImage" name="image"  onchange="changeImage()">
      			                             </div>
      			                             <div class="file-path-wrapper">
      			                               <input class="file-path validate" type="text">
      			                             </div>
      			                           </div>
      				                   </div>
				              		</div>

				              		<div class="col s8">
				              			  <div class="input-field col s12">
				              			      <input name="strSupplierName" placeholder="Ex: Cojuangco" id="updateSupplierName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				              			      <label for="supplierName" class="active">Supplier Name<span class="red-text"><b>*</b></span></label>
				              			  </div>
				              			  <div class="input-field col s12">
				              			      <input name="strSupplierAddress" placeholder="Ex: Aquino" id="updateSupplierAddress" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				              			      <label for="supplierAddress" class="active">Supplier Address<span class="red-text"><b>*</b></span></label>
				              			  </div>
				              			  <div class="input-field col s12">
				              			    <input name="strSupplierContactNo" placeholder="Ex: 9268806979" type="text" id="updateSupplierContactNo" class="validate tooltipped" minlength="10" maxlength="10" data-position="bottom" data-delay="30" data-tooltip="Ex: 9268806979<br/>( 10 numbers only )" pattern="^[0-9]{10,10}$">
				              			    <label for="createContact">Contact Number</label>
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

{{-- Modal Deactivate START --}}
<div id="deactivate_supplier_modal" class="modal">
	<input type="hidden" id="deactivate_supplier_token" value="{!! csrf_token() !!}" />
    <div class="modal-content">
      <h4>Deactivate Supplier Details</h4>
      <p>Are you sure?</p>
    </div>
    <div class="modal-footer">
      <a class="modal-action waves-effect waves-green btn-flat" id="deactivate_supplier_btn">Yes</a>
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

	function updateId(id) {
		var imgBaseUrl	=	"{!! asset('') !!}";

		document.getElementById('updateSupplierFormId').value = id;

		$.ajax({
			url: 'supplier/' + id,
			type: 'GET',
			success: function(data) {
				document.getElementById('updateSupplierName').value			=	data.strSupplierName;
				document.getElementById('updateSupplierAddress').value		= 	data.strSupplierAddress;
				document.getElementById('updateSupplierContactNo').value	=	data.strSupplierContactNo;

				if(data.txtImagePath !== null) {
					document.getElementById('updateEmployeeImg').src = imgBaseUrl + data.txtImagePath;
				}

				$('#updateSupplierModal').openModal();
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	}

	function deactivateId(id) {
		$('#deactivate_supplier_modal').openModal();

		$('#deactivate_supplier_btn').on('click', function() {
			$.ajax({
				url: 'supplier/' + id,
				type: 'POST',
				data: {
					_token: document.getElementById('deactivate_supplier_btn').value,
					_method: 'DELETE'
				},
				success: function(data) {
					window.location.href = "{!! url('supplier') !!}";
				},
				error: function(xhr) {
					console.log(xhr);
				}
			});
		});
	}

	function changeImage() {
		var imgInput = document.getElementById('updateSupplierImage');

		if (imgInput.files && imgInput.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            document.getElementById('updateEmployeeImg').src = e.target.result;
	        }

	        reader.readAsDataURL(imgInput.files[0]);
	    } else {
	    	alert('Oh men!');
	    }
	}
</script>
 
@endsection