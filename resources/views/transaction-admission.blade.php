@extends('maintenance')
@section('article')
<article class="white main z-depth-1">
	<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Admission</h4>
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
                    <th>Patient Number</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact No.</th>
                    <th>Room No.</th>
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
	
	   <div id="create" class="modal modal-fixed-footer" style="border-radius: 10px;">
	    <form class="col s12 form" method="post" id="createEmpForm" action="#" enctype="multipart/form-data">
	      <div class="modal-content" style="padding-bottom: 0px !important;">
	        <!-- <div class="container"> -->
	      <div class="wrapper">
	      	<div class="row">
	      		<div class="input-field col s6">
	      		      <h4 class="grey-text text-darken-1 left">Add Patient</h4>
	      		</div>
	      		<div class="input-field col s6 right">
	      		     <a href="#addRoom" class="btn modal-trigger btn-floating red btn-large right"><i class="material-icons">local_hotel</i></a>
	      		</div>
	      	</div>
	              <div class="aside aside1 z-depth-0">
	              <!-- first -->
	                <div class="row">
	                  <div class="input-field col s12">
	                       <img name="image" id="employeeimg" class="circle" style="width: 100px; height: 100px;" src="{!! asset('img/no_image.png') !!}" alt=""/>
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
	                   <p class="center">
	                         <input name="group1" type="radio" id="test1" />
	                         <label for="test1">Out Patient</label>
	                         <input name="group1" type="radio" id="test2" />
	                         <label for="test2">In Patient</label>
	                   </p>
	                   <br>
	                    <div class="input-field col s12">
	                       <select class="browser-default" id="doctorSelect" name="selectedJob" required>
	                           <option disabled selected>Choose Doctor</option>
	                           <option value=""></option>
	                       </select>
	                       <label for="doctorSelect" class="active">Available Doctor</label>
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
	                        <input name="strFirstName" placeholder="Ex: Benigno" id="strEmpFirstName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
	                        <label for="strEmpFirstName" class="active">First Name<span class="red-text"><b>*</b></span></label>
	                    </div>
	                    <div class="input-field col s12">
	                        <input name="strMiddleName" placeholder="Ex: Cojuangco" id="strEmpMiddleName" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
	                        <label for="strEmpMiddleName" class="active">Middle Name</label>
	                    </div>
	                    <div class="input-field col s12">
	                        <input name="strLastName" placeholder="Ex: Aquino" id="strEmpLastName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
	                        <label for="strEmpLastName" class="active">Last Name<span class="red-text"><b>*</b></span></label>
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
	                 <div class="input-field col s12">
	                      <input name="" placeholder="Ex: #20 Julian Eymard St. Sto.Nino Meycauayan, Bulacan" type="text" id="room" minlength="10" class="validate tooltipped specialaddress" required data-position="bottom" data-delay="30" data-tooltip="Ex: #20 Julian Eymard St. Sto.Nino Meycauayan, Bulacan<br/>( At least 10 or more characters )" pattern="^[#+A-Za-z0-9\s.,-]{10,}$">
	                      <label for="room" class="active">Room<span class="red-text">*</span></label>
	                  </div>
	                  <div class="input-field col s12" style="margin-top: 40px !important;">
	                      <select required class="browser-default" name="strEmpGender" id="createGender">
	                        <option value="" disabled selected>Gender</option>
	                        <option value="M">Male</option>
	                        <option value="F">Female</option>
	                      </select>
	                      <label for="createGender" class="active">Gender<span class="red-text">*</span></label>
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
	                      <label for="createEmail" class="active">Email</label>
	                  </div>
	                  <div class="input-field col s12">
	                      <input name="strEmpAddress" placeholder="Ex: #20 Julian Eymard St. Sto.Nino Meycauayan, Bulacan" type="text" id="createAddress" minlength="10" class="validate tooltipped specialaddress" required data-position="bottom" data-delay="30" data-tooltip="Ex: #20 Julian Eymard St. Sto.Nino Meycauayan, Bulacan<br/>( At least 10 or more characters )" pattern="^[#+A-Za-z0-9\s.,-]{10,}$">
	                      <label for="createAddress" class="active">Address<span class="red-text">*</span></label>
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

	<!-- add Room -->
   <div id="addRoom" class="modal" style="margin-top: 30px; width: 400px !important; border-radius: 10px;">
     <form id="createOption">
       <div class="modal-content">
         <h4 class="grey-text text-darken-2"> Choose Room</h4>
         <div class="row">
            <div class="input-field col s12">
               <select class="browser-default" id="roomTypeSelect" name="selectedJob" required>
                   <option disabled selected>Room</option>
                   @foreach($roomTypes as $roomType)
                   <option value="{!! $roomType->intRoomTypeId !!}">{!! $roomType->strRoomTypeDesc !!}</option>
                   @endforeach
               </select>
               <label for="roomTypeSelect" class="active">Room Type<span class="red-text">*</span></label>
           	</div>

           	<div class="input-field col s12">
               <select class="browser-default" id="roomNumberSelect" name="selectedJob" required>
                   <option disabled selected>Room Number</option>
              
                   <option value=""></option>
               </select>
               <label for="roomNumberSelect" class="active">Room Number<span class="red-text">*</span></label>
           	</div>
           	<br>
           	<div class="center">
           		<br>
           		<button type="submit" class="btn-large green darken-3 center" style="margin-top: 10px;">ADD</button>
           	</div>
           	
       </div>
     </form>
   </div>
</article>

<script type="text/javascript">
	document.getElementById('roomTypeSelect').onchange = function()
	{
		$.ajax({
			url: "{!! url('') !!}",
			type: "POST",
			data: 
			{
				_token: document.getElementById('')
			},
			success: function(data)
			{

			},
			error: function(xhr)
			{
				console.log(xhr);
			}
		});
	};
</script>
@endsection