@extends('maintenance')
@section('article')
<article class="white main z-depth-1">
	<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
			<div class="col s6">
				<h4 class="thin white-text">Out Patient Pharmacy</h4>
			</div>
			<div class="col s6 right">
				<a class="right waves-effect waves-light modal-trigger btn-floating btn-large green darken-2 left white-text tooltipped" 
				href="#billOut" style="position: relative; top: 40px; right: 1%;" 
				data-tooltip="Create"><i class="material-icons">shopping_cart</i></a>
			</div>
	</div>	
	<br>
    <div class="container">
    	<div class="row">
    		<div class="col s6">
    			<h4 class="thin">Available Items</h4>
				<table id="itemTable" class="display" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>Item Name</th>
			                <th>Quantity</th>
			                <th style="width: 20px;">Action</th>
			            </tr>
			        </thead> 
			        <tbody>
					@foreach($itemList as $item)
						<tr>
							<td>{!! $item->strItemName !!}</td>
							<td>{!! $item->inventory !!}</td>
							<td><a href="javascript:addToCart('{!! $item->strItemName !!}', {!! $item->intItemId !!})"><i class="material-icons">shopping_cart</i></a></td>
						</tr>
					@endforeach
			        </tbody> 	
				</table>
    		</div>

    		<div class="col s6">
    			<h4 class="thin">My Cart</h4>
				<table id="cartTable" class="display" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>Item Name</th>
			                <th>Quantity</th>
			                <th style="width: 20px;">Action</th>
			            </tr>
			        </thead> 
			        <tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
			        </tbody> 	
				</table>
    		</div>
    	</div>
    	
    </div>
    <script type="text/javascript">  
    	$(document).ready(function() {
    	    $('#itemTable').DataTable( {
    	        dom: 'Bfrtip',
    	        buttons: [
    	            'copyHtml5',
    	            'excelHtml5',
    	            'csvHtml5',
    	            'pdfHtml5'
    	        ]
    	    } );
    	} );

    	$(document).ready(function() {
    	    $('#cartTable').DataTable();
    	} );
    </script>

		<!-- Bill OUt Modal -->
	   <div id="billOut" class="modal modal-fixed-footer" style="width: 800px !important; height: 600px !important; border-radius: 10px;">
	    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
	      <div class="modal-content" >
	         <h4 class="thin center	">Bill OUt</h4>
	         <div class="container">
	         	<h5 class="thin">Bill out for this customer?</h5>
	         	<br>
	         	
	         	 <div class="input-field col s12">
                    <select multiple name="nurses[]">
                      <option value="" disabled selected>Choose your option</option>
              
                      <option value="Senior">Senior</option>
                      <option value="Senior">PWD</option>
                      <option value="Senior">Shems</option>
                  
                    </select>
                    <label>Select Discount</label>
                 </div>
                 <br>
                 <div align="right"> 
                 	<h2>Discount Value: <span class="thin red-text">Php 100.00</span></h2>
                 	<h2>Total: <span class="thin green-text text-darken-2">Php 500.00</span></h2>
                 </div>
	         </div>
	       </div>
	      <div class="modal-footer">
	          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">CANCEL</button>
	          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">BILL OUT</button>
	      </div>
	      </form>
		</div>
		<!-- Bill out End -->
	
	<!-- add option -->
   <div id="itemDetails" class="modal" style="margin-top: 30px;">
     <form id="addToCartForm">
     	<input type="hidden" id="createEquipmentTypeFormToken" value="{!! csrf_token() !!}" />
       <div class="modal-content">
         <h4>Details</h4>
         <div class="row">
           <div class="col s12">
             <div class="input-field col s8 offset-s2">
               <select id="unitOfMeasurement" class="browser-default" size="10">
                 @foreach($measurementList as $measurement)
                 	<option value="{!! $measurement->intUnitOfMeasurementId !!}">{!! $measurement->strUnitOfMeasurementName !!}</option>
                 @endforeach
               </select>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="number" class="validate tooltipped specialoption" placeholder="Ex: 100" id="itemQuantity" name="createEquipmentType" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
               <label for="itemQuantity" class="active"> Quantity</label>
             </div>
             <div class="input-field col s8 offset-s2 center">
               <button type="submit" value="Submit" id="createAddPosition" class="waves-effect waves-light purple darken-3 btn-flat white-text">SAVE</button>
	             </div>
	           </div>
	         </div>
	       </div>
	     </form>
	   </div>
</article>

<script type="text/javascript">
	
	function addToCart(itemName, id){
		$('#itemDetails').openModal();
		$('#item').val(itemName);

		$('#addToCartForm').on('submit', function(event) {
			event.preventDefault();
			$.ajax({
				url: "get-price",
				type: "POST",
				data: {
					intItemId: id,
					intMeasurementId: document.getElementById('unitOfMeasurement').value 
				},
				success: function(data) {
					$('#tblCart tbody').html('');
					var table=document.getElementById('tblCart').insertRow(1);
					var colName=table.insertCell(0);
					var colQuantity = table.insertCell(1);
					var colPrice=table.insertCell(2);
					var quantity = document.getElementById('itemQuantity').value;
					colName.innerHTML=itemName;
					colQuantity.innerHTML = quantity+" "+data.measurement+"/s";
					colPrice.innerHTML=data.deciItemPrice*quantity;
					$('#itemQuantity').val('');
					$('#itemDetails').closeModal();
				},
				error: function(xhr) {
					alert('error');
					console.log(xhr);
				}
			});
			
		});
	}

</script>
@endsection