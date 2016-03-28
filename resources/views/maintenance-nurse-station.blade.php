@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo lighten-1" style="margin-left: -10px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Nurse Station Maintenance</h4>
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
				                <th>Nurse Station ID</th>
				                <th>Building</th>
				                <th>Floor</th>
				                <th>Nurse/s</th>
				                <th>Actions</th>
				            </tr>
				        </thead>
				        	
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
				<!-- Create Nurse Modal -->
				   <div id="create" class="modal modal-fixed-footer" style="width: 700px !important;">
				    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
				    	<input type="hidden" id="nurseStationFormToken" value="{!! csrf_token() !!}" />
				      <div class="modal-content">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Add Nurse Station</h4>
				        </div>
				                <div class="aside aside1 z-depth-0">
				                <!-- second -->
				                  <div class="row">
				                    <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>

				                    <div class="input-field col s12">
				                      <select class="browser-default" id="buildingCreateSelect" name="selectedJob" required>
				                          <option disabled selected>Building</option>
				                          @foreach($buildingList as $building)
				                          <option value="{!! $building->intBuildingId !!}">{!! $building->strBuildingName !!}</option>
				                          @endforeach
				                      </select>
				                      <label for="slct1" class="active">Building<span class="red-text">*</span></label>
				                  </div>
				                  <div class="input-field col s12">
				                      <select class="browser-default" id="slct1" name="selectedJob" required>
				                          <option disabled selected>Floor</option>
				                      </select>
				                      <label for="slct1" class="active">Floor<span class="red-text">*</span></label>
				                  </div>

				                  <div class="input-field col s12">
				                    <select multiple>
				                      <option value="" disabled selected>Choose your option</option>
				                      @foreach($nurses as $nurse)
				                      <option value="{!! $nurse->intEmployeeId !!}">{!! $nurse->name !!}</option>
				                      @endforeach
				                    </select>
				                    <label>Select Nurses</label>
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
				   <div id="create" class="modal modal-fixed-footer" style="width: 70px !important;">
				    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Update Supplier</h4>
				        </div>
				              


				                <div class="aside aside2 z-depth-0">
				                <!-- second -->
				                  <div class="row">
				                   <div class="input-field col s12">
				                      <select class="browser-default" id="slct1" name="selectedJob" required>
				                          <option disabled selected>Building</option>
				                          @foreach($buildingList as $building)
				                          <option value="{!! $building->intBuildingId !!}">{!! $building->strBuildingName !!}</option>
				                          @endforeach
				                      </select>
				                      <label for="slct1" class="active">Building<span class="red-text">*</span></label>
				                  </div>
				                  <div class="input-field col s12">
				                      <select class="browser-default" id="slct1" name="selectedJob" required>
				                          <option disabled selected>Floor</option>
				                          @foreach($buildingList as $building)
				                          <option value="{!! $building->intBuildingId !!}">{!! $building->strBuildingName !!}</option>
				                          @endforeach
				                      </select>
				                      <label for="slct1" class="active">Floor<span class="red-text">*</span></label>
				                  </div>

				                  <div class="input-field col s12">
				                    <select multiple>
				                      <option value="" disabled selected>Choose your option</option>
				                      <option value="1">Nurse 1</option>
				                      <option value="2">Nurse 2</option>
				                      <option value="3">Nurse 3</option>
				                    </select>
				                    <label>Select Nurses</label>
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
<script type="text/javascript">
	
  $(document).ready(function() {
    $('select').material_select();
  });
          
</script>

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

	document.getElementById('buildingCreateSelect').onchange = function() {
		$.ajax({
			url: "{!! url('building/changed') !!}",
			type: 'POST',
			data: {
				_token: document.getElementById('nurseStationFormToken').value,
				buildingId: this.value
			},
			success: function(data) {
				for(var i = 0; i < data.length; i++) {
					var option = document.createElement()
				}
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	};
</script>
 
@endsection