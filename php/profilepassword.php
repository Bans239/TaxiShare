<html>
<head>
	<title>PROFILE</title>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<link rel="stylesheet" type="text/css" href="css/fixedbar.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
      @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
	#foot{
		top:550px;
	}
    	</style>
</head>
<?php
	session_start();
	$username= $_SESSION["username"];
	
?>
<body>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="js/fixedbar.js"></script>
	<div id="fixedbar">
		<span id="company">
		<a href="findrideLIN.php"><span id="cname" >Taxi</span><span id="cnamecolor" >Share</span></a>
		<img id="cicon" src="http://s2.postimg.org/na0idpbkp/cicon.png">
	  	<a href="findrideLIN.php" id="greenb" class="action-button shadow animate green">Find a ride</a>
	  	<a href="offerride.php" id="redb" class="action-button shadow animate red">Offer a ride</a>
		</span>
		<nav>
		<ul>
		    <li class="drop">
			<a href="#"><?php echo $username; ?></a>
			<div class="dropdownContain">
			    <div class="dropOut">
				<div class="triangle"></div>
				<ul>
				    <li onclick="viewprofileclicked()">View Profile</li>
				    <li onclick="signoutclicked()">Sign Out</li>
				</ul>
			    </div>
			</div>
		    </li>
		</ul>
		</nav>
	</div>
	<div class="container">
		<section id="content">
			<form onsubmit="return isvalidated();" action="profileupdate.php" method="post">
				<h1>Reset password</h1>
				<h2 id="headerror"></h2>
				<div>
					<input onblur="checkoldpassword()" type="password" placeholder="Old password" id="oldpasswordID2" name="old"/>
					<br><span class="errors" id="oldpassworderror"></span><br>
				</div>
				<div>
					<input onkeypress="passwordcheck2()" onkeyup="passwordcheck2()" onblur="passwordcheckLv2()" type="password" placeholder="New Password" id="passwordID2" name="new"/>
					<br><span class="errors" id="passworderror2"></span><br>
				</div>
				<div>
					<input onkeypress="rppasswordcheck2()" onkeyup="rppasswordcheck2()" onblur="rppasswordcheckLv2()" type="password" placeholder="Confirm new password" id="rppasswordID2" name="rpnew"/>
					<br><span class="errors" id="rppassworderror2"></span><br>
				</div>
				<div>
					<input type="submit" value="Reset" />
					<a href="profilenumofseats.php">Update number of seats?</a>
				</div>
			</form><!-- form -->
			<div class="button">
			</div><!-- button -->
		</section><!-- content -->
	</div><!-- container -->
	<div id="foot">
		<br><br><p id="fom">Find Out More</p><br>
		<a id="a1" href="howitworksLIN.php">How It Works</a><br><br>
		<a id="a2" href="faqLIN.php">Frequently Asked Questions</a><br><br>
		<a id="a3" href="tandcLIN.php">Terms & Conditions</a>
	</div>
</body>
<script>
function passwordcheck2(){
		var x=document.getElementById("passwordID2");
		var y=document.getElementById("passworderror2");
		var txtpass=x.value;
		var desc = new Array();
		desc[0] = "Very Weak";
		desc[1] = "Weak";
		desc[2] = "Better";
		desc[3] = "Medium";
		desc[4] = "Strong";
		desc[5] = "Very Strong";
	        var score   = 0;

	        //if txtpass bigger than 6 give 1 point
	        if (txtpass.length > 6) score++;

	        //if txtpass has both lower and uppercase characters give 1 point
	        if ( ( txtpass.match(/[a-z]/) ) && ( txtpass.match(/[A-Z]/) ) ) score++;

	        //if txtpass has at least one number give 1 point
	        if (txtpass.match(/\d+/)) score++;

	        //if txtpass has at least one special caracther give 1 point
	        if ( txtpass.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) score++;

	        //if txtpass bigger than 12 give another 1 point
	        if (txtpass.length > 12) score++;

	        y.innerHTML = "Password Strength : "+desc[score];
	}
	function passwordcheckLv2(){
		var x=document.getElementById("passwordID2").value;
		if(x.localeCompare("")==0){
			document.getElementById("passworderror2").innerHTML="Enter password";
		}else{
			document.getElementById("passworderror2").innerHTML="";
		}
		var y=document.getElementById("passwordID2").value;
		if(!(x.localeCompare(y)))
			document.getElementById("rppassworderror2").innerHTML="Confirm password";
	}
	function rppasswordcheck2(){
		var a = document.getElementById('passwordID2').value;
		var b = document.getElementById('rppasswordID2').value;
		if(a!=b){
			document.getElementById('rppassworderror2').innerHTML="Password do not match";
		}else{
			document.getElementById('rppassworderror2').innerHTML="Password matched";
		}
	}
	function rppasswordcheckLv2(){
		var a=document.getElementById('rppassworderror2').innerHTML;
		if(a.localeCompare("Password matched")==0){
			document.getElementById('rppassworderror2').innerHTML="";
		}
		var b = document.getElementById('rppasswordID2').value;
		var c = document.getElementById('passwordID2').value;
		if(a.localeCompare("Confirm password")==0&&b.localeCompare(c)==0){
			document.getElementById('rppassworderror2').innerHTML="";
		}
		if(b.localeCompare("")==0)
			document.getElementById('rppassworderror2').innerHTML="Confirm password";
		if(b.localeCompare("")==0&&c.localeCompare("")==0)
			document.getElementById('passworderror2').innerHTML="Enter password";
	}
	function checkoldpassword(){
		var x=document.getElementById("oldpasswordID2").value;
		if(x.localeCompare("")==0){
			document.getElementById("oldpassworderror").innerHTML="Enter password";
		}else{
			document.getElementById("oldpassworderror").innerHTML="";
		}
	}
	function isvalidated(){
		var c=document.getElementById("oldpassworderror").innerHTML;
		var d=document.getElementById("passworderror2").innerHTML;
		var e=document.getElementById("rppassworderror2").innerHTML;
		var j=document.getElementById("oldpasswordID2").value;
		var k=document.getElementById("passwordID2").value;
		var l=document.getElementById("rppasswordID2").value;
		if(!(c.localeCompare("")==0 && d.localeCompare("")==0 && e.localeCompare("")==0)){
			document.getElementById("headerror").innerHTML="Complete the form correctly!";
			return false;
		}else if(j.localeCompare("")==0||k.localeCompare("")==0||l.localeCompare("")==0){
			document.getElementById("headerror").innerHTML="Complete the form correctly!";
			return false;
		}else{
			return true;
		}
	}
</script>
</html>
