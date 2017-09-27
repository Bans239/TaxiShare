function oldidcheckLv(){
		var x=document.getElementById("oldid").value;
		if(x.localeCompare("")==0)
			document.getElementById("oldiderror").innerHTML="Enter old password";
		else
			document.getElementById("oldiderror").innerHTML="";
	}
	function newidcheckLv(){
		var x=document.getElementById("newid").value;
		if(x.localeCompare("")==0)
			document.getElementById("newiderror").innerHTML="Enter new password";
		else
			document.getElementById("newiderror").innerHTML="";
	}
function confirmidcheckLv(){
		var x=document.getElementById("confirmid").value;
		if(x.localeCompare("")==0)
			document.getElementById("confirmiderror").innerHTML="confirm password";
		else
			document.getElementById("confirmiderror").innerHTML="";
	}


function passwordcheckLv(){
		var x=document.getElementById("newid").value;
		if(x.localeCompare("")==0){
			document.getElementById("newiderror").innerHTML="Enter password";
		}else{
			document.getElementById("newiderror").innerHTML="";
		}
		var y=document.getElementById("newid").value;
		if(!(x.localeCompare(y)))
			document.getElementById("confirmidmerror").innerHTML="Confirm password";
	}
	function rppasswordcheck(){
		var a = document.getElementById('newid').value;
		var b = document.getElementById('confirmid').value;
		if(a!=b){
			document.getElementById('confirmiderror').innerHTML="Password do not match";
		}else{
			document.getElementById('confirmiderror').innerHTML="Password matched";
		}
	}
