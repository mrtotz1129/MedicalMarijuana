@extends('maintenance')
@section('article')
<div class="container">
	<article class="white main z-depth-1">
	<br>
		<h3 class="thin indigo-text text-darken-2">Patient Information</h3>
		<div class="row">
			<div class="col s3 center ">
				 <img name="image" id="employeeimg" class="circle center" align="middle" style="width: 200px; height: 200px;" src="{!! asset('img/jerald.jpg') !!}" alt=""/>
			</div>

			<div class="col s3">
				<h5>Name: <h5 class="thin">Jerald John</h5></h5>
				<h5>Last Visit: <h5 class="thin">december 23, 1996</h5></h5>
				<h5>Addresss: <h5 class="thin">Manila</h5></h5>
			</div>

			<div class="col s3">
				<h5>Unsettled Balance: <h5 class="thin">Php 500,000.00</h5></h5>
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
	</article>
</div>
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

 
@endsection