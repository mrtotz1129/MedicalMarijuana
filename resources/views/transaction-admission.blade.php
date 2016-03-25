@extends('transaction')
@section('article')
<article class="white main z-depth-1">
<br>
	<div class="row">
		<div class="col s6">
			<h3 class="thin indigo-text text-darken-2 col right">Admission</h3>
		</div>
		<div class="col s6 right">
			<a class="right waves-effect waves-light modal-trigger btn-floating btn-large indigo darken-2 left white-text tooltipped" 
			href="#create" style="margin-top: 20px; margin-right: 20px;" 
			data-tooltip="Create"><i class="material-icons">add</i></a>
		</div>
	</div>
	 <div class="header-search-wrapper indigo darken-2" style="width: 700px; height: 40px;">
        <i class="mdi-action-search indigo-text text-darken-3"></i>
        <input name="Search" class="header-search-input z-depth-2" placeholder="Search Patient" type="text">
        <br>
    </div>
    <br>
    <div class="container">
    	<table id="example" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Employee Number</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact NO.</th>
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
	
	   <div id="create" class="modal modal-fixed-footer">
	    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
	      <div class="modal-content" style="padding-bottom: 0px !important;">
	        <!-- <div class="container"> -->
	      <div class="wrapper">
	        <div class="input-field col s12">
	              <h4 class="grey-text text-darken-1 center	">Add Patient</h4>
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
	                        <input name="strEmpFirstName" placeholder="Ex: Benigno" id="strEmpFirstName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
	                        <label for="strEmpFirstName" class="active">First Name<span class="red-text"><b>*</b></span></label>
	                    </div>
	                    <div class="input-field col s12">
	                        <input name="strEmpMiddleName" placeholder="Ex: Cojuangco" id="strEmpMiddleName" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
	                        <label for="strEmpMiddleName" class="active">Middle Name</label>
	                    </div>
	                    <div class="input-field col s12">
	                        <input name="strEmpLastName" placeholder="Ex: Aquino" id="strEmpLastName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
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
	                  <div class="input-field col s12" style="margin-top: 40px !important;">
	                      <select required class="browser-default" name="strEmpGender" id="createGender">
	                        <option value="" disabled selected></option>
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
	                      <label for="createEmail" class="active">Email<span class="red-text">*</span></label>
	                  </div>
	                  <div class="input-field col s12">
	                      <input name="strEmpAddress" placeholder="Ex: #20 Julian Eymard St. Sto.Nino Meycauayan, Bulacan" type="text" id="createAddress" minlength="10" class="validate tooltipped specialaddress" required data-position="bottom" data-delay="30" data-tooltip="Ex: #20 Julian Eymard St. Sto.Nino Meycauayan, Bulacan<br/>( At least 10 or more characters )" pattern="^[#+A-Za-z0-9\s.,-]{10,}$">
	                      <label for="createAddress" class="active">Address<span class="red-text">*</span></label>
	                  </div>
	                  <div class="input-field col s8">
	                      <select class="browser-default" id="slct1" name="selectedJob" required>
	                          <option value="" disabled selected> </option>
	                          <c:forEach items="${empCategory}" var="name">
	                            <option value="${name.strCategoryName}">${name.strCategoryName }</option>
	                          </c:forEach>
	                      </select>
	                      <label for="slct1" class="active">Position<span class="red-text">*</span></label>
	                  </div>
	                  <div class="input-field col s4">
	                    <a href="#addOption" class="waves-effect waves-light btn-flat modal-trigger indigo darken-1 white-text"><i class="material-icons">add</i></a>
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
</article>
@endsection