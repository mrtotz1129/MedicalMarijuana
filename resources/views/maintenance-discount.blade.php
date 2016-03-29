@extends('maintenance')
@section('article')
	<article class="white main z-depth-1">
			<div class="row indigo darken-2" style="margin-left: -30px; border-top-right-radius: 10px;">
				<div class="col s6">
					<h4 class="thin white-text">Discount Maintenance</h4>
				</div>
				<div class="col s6 right">
					<a class="right waves-effect waves-light modal-trigger btn-floating btn-large red darken-2 left white-text tooltipped" 
					href="#create" style="position: relative; top: 40px; right: 1%;" 
					data-tooltip="Create"><i class="material-icons">add</i></a>
				</div>
			</div>	
		<div class="container" style="margin-left: -30px;">
		<br>
				<table id="example" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				            	<th>Type</th>
				                <th>Name</th>
				                <th>Discount</th>
				              	<th>Requirement</th>
				                <th>Actions</th>
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($discountList as $discount)
				        	<tr>
				        		<td>{!! $discount->discount_type !!}</td>
				        		<td>{!! $discount->strDiscountName !!}</td>
				        		@if($discount->intDiscountTypeId === 1)
				        			<td>{!! $discount->dblDiscountPercent !!}</td>
				        		@else
									<td>{!! $discount->dblDiscountAmount !!}</td>
				        		@endif
				        		<td><a href="javascript:viewRequirement({!! $discount->intDiscountId !!})" class="tooltipped" data-tooltip="View Requirements"><i class="material-icons">search</i></a></td>
				        		<td>
				        			<a href="javascript:updateId({!! $discount->intDiscountId !!})" class="tooltipped" data-tooltip="Update Fee Details"><i class="material-icons">mode_edit</i></a>
				        			<a href="javascript:deactivateId({!! $discount->intDiscountId !!})" class="tooltipped" data-tooltip="Deactivate Fee Details"><i class="material-icons">delete</i></a>
				        		</td>
				        	</tr>
				        	@endforeach
				        </tbody>
				        	
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
				<!-- Create Discount Modal -->
				   <div id="create" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="createEmpForm" action="{!! url('discount') !!}" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Create Discount</h4>
				        </div>
				                <div class="aside aside1 z-depth-0">
				                <!-- second -->
				                  <div class="row">
				                    <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>
				                    <div class="input-field col s12">
				                       <select class="browser-default" id="slct1" name="intDiscountTypeId" required>
				                           <option disabled selected>Discount Type</option>
				                           <option value="1">Percent</option>
				                           <option value="2">Amount</option>
				                       </select>
				                       <label for="slct1" class="active">Discount Type<span class="red-text">*</span></label>
				                   </div>
				                    <div class="input-field col s12">
				                        <input name="strDiscountName" placeholder="Ex: Aquino" id="discountName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: PhilHealth( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="discountName" class="active">Discount Name<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="dblDiscount" placeholder="Ex: 10" id="discountRate" type="number" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: PhilHealth( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="discountRate" class="active">Discount<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                    <select multiple name="requirementList[]">
				                      <option value="" disabled selected>Choose your option</option>
				                      @foreach($requirementList as $requirement)
										<option value="{!! $requirement->intRequirementId !!}">{!! $requirement->strRequirementName !!}</option>
				                      @endforeach
				                    </select>
				                    <label>Select Requirement</label>
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
				              <h4 class="grey-text text-darken-1 center	">Update Discount</h4>
				        </div>
				                <div class="aside aside2 z-depth-0">
				                <!-- second -->
				                  <div class="row">
				                   <div class="col s12" style="margin-bottom: 5px;">
				                         <label class="red-text left">(*) Indicates required field</label>
				                    </div>
				                     <div class="input-field col s12">
				                       <select class="browser-default" id="slct1" name="selectedJob" required>
				                           <option disabled selected>Discount Type</option>
				                           <option value="1">Percent</option>
				                           <option value="2">Amount</option>
				                       </select>
				                       <label for="slct1" class="active">Discount Type<span class="red-text">*</span></label>
				                   </div>
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: Aquino" id="discountName" type="text" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: PhilHealth( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="discountName" class="active">Discount Name<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                        <input name="" placeholder="Ex: 10" id="discountRate" type="number" class="validate tooltipped specialname" required data-position="bottom" data-delay="30" data-tooltip="Ex: PhilHealth( At least 2 or more characters )" pattern="^[a-zA-Z\-'`\s]{2,}$" minlength="2">
				                        <label for="discountRate" class="active">Discount<span class="red-text"><b>*</b></span></label>
				                    </div>
				                    <div class="input-field col s12">
				                    <select multiple>
				                      <option value="" disabled selected>Choose your option</option>
				                      <option value="1">Requirement 1</option>
				                      <option value="2">Requirement 2</option>
				                      <option value="3">Requirement 3</option>
				                    </select>
				                    <label>Select Requirement</label>
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

					<!-- View Requirement -->
				   <div id="viewRequirementModal" class="modal modal-fixed-footer">
				    <form class="col s12 form" method="post" id="createEmpForm" action="createEmployee" enctype="multipart/form-data">
				      <div class="modal-content" style="padding-bottom: 0px !important;">
				        <!-- <div class="container"> -->
				      <div class="wrapper">
				        <div class="input-field col s12">
				              <h4 class="grey-text text-darken-1 center	">Requirements</h4>
				        </div>
				                <div class="aside aside1 z-depth-0">
				                <!-- second -->
				                  <div class="row">
                   		<table id="requirements" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				            	<th>Requirements</th>
				            </tr>
				        </thead>
				        <tbody>			        	
				        	<tr>
				        		<td></td>
				        		
				        	</tr>
				        </tbody>
				        	
				    </table>
				</div>

				<script type="text/javascript">
					$(document).ready(function() {
					    $('#requirements').DataTable( {
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
				              <!-- END ASIDE 2 -->

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

<!-- add option -->
   <div id="addOption" class="modal" style="margin-top: 30px;">
     <form id="createOption">
       <div class="modal-content">
         <h4>Add Another Position</h4>
         <div class="row">
           <div class="col s12">
             <div class="input-field col s8 offset-s2">
               <select id="addOptionSelect" class="browser-default" size="10">
                 <c:forEach items="${empCategory}" var="name">
                     <option value="${name.strCategoryName}">${name.strCategoryName }</option>
                   </c:forEach>
               </select>
             </div>
             <div class="input-field col s8 offset-s2" style="margin-top: 20px;">
               <input type="text" class="validate tooltipped specialoption" placeholder="Ex: Cashier" id="addOptionName" name="addOptionName" data-position="bottom" data-delay="30" data-tooltip="Ex: Cashier<br/>( At least 5 or more characters )" pattern="^[A-Za-z-\s]{5,}$">
               <label for="addOptionName" class="active">Position</label>
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

	function viewRequirement(id){
		alert(id);
		$.ajax({
			type: "GET",
			url: "view-requirement",
			data: {
				'id' : id
			},
			dataType: "json",
			async: true,
			success: function(data){
				alert(data[0].strRequirementName);
				var table = $('#requirements').DataTable();
				$.each(data, function(i, requirement){
					table.row.add([requirement.strRequirementName]).draw(false);
				});
				$('#viewRequirementModal').openModal();
			},
			error: function(xhr){
				alert('error');
			}
		});
	}

</script>
 
@endsection