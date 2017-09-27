<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Terms and Conditions</title>
<link rel="stylesheet" type="text/css" href="css/fixedbar.css">
<link rel="stylesheet" type="text/css" href="css/tandc.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
    <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
      @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
	#foot{
		top:5750px;
	}
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
				header("Location: tandcLIN.php");
			}else{
				header("Location: tandcErr.php");
			}
		}else{
			header("Location: tandcErr.php");
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
	  	<a href="tandcErr2.php" id="redb" class="action-button shadow animate red">Offer a ride</a>
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
	<div id="pageheading">Terms and Conditions</div>
		<div id="pagecontent">
		<div class="contentheading">1. GENERAL CONDITION OF USE</div>
		<div class="contentsubheading">1.1 Scope and Definitions</div>
		<p class="maincontent"><br>These General Conditions of Use apply to all services provided by TaxiShare (defined herein below). TaxiShare owns and operates the Site (defined herein below) in India.
<br><br>“<strong>Car Sharing</strong>” means the sharing of a Vehicle for a Trip by a Car Owner carrying a Co-Traveller for that Trip in exchange for a Cost Contribution.
<br><br><strong>“Conditions”</strong> mean these General Conditions of Use, including the Good Conduct Charter and Privacy Policy of TaxiShare as notified on the Site.
<br><br><strong>“Cost Contribution”</strong> means the amount agreed between the Car Owner and the Co-Traveler in relation to the Trip which is payable by the Co-Traveler as their contribution towards the costs of the Trip.
<br><br><strong>“Co-Traveller”</strong> or <strong>“Passenger”</strong> means a Member who has accepted an offer to be transported by a Car Owner and includes all other persons who accompany such Member in the Vehicle for the Trip.
<br><br><strong>“Car Owner”</strong> or <strong>“Driver”</strong> means a Member who through the Site offers to share a car journey with a Co-Traveller in exchange for the Cost Contribution.
<br><br><strong>“Member”</strong> refers to a registered user of the Site.
<br><br><strong>“Service”</strong> refers to any service provided by TaxiShare through the Site to any   Member.
<br><br><strong>“Trip”</strong> means a given journey in relation to which a Car Owner and a Co-Traveler have agreed upon a transaction through the Site.
<br><br><strong>“User Account”</strong> means an account with the Site opened by a Member and used in order to access the Service provided by TaxiShare through the Site.
<br><br><strong>“Vehicle”</strong> means the vehicle offered by a Car Owner for Car Sharing.</p><br><br>
		<div class="contentsubheading">1.2 Acceptance of Conditions</div>
		<p class="maincontent">The Conditions apply to any and all use of the Site by a Member. By using the Site, the Members signify their acceptance to these Conditions in full and agree to be bound by them. <br><br>
No access to the Services will be permitted unless the Conditions are accepted in full. No Member is entitled to accept part only of the Conditions. If a Member does not agree to the Conditions, such Member may not use the Services.<br><br>
 All Members agree to comply with the Conditions and accept that their personal data may be processed in accordance with the Privacy Policy.<br><br>
In the event that any Member fails to comply with any of the Conditions, TaxiShare reserves the right, but not the obligation at its own discretion, to withdraw the User Account in question and suspend or withdraw all Services to that Member without notice.<br><br>
These Conditions are intended to create binding rights and obligations between Members and TaxiShare in accordance with the Indian Contract Act, 1872.</p><br><br>
		<div class="contentsubheading"> 1.3 Variation of the Conditions, Site and Service</div>
		<p class="maincontent">TaxiShare reserves the right to modify the Conditions at any time. In addition, TaxiShare may vary or amend the Services provided through the Site, the Site functionality and/ or the “look and feel” of the Site at any time without notice and without liability to Members.<br><br>
Any modification to the Site, Services or Conditions will take effect as soon as such changes are published on the Site, subject to communication of any material change to the Conditions to the Members in an e-mail.<br><br>
Members will be deemed to have accepted any varied Conditions in the event that they use any Services offered through the Site following publication of the varied Conditions. Changes will not apply to any bookings which have been made prior to publication of the varied Conditions.</p><br><br>
		<div class="contentheading">2. USE OF THE SERVICE</div>
		<div class="contentsubheading">2.1 User Account and Accuracy of Information</div>
		<p class="maincontent">In order to use the Services each Member must create a User Account and agrees to provide any personal information requested by TaxiShare. In particular, Members will be required to provide their first name, last name, age, title, valid telephone number and email address. Use of the Site is limited to those over the age of 18 years at the time of registration.<br><br>
Members agree and accept that all of the information they provide to TaxiShare when setting up their User Account and at any other time shall be true, correct, complete and accurate in all respects. Members also agree that any information supplied to TaxiShare or posted on the Site in connection with any Trip, Vehicle or Car Sharing will be true, accurate and complete.<br><br>
Members agree and understand that TaxiShare does not undertake any verification to confirm the accuracy of any information provided by the Members on the Site or to a Car Owner or Co-Traveler, as the case maybe. TaxiShare will not be liable to any Member in the event that any information provided by another Member is false, incomplete, inaccurate, misleading or fraudulent.<br><br>
Unless expressly agreed by TaxiShare, Members are limited to one User Account per Member. No User Account may be created on behalf of or in order to impersonate another person.
		</p><br><br>
		<div class="contentsubheading">2.2 No Commercial Activity and Status of TaxiShare</div>
		<p class="maincontent">The Site and the Services are strictly limited to providing a Service for Car Owners and Co-Travelers to car share in a private capacity. The Services may not be used to offer or accept car sharing for hire or reward or for profit or in any commercial or professional context. The Services may be used only to offer or accept car sharing in exchange for sharing the cost of the Trip between the Car Owner and the Co-Traveler.<br><br>
Car Owners agree not to obtain any hire or reward or make profit in any form, from any Trip. The Service and the Cost Contribution may only be used to discharge the Car Owner’s costs and may not be used to generate any hiring charges or reward or profit in any form for the Car Owner. The Car Owner is not entitled to make profit by virtue of the amount of the Cost Contribution, the types of Trips offered by a Car Owner, the frequency of such Trips or the number of Co-Travelers transported. This applies to all activities, arrangements and Services booked using the Site and any additional services or activities which may be agreed between Car Owner and Co-Traveler through the Site.<br><br>
The Car Owner must not provide any additional services to the Co-Traveler in exchange for hiring charges or any reward or for profit or otherwise (and the Co-Traveler may not accept or ask for any such services) including (without limitation) package delivery, waiting time, additional drop offs and pick-ups and collecting additional passengers (other than the Co-Traveler).<br><br>
All Trips, collection points and destinations must be pre-agreed through the Site between the Car Owner and Co-Traveler. Car Owners may not collect any Co-Travelers from any location which has not been pre-agreed with the Co-Traveler through the Site.<br><br>
Members are reminded that using the Services and offering Trips for hire or reward or in a commercial or professional capacity may invalidate a Car Owner’s insurance and invite adverse legal actions by the road transport authorities. TaxiShare shall not be in for any loss or damage incurred by a Member as a result of any or breach by a Member of these Conditions including where any Car Owner (in breach of these terms) offers Services through the Site in a professional or commercial capacity (thereby potentially invalidating their insurance) and breach of any agreement between the Car Owner and the Co-Traveler. Any offering of Trips in violation of the Conditions shall be at the sole risk such Member and TaxiShare shall have no liability towards Members for such violations.<br><br>
Neither TaxiShare nor the Site provides any transport services. The Site is a communications platform for Members to transact with one another. TaxiShare does not interfere with Trips, destinations or timings. The agreement for car sharing is between the Car Owner and the Co-Traveler. TaxiShare is not a party to any agreement or transaction between Members, nor is TaxiShare liable in respect of any matter arising which relates to a booking between Members. TaxiShare is not and will not act as an agent for any Member.<br><br>
Any breach of these Conditions will give rise to immediate suspension of such Member’s User Account and they may be restricted from accessing any further Services.
		</p><br><br>
		<div class="contentsubheading">2.3 Types of Booking and Payment</div>
		<p class="maincontent">TaxiShare offers a free service which allows Members to contact each other to arrange a car share.
TaxiShare’s Service is free of charge. The Co-Traveler will contact the Car Owner directly to arrange a car share and any conditions of travel (including size of luggage, whether smoking is permitted, whether pets are permitted, whether music can be played etc). Members accept that given the nature of the service and the fact that it is free of charge Car Owners and Co-Travelers will have no recourse to TaxiShare for any aspect of the transaction including in relation to cancellation, last minute changes, failure by the Car Owner or the Co-Traveler to turn up or non-payment of the Cost Contribution. In particular it is the Car Owner’s responsibility to collect payment from the Co-Traveler at the time of the Trip.<br><br>
TaxiShare will not contact either party and will take no steps whatsoever to manage the booking. The operation of the Trip is solely managed by the respective Car Owner and Co-Traveler(s).<br><br>
Please note that TaxiShare reserves the right to change any aspect of the Site or the Service which may include adding new services (which may require payment) or withdrawing any existing Services. TaxiShare does not guarantee that the Site will be functional at all times and Services may be suspended during such period when the Site is not in operation. TaxiShare will not be liable to any of the Members in case where the Site is non-operational.</p><br><br>
		<div class="contentsubheading">2.4 Car Owner and Co-Traveler Obligations</div>
		<div class="contentsubsubheading">Car Owner's obligations</div>
		<p class="maincontent">The Car Owner agrees:<br><br>
That the Trip shall not be for any fraudulent, unlawful or criminal activity.<br><br>
That they will procure for the Vehicle, a comprehensive insurance policy, which provides insurance cover to the occupants in the Vehicle and covers third party liability.<br><br>
That they will present themselves on time and at the place agreed with the specified Vehicle.<br><br>
That they will immediately inform all Co-Travelers of any change whatsoever to the Trip. If one or more Co-Travelers have made a booking and the Car Owner decides to change any aspect of the Trip, the Car Owner undertakes to contact all Co-Travelers who have made a booking in relation to that Trip and to obtain the agreement of all Co-Travelers to the change. If a Co-Traveler refuses the change, they are entitled to a full refund and without any compensation being paid to the Car Owner.<br><br>
  The Car Owner must comply with the Good Conduct Charter at all times.<br><br>
The Car Owner must wait for the Co-Traveler at the pickup point for at least 30 minutes after the agreed time (however, the Co-Traveler is expected to be punctual).
		</p><br><br>
		<div class="contentsubsubheading">Co-Traveler obligations</div>
		<p class="maincontent">The Co-Traveler agrees:<br><br>
  That the Trip shall not be for any fraudulent, unlawful or criminal activity.<br><br>
That they will present themselves on time and at the place agreed with the Car Owner.<br><br>
That they will immediately inform the Car Owner or TaxiShare if they are required to cancel a Trip.<br><br>
  That they will comply with the Good Conduct Charter at all times.<br><br>
The Co-Traveler agrees to wait at the pickup point for at least 30 minutes after the agreed time for the Car Owner to arrive.<br><br>
  That they will pay the Cost Contribution to the Car Owner.<br><br>
If the Co-Traveler or Car Owner fail to comply with any of these terms or any other Conditions TaxiShare reserves the right to keep information relating to the breach, to publish or disclose this information on the Member’s online profile and to suspend or withdraw the Member’s access to the Site.<br><br>
 That they shall ensure that all other persons who accompany the Co-Traveller in  the Trip comply with these Conditions as applicable to a Co-Traveller.­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­
		</p><br><br>
		<div class="contentsubheading">2.5 Insurance</div>
		<p class="maincontent">The Car Owner agrees and undertakes to take out and maintain a comprehensive insurance to cover third party liability, the occupants of the Vehicle and the Trip offered or booked through the Site. The Car Owner agrees that they will, on request, provide the Co-Traveler with evidence, in advance of the Trip, of the complete validity of its insurance policy. The Car Owner also undertakes to hold a valid driving licence and that the Car Owner will own or will be entitled to use the Vehicle and that the Vehicle will have a valid PUC (Pollution Under Control) certificate and the Co-Traveler is entitled to request evidence of the Car Owner’s insurance, registration certificate (‘log book’), driving licence and PUC certificate at any time up to completion of the Trip.<br><br>
It is TaxiShare’s understanding that governmental authorities take the view that a Co-Traveler who contributes only towards travel expenses is treated as travelling without hire or reward to the driver, and is therefore a third party passenger who is covered by comprehensive third party insurance policy in India. However TaxiShare gives no warranty or assurance in this regard and it is the Car Owner’s responsibility to verify that their insurance provides adequate cover.<br><br>
It is up to each Car Owner and Co-Traveler to confirm with each other that the Car Owner is covered by valid insurance. The Car Owner must confirm that their insurance policy allows them to carry Co-Travelers and that their insurance policy covers all Co-Travelers and any accident or incident which may occur during a Trip.<br><br>
The Car Owner and the Co-Traveler are aware that standard non-commercial insurance policies may refuse to cover loss or damage arising in the event that the Car Owner had made or was seeking to make a profit.<br><br>
The Car Owner may collect no payment from the Co-Traveler other than the Cost Contribution and the Car Owner must not in any event provide Vehicle on hire or for reward in any form.<br><br>
The Car Owner therefore undertakes to calculate their expenses (fuel, toll, maintenance, repairs, depreciation and insurance of their vehicle) and guarantees that the total Cost Contributions requested from their Co-Travelers does not result in the Vehicle running for hire or for reward.
If the Car Owner does receive any hiring charges or reward, or if the insurers repudiate or refuse to accept any claim arising during a Trip for any other reason, the Car Owner will be responsible for the financial consequences, losses and damages arising and TaxiShare will not be liable under any circumstances to the Car Owner or the Co-Traveler.<br><br>
TaxiShare reserves the right, but not the obligation at its own discretion, to suspend immediately the account of a user including the money displayed and to make aware to competent authorities any professional activity.<br><br>
		</p><br><br>
		<div class="contentsubheading">2.6 Management of Disputes Between Members</div>
		<p class="maincontent">TaxiShare may at its sole discretion provide its Members with an online service for resolving disputes. This service is non-binding. TaxiShare is under no obligation to seek to resolve disputes and this service is offered at TaxiShare’s sole discretion and may be withdrawn at any time.</p><br><br>
		<div class="contentheading">3. DISCLAIMER OF LIABILITY</div>
		<p class="maincontent">3.1 Members may access the Services on the Site at their own risk and using their best and prudent judgment before entering into any arrangements with other Members through the Site. TaxiShare will neither be liable nor responsible for any actions or inactions of Members nor any breach of conditions, representations or warranties by the Members. TaxiShare hereby expressly disclaims and any and all responsibility and liability in arising out of the use of the Site.<br><br>
 
3.2 TaxiShare expressly disclaims any warranties or representations (express or implied) in respect of Trips, accuracy, reliability and completeness of information provided by Members, or the content (including details of the Trip and Cost Contribution) on the Site. While TaxiShare will take precautions to avoid inaccuracies in content of the Site, all content and information, are provided on an as is where is basis, without warranty of any kind. TaxiShare does not implicitly or explicitly support or endorse any of the Members availing Services from the Site.<br><br>
 
3.3 TaxiShare is not a party to any agreement between a Car Owner and Co-Traveler and will not be liable to either the Car Owner or the Co-Traveler unless the loss or damage incurred arises due to TaxiShare’s negligence.<br><br>
 
3.4 TaxiShare shall not be liable for any loss or damage arising as a result of:
  A false, misleading, inaccurate or incomplete information being provided by a Member;
  The cancellation of a Trip by a Car Owner or Co-Traveler;
Any failure to make payment of a Cost Contribution (for the free service without booking);
Any fraud, fraudulent misrepresentation or breach of duty or breach of any of these Conditions by a Car Owner or Co-Traveler before, during or after a Trip.</p><br><br>
		<div class="contentheading">4. GENERAL TERMS</div>
		<div class="contentsubheading">4.1 Relationship</div>
		<p class="maincontent">No arrangement between the Members and TaxiShare shall constitute or be deemed to constitute an agency, partnership, joint venture or the like between the Members and TaxiShare.</p><br><br>
		<div class="contentsubheading">4.2 Suspension or Withdrawal of Site Access</div>
		<p class="maincontent">In the event of non-compliance on your part with all or some of the Conditions, you acknowledge and accept that TaxiShare can at any time, without prior notification, interrupt or suspend, temporarily or permanently, all or part of the service or your access to the Site (including in particular your User Account).</p><br><br>
		<div class="contentsubheading">4.3 Intellectual Property</div>
		<p class="maincontent">The format and content included on the Site, such as text, graphics, logos, button icons, images, audio clips, digital downloads, data compilations, and software, is the property of TaxiShare, its affiliates or its content suppliers and is protected by India and international copyright, authors' rights and database right laws.<br><br>
All rights are reserved in relation to any registered and unregistered trademarks (whether owned or licensed to TaxiShare) which appear on the Site.<br><br>
The Site or any portion of the Site may not be reproduced, duplicated, copied, sold, resold, visited, or otherwise exploited for any commercial purpose without the express written consent of TaxiShare. No person is entitled to systematically extract and/or re-utilise parts of the contents of the Site without the express written consent of TaxiShare. In particular, the use of data mining, robots, or similar data gathering and extraction tools to extract (whether once or many times) for re-utilisation of any substantial parts of this Site is strictly prohibited.
</p><br><br>
		<div class="contentsubheading">4.4 Content of the Site Provided by the Members</div>
		<p class="maincontent">By displaying content on this Site, Members expressly grant a license to TaxiShare to display the content and to use it for any of our other business purposes.<br><br>
Members of this Site are expressly asked not to publish any defamatory, misleading or offensive content or any content which infringes any other persons intellectual property rights (e.g. copyright). Any such content which is contrary to TaxiShare’s policy and TaxiShare does not accept liability in respect of such content, and the Member responsible will be personally liable for any damages or other liability arising and agrees to indemnify TaxiShare in relation to any liability it may suffer as a result of any such content. However as soon as TaxiShare becomes aware of infringing content, TaxiShare shall do everything it can to remove such content from the Site as soon as possible.</p><br><br>
	<div id="foot">
		<br><br><p id="fom">Find Out More</p><br>
		<a id="a1" href="howitworks.php">How It Works</a><br><br>
		<a id="a2" href="faq.php">Frequently Asked Questions</a><br><br>
		<a id="a3" href="tandc.php">Terms & Conditions</a>
	</div>
</body>
</html>

