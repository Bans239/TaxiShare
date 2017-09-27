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
		session_start();
		$username=$_SESSION["username"];
	?>
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
	<div class="wrapper"><br><br><br><br>
	    <h1 >Find Ride</h1><br><br>
	    <p>Enter the destination where you want to go.</p>
	    <form class="form" method="post" onsubmit="return isvalidatedtwo();" action="showrideLIN.php">
		    <div  class ="errors" id="headerror2"></div>
		    <input   style="width: 450px" type="text"  placeholder="SOURCE" name="depart" class="z typeahead tt-query" required ><br>  
		    <input style="width: 450px" type="text" id="destid"  placeholder="DESTINATION"  name="arrival" onblur="destinationcheck()"  class="q typeahead tt-query"  ><br><span class="errors" id="destinationerror"  ></span><br>
		    <input  style="width: 460px" class=" position " type="submit" class="submit" value="submit">
	    </form>
	</div>
	<div id="foot">
		<br><p id="fom">Find Out More</p><br>
		<a id="a1" href="howitworksLIN.php">How It Works</a><br><br>
		<a id="a2" href="faqLIN.php">Frequently Asked Questions</a><br><br>
		<a id="a3" href="tandcLIN.php">Terms & Conditions</a>
	</div>
 
</body>
</html>
