@extends('maintenance')
@section('article')
<article class="white main z-depth-1">
	<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
			<div class="col s6">
				<h4 class="thin white-text">Out Patient Pharmacy</h4>
			</div>
			<div class="col s6 right">
				<a class="right waves-effect waves-light modal-trigger btn-floating btn-large green darken-2 left white-text tooltipped" 
				href="#itemDetails" style="position: relative; top: 40px; right: 1%;" 
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
			            	<th>Id</th>
			                <th>Item Name</th>
			                <th>Quantity</th>
			                <th>UOM</th>
			                <th>Price</th>
			                <th style="width: 20px;">Action</th>
			            </tr>
			        </thead> 
			        <tbody>
						
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
	
	<!-- add option -->
   <div id="itemDetails" class="modal" style="margin-top: 30px;">
     <form id="addToCartForm">
     	<input type="hidden" id="createEquipmentTypeFormToken" value="{!! csrf_token() !!}" />
     	<input type="hidden" id="itemName">
     	<input type="hidden" id="itemId">
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
	var table = $('#cartTable').DataTable();
	table.column(0).visible(false);
	function addToCart(itemName, id){
		$('#itemDetails').openModal();
		$('#itemName').val(itemName);
		$('#itemId').val(id);
	}

	var Item = function(itemId,itemName){
		this.itemId = itemId;
		this.itemName = itemName;
		this.itemPrice = 0;
		this.itemQuantity = 0;
		this.itemMeasurement = "";
		console.log('Item instantiated.');
	}
	var arrData = [];
	var intItemId = 1;
	$('#addToCartForm').on('submit', function(event) {
		event.preventDefault();
		$.ajax({
			url: "get-price",
			type: "POST",
			data: {
				intItemId: document.getElementById('itemId').value,
				intMeasurementId: document.getElementById('unitOfMeasurement').value 
			},
			success: function(data) {
				var quantity = document.getElementById('itemQuantity').value;
				var existing = 0;
				var measurement = data.measurement;
				

				table.data()
					.each(function (value, index){
						console.log(value[0]);
						console.log(document.getElementById('itemName').value);
						console.log(arrData);
						if (value[1] === document.getElementById('itemName').value || value[3] === measurement){
							existing = 1;
							$.each(arrData, function(i, itemSearch){
								console.log('checking array...');
								if (itemSearch.itemName == document.getElementById('itemName').value || itemSearch.itemMeasurement == measurement){
									console.log('object found!');
									itemSearch.itemQuantity = Number(itemSearch.itemQuantity)+Number(quantity);
									itemSearch.itemPrice = Number(itemSearch.itemPrice)+Number(data.deciItemPrice*quantity);
								}
							});
						}
					});
				console.log(existing);
				if (existing == 0){
					var item = new Item(intItemId, document.getElementById('itemName').value);
					item.itemQuantity = quantity;
					item.itemPrice = data.deciItemPrice*quantity;
					item.itemMeasurement = measurement;
					console.log(item);
					arrData.push(item);
					table.row.add( [
						intItemId++,
				       	document.getElementById('itemName').value,
				        quantity,
				        measurement,
				        data.deciItemPrice*quantity,
					    '<a class="remove">remove</a>'
			    	] ).draw( false );
				}else{
					table.clear().draw();
					$.each(arrData, function(i, item){
						console.log('writing from array...');

						table.row.add( [
							item.itemId,
					       	item.itemName,
					        item.itemQuantity,
					        item.itemMeasurement,
					        item.itemPrice,
					        '<a class="remove">remove</a>'
				    	] ).draw( false );
					});
				}
				$('#itemQuantity').val('');
				$('#itemDetails').closeModal();
			},
			error: function(xhr) {
				alert('error');
				console.log(xhr);
			}
		});
		
	});

	$(document).on( 'click', '.remove', function () {
		console.log('removing...');
		var d = table.row( $(this).parents('tr') ).data();
		var arrNewData = [];
		$.each(arrData, function(i, data){
			if (data.itemId == d[0]){
				console.log('object found here in remove...');
			}else{
				console.log(data[0]+" "+d[0]);
				console.log('object not found here in remove...');
				arrNewData.push(data);
			}
		});
		console.log(arrNewData);
		arrData = arrNewData;
		console.log(d[1]);
	    table
	        .row( $(this).parents('tr') )
	        .remove()
	        .draw();
	 //  var d = table.row( $(this).parents('tr') ).data();
     
	 //    d.counter++;
	 
	 //    table
	 //        .row( $(this).parents('tr') )
	 //        .data( d )
	 //        .draw();
		} );

	function remove(id){
		alert(id);
	}

</script>
@endsection