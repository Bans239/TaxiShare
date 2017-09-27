<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>Welcome to TaxiShare</title>
<link rel="stylesheet" type="text/css" href="css/fixedbar.css">
<link rel="stylesheet" type="text/css" href="css/findride.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
      @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
      @import url(http://fonts.googleapis.com/css?family=Oswald);
      @import url(http://fonts.googleapis.com/css?family=Open+Sans);
	#foot{
		height:170px;
		top:500px;
	}
	#fom{
		left:0px;
		top:20px;
	}
	#a1{
		top:15px;
	}
	#a2{
		top:0px;
	}
	#a3{
		top:-15px;
	}
</style>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.9.3/typeahead.min.js"></script>
<script src="js/fixedbar.js"></script>
<script src="js/findride.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.q').typeahead({
            name: 'q',
            remote: 'search.php?q=%QUERY',
            minLength: 1, // start searching if word is at least 3 letters long. Reduces database queries count
            limit: 5 // show only first 10 results
        });
    });

    $(document).ready(function() {
        $('.z').typeahead({
            name: 'z',
            remote: 'search1.php?z=%QUERY',
            minLength: 1, // start searching if word is at least 3 letters long. Reduces database queries count
            limit: 5 // show only first 10 results
        });
    });
</script>
</head>
<body>
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
				header("Location: findrideLIN.php");
			}else{
				header("Location: findrideErr.php");
			}
		}else{
			header("Location: findrideErr.php");
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
	  	<a href="findrideErr2.php" id="redb" class="action-button shadow animate red">Offer a ride</a>
		<a href="signup.php" id="yellowb" >Register Now</a>
		</span>
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
	<div class="wrapper"><br><br><br><br>
	    <h1 >Find Ride</h1><br>
	    <p>Enter the destination where you want to go.</p>
	    <form class="form" method="post" onsubmit="return isvalidatedtwo();" action="showride.php">
		    <div  class ="errors" id="headerror2"></div>
		    <input   style="width: 450px" type="text"  placeholder="SOURCE" name="depart" class="z typeahead tt-query" required ><br>  
		    <input style="width: 450px" type="text" id="destid"  placeholder="DESTINATION"  name="arrival" onblur="destinationcheck()"  class="q typeahead tt-query"  ><br><span class="errors" id="destinationerror"  ></span><br><br><br>
		    <input  style="width: 460px" class=" position " type="submit" class="submit" value="submit">
	    </form>
	</div>
	<div id="foot">
		<br><p id="fom">Find Out More</p><br>
		<a id="a1" href="howitworks.php">How It Works</a><br><br>
		<a id="a2" href="faq.php">Frequently Asked Questions</a><br><br>
		<a id="a3" href="tandc.php">Terms & Conditions</a>
	</div>
 
</body>
</html>
