@extends('maintenance')
@section('article')
<article class="white main z-depth-1">
	<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
		<div class="col s6">
			<h4 class="thin white-text">Laboratory</h4>
			<a href="#executeExam" class="modal-trigger btn green darken-2">Exam</a>
		</div>
	</div>	
		<div class="container" style="margin-left: -30px;">
		<br>
    	<table id="billTbl" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Patient Number</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact NO.</th>
                    <th>Room No.</th>
                    <th>Actions</th>
                </tr>
            </thead>  	
    </table>
    </div>
    <script type="text/javascript">
    	$(document).ready(function() {
    	    $('#billTbl').DataTable( {
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

	   <div id="executeExam" class="modal modal-fixed-footer" style="width: 1300px !important; height: 1000px !important;">
	    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
	      <div class="modal-content" >
		      <div class="container">
		              <h4 class="grey-text text-darken-1 center	">Execute exam</h4>
		              <a href="#chooseEquipment" class="modal-trigger btn green">Choose Equipment</a>

		                <div class="row">
		                	<h5 class="thin">Examinations</h5>
		                </div>
		                	<div class="divider"></div>
		                	<br>
		                <div class="row container">
		                	<table id="totalExpenses" class="display" cellspacing="0" width="100%">
		                	        <thead>
		                	            <tr>
		                	                <th>Exam Name</th>
		                	                <th>Result</th>
		                	                <th>Remarks</th>
		                	                <th>Action</th>
		                	            </tr>
		                	        </thead>
		                	        	
		                	    </table>
		                </div>
		                <script type="text/javascript">
		                	$(document).ready(function() {
		                	    $('#totalExpenses').DataTable( {
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
		      </div>
		  </div>    
	      <div class="modal-footer">
	          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
	          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">CREATE</button>
	      </div>
	      </form>
	    </div>

	    <!-- Choose Equipment -->
	    <div id="chooseEquipment" class="modal modal-fixed-footer" style="width: 500px !important; height: 500px !important; border-radius: 10px;">
	    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
	      <div class="modal-content" >
		      <div class="container">
		              <h4 class="grey-text text-darken-1 center	">Choose Equipment</h4>

		                <div class="row">
		                	<h5 class="thin">Equipments</h5>
		                </div>

		                  <div class="input-field col s12">
		                    <select id="chooseEquipment" name="selectedJob" required>
		                        <option disabled selected>Choose Building</option>

		                        <option value="Equipment1">Equipment1</option>

		                    </select>
		                    <label>Equipments</label>
		                </div>
		               
		      </div>
		  </div>    
	      <div class="modal-footer">
	          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
	          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">GO</button>
	      </div>
	      </form>
	    </div>

	     <div id="executeExam" class="modal modal-fixed-footer" style="width: 1300px !important; height: 1000px !important;">
	    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
	      <div class="modal-content" >
		      <div class="container">
		              <h4 class="thin  center">Execute exam</h4>
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
@endsection