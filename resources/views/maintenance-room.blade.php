@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo" style="margin-left: -10px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Room Maintenance</h4>
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
				                <th>Room ID</th>
				                <th>Type</th>
				                <th>Name</th>
				                <th>Details</th>
				                <th>Price</th>
				                <th>Status</th>
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
				<!-- Create Room Modal -->
				   <div id="create" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Create Room</h4>
				        </div>
				              <div class="aside aside1 z-depth-0">
				              <!-- first -->
				                <div class="row">
				                  <div class="input-field col s12">
				                       <img name="image" id="employeeimg" class="circle" style="width: 200px; height: 200px;" src="{!! asset('img/jerald.jpg') !!}" alt=""/>
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
				              </div>
				              <!-- END ASIDE 1 -->


				                <div class="aside aside2 z-depth-0">
				                <!-- second -->
				                  <div class="row">
				                    <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>
				                    <!-- <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Benigno" id="roomID" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
				                        <label for="roomID" class="active">Room ID<span class="red-text"><b>*</b></span></label>
				                    </div> -->
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Cojuangco" id="roomName" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="roomName" class="active">Room Name</label>
				                    </div>
				                    <div class="input-field col s8">
				                      <select class="browser-default" id="slct1" name="selectedJob" required>
				                          <option disabled selected>Type</option>
				                      </select>
				                      <label for="slct1" class="active">Room Type<span class="red-text">*</span></label>
				                  </div>
				                  <div class="input-field col s4">
				                    <a href="#addRoomTypeModal" class="waves-effect waves-light btn-flat modal-trigger indigo darken-1 white-text"><i class="material-icons">add</i></a>
				                  </div>
				                  <div class="input-field col s8">
				                      <select class="browser-default" id="slct1" name="selectedJob">
				                          <option disabled selected>Nurse Station</option>
				                      </select>
				                      <label for="slct1" class="active">Nurse Station</label>
				                  </div>
				                  
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Aquino" id="roomDesc" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="roomDesc" class="active">Room Description<span class="red-text"><b>*</b></span></label>
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
				   <div id="create" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Update Rooms</h4>
				        </div>
				              <div class="aside aside1 z-depth-0">
				              <!-- first -->
				                <div class="row">
				                  <div class="input-field col s12">
				                       <img name="image" id="employeeimg" class="circle" style="width: 200px; height: 200px;" src="{!! asset('img/jerald.jpg') !!}" alt=""/>
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
				              </div>
				              <!-- END ASIDE 1 -->

 <div class="aside aside2 z-depth-0">
				                <!-- second -->
				                  <div class="row">
				                    <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Benigno" id="roomID" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
				                        <label for="roomID" class="active">Room ID<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Cojuangco" id="roomName" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="roomName" class="active">Room Name</label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="strEmpLastName" placeholder="Ex: Aquino" id="roomType" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="roomType" class="active">Room Type<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Aquino" id="roomDesc" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="roomDesc" class="active">Room Description<span class="red-text"><b>*</b></span></label>
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
   <div id="addRoomTypeModal" class="modal" style="margin-top: 30px;">
     <form id="createOption">
       <div class="modal-content">
         <h4>Add Room Type</h4>
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

   <!-- add Bed Modal -->
   <div id="addBed" class="modal" style="margin-top: 30px;">
     <form id="createOption">
       <div class="modal-content">
         <h4>Add Bed</h4>
         <div class="row">
           <div class="col s12">
             <div class="input-field col s8 offset-s2">
               <select id="addBedSelect" class="browser-default" size="10">
                     <option value="${name.strCategoryName}">${name.strCategoryName }</option>
               </select>
               <label for="addBedSelect" class="active">Available Beds</label>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="text" class="validate tooltipped specialoption" placeholder="Ex: Cashier" id="addOptionName" name="addOptionName" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
               <label for="addOptionName" class="active">Desciption</label>
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

</script>
 
@endsection