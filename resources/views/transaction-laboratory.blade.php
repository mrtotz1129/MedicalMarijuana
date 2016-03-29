@extends('maintenance')
@section('article')
<article class="white main z-depth-1">
<br>
	<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Building Maintenance</h4>
				</div>
				<div class="col s6 right">
					<a class="right waves-effect waves-light modal-trigger btn-floating btn-large red darken-2 left white-text tooltipped" 
					href="#create" style="position: relative; top: 40px; right: 1%;" 
					data-tooltip="Create"><i class="material-icons">add</i></a>
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

		<!-- Bill OUt Modal -->
	   <div id="billOut" class="modal modal-fixed-footer" style="width: 1300px !important; height: 1000px !important;">
	    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
	      <div class="modal-content" >
	        <!-- <div class="container"> -->
	      <div class="wrapper">
	        <div class="input-field col s12">
	              <h4 class="grey-text text-darken-1 center	">Bill OUt</h4>
	        </div>
	              <div class="aside aside1 z-depth-0">
	              <!-- first -->
	                <div class="row">
	                	<h5 class="thin">Expenses</h5>
	                </div>
	                	<div class="divider"></div>
	                	<br>
	                <div class="row container">
	                	<table id="totalExpenses" class="display" cellspacing="0" width="100%">
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
	              <!-- END ASIDE 1 -->
	                <div class="aside aside2 z-depth-0">
	                <!-- second -->
	                <div class="row">
	                	<h5 class="thin">Discount</h5>
	                </div>
	                	<div class="divider"></div>
	                	<br>
	                  <div class="row">
	                    <div class="col s12" style="margin-bottom: 5px;">
	                         <label class="red-text left">(*) Indicates required field</label>
	                    </div>
	                    <div class="input-field col s12">
	                        <input name="strEmpFirstName" placeholder="Ex: Benigno" id="strEmpFirstName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: Benigno( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
	                        <label for="strEmpFirstName" class="active">Discount Name<span class="red-text"><b>*</b></span></label>
	                    </div>
	                    <div class="input-field col s12">
	                        <input name="strEmpMiddleName" placeholder="Ex: Cojuangco" id="strEmpMiddleName" type="text" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Cojuangco( At least 2 or more characters)" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
	                        <label for="strEmpMiddleName" class="active">Patient ID</label>
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
</article>
@endsection