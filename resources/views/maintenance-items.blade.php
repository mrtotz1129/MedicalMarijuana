@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
		<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Items Maintenance</h4>
				</div>
				<div class="col s6 right">
					<a class="right waves-effect waves-light modal-trigger btn-floating btn-large red darken-2 left white-text tooltipped" 
					href="#create" style="position: relative; top: 40px; right: 1%;" 
					data-tooltip="Create"><i class="material-icons">add</i></a>
				</div>
				<div class="col s4">
					<a href="#setPrice" class="btn modal-trigger btn-floating red"><i class="material-icons">money</i></a>
				</div>
			</div>	
		<div class="container" style="margin-left: -30px;">
		<br>
				<table id="example" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th>Item ID</th>
				                <th>Type</th>
				                <th>Name</th>
				                <th>Generic Name</th>
				                <th>Details</th>
				                <th>Price</th>
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
				<!-- Create Item Modal -->
				   <div id="create" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Add New Item</h4>
				        </div>
				              <div class="aside aside1 z-depth-0">
				              <!-- first -->
				                <div class="row">
				                  <div class="input-field col s12">
				                       <img name="image" id="employeeimg" class="circle" style="width: 100px; height: 100px;" src="{!! asset('img/jerald.jpg') !!}" alt=""/>
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
				                   <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Aquino" id="drugName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="drugName" class="active">Item Name<span class="red-text"><b>*</b></span></label>
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
				                      <div class="input-field col s6">
				                        <select class="browser-default" id="itemCategory" name="selectedJob" required>
				                            <option disabled selected>Choose Category</option>
				                            <option value="{"></option>
				                        </select>
				                        <label for="itemCategory" class="active">Item Category<span class="red-text">*</span></label>
				                    </div>
				                    <div class="col s6">
				                    	<a href="#addCategory" class="modal-trigger green"><i class="material-icons">add</i></a>
				                    </div>
				                    </div>
				                      <div class="input-field col s6">
				                        <select class="browser-default" id="genericName" name="selectedJob" required>
				                            <option disabled selected>Choose Category</option>
				                            <option value=""></option>
				                        </select>
				                        <label for="genericName" class="active">Generic Name<span class="red-text">*</span></label>
				                    </div>
				                    <div class="col s6">
				                    	<a href="#addGeneric" class="modal-trigger green"><i class="material-icons">add</i></a>
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
				              <h4 class="grey-text text-darken-1 center	">Update Drug</h4>
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
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Aquino" id="drugName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Aquino( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="drugName" class="active">Drug Name<span class="red-text"><b>*</b></span></label>
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
				                      <div class="input-field col s6">
				                        <select class="browser-default" id="itemCategory" name="selectedJob" required>
				                            <option disabled selected>Choose Category</option>
				                            <option value="{"></option>
				                        </select>
				                        <label for="itemCategory" class="active">Item Category<span class="red-text">*</span></label>
				                    </div>
				                    <div class="col s6">
				                    	<a href="#addCategory" class="btn modal-trigger green"><i class="material-icons">add</i></a>
				                    </div>
				                    </div>
				                      <div class="input-field col s6">
				                        <select class="browser-default" id="genericName" name="selectedJob" required>
				                            <option disabled selected>Choose Category</option>
				                            <option value=""></option>
				                        </select>
				                        <label for="genericName" class="active">Generic Name<span class="red-text">*</span></label>
				                    </div>
				                    <div class="col s6">
				                    	<a href="#addGeneric" class="btn modal-trigger green"><i class="material-icons">add</i></a>
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
	</article>

<!-- add option -->
   <div id="addCategory" class="modal" style="margin-top: 30px;">
     <form id="createOption">
       <div class="modal-content">
         <h4>Add New Category</h4>
         <div class="row">
           <div class="col s12">
             <div class="input-field col s8 offset-s2">
               <select id="addOptionSelect" class="browser-default" size="10">
                     <option value="">Category 1</option>
               </select>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="text" class="validate tooltipped specialoption" placeholder="Ex: Cashier" id="addOptionName" name="addOptionName" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
               <label for="addOptionName" class="active">Category</label>
             </div>
             <div class="input-field col s8 offset-s2 center">
               <button type="submit" value="Submit" id="createAddPosition" class="waves-effect waves-light purple darken-3 btn-flat white-text">SAVE</button>
             </div>
           </div>
         </div>
       </div>
     </form>
   </div>

   <!-- add option -->
   <div id="addGeneric" class="modal" style="margin-top: 30px;">
     <form id="createOption">
       <div class="modal-content">
         <h4>Add New Generic Name</h4>
         <div class="row">
           <div class="col s12">
             <div class="input-field col s8 offset-s2">
               <select id="addOptionSelect" class="browser-default" size="10">
                     <option value="">Generic 1</option>
               </select>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="text" class="validate tooltipped specialoption" placeholder="Ex: Cashier" id="addGenericName" name="addOptionName" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
               <label for="addGenericName" class="active">Generic Name</label>
             </div>
             <div class="input-field col s8 offset-s2 center">
               <button type="submit" value="Submit" id="createGeneric" class="waves-effect waves-light purple darken-3 btn-flat white-text">SAVE</button>
             </div>
           </div>
         </div>
       </div>
     </form>
   </div>

     <!-- add option -->
   <div id="addGeneric" class="modal" style="margin-top: 30px;">
     <form id="createOption">
       <div class="modal-content">
         <h4>Add New Generic Name</h4>
         <div class="row">
           <div class="col s12">
             <div class="input-field col s8 offset-s2">
               <select id="addOptionSelect" class="browser-default" size="10">
                     <option value="">Generic 1</option>
               </select>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="text" class="validate tooltipped specialoption" placeholder="Ex: Cashier" id="addGenericName" name="addOptionName" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
               <label for="addGenericName" class="active">Generic Name</label>
             </div>
             <div class="input-field col s8 offset-s2 center">
               <button type="submit" value="Submit" id="createGeneric" class="waves-effect waves-light purple darken-3 btn-flat white-text">SAVE</button>
             </div>
           </div>
         </div>
       </div>
     </form>
   </div>

   <!-- Set Price -->
   <div id="setPrice" class="modal" style="margin-top: 30px;">
     <form id="createOption">
       <div class="modal-content">
         <h4>Set Item Price</h4>
         <div class="container">
         	<div class="row">
         		  <div class="input-field col s6">
         		    <select class="browser-default" id="measurementSelect" name="selectedJob" required>
         		        <option disabled selected>Choose Mwasurement</option>
         		        <option value="Measurement 1">Measurement 1</option>
         		    </select>
         		    <label for="measurementSelect" class="active">Set Measurement<span class="red-text">*</span></label>
         			</div>

         			<div class="input-field col s6" style="margin-top: 20px;">
         		    <input type="number" class="validate tooltipped specialoption" placeholder="Ex: 1,000" id="itemPrice" name="addOptionName" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
         		    <label for="itemPrice" class="active">Item Price</label>
         		  	</div>
         	</div>
            
             <div class="col s12 center">
				 <a class="waves-effect waves-light btn col s4 center" onclick="addPricesToTable()"><i class="material-icons">add</i></a>
			</div>

             <div class="col s12">
		 		<div class="row center">
		 			<table class="centered highlight">
		 				<thead>
	 				        <tr>
	 				            <th data-field="id">Name</th>
	 				            <th data-field="name">Amount</th>
	 				            <th data-field="price">Action</th>
	 				        </tr>
	 				      </thead>
		 			</table>
					 <table class="centered highlight bordered" id="packageTable">

					 </table>
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

<script type="text/javascript">
	
function addPricesToTable(){
    var table = document.getElementById("packageTable");
    var chargeType = $("#measurementSelect").val();
    var chargeQuantity = $("#itemPrice").val();
    var removeBtn = document.createElement('button');
   
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2); 
    cell1.innerHTML = chargeType;
    cell2.innerHTML = chargeQuantity;
    cell3.innerHTML = '<input id="Button" type="button" value="Remove" class = "waves-effect waves-light btn red" onclick="deleteRow(this)" />';
}

function deleteRow(row){
    var i=row.parentNode.parentNode.rowIndex;
    var packageText = document.getElementById("packageTable").rows[i].cells[0].innerHTML;
    document.getElementById('packageTable').deleteRow(i);
    
    alert(packageText);
    var y = document.getElementById("measurementSelect");
    var option = document.createElement("option");
    option.text = packageText;

    y.add(option);
}

</script>
 
@endsection