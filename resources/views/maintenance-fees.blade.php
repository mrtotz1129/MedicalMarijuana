@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="container">
			<div class="row">
				<div class="col s6">
					<h4 class="thin indigo-text text-darken-2 col">Fees Maintenance</h4>
				</div>
				<div class="col s6 right">
					<a class="right waves-effect waves-light modal-trigger btn-floating btn-large indigo darken-2 left white-text tooltipped" 
					href="#createModal" style="margin-top: 20px;" 
					data-tooltip="Create"><i class="material-icons">add</i></a>
				</div>
			</div>	
				<table id="example" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th>Fee ID</th>
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


				<!-- Create Fee Modal -->
				   <div id="createModal" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
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
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Benigno" id="feeID" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
				                        <label for="feeID" class="active">Fee ID<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s8">
				                        <select class="browser-default" id="slct1" name="selectedJob" required>
				                            <option value="" disabled selected> </option>
				                              <option value="${name.strCategoryName}">Doctor's Fee</option>
				                              <option value="${name.strCategoryName}">Nurse's Fee</option>
				                        </select>
				                        <label for="slct1" class="active">Type<span class="red-text">*</span></label>
				                    </div>
				                    <div class="input-field col s4">
				                      <a href="#addOption" class="waves-effect waves-light btn-flat modal-trigger indigo darken-1 white-text"><i class="material-icons">add</i></a>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Aquino" id="feeName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="feeName" class="active">Fee Name<span class="red-text"><b>*</b></span></label>
				                    </div>

				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Aquino" id="feeName" type="number" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="feeName" class="active">Fee Price<span class="red-text"><b>*</b></span></label>
				                    </div>

                     		      	 <div class="input-field col s6">
                           	           <i class="material-icons prefix">mode_edit</i>
                           	           <textarea id="remarks" class="materialize-textarea"></textarea>
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
				    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
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
				                        <input name="" placeholder="Ex: Benigno" id="feeID" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
				                        <label for="feeID" class="active">Fee ID<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s8">
				                        <select class="browser-default" id="slct1" name="selectedJob" required>
				                            <option value="" disabled selected> </option>
				                              <option value="${name.strCategoryName}">Doctor's Fee</option>
				                              <option value="${name.strCategoryName}">Nurse's Fee</option>
				                        </select>
				                        <label for="slct1" class="active">Type<span class="red-text">*</span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Aquino" id="feeName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="feeName" class="active">Fee Name<span class="red-text"><b>*</b></span></label>
				                    </div>
				                       <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Aquino" id="feeName" type="number" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="feeName" class="active">Fee Price<span class="red-text"><b>*</b></span></label>
				                    </div>

                     		      	 <div class="input-field col s6">
                           	           <i class="material-icons prefix">mode_edit</i>
                           	           <textarea id="remarks" class="materialize-textarea"></textarea>
                           	           <label for="remarks">Description</label>
                           	         </div>
				                </div>
				              </div>
				              <!-- END ASIDE 2 -->

				            </div>
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
                     <option value="${name.strCategoryName}">Doctor's Fee</option>
                     <option value="${name.strCategoryName}">Nurse's Fee</option>                  
               </select>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="text" class="validate tooltipped specialoption" placeholder="Ex: Cashier" id="addOptionName" name="addOptionName" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
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