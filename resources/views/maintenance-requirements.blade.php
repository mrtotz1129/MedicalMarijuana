@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Requirement Maintenance</h4>
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
				                <th>Details</th>
				                <th>Actions</th>
				            </tr>
				        </thead>
				        	
				        <tbody>
				        	@foreach($requirementList as $requirement)
				        	<tr>
				        		<td>{!! $requirement->strRequirementName !!}</td>
				        		<td>{!! $requirement->txtRequirementDesc !!}</td>
				        		<td>
				        			<a href="javascript:updateId({!! $requirement->intRequirementId !!})" class="tooltipped" data-tooltip="Update Requirement Details"><i class="material-icons">mode_edit</i></a>
				        			<a href="javascript:deactivateId({!! $requirement->intRequirementId !!})" class="tooltipped" data-tooltip="Deactivate Requirement Details"><i class="material-icons">delete</i></a>
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


				<!-- Create Requirement Modal -->
				   <div id="createModal" class="modal modal-fixed-footer" style="width: 500px !important; height: 400px !important; border-radius: 10px;">
				    <form class="col s12 form" method="post" id="createEmpForm" action="{!! url('requirement') !!}" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
			              <h4 class="thin center">Create Requirement</h4>
			              <br>
		                   <div class="input-field col s12">
		                        <input name="strRequirementName" placeholder="Ex: Benigno" id="feeID" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
		                        <label for="feeID" class="active">Requirement Name<span class="red-text"><b>*</b></span></label>
		                    </div>
	         		      	 <div class="input-field col s12">
	               	           <i class="material-icons prefix">mode_edit</i>
	               	           <textarea id="remarks" class="materialize-textarea" name="txtRequirementDesc"></textarea>
	               	           <label for="remarks" id="lblDesc">Description</label>
	               	         </div>
				        </div>
				      <div class="modal-footer">
				          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
				          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">CREATE</button>
				      </div>
				      </form>
				</div>

				<!-- Update Requirement Modal -->
				   <div id="updateModal" class="modal modal-fixed-footer" style="width: 500px !important; height: 400px !important; border-radius: 10px;">
				    <form class="col s12 form" method="post" id="updateRequirementForm" action="{!! url('requirement') !!}" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
			              <h4 class="thin center">Create Requirement</h4>
			              <br>
		                   <div class="input-field col s12">
		                        <input name="strRequirementName" placeholder="Ex: Benigno" id="requirementName_update" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
		                        <label for="requirementName_update" class="active">Requirement Name<span class="red-text"><b>*</b></span></label>
		                    </div>
	         		      	 <div class="input-field col s12">
	               	           <i class="material-icons prefix">mode_edit</i>
	               	           <textarea id="requirementDesc_update" class="materialize-textarea" name="txtRequirementDesc"></textarea>
	               	           <label for="requirementDesc_update" id="lblDesc">Description</label>
	               	         </div>
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

{{-- Modal Deactivate START --}}
<div id="deactivate_requirement_modal" class="modal">
	<input type="hidden" id="deactivate_requirement_token" value="{!! csrf_token() !!}" />
    <div class="modal-content">
      <h4>Deactivate Fee Details</h4>
      <p>Are you sure?</p>
    </div>
    <div class="modal-footer">
      <a class="modal-action waves-effect waves-green btn-flat" id="deactivate_requirement_btn">Yes</a>
      <a class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
    </div>
</div>
{{-- Modal Deactivate END --}}

<script type="text/javascript">
	function updateId(id) {
		$.ajax({
			url: 'requirement/' + id,
			type: 'GET',
			success: function(data) {
				document.getElementById('requirementName_update').value = data.strRequirementName;
				document.getElementById('requirementDesc_update').value = data.txtRequirementDesc;
				document.getElementById('lblDesc').setAttribute('class', 'active');

				$('#updateModal').openModal();
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});

		$('#updateRequirementForm').on('submit', function(event) {
			event.preventDefault();

			$.ajax({
				url: "requirement/" + id,
				type: "POST",
				data: {
					_method: "PUT",
					_token: document.getElementById('updateRequirementFormToken').value,
					requirementName: document.getElementById('requirementName_update').value,
					requirementDesc: document.getElementById('requirementDesc_update').value
				},
				success: function(data) {
					window.location.href = "{!! url('requirement') !!}";
				},
				error: function(xhr) {
					console.log(xhr);
				}
			});
		});
	}

	function deactivateId(id) {
		$('#deactivate_requirement_modal').openModal();

		$('#deactivate_requirement_btn').on('click', function() {
			$.ajax({
				url: "requirement/" + id,
				type: "POST",
				data: {
					_method: "DELETE",
					requirementId: id
				},
				success: function(data) {
					window.location.href = "{!! url('requirement') !!}";
				},
				error: function(xhr) {
					alert('error');
					console.log(xhr);
				}
			});
		});
	}

</script>
 
@endsection