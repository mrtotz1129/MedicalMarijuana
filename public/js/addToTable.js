
function addChargesToTable(){
    var table = document.getElementById("packageTable");
    var chargeType = $("#medList").val();
    var chargeQuantity = $("#medQuantity").val();
    var removeBtn = document.createElement('button');
   
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2); 
    cell1.innerHTML = chargeType;
    cell2.innerHTML = chargeQuantity;
    cell3.innerHTML = '<input id="Button" type="button" value="Remove" class = "waves-effect waves-light btn red" onclick="deleteRow(this)" />';
}

function deleteRow(row){
    var i=row.parentNode.parentNode.rowIndex;
    var packageText = document.getElementById("packageTable").rows[i].cells[0].innerHTML;
    document.getElementById('packageTable').deleteRow(i);
    
    alert(packageText);
    var y = document.getElementById("package-list");
    var option = document.createElement("option");
    option.text = packageText;

    y.add(option);
}
