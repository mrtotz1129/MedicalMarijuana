@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo darken-2" style="margin-left: -10px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Employee Maintenance</h4>
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
				                <th>Employee Number</th>
				                <th>Type</th>
				                <th>Name</th>
				                <th>Address</th>
				                <th>Contact No.</th>
				                <th>Actions</th>
				            </tr>
				        </thead>
				        	
				        <tbody>
				        	@foreach($employees as $employee)
				        	<tr>
				        		<td>{!! $employee->intEmployeeId !!}</td>
				        		<td>{!! $employee->strPosition !!}</td>
				        		<td>{!! $employee->strLastName . ', ' . $employee->strFirstName . (($employee->strMiddleName != null) ? ' ' . $employee->strMiddleName : '')  !!}</td>
				        		<td>{!! $employee->strAddress !!}</td>
				        		<td>{!! $employee->strContactNum !!}</td>
				        		<td>
				        			<a href="javascript:updateId({!! $employee->intEmployeeId !!})" class="tooltipped" data-tooltip="Update Employee Details"><i class="material-icons">mode_edit</i></a>
				        			<a href="javascript:deactivateId({!! $employee->intEmployeeId !!})" class="tooltipped" data-tooltip="Deactivate Employee Details"><i class="material-icons">delete</i></a>
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
					    });
					});
				</script>
				<!-- Create Employee Modal -->
				   <div id="create" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="createEmpForm" action="{!! url('employee') !!}" enctype="multipart/form-data">
				    	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="row">
				              <h4 class="grey-text text-darken-1 center	">Create Employee</h4>
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
				                               <input type="file" id="fileUpload" name="fileUpload">
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
				                    <div class="input-field col s12">
				                        <input name="strFirstName" placeholder="Ex: Benigno" id="strFirstName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
				                        <label for="strFirstName" class="active">First Name<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="strMiddleName" placeholder="Ex: Cojuangco" id="strMiddleName" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="strMiddleName" class="active">Middle Name</label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="strLastName" placeholder="Ex: Aquino" id="strLastName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="strLastName" class="active">Last Name<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input type="date" value="March/9/1996" name="strBirthdate" placeholder="January 1, 1996" class="datepicker active tooltipped" id="createBirthday" required data-position="bottom" data-delay="30" data-tooltip="Ex: January/1/1996">
				                        <label for="createBirthday" class="active">Birthday<span class="red-text">*</span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <label for="createAge">Age</label>
				                        <input type="text" class="validate black-text tooltipped" disabled id="createAge" placeholder="Ex: 18" data-position="bottom" data-delay="30" data-tooltip="Age 18 and above - Qualified<br/>Age 17 and below - Not Qualified">
				                    </div>
				                </div>
				              </div>
				              <!-- END ASIDE 2 -->


				              <div class="aside aside3 z-depth-0">
				              <!-- third -->
				                <div class="row">
				                  <div class="input-field col s12" style="margin-top: 40px !important;">
				                      <select required class="browser-default" name="strEmpGender" id="strEmpGender">
				                        <option value="" disabled selected>Gender</option>
				                        <option value="Male">Male</option>
				                        <option value="Female">Female</option>
				                      </select>
				                      <label for="strEmpGender" class="active">Gender<span class="red-text">*</span></label>
				                  </div>
				                  <div class="input-field col s1">
				                      <label style="margin-left: -3px; margin-top: 15px !important;" for="contact">(+63)</label>
				                  </div>
				                  <div class="input-field col s10" style="margin-top: 28px !important; margin-left: 10px;">
				                      <input name="strEmpContactNo" placeholder="Ex: 9268806979" type="text" id="createContact" class="validate tooltipped" minlength="10" maxlength="10" data-position="bottom" data-delay="30" data-tooltip="Ex: 9268806979<br/>( 10 numbers only )" pattern="^[0-9]{10,10}$">
				                      <label for="createContact" style="margin-left: -35px;">Contact Number</label>
				                  </div>
				                  <div class="input-field col s12">
				                      <input type="email" name="strEmpEmail"  placeholder="Ex: salon@yahoo.com" class="validate tooltipped" required id="createEmail" data-position="bottom" data-delay="30" data-tooltip="Ex: salon@yahoo.com">
				                      <label for="createEmail" class="active">Email<span class="red-text">*</span></label>
				                  </div>
				                  <div class="input-field col s12">
				                      <input name="strEmpAddress" placeholder="Ex: #20 Julian Eymard St. Sto.Nino Meycauayan, Bulacan" type="text" id="createAddress" minlength="10" class="validate tooltipped specialaddress" required data-position="bottom" data-delay="30" data-tooltip="Ex: #20 Julian Eymard St. Sto.Nino Meycauayan, Bulacan<br/>( At least 10 or more characters )" pattern="^[#+A-Za-z0-9\s.,-]{10,}$">
				                      <label for="createAddress" class="active">Address<span class="red-text">*</span></label>
				                  </div>
				                  <div class="input-field col s8">
				                      <select class="browser-default" id="slct1" name="selectedJob" required>
				                          <option disabled selected>Position</option>
				                          @foreach($positions as $position)
				                          <option value="{!! $position->intEmployeeTypeId !!}">{!! $position->strPosition !!}</option>
				                          @endforeach
				                      </select>
				                      <label for="slct1" class="active">Position<span class="red-text">*</span></label>
				                  </div>
				                  <div class="input-field col s4">
				                    <a href="#addPositionModal" class="waves-effect waves-light btn-flat modal-trigger indigo darken-1 white-text"><i class="material-icons">add</i></a>
				                  </div>
				                  
				                </div>
				              </div>
				              <!-- END OF ASIDE3 -->

				            </div>
				        </div>
				      <div class="modal-footer">
				          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
				          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">CREATE</button>
				      </div>
				      </form>
				</div>

				<!-- Update Employee Modal -->
				   <div id="update-employee-modal" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="updateEmpForm" action="{!! url('employee/update') !!}" enctype="multipart/form-data">
				    	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
				    	<input type="hidden" id="employee_update_id" name="employee_update_id" />
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Update Employee</h4>
				        </div>
				              <div class="aside aside1 z-depth-0">
				              <!-- first -->
				                <div class="row">
				                  <div class="input-field col s12">
				                       <img name="employeeimgEdit" id="employeeimgEdit" class="circle" style="width: 200px; height: 200px;" src="{!! asset('img/jerald.jpg') !!}" alt=""/>
				                   </div>
				                   <div class="input-field col s12">
				                       <div class="file-field input-field">
				                             <div class="btn">
				                               <span>Upload</span>
				                               <input type="file" id="fileUploadEdit" name="fileUpload">
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
				                    <div class="input-field col s12">
				                        <input name="strFirstName" placeholder="Ex: Benigno" id="strEmpFirstNameEdit" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
				                        <label for="strEmpFirstNameEdit" class="active">First Name<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="strMiddleName" placeholder="Ex: Cojuangco" id="strEmpMiddleNameEdit" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="strEmpMiddleNameEdit" class="active">Middle Name</label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="strLastName" placeholder="Ex: Aquino" id="strEmpLastNameEdit" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="strEmpLastNameEdit" class="active">Last Name<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input type="date" name="strBirthdate" placeholder="January 1, 1996" class="datepicker active tooltipped" id="strBirthdateEdit" required data-position="bottom" data-delay="30" data-tooltip="Ex: January/1/1996">
				                        <label for="strBirthdateEdit" class="active">Birthday<span class="red-text">*</span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <label for="createAge">Age</label>
				                        <input type="text" class="validate black-text tooltipped" disabled id="createAge" placeholder="Ex: 18" data-position="bottom" data-delay="30" data-tooltip="Age 18 and above - Qualified<br/>Age 17 and below - Not Qualified">
				                    </div>
				                </div>
				              </div>
				              <!-- END ASIDE 2 -->


				              <div class="aside aside3 z-depth-0">
				              <!-- third -->
				                <div class="row">
				                  <div class="input-field col s12" style="margin-top: 40px !important;">
				                      <select required class="browser-default" name="strEmpGender" id="strEmpGenderEdit">
				                        <option disabled selected>Gender</option>
				                        <option value="Male">Male</option>
				                        <option value="Female">Female</option>
				                      </select>
				                      <label for="strEmpGenderEdit" class="active">Gender<span class="red-text">*</span></label>
				                  </div>
				                  <div class="input-field col s1">
				                      <label style="margin-left: -3px; margin-top: 15px !important;" for="contact">(+63)</label>
				                  </div>
				                  <div class="input-field col s10" style="margin-top: 28px !important; margin-left: 10px;">
				                      <input name="strEmpContactNo" placeholder="Ex: 9268806979" type="text" id="strEmpContactNoEdit" class="validate tooltipped" minlength="10" maxlength="10" data-position="bottom" data-delay="30" data-tooltip="Ex: 9268806979<br/>( 10 numbers only )" pattern="^[0-9]{10,10}$">
				                      <label for="strEmpContactNoEdit" style="margin-left: -35px;">Contact Number</label>
				                  </div>
				                  <div class="input-field col s12">
				                      <input type="email" name="strEmpEmail"  placeholder="Ex: salon@yahoo.com" class="validate tooltipped" required id="strEmpEmailEdit" data-position="bottom" data-delay="30" data-tooltip="Ex: salon@yahoo.com">
				                      <label for="strEmpEmailEdit" class="active">Email<span class="red-text">*</span></label>
				                  </div>
				                  <div class="input-field col s12">
				                      <input name="strEmpAddress" placeholder="Ex: #20 Julian Eymard St. Sto.Nino Meycauayan, Bulacan" type="text" id="strEmpAddressEdit" minlength="10" class="validate tooltipped specialaddress" required data-position="bottom" data-delay="30" data-tooltip="Ex: #20 Julian Eymard St. Sto.Nino Meycauayan, Bulacan<br/>( At least 10 or more characters )" pattern="^[#+A-Za-z0-9\s.,-]{10,}$">
				                      <label for="strEmpAddressEdit" class="active">Address<span class="red-text">*</span></label>
				                  </div>
				                  <div class="input-field col s12">
				                      <select class="browser-default" id="selectedJobEdit" name="selectedJob" required>
				                          <option value="" disabled selected>Position</option>
				                          @foreach($positions as $position)
				                            <option value="{!! $position->intEmployeeTypeId !!}">{!! $position->strPosition !!}</option>
				                          @endforeach
				                      </select>
				                      <label for="selectedJobEdit" class="active">Position<span class="red-text">*</span></label>
				                  </div>
				                 {{--  <div class="input-field col s4">
				                    <a href="#addOption" class="waves-effect waves-light btn-flat modal-trigger indigo darken-1 white-text"><i class="material-icons">add</i></a>
				                  </div> --}}
				                  
				                </div>
				              </div>
				              <!-- END OF ASIDE3 -->

				            </div>
				        </div>
				      <div class="modal-footer">
				          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
				          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">Update</button>
				      </div>
				      </form>
				</div>
		</div>
	</article>

<!-- add option -->
   <div id="addPositionModal" class="modal" style="margin-top: 30px;">
     <form id="createPositionForm">
     	<input type="hidden" id="position_create_token" value="{!! csrf_token() !!}" />
       <div class="modal-content">
         <h4>Add Another Position</h4>
         <div class="row">
           <div class="col s12">
             <div class="input-field col s8 offset-s2">
               <select id="addPositionSelect" class="browser-default" size="10">
                 @foreach($positions as $position)
                     <option value="{!! $position->intEmployeeTypeId !!}">{!! $position->strPosition !!}</option>
                 @endforeach
               </select>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="text" class="validate tooltipped specialoption" placeholder="Ex: Cashier" id="addPositionName" name="addPositionName" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
               <label for="addPositionName" class="active">Position</label>
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
<div id="deactivate_employee_modal" class="modal">
	<input type="hidden" id="deactivate_employee_token" value="{!! csrf_token() !!}" />
    <div class="modal-content">
      <h4>Deactivate Employee Details</h4>
      <p>Are you sure?</p>
    </div>
    <div class="modal-footer">
      <a class="modal-action waves-effect waves-green btn-flat" id="deactivate_employee_btn">Yes</a>
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

	$('#fileUploadEdit').change(function() {
		if (this.files && this.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#employeeimgEdit').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(this.files[0]);
	    }
	});


	function updateId(id) {
		$.ajax({
			url: "employee/" + id,
			type: "GET",
			success: function(data) {
				var assetBaseUrl = "{!! asset('') !!}";

				document.getElementById('employee_update_id').value = data.intEmployeeId;
				document.getElementById('strEmpFirstNameEdit').value = data.strFirstName;
				document.getElementById('strEmpMiddleNameEdit').value = data.strMiddleName;
				document.getElementById('strEmpLastNameEdit').value = data.strLastName;
				document.getElementById('strBirthdateEdit').value = data.dateBirthday;
				(data.strGender == 'Male') ? document.getElementById('strEmpGenderEdit').value = 'Male' : document.getElementById('strEmpGenderEdit').value = 'Female';
				document.getElementById('strEmpContactNoEdit').value = data.strContactNum;
				document.getElementById('strEmpEmailEdit').value = data.strEmail;
				document.getElementById('strEmpAddressEdit').value = data.strAddress;
				document.getElementById('selectedJobEdit').value = data.intEmployeeTypeIdFK;

				if(data.txtImagePath != null) {
					document.getElementById('employeeimgEdit').src = assetBaseUrl + data.txtImagePath;
				} else {
					document.getElementById('employeeimgEdit').src = 
						assetBaseUrl + 'img/no_image.png';
				}

				$('#update-employee-modal').openModal();
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	}

	function deactivateId(id) {
		$('#deactivate_employee_modal').openModal();

		$('#deactivate_employee_btn').on('click', function() {
			$.ajax({
				url: "employee/" + id,
				type: "POST",
				data: {
					_method: 'DELETE',
					_token: document.getElementById('deactivate_employee_token').value
				},
				success: function(data) {
					window.location.href = '{!! url("employee") !!}';
				},
				error: function(xhr) {
					console.log(xhr);
				}
			});
		});
	}

	$('#createPositionForm').on('submit', function(event) {
		event.preventDefault();

		$.ajax({
			url: "{!! url('position/create') !!}",
			type: "POST",
			data: {
				_token: document.getElementById('position_create_token').value,
				position: document.getElementById('addPositionName').value
			},
			success: function(data) {
				var option = document.createElement('option');
				option.value = data.intEmployeeTypeId;
				option.text = data.strPosition;
				document.getElementById('slct1').appendChild(option);

				option = document.createElement('option');
				option.value = data.intEmployeeTypeId;
				option.text = data.strPosition;
				document.getElementById('addPositionSelect').appendChild(option);

				option = document.createElement('option');
				option.value = data.intEmployeeTypeId;
				option.text = data.strPosition;
				document.getElementById('selectedJobEdit').appendChild(option);

				$('#addPositionModal').closeModal();
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	});
</script>
 
@endsection