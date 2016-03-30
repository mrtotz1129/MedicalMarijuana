@extends('maintenance')
@section('article')
<article class="white main z-depth-1">
<br>
		<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Inventory</h4>
				</div>
				<div class="col s6 right">
					<a class="right waves-effect waves-light modal-trigger btn-floating btn-large red darken-2 left white-text tooltipped" 
					href="#itemQuantity" style="position: relative; top: 40px; right: 1%;" 
					data-tooltip="Create"><i class="material-icons">add</i></a>
				</div>
			</div>	
		<div class="container" style="margin-left: -30px;">
		<br>
    	<table id="billTbl" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
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

	<!-- add option -->
   <div id="itemQuantity" class="modal" style="margin-top: 30px; width: 500px !important;">
     <form id="createEquipmentTypeForm">
     	<input type="hidden" id="createEquipmentTypeFormToken" value="{!! csrf_token() !!}" />
       <div class="modal-content">
         <h4>Add Quantity</h4>
         <div class="row container">
           <div class="col s12">
              <div class="input-field col s12">
                  <select class="browser-default" id="buildingCreateSelect" name="selectedJob" required>
                      <option disabled selected>Choose Measurement</option>
              
                      <option value="Measurement 1">Measurement 1</option>
                 
                  </select>
                  <label for="slct1" class="active">Building<span class="red-text">*</span></label>
              </div>
             <div class="input-field col s12" style="margin-top: 20px;">
               <input type="number" class="validate tooltipped specialoption" placeholder="Ex: 100" id="itemQuantity" name="createEquipmentType" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
               <label for="itemQuantity" class="active"> Quantity</label>
             </div>
             <div class="input-field col s8 offset-s2 center">
               <button type="submit" value="Submit" id="createAddPosition" class="waves-effect waves-light indigo darken-3 btn-flat white-text">SAVE</button>
	          </div>
           </div>
         </div>
       </div>
     </form>
   </div>
</article>
@endsection