@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Fee Maintenance</h4>
				</div>
				<div class="col s6 right">
					<a class="right waves-effect waves-light modal-trigger btn-floating btn-large red darken-2 left white-text tooltipped" 
					href="#createModal" style="position: relative; top: 40px; right: 1%;" 
					data-tooltip="Create"><i class="material-icons">add</i></a>
				</div>
			</div>	
		<div class="container" style="margin-left: -30px;">
		<br>
				<table id="example" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                {{-- <th>Fee ID</th> --}}
				                <th>Type</th>
				                <th>Name</th>
				                <th>Details</th>
				                <th>Price</th>
				                {{-- <th>Status</th> --}}
				                <th>Actions</th>
				            </tr>
				        </thead>
				        	
				        <tbody>
				        	@foreach($fees as $fee)
				        	<tr>
				        		<td>{!! $fee->strFeeTypeName !!}</td>
				        		<td>{!! $fee->strFeeName !!}</td>
				        		<td>{!! $fee->txtFeeDesc !!}</td>
				        		<td>{!! number_format($fee->dblPrice, 2) !!}</td>
				        		<td>
				        			<a href="javascript:updateId({!! $fee->intFeeId !!})" class="tooltipped" data-tooltip="Update Fee Details"><i class="material-icons">mode_edit</i></a>
				        			<a href="javascript:deactivateId({!! $fee->intFeeId !!})" class="tooltipped" data-tooltip="Deactivate Fee Details"><i class="material-icons">delete</i></a>
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
				   <div id="createModal" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="createEmpForm" action="{!! url('fee') !!}" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Create Fee</h4>
				        </div>
				           
				                <div class="aside aside1 z-depth-0">
				                <!-- second -->
				                  <div class="row">
				                    <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>
				                    {{-- <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Benigno" id="feeID" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
				                        <label for="feeID" class="active">Fee ID<span class="red-text"><b>*</b></span></label>
				                    </div> --}}
				                    <div class="input-field col s8">
				                        <select class="browser-default" id="feeTypeSelect" name="feeTypeSelect" required>
				                            <option value="" disabled selected>Fee Type</option>
				                             @foreach($feeTypes as $feeType)
				                             <option value="{!! $feeType->intFeeTypeId !!}">{!! $feeType->strFeeTypeName !!}</option>
				                             @endforeach
				                        </select>
				                        <label for="feeTypeSelect" class="active">Type<span class="red-text">*</span></label>
				                    </div>
				                    <div class="input-field col s4">
				                      <a href="#feeTypeCreateModal" class="waves-effect waves-light btn-flat modal-trigger indigo darken-1 white-text"><i class="material-icons">add</i></a>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="strFeeName" placeholder="Ex: Aquino" id="strFeeName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="strFeeName" class="active">Fee Name<span class="red-text"><b>*</b></span></label>
				                    </div>

				                    <div class="input-field col s12">
				                        <input name="dblPrice" placeholder="Ex: Aquino" id="dblPrice" type="number" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="dblPrice" class="active">Fee Price<span class="red-text"><b>*</b></span></label>
				                    </div>

                     		      	 <div class="input-field col s6">
                           	           <i class="material-icons prefix">mode_edit</i>
                           	           <textarea id="remarks" class="materialize-textarea" name="txtFeeDesc"></textarea>
                           	           <label for="remarks">Description</label>
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
				   <div id="updateModal" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="updateFeeForm" action="createEmployee" enctype="multipart/form-data">
				      <input type="hidden" id="updateFeeFormToken" value="{!! csrf_token() !!}" />
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Update Fee</h4>
				        </div>
				                <!-- second -->
				                  <div class="row">
				                    <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>
				                    {{-- <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Benigno" id="feeID" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
				                        <label for="feeID" class="active">Fee ID<span class="red-text"><b>*</b></span></label>
				                    </div> --}}
				                    <div class="input-field col s8">
				                        <select class="browser-default" id="slct1" name="feeType" required>
				                            <option value="" disabled selected>Fee Type</option>
				                             @foreach($feeTypes as $feeType)
				                             <option value="{!! $feeType->intFeeTypeId !!}">{!! $feeType->strFeeTypeName !!}</option>
				                             @endforeach
				                        </select>
				                        <label for="slct1" class="active">Type<span class="red-text">*</span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="feeName" placeholder="Ex: Aquino" id="feeName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="feeName" class="active">Fee Name<span class="red-text"><b>*</b></span></label>
				                    </div>
				                       <div class="input-field col s12">
				                        <input name="feePrice" placeholder="Ex: Aquino" id="feePrice" type="number" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="feePrice" class="active">Fee Price<span class="red-text"><b>*</b></span></label>
				                    </div>

                     		      	 <div class="input-field col s6">
                           	           <i class="material-icons prefix">mode_edit</i>
                           	           <textarea id="remarksEdit" class="materialize-textarea" name="feeDescription"></textarea>
                           	           <label for="remarksEdit" id="remarksEditLabel">Description</label>
                           	         </div>
				                </div>
				              </div>
				              <!-- END ASIDE 2 -->

				            </div>
				       
				        <div class="modal-footer">
				          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
				          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">CREATE</button>
				      </div>
				      </form>
				    </div>
				</div>
		</div>
	</article>

<!-- add option -->
   <div id="feeTypeCreateModal" class="modal" style="margin-top: 30px;">
     <form id="fee_create_form">
     	<input type="hidden" id="fee_create_token" value="{!! csrf_token() !!}" />
       <div class="modal-content">
         <h4>Add Another Fee Type</h4>
         <div class="row">
           <div class="col s12">
             <div class="input-field col s8 offset-s2">
               <select id="feeTypeCreateSelect" class="browser-default" size="10">
				@foreach($feeTypes as $feeType)
				<option value="{!! $feeType->intFeeTypeId !!}">{!! $feeType->strFeeTypeName !!}</option>
                @endforeach
               </select>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="text" class="validate tooltipped specialoption" placeholder="Ex: Cashier" id="fee_type_create" name="addOptionName" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
               <label for="addOptionName" class="active">New Fee</label>
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
<div id="deactivate_fee_modal" class="modal">
	<input type="hidden" id="deactivate_employee_token" value="{!! csrf_token() !!}" />
    <div class="modal-content">
      <h4>Deactivate Fee Details</h4>
      <p>Are you sure?</p>
    </div>
    <div class="modal-footer">
      <a class="modal-action waves-effect waves-green btn-flat" id="deactivate_fee_btn">Yes</a>
      <a class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
    </div>
</div>
{{-- Modal Deactivate END --}}

<script type="text/javascript">
	function updateId(id) {
		$.ajax({
			url: 'fee/' + id,
			type: 'GET',
			success: function(data) {
				document.getElementById('slct1').value = data.intFeeTypeIdFK;
				document.getElementById('feeName').value = data.strFeeName;
				document.getElementById('feePrice').value = data.dblPrice;
				document.getElementById('remarksEdit').value = data.txtFeeDesc;
				document.getElementById('remarksEditLabel').setAttribute('class', 'active');

				$('#updateModal').openModal();
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});

		$('#updateFeeForm').on('submit', function(event) {
			event.preventDefault();

			$.ajax({
				url: "fee/" + id,
				type: "POST",
				data: {
					_method: "PUT",
					_token: document.getElementById('updateFeeFormToken').value,
					feeType: document.getElementById('slct1').value,
					feeName: document.getElementById('feeName').value,
					feePrice: document.getElementById('feePrice').value,
					feeDesc: document.getElementById('remarksEdit').value
				},
				success: function(data) {
					window.location.href = "{!! url('fee') !!}";
				},
				error: function(xhr) {
					console.log(xhr);
				}
			});
		});
	}

	function deactivateId(id) {
		$('#deactivate_fee_modal').openModal();

		$('#deactivate_fee_btn').on('click', function() {
			$.ajax({
				url: "fee/" + id,
				type: "POST",
				data: {
					_method: "DELETE",
					feeId: id
				},
				success: function(data) {
					window.location.href = "{!! url('fee') !!}";
				},
				error: function(xhr) {
					console.log(xhr);
				}
			});
		});
	}

	$('#fee_create_form').on('submit', function(event) {
		event.preventDefault();

		$.ajax({
			url: "{!! url('fee-type/create') !!}",
			type: "POST",
			data: {
				_token: document.getElementById('fee_create_token').value,
				feeTypeName: document.getElementById('fee_type_create').value
			},
			success: function(data) {
				var option = document.createElement('option');
				option.value = data.intFeeTypeId;
				option.text = data.strFeeTypeName;
				document.getElementById('feeTypeSelect').appendChild(option);

				option = document.createElement('option');
				option.value = data.intFeeTypeId;
				option.text = data.strFeeTypeName;
				document.getElementById('feeTypeCreateSelect').appendChild(option);

				$('#feeTypeCreateModal').closeModal();
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	});	
</script>
 
@endsection