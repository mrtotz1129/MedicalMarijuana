@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Services Maintenance</h4>
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
				                <th>Name</th>
				                <th>Description</th>
				                <th>Price</th>
				                <th>Actions</th>
				            </tr>
				        </thead>
				        	
				        <tbody>
				        @foreach($serviceList as $service)
				        	<tr>
				        		<td>{!! $service->strServiceName !!}</td>
				        		<td>{!! $service->txtServiceDesc !!}</td>
				        		<td>{!! number_format($service->service_price, 2) . 'PhP' !!}</td>
				        		<td>
				        			<a href="javascript:updateId({!! $service->intServiceId !!})" class="tooltipped" data-tooltip="Update Fee Details"><i class="material-icons">mode_edit</i></a>
				        			<a href="javascript:deactivateId({!! $service->intServiceId !!})" class="tooltipped" data-tooltip="Deactivate Fee Details"><i class="material-icons">delete</i></a>
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


				<!-- Create Service Modal -->
				   <div id="createModal" class="modal modal-fixed-footer" style="width: 500px !important; height: 450px !important; border-radius: 10px;">
				    <form class="col s12 form" method="post" id="createEmpForm" action="{!! url('service') !!}" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				              <h4 class="thin center">Create Service</h4>
				                    <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="strServiceName" placeholder="Ex: Aquino" id="strFeeName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="strFeeName" class="active">Service Name<span class="red-text"><b>*</b></span></label>
				                    </div>

				                    <div class="input-field col s12">
				                        <input name="dblPrice" placeholder="Ex: Aquino" id="dblPrice" type="number" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="dblPrice" class="active">Service Price<span class="red-text"><b>*</b></span></label>
				                    </div>

                     		      	 <div class="input-field col s6">
                           	           <i class="material-icons prefix">mode_edit</i>
                           	           <textarea id="remarks" class="materialize-textarea" name="txtServiceDesc"></textarea>
                           	           <label for="remarks">Description</label>
                           	         </div>
				        </div>
				      <div class="modal-footer">
				          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
				          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">CREATE</button>
				      </div>
				      </form>
				</div>

				<!-- Update Service Modal -->
				   <div id="updateModal" class="modal modal-fixed-footer" style="width: 500px !important; height: 450px !important; border-radius: 10px;">
				    <form class="col s12 form" method="post" id="updateServiceForm" action="{!! url('service') !!}" enctype="multipart/form-data">
				       <input type="hidden" id="updateServiceFormToken" value="{!! csrf_token() !!}" />
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				              <h4 class="thin center">Create Service</h4>
				                    <div class="input-field col s12">
				                        <input name="strServiceName" placeholder="Ex: Aquino" id="serviceName_update" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="serviceName_update" class="active">Service Name<span class="red-text"><b>*</b></span></label>
				                    </div>

				                    <div class="input-field col s12">
				                        <input name="dblPrice" placeholder="Ex: Aquino" id="servicePrice_update" type="number" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="servicePrice_update" class="active">Service Price<span class="red-text"><b>*</b></span></label>
				                    </div>

                     		      	 <div class="input-field col s6">
                           	           <i class="material-icons prefix">mode_edit</i>
                           	           <textarea id="serviceDesc_update" class="materialize-textarea" name="txtServiceDesc"></textarea>
                           	           <label for="serviceDesc_update" id="lblDesc">Description</label>
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
<div id="deactivate_fee_modal" class="modal">
	<input type="hidden" id="deactivate_employee_token" value="{!! csrf_token() !!}" />
    <div class="modal-content">
      <h4>Deactivate Service Details</h4>
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
			url: 'service/' + id,
			type: 'GET',
			success: function(data) {
				document.getElementById('serviceName_update').value = data.strServiceName;
				document.getElementById('servicePrice_update').value = data.service_price;
				document.getElementById('serviceDesc_update').value = data.txtServiceDesc;
				document.getElementById('lblDesc').setAttribute('class', 'active');

				$('#updateModal').openModal();
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});		

		$('#updateServiceForm').on('submit', function(event) {
			event.preventDefault();
			$.ajax({
				url: "service/" + id,
				type: "POST",
				data: {
					_method: "PUT",
					_token: document.getElementById('updateServiceFormToken').value,
					strServiceName: document.getElementById('serviceName_update').value,
					dblPrice: document.getElementById('servicePrice_update').value,
					txtServiceDesc: document.getElementById('serviceDesc_update').value,
				},
				success: function(data) {
					window.location.href = "{!! url('service') !!}";
				},
				error: function(xhr) {
					alert('error');
					console.log(xhr);
				}
			});
		});
	}

	function deactivateId(id) {
		$('#deactivate_fee_modal').openModal();

		$('#deactivate_fee_btn').on('click', function() {
			$.ajax({
				url: "service/" + id,
				type: "POST",
				data: {
					_method: "DELETE",
					feeId: id
				},
				success: function(data) {
					window.location.href = "{!! url('service') !!}";
				},
				error: function(xhr) {
					console.log(xhr);
				}
			});
		});
			
	}

</script>
 
@endsection