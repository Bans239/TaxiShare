<html>
<head>
	<title>PROFILE</title>
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
	$rideid=$_POST["rideid"];
	$numofseats=$_POST["numofseats"];
	$conn = mysql_connect("localhost","root","ltw23");
	if(!$conn) {
		die('Could not connect : '.mysql_error());
	}
	mysql_select_db("taxi");
	$result_acc = mysql_query("SELECT * FROM ride WHERE rideid='$rideid'",$conn);

	$row = mysql_fetch_assoc($result_acc);

	if(isset($row['ruser'])) {
		if(strcmp($username,$row['ruser'])==0) {
			mysql_query("UPDATE ride SET numofseats = '$numofseats' WHERE ruser = '$username' ",$conn);
		}
		else {
			header("Location: profilenumofseatsfail.php");
		}
	}
	else {
		header("Location: profilenumofseatsfail.php");
	}
	mysql_close($conn);
	
?>
<body style="background: url('http://s3.postimg.org/v3d1puuur/o_SUCCESS_facebook.jpg') no-repeat center center fixed; 
  	-webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;">
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
	<div id="content" style="position:relative;left:320px;top:100px;">
		<h2>Success!</h2>
		<h3>Number of seats updated for the given ride ID!</h3><br><br>
		<a style="color:black;text-decoration:underline;" href="profile.php"><-- Back to profile</a>
	</div>
	<div id="foot">
		<br><br><p id="fom">Find Out More</p><br>
		<a id="a1" href="howitworksLIN.php">How It Works</a><br><br>
		<a id="a2" href="faqLIN.php">Frequently Asked Questions</a><br><br>
		<a id="a3" href="tandcLIN.php">Terms & Conditions</a>
	</div>
</body>
<script>
	function checkrideid(){
		var x=document.getElementById("rideid").value;
		if(x.localeCompare("")==0)
			document.getElementById("rideiderror").innerHTML="Enter ride ID";
		else
			document.getElementById("rideiderror").innerHTML="";
	}
	function checknumofseats(){
		var x=document.getElementById("numofseats").value;
		if(x.localeCompare("")==0)
			document.getElementById("numofseatserror").innerHTML="Enter ride ID";
		else
			document.getElementById("numofseatserror").innerHTML="";
	}
	function isvalidated(){
		var c=document.getElementById("rideiderror").innerHTML;
		var d=document.getElementById("numofseatserror").innerHTML;
		var j=document.getElementById("rideid").value;
		var k=document.getElementById("numofseats").value;
		if(!(c.localeCompare("")==0 && d.localeCompare("")==0)){
			document.getElementById("headerror").innerHTML="Complete the form correctly!";
			return false;
		}else if(j.localeCompare("")==0||k.localeCompare("")==0){
			document.getElementById("headerror").innerHTML="Complete the form correctly!";
			return false;
		}else{
			return true;
		}
	}
</script>
</html>
