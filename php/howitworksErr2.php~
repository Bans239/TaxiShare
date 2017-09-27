<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>How it Works</title>
<link rel="stylesheet" type="text/css" href="css/fixedbar.css">
<link rel="stylesheet" type="text/css" href="css/howitworks.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
    <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
      @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
    </style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="js/fixedbar.js"></script>
</head>
<body bgcolor="#B2B2B2">
	<?php
	$userErr=$username=$pword="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["user"])||empty($_POST["password"])) {
	    	$acnumErr = "Invalid Account number or Password";
		} else {
		$username = test_input($_POST["user"]);
		$password = test_input($_POST["password"]);
		$dbhost='localhost:3036';
		$dbuser='root';
		$dbpass='ltw23';
		$conn=mysql_connect($dbhost,$dbuser,$dbpass);
		if(!$conn)
			die('Could not connect: '.mysql_error());
		$db_selected=mysql_select_db('taxi');
		if(!$db_selected)
			die('Could not use database bank : '.mysql_error());
		}
		$result=mysql_query("SELECT * FROM userinfo WHERE user='$username';",$conn);
		$row = mysql_fetch_assoc($result);
		if(isset($row['user'])){
			if(strcmp($password,$row['password'])==0){
				session_start();
				$_SESSION['username']=$username;
				header("Location: howitworksLIN.php");
			}else{
				header("Location: howitworksErr.php");
			}
		}else{
			header("Location: howitworksErr.php");
		}
	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	?>
	<div id="fixedbar">
		<span id="company">
		<a href="findride.php"><span id="cname" >Taxi</span><span id="cnamecolor" >Share</span></a>
		<img id="cicon" src="http://s2.postimg.org/na0idpbkp/cicon.png">
	  	<a href="findride.php" id="greenb" class="action-button shadow animate green">Find a ride</a>
	  	<a href="howitworksErr2.php" id="redb" class="action-button shadow animate red">Offer a ride</a>
		<a href="signup.php" id="yellowb" >Register Now</a>
		</span>
		<span id="signup-response">Login to offer ride</span>
		<div class="active-links">
		    <div id="session">
		    <a id="signin-link" href="#">
			    <em>Have an account?</em>
			    <strong>Sign in</strong>
		    </a>
		    </div>
		    <div id="signin-dropdown">
			<form class="signin" onsubmit="return isvalidated();" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<fieldset class="textbox">
				    	<label class="username">
						<div id="headerror"></div>
						<span>Username</span>
						<input id="userID" type="text" onblur="usercheckLv()" name="user" value="">
						<br><span class="errors" id="usererror"></span>
					</label>
				
					<label class="password">
						<span>Password</span>
						<input id="passwordID" type="password" onblur="passwordcheckLv()" name="password" value="">
						<br><span class="errors" id="passworderror"></span>
					</label>
				</fieldset>
		        
				<fieldset class="remb">
					<button class="submit button" type="submit">Sign in</button>
				</fieldset>
		        </form>
		     </div>
		 </div>
	</div>
	<div id="pageheading">How It Works</div>
	<div id="pagecontent">
		<br><br>
		<div id="ch1"><div class="contentheading">Do You Need To Travel ?</div>
		<div class="contentsubheading">Find a ride</div>
		<p class="maincontent">Just enter your departure and arrival points and your travel date, then choose a car owner offering a ride going your way.</p><br><br>
		<div class="contentsubheading">Get in touch</div>
		<p class="maincontent">Login to your TaxiShare account or create one if you don't have any. You'll then get their phone number if you are correctly logged in.</p><br><br>
		<div class="contentsubheading">Travel Together</div>
		<p class="maincontent">Be at your planned meeting point on time. Bring exact change to pay the car owner the agreed contribution during the ride.</p><br><br></div>
		<br><br>
		<div id="ch2"><div class="contentheading">Do You Have Empty Seats ?</div>
		<div class="contentsubheading">Offer Your Ride Online</div>
		<p class="maincontent">Add your departure and arrival points, the date and time of your departure, and the price per co-traveller. </p>
		<br><br><br><div class="contentsubheading">Your Co-travellers Contact You</div>
		<p class="maincontent">Co-travellers will contact you to confirm journey details by phone.</p><br><br>
		<br><div class="contentsubheading">Travel Together</div>
		<p class="maincontent">Be at your planned meeting point on time. Should you be delayed, send a quick message letting your co-travellers know.Your co-travellers will pay you the agreed contribution during the journey. It might be useful to have a bit of change on you.</p><br><br></div>
	</div>
	<div id="foot">
		<br><br><p id="fom">Find Out More</p><br>
		<a id="a1" href="howitworks.php">How It Works</a><br><br>
		<a id="a2" href="faq.php">Frequently Asked Questions</a><br><br>
		<a id="a3" href="tandc.php">Terms & Conditions</a>
	</div>
</body>
</html>

