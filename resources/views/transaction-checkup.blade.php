@extends('maintenance')
@section('article')
<article class="white main z-depth-1">
	<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Patient</h4>
				</div>
				<div class="col s6 right">
					<a href="#prescription" class="right btn modal-trigger btn-floating btn-large green darken-2" style="position: relative; top: 40px; right: 1%;">
					<i class="material-icons">receipt</i></a>
					<a href="#addDiagnosis" class="right btn modal-trigger btn-floating btn-large yellow darken-2" style="position: relative; top: 40px; right: 2%;">
					<i class="material-icons">find_in_page</i></a>
					<a href="#requestTest" class=" right btn modal-trigger btn-floating btn-large red darken-2" style="position: relative; top: 40px; right: 3%;">
					<i class="material-icons">assignment_turned_in</i></a>
					
				</div>
	</div>	
		<div class="row">
					<div class="col s3 center ">
						 <img name="image" id="employeeimg" class="circle center" align="middle" style="width: 200px; height: 200px;" src="{!! asset('img/jerald.jpg') !!}" alt=""/>
					</div>

					<div class="col s3">
						<h5>Name: <span class="thin">{!! $patient->strLastName . ', ' . $patient->strFirstName . ($patient->strMiddleName != null ? (' ' . $patient->strMiddleName) : '') !!}</span></h5>
						<h5>Last Visit: <span class="thin">{!! $lastVisit ? date('F d, Y', strtotime($lastVisit->created_at)) : 'None' !!}</span></h5>
						<h5>Address: <span class="thin">{!! $patient->txtAddress !!}</span></h5>
					</div>

					<div class="col s3">
						<h5>Confined at: <span class="thin">{!! $patient->intRoomId ? "Room " . $patient->intRoomId . "(Bed " . $patient->intBedId . ")" : 'None' !!}</span></h5>
						<h5>Unsettled Balance: <span class="thin">Php 500,000.00</span></h5>
					</div>
				</div>

				<div class="row">
					<h5 class="thin">Medical Record</h5>
				</div>
					<div class="divider"></div>
				<div class="row container">
					<p class="flow-text">
						Lucy has become depressed and withdrawn since finding out that she has a brain tumour. In particular, she is very anxious about the possibility that the biopsy results will show that the tumour is cancerous. Although symptoms of depression and anxiety are not uncommon in patients threatened by a diagnosis of cancer, Lucy has a history of feeling melancholy and, significantly, developed postnatal depression following the birth of her son five years ago. Lucy's response to her current illness needs to be understood in this context, as it will help to assess how well she will cope with the forthcoming diagnosis and future management of her illness.
					</p>
				</div>

				<div class="row">
					<h5 class="thin">Examinations</h5>
				</div>
					<div class="divider"></div>
					<br>
				<div class="row container">
					<table id="test" class="display" cellspacing="0" width="100%">
					        <thead>
					            <tr>
					                <th>Test Code</th>
					                <th>Test Name</th>
					                <th>Test Description</th>
					                <th>Status</th>
					                <th>Actions</th>
					            </tr>
					        </thead>
					        	
					    </table>
				</div>

				<script type="text/javascript">
					$(document).ready(function() {
					    $('#test').DataTable( {
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

				<div class="row">
					<h5 class="thin">Expenses</h5>
				</div>
					<div class="divider"></div>
					<br>
				<div class="row container">
					<table id="fee" class="display" cellspacing="0" width="100%">
					        <thead>
					            <tr>
					                <th>Fee Code</th>
					                <th>Fee Name</th>
					                <th>Fee Description</th>
					                <th>Price</th>
					                <th>Status</th>
					                <th>Actions</th>
					            </tr>
					        </thead>
					        	
					    </table>

					    <h5 class="thin right">Summary: <span class="green-text text-darken-2">Php 500,000.00</span> </h5>
				</div>

				<script type="text/javascript">
					$(document).ready(function() {
					    $('#fee').DataTable( {
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

		<!-- Add Prescription Modal -->
		<div id="prescription" class="modal modal-fixed-footer" style="width: 800px !important;">
	    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
	      <div class="modal-content" style="padding-bottom: 0px !important;">
	        <!-- <div class="container"> -->
		     <div class="wrapper">
		      	<h4 class="thin indigo-text text-darken-2">Prescription</h4>
		      	<h6>Patient Name: Jerald John Pormon</h6>
		      	<div class="row">
					<h6>Medicine</h6>
 			 		
 			 		 <div class="input-field col s12">
 			 		    <select class="browser-default" id="buildingCreateSelect" name="selectedJob" required>
 			 		        <option disabled selected>Choose Medicine</option>
 			 		        <option value="Medicine 1">Medicine 1</option>
 			 		    </select>
 			 		    <label for="slct1" class="active">Medicine<span class="red-text">*</span></label>
 			 		</div>

 					<div class="input-field col s6">
 						 <input type="number" class="validate" id="medQuantity">
 						 <label for="medQuantity">Times/dady</label>
 					</div>

 					<div class="input-field col s6">
 						 <input type="number" class="validate" id="time" placeholder="minutes">
 						 <label for="time">Interval</label>
 					</div>
		      </div>
	      </div>>
	      </div>
	      <div class="modal-footer">
	          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
	          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">SEND REQUEST</button>
	      </div>
	      </form>
		</div>
</article>
@endsection
