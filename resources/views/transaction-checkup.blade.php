@extends('maintenance')
@section('article')
<article class="white main z-depth-1">
<br>
	<div class="row indigo lighten-1" style="margin-left: -10px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Check Up</h4>
				</div>
				<div class="col s6 right">
					
					<a href="#requestTest" class="btn modal-trigger">Request</a>
					<a href="#addDiagnosis" class="btn modal-trigger">Diagnosis</a>
					<a href="#addPrescription" class="btn modal-trigger">Prescription</a>
				</div>
			</div>	
		<div class="container">
		<br>

    	<table id="example" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Patient Number</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact NO.</th>
                    <th>Status</th>
                    <th>Actions</th><!--  view, request, add diagnosis -->
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
		<!-- Request Test Modal -->
	   <div id="requestTest" class="modal modal-fixed-footer">
	    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
	      <div class="modal-content" style="padding-bottom: 0px !important;">
	        <!-- <div class="container"> -->
		      <div class="wrapper">
		      	<h4 class="thin indigo-text text-darken-2">Request for Examination</h4>
		      	<h6>Patient Name: Jerald John Pormon</h6>
		      	<div class="input-field col s12">
		      	    <select multiple>
		      	      <option value="" disabled selected>Choose your option</option>
		      	      <option value="1">Urinalysis</option>
		      	      <option value="2">Xray</option>
		      	      <option value="3">Blood Test</option>
		      	    </select>
		      	    <label>Available Examinations</label>
		      	 </div>

		      	 <div class="input-field col s6">
      	           <i class="material-icons prefix">mode_edit</i>
      	           <textarea id="remarks" class="materialize-textarea"></textarea>
      	           <label for="remarks">Remarks</label>
      	         </div>

      	         <p class="text-flow">
      	         	Note: Requests are directly sent to the laboratory department
      	         </p>
		      </div>
	      </div>
	      <div class="modal-footer">
	          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
	          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">SEND REQUEST</button>
	      </div>
	      </form>
		</div>

		<!-- Add Diagnosis Modal -->
		<div id="addDiagnosis" class="modal modal-fixed-footer" style="width: 1300px !important;">
	    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
	      <div class="modal-content" style="padding-bottom: 0px !important;">
	        <!-- <div class="container"> -->
		      <div class="wrapper">
		      	<h4 class="thin indigo-text text-darken-2">Add Diagnosis</h4>
		      	<h6>Patient Name: Jerald John Pormon</h6>
		      	<div class="aside aside1">
		      		<h6 class="thin">Examinations Made</h6>
			      	<table>
			      		<thead>
			      			<td>Exams</td>
			      			<td>Result</td>
			      		</thead>

			      		<tbody>
			      			<tr>
			      				<td>Urinalysis</td>
			      				<td>Red Urine</td>
			      			</tr>
			      		</tbody>
			      	</table>
		      	</div>
		      	
		      	<div class="aside aside2">
		      	<h6 class="thin">Doctor's Diagnosis</h6>
			      	 <div class="input-field col s6">
	      	           <i class="material-icons prefix">mode_edit</i>
	      	           <textarea id="remarks" class="materialize-textarea"></textarea>
	      	           <label for="remarks">Diagnosis</label>
	      	         </div>

	      	         <p class="text-flow">
	      	         	Note: Results are directly received from the laboratory department
	      	         </p>
		      	</div>
		      </div>
	      </div>
	      <div class="modal-footer">
	          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
	          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">SEND REQUEST</button>
	      </div>
	      </form>
		</div>

		<!-- Prescription Modal -->
		<div id="addPrescription" class="modal modal-fixed-footer" style="width: 1000px !important;">
	    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
	      <div class="modal-content" style="padding-bottom: 0px !important;">
	        <!-- <div class="container"> -->
		      <div class="wrapper">
		      	<h4 class="thin indigo-text text-darken-2">Prescription</h4>
		      	<h6>Patient Name: Jerald John Pormon</h6>
		      	<div class="row">
					<h6>Medicine</h6>
 			 		<div class="input-field col s6">
 					 <input type="text" class="validate" id="medList">
 					<label for="medList">Medicine Name</label>
 				
 					</div>

 					<div class="input-field col s6">
 						 <input type="number" class="validate" id="medQuantity">
 						 <label for="medQuantity">quantity</label>
 					</div>

 					<div class="col s12 center">
 						 <a class="waves-effect waves-light btn col s4 center" onclick="addChargesToTable()"><i class="material-icons">add</i></a>
 					</div>
		 		</div>

		 		<div class="col s6">
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
	      <div class="modal-footer">
	          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
	          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">SEND REQUEST</button>
	      </div>
	      </form>
		</div>
</article>
@endsection