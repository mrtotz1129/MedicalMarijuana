@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="container">
			<div class="row">
				<div class="col s6">
					<h4 class="thin indigo-text text-darken-2 col">Supplier Maintenance</h4>
				</div>
				<div class="col s6 right">
					<a class="right waves-effect waves-light modal-trigger btn-floating btn-large indigo darken-2 left white-text tooltipped" 
					href="#create" style="margin-top: 20px;" 
					data-tooltip="Create"><i class="material-icons">add</i></a>
				</div>
			</div>	
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
				   <div id="create" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="createSupplierForm" action="{!! url('supplier') !!}" enctype="multipart/form-data">
				    	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
				      <div class="modal-content">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Add Supplier</h4>
				        </div>
			              <div class="aside aside1 z-depth-0">
			              <!-- first -->
			                <div class="row">
			                  <div class="input-field col s12">
			                       <img name="image" id="employeeimg" class="circle" style="width: 200px; height: 200px;" src="{!! asset('img/no_image.png') !!}" alt=""/>
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
			              </div>
				              <!-- END ASIDE 1 -->
				                <div class="aside aside2 z-depth-0">
				                <!-- second -->
				                  <div class="row">
				                    <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>
				                    <!-- <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Benigno" id="supplierID" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
				                        <label for="supplierID" class="active">Supplier ID<span class="red-text"><b>*</b></span></label>
				                    </div> -->
				                    <div class="input-field col s12">
				                        <input name="strSupplierName" placeholder="Ex: Cojuangco" id="supplierName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="supplierName" class="active">Supplier Name<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="strSupplierAddress" placeholder="Ex: Aquino" id="supplierAddress" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="supplierAddress" class="active">Supplier Address<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s1">
				                      <label style="margin-left: -3px; margin-top: 15px !important;" for="contact">(+63)</label>
				                  	</div>
				                    <div class="input-field col s10" style="margin-top: 28px !important; margin-left: 10px;">
				                      <input name="strSupplierContactNo" placeholder="Ex: 9268806979" type="text" id="createContact" class="validate tooltipped" minlength="10" maxlength="10" data-position="bottom" data-delay="30" data-tooltip="Ex: 9268806979<br/>( 10 numbers only )" pattern="^[0-9]{10,10}$">
				                      <label for="createContact" style="margin-left: -35px;">Contact Number</label>
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
				   <div id="updateFeeModal" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" action="{!! url('supplier/update') !!}" enctype="multipart/form-data">
				    	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
				    	<input type="hidden" id="updateSupplierFormId" name="supplierId" />
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Update Supplier</h4>
				        </div>
				              <div class="aside aside1 z-depth-0">
				              <!-- first -->
				                <div class="row">
				                  <div class="input-field col s12">
				                       <img name="image" id="updateEmployeeImg" class="circle" style="width: 200px; height: 200px;" src="{!! asset('img/no_image.png') !!}" alt=""/>
				                   </div>
				                   <div class="input-field col s12">
				                       <div class="file-field input-field">
				                             <div class="btn">
				                               <span>Upload</span>
				                               <input type="file" id="updateSupplierImage" name="image" onchange="changeImage()">
				                             </div>
				                             <div class="file-path-wrapper">
				                               <input class="file-path validate" type="text">
				                             </div>
				                           </div>
				                   </div>
				                </div>
				              </div>
				              <!-- END ASIDE 1 -->


				                <div class="aside aside2 z-depth-0">
				                <!-- second -->
				                  <div class="row">
				                    <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>
				                    <!-- <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Benigno" id="supplierID" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
				                        <label for="supplierID" class="active">Supplier ID<span class="red-text"><b>*</b></span></label>
				                    </div> -->
				                    <div class="input-field col s12">
				                        <input name="strSupplierName" placeholder="Ex: Cojuangco" id="updateSupplierName" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="supplierName" class="active">Supplier Name</label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="strSupplierAddress" placeholder="Ex: Aquino" id="updateSupplierAddress" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="supplierAddress" class="active">Supplier Address<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s1">
				                      <label style="margin-left: -3px; margin-top: 15px !important;" for="contact">(+63)</label>
				                  	</div>
				                    <div class="input-field col s10" style="margin-top: 28px !important; margin-left: 10px;">
				                      <input name="strSupplierContactNo" placeholder="Ex: 9268806979" type="text" id="updateSupplierContactNo" class="validate tooltipped" minlength="10" maxlength="10" data-position="bottom" data-delay="30" data-tooltip="Ex: 9268806979<br/>( 10 numbers only )" pattern="^[0-9]{10,10}$">
				                      <label for="createContact" style="margin-left: -35px;">Contact Number</label>
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

				$('#updateFeeModal').openModal();
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