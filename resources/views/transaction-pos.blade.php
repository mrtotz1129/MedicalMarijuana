@extends('maintenance')
@section('article')
<article class="white main z-depth-1">
	<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
			<div class="col s6">
				<h4 class="thin white-text">Point of Sale</h4>
			</div>
			<div class="col s6 right">
				<a class="right waves-effect waves-light btn-floating btn-large green darken-2 left white-text tooltipped" 
				href="javascript:cashOut()" style="position: relative; top: 40px; right: 1%;" 
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
			                <th>Generic Name</th>
			                <th>Quantity</th>
			                <th style="width: 20px;">Action</th>
			            </tr>
			        </thead> 
			        <tbody>
					@foreach($itemList as $item)
						<tr>
							<td>{!! $item->strItemName !!}</td>
							<td>{!! $item->generic !!}
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
	   <div id="billOut" class="modal modal-fixed-footer" style="width: 800px !important; height: 600px !important; border-radius: 10px;">
	    <form class="col s12 form" method="post" id="billOutForm" action="createEmployee" enctype="multipart/form-data">
	      <input type="hidden" name="_token" id="billOutFormToken" value="{!! csrf_token() !!}" />
	      <div class="modal-content" >
	         <h4 class="thin center	">Cash Out</h4>
	         <a href="#requset" class="mdoal-trigger"></a>
	         <div class="container">
	         	<h5 class="thin">Cash out this customer?</h5>
	         	<br>
	         	<div class="row">
	         		<div class="col s12 right">
	         			<p>
         			      <input name="group1" type="radio" id="outPatient" class="with-gap" />
         			      <label for="outPatient">Out Patient</label>
         		
         			      <input name="group1" type="radio" id="inPatient" class="with-gap" />
         			      <label for="inPatient">In Patient</label>
         			    </p>
	         		</div>
	         	</div>

	         	<div class="input-field col s12">
                    <select name="discount[]" id="patientSelect">
                      <option value="" disabled selected>Choose your option</option>

						<option value="Patient1">Patient1</option>
          
                    </select>
                    
                    <label>Select Patient</label>
                 </div>
                 <br>

	         	 <div class="input-field col s12">
                    <select multiple name="discount[]" id="discountSelect">
                      <option value="" disabled selected>Choose your option</option>
                  	  @foreach($discountList as $discount)
						<option value="{!! $discount->intDiscountId !!}">{!! $discount->strDiscountName !!}</option>
                  	  @endforeach
                    </select>
                    
                    <label>Select Discount</label>
                 </div>
                 <br>
                 <div align="right">
                 	<h2>Total Amount: <span class="thin green-text text-darken-2" id="totalAmount"></span></h2>
                 	<h2>Discount Value: <span class="thin red-text" id="totalDiscount"></span></h2>
                 	<h2>Amount To Pay: <span class="thin green-text text-darken-2" id="amountToPay"></span></h2>
                 </div>

                 <div class="input-field col s12">
                     <input name="" placeholder="Ex: Aquino" id="payment" type="number" class="validate tooltipped specialname" data-position="bottom" data-delay="30" data-tooltip="Ex: Php1,000.00" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="1">
                     <label for="payment" class="active">Payment</label>
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
   <div id="request" class="modal" style="margin-top: 30px;">
     <form id="addToCartForm">
     	<input type="hidden" id="createEquipmentTypeFormToken" value="{!! csrf_token() !!}" />
     	<input type="hidden" id="itemName">
     	<input type="hidden" id="itemId">
       <div class="modal-content">
         <h4>Patient Requests</h4>
         <a href="#approve" class="modal-trigger btn btn-floating">Items</a>
         <div class="row">
         	<table id="requestTable" class="display" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>Patient Name</th>
			                <th>Doctor</th>
			                <th style="width: 20px;">Action</th>
			            </tr>
			        </thead> 
			        <tbody>

						<tr>
							<td></td>
							<td></td>
							<td><a href="#approve" class="modal-trigger"><i class="material-icons">shopping_cart</i></a></td>
						</tr>
			        </tbody> 	
				</table>
				<script type="text/javascript">  
					$(document).ready(function() {
					    $('#requestTable').DataTable( {
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
	          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">BILL OUT</button>
	      </div>
	 </form>
	</div>

	<div id="approve" class="modal" style="margin-top: 30px; height: 200px !important; width: 300px !important;">
     <form id="addToCartForm">
     	<input type="hidden" id="createEquipmentTypeFormToken" value="{!! csrf_token() !!}" />
     	<input type="hidden" id="itemName">
     	<input type="hidden" id="itemId">
       <div class="modal-content">
         <h4>Approve Items for this patient?</h4>
         
	   </div>
	   <div class="modal-footer">
	          <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-purple transparent btn-flat">NOs</button>
	          <button class="waves-effect waves-light indigo darken-3 white-text btn-flat" type="submit" value="Submit">YES</button>
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
						if (value[1] === document.getElementById('itemName').value && value[3] === measurement){
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


	var totalAmountToPay = 0;
	function cashOut(){
		totalAmountToPay = 0;
		table.data()
			.each(function (value, index){
				
				totalAmountToPay = Number(totalAmountToPay)+Number(value[4]);
				
		});
		$('#billOut').openModal();
		$('#totalAmount').text("P "+Number(totalAmountToPay).format(2));
	}

	Number.prototype.format = function(n, x) {
	    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
	    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
	};

	var discount = 0;
	var list;
	var totalPayment = 0;
	$('#discountSelect').change(function(){
		console.log('changed');
		console.log($(this).val());
		list = $(this).val();
		if (list.length != 0){
			console.log('not null');
			$.each(list,function(i,value){
				discount = 0;
				console.log(value);
				$.ajax({
					url: "discount/"+value,
					type: "GET",
					success: function(data) {
						if (data.intDiscountTypeId == 1){
							discount = Number(discount)+(Number(totalAmountToPay)*(Number(data.dblDiscountPercent)/100));
						}else{
							discount = Number(discount)+Number(data.dblDiscountAmount);
						}

						$('#totalDiscount').text("P "+Number(discount).format(2));
						totalPayment = Number((Number(totalAmountToPay.format(2)-Number(discount.format(2))))).format(2)
						$('#amountToPay').text("P "+totalPayment);
					},
					error: function(xhr) {
						alert('error');
						console.log(xhr);
					}
				});
			});
		}else{
			discount = 0;
			$('#totalDiscount').text("P "+Number(discount).format(2));
			$('#amountToPay').text("P "+Number((Number(totalAmountToPay.format(2)-Number(discount.format(2))))).format(2));
					
		}

	});

	$('#billOutForm').on('submit', function(event) {
		event.preventDefault();
		var arrItems = arrData;
		var arrDiscount = $('#discountSelect').val();
		console.log(arrDiscount);
		var dblPayment = document.getElementById('payment').value;
		$.ajax({
			url: "pos",
			type: "POST",
			data: {
				_token: document.getElementById('billOutFormToken').value,
				itemList: JSON.stringify(arrItems),
				discountList: arrDiscount,
				dblPayment: dblPayment
			},
			success: function(data) {
				console.log(data);
				$('#billOut').closeModal();
				var change = dblPayment - totalPayment;
				alert('Your change is P'+Number(change).format(2));
				window.location.href = "{!! url('pos') !!}";
			},
			error: function(xhr) {
				alert('error');
				console.log(xhr);
			}
		});

	});

</script>
@endsection