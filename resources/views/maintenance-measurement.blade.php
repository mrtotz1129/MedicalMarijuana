@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo lighten-1" style="margin-left: -10px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Measurement Maintenance</h4>
				</div>
				<div class="col s6 right">
					<a class="right waves-effect waves-light modal-trigger btn-floating btn-large red darken-2 left white-text tooltipped" 
					href="#createModal" style="position: relative; top: 40px; right: 1%;" 
					data-tooltip="Create"><i class="material-icons">add</i></a>
				</div>
			</div>	
		<div class="container">
		<br>
				<table id="example" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				           
				                <th>Name</th>
				                <th>Abbreviation</th>
				                <th>Equivalent</th>
				                <th>Action</th>
				            </tr>
				        </thead>
				        	
				        <tbody>
				        	@foreach($measurementList as $measurement)
				        	<tr>
				        		<td>{!! $measurement->strUnitOfMeasurementName !!}</td>
				        		<td>{!! $measurement->strUnitOfMeasurementAbbrev !!}</td>
				        		<td>{!! $measurement->dblEquivalent !!}</td>
				        		<td>
				        			<a href="javascript:updateId({!! $measurement->intUnitOfMeasurementId !!})" class="tooltipped" data-tooltip="Update Measurement Details"><i class="material-icons">mode_edit</i></a>
				        			<a href="javascript:deactivateId({!! $measurement->intUnitOfMeasurementId !!})" class="tooltipped" data-tooltip="Deactivate Measurement Details"><i class="material-icons">delete</i></a>
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
				    <form class="col s12 form" method="post" id="createEmpForm" action="{!! url('measurement') !!}" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Create Measurement</h4>
				        </div>
				           
				                <div class="aside aside1 z-depth-0">
				                <!-- second -->
				                  <div class="row">
				                    <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>
				                    	<div class="input-field col s12">
				                        <input name="strMeasurementName" placeholder="Ex: Benigno" id="measurementName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
				                        <label for="measurementName" class="active">Measurement Name<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="strMeasurementAbbrev" placeholder="Ex: Aquino" id="MeasurementAbbv" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="MeasurementAbbv" class="active">Measurement Abbreviation<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="dblEquivalent" placeholder="Ex: Aquino" id="equivalent" type="number" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="equivalent" class="active">Equivalent per Piece<span class="red-text"><b>*</b></span></label>
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

				<!-- Update Measurement Modal -->
				   <div id="updateModal" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="updateMeasurementForm" action="createEmployee" enctype="multipart/form-data">
				      <input type="hidden" id="updateMeasurementFormToken" value="{!! csrf_token() !!}" />
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
				                    	<div class="input-field col s12">
				                        <input name="" placeholder="Ex: Benigno" id="measurementName_update" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
				                        <label for="measurementName_update" class="active">Measurement Name<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Aquino" id="measurementAbbrev_update" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="measurementAbbrev_update" class="active">Measurement Abbreviation<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Aquino" id="equivalent_update" type="number" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="equivalent_update" class="active">Equivalent per Piece<span class="red-text"><b>*</b></span></label>
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

{{-- Modal Deactivate START --}}
<div id="deactivate_fee_modal" class="modal">
	<input type="hidden" id="deactivate_employee_token" value="{!! csrf_token() !!}" />
    <div class="modal-content">
      <h4>Deactivate Fee Details</h4>
      <p>Are you sure?</p>
    </div>
    <div class="modal-footer">
      <a class="modal-action waves-effect waves-green btn-flat" id="deactivate_measurement_btn">Yes</a>
      <a class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
    </div>
</div>
{{-- Modal Deactivate END --}}

<script type="text/javascript">
	function updateId(id) {
		$.ajax({
			url: 'measurement/' + id,
			type: 'GET',
			success: function(data) {
				document.getElementById('measurementName_update').value = data.strUnitOfMeasurementName;
				document.getElementById('measurementAbbrev_update').value = data.strUnitOfMeasurementAbbrev;
				document.getElementById('equivalent_update').value = data.dblEquivalent;

				$('#updateModal').openModal();
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});

		$('#updateMeasurementForm').on('submit', function(event) {
			event.preventDefault();

			$.ajax({
				url: "measurement/" + id,
				type: "POST",
				data: {
					_method: "PUT",
					_token: document.getElementById('updateMeasurementFormToken').value,
					strMeasurementName: document.getElementById('measurementName_update').value,
					strMeasurementAbbrev: document.getElementById('measurementAbbrev_update').value,
					dblEquivalent: document.getElementById('equivalent_update').value
				},
				success: function(data) {
					window.location.href = "{!! url('measurement') !!}";
				},
				error: function(xhr) {
					console.log(xhr);
				}
			});
		});
	}

	function deactivateId(id) {
		$('#deactivate_fee_modal').openModal();

		$('#deactivate_measurement_btn').on('click', function() {
			$.ajax({
				url: "measurement/" + id,
				type: "POST",
				data: {
					_method: "DELETE",
					measurementId: id
				},
				success: function(data) {
					window.location.href = "{!! url('measurement') !!}";
				},
				error: function(xhr) {
					console.log(xhr);
				}
			});
		});
	}
</script>
 
@endsection