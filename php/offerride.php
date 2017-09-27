<html>
<head>
    <title>Offer a ride!</title>
    <link rel="stylesheet" type="text/css" href="css/fixedbar.css">
    <link rel="stylesheet" type="text/css" href="css/offerride.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
      @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
	#foot{
		top:900px;
	}
    </style>
</head>
<body bgcolor="black">
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
	<form id="msform" onsubmit="return isvalidated();" action="offerride_successful.php" method="post">
	<!-- progressbar -->
		<ul id="progressbar">
			<li class="active">My Schedule</li>
			<li>Price</li>
		</ul>
		<!-- fieldsets -->
		<fieldset>
			<h2 class="fs-title">Provide your schedule information</h2>
			<h3 class="fs-subtitle">This is step 1</h3>
			<p id="headerror1"></p>
			<input type="text" id="depart" onblur="checkdep()" name="depart" placeholder="Departure" />
			<br><span class="errors" id="departerror"></span><br>
			<input type="text" onblur="checkarriv()" id="arrival" name="arrival" placeholder="Arrival" />
			<br><span class="errors" id="arrivalerror"></span><br>
			<div class="container">
			    <div class="row">
				<input type="hidden" id="count" name="count" value="1" />
        			<div class="control-group" id="fields">
           			    <label class="control-label" for="field1"></label>
           			    <div class="controls" id="profs"> 
                			<div id="field">
					    <input autocomplete="off" class="input" id="field1" name="field1" type="text" placeholder="Stopover point" data-items="8"/><button id="b1" class="btn add-more" type="button""></button>
					</div>
            			    </div>
        			</div>
			    </div>
			</div>
			<div id="container">
			      <p>
				<a href="#" id="trigger">What is this ?</a>
			      </p>
			      <div id="pop-up">
				<h3>Stopover Points</h3>
				<p>
				<br>Stopover points are urban centres that you will or can pass through on your way to your final destination.<br>
				</p>
			      </div>
			</div>			
			<br><span class="errors" id="stopovererror"></span><br>
			<input type="text" onblur="checkdateforride()" id="dateforride" name="dateforride" placeholder="DD/MM/YY" />
			<br><span class="errors" id="dateforrideerror"></span><br>
			<input type="text" onblur="checktimeofride()" id="timeofride" name="timeofride" placeholder="HH:MM" />
			<span class="errors" id="timeofrideerror"></span><br>
			<br><input type="button" name="next" class="next action-button" value="Next" />
		</fieldset>
		<fieldset>
			<h2 class="fs-title">Provide your price tag</h2>
			<h3 class="fs-subtitle">Final step</h3>
			<p id="headerror2"></p>
			<p id="pricetag">Price per co-traveller : <br></p>
			<span id="destarriv" ></span><input type="number" onblur="updatefield(this.id,this.value)" id="destarrivprice" name="destarrivprice" value="300" />
			<br><span class="errors" id="destarrivpriceerror"></span><br>
			<br><br><input type="text" onblur="checkcarname()" id="carname" name="carname" placeholder="Car name" />
			<br><span class="errors" id="carnameerror"></span><br>
			<input type="number" onblur="checknumofseats()" id="numofseats" name="numofseats" placeholder="Number of seats offered" />
			<br><span class="errors" id="numofseatserror"></span><br>
			<span id="luggagemess">Maximum luggage size : </span>
			<select id="luggage" name="luggage">
				<option value="small">Small</option>
				<option value="medium" selected="selected">Medium</option>
				<option value="big">Big</option>
			</select>
			<br><span id="timewindowmess">Will leave : </span>
			<select id="timewindow" name="timewindow">
				<option value="0" selected="selected">Right on time</option>
				<option value="15">In a 15 minute window</option>
				<option value="30">In a 30 minute window</option>
				<option value="1">In a 1 hour window</option>
				<option value="2">In a 2 hour window</option>
			</select>
			<br><span id="detourmess">Can make a detour of : </span>
			<select id="detour" name="detour">
				<option value="0">Not willing</option>
				<option value="15" selected="selected">15 minute max.</option>
				<option value="30">30 minute max.</option>
				<option value="1">Anything is fine</option>
			</select>
			<br><br><input id="tandccheck" type="checkbox" name="tandc" value="tandc"><span id="tandc">  I have read and accept the T&Cs</span><br>
			<br><span class="errors" id="tandcerror"></span>
			<input type="hidden" id="fcount" name="fcount" value="" />
			<input type="submit" name="submit" class="submit action-button" value="Submit" />
		</fieldset>
	</form>
    </div>
	<div id="foot">
		<br><br><p id="fom">Find Out More</p><br>
		<a id="a1" href="howitworksLIN.php">How It Works</a><br><br>
		<a id="a2" href="faqLIN.php">Frequently Asked Questions</a><br><br>
		<a id="a3" href="tandcLIN.php">Terms & Conditions</a>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/fixedbar.js"></script>
<script>
function checkdep(){
	var x=document.getElementById("depart").value;
	if(x.localeCompare("")==0){
		document.getElementById("departerror").innerHTML="Enter departure city";
	}else{
		document.getElementById("departerror").innerHTML="";
	}
}
function checkarriv(){
	var x=document.getElementById("arrival").value;
	if(x.localeCompare("")==0){
		document.getElementById("arrivalerror").innerHTML="Enter arrival city";
	}else{
		document.getElementById("arrivalerror").innerHTML="";
	}
}	
function checkdateforride(){
	var x=document.getElementById("dateforride").value;
	if(x.length==8){
		var isday = /^\d+$/.test(x.substring(0,2));
		var ismonth = /^\d+$/.test(x.substring(3,5));
		var isyear = /^\d+$/.test(x.substring(7,9));
		if(isday&&ismonth&&isyear){
			var day = parseInt(x.substring(0, 2),10);
			var sign1 = x.substring(2,3);
			var sign2 = x.substring(5,6);
			var month   = parseInt(x.substring(3, 5),10);
			var year  = parseInt(x.substring(7, 9),10);
			if(!(day<=31&&sign1.localeCompare("/")==0&&month<=12&&sign2.localeCompare("/")==0&&year<=99)){
				document.getElementById("dateforrideerror").innerHTML="Enter a valid date";
			}else{
				document.getElementById("dateforrideerror").innerHTML="";
			}
		}else{
			document.getElementById("dateforrideerror").innerHTML="Enter a valid date";
		}
	}
	else{
		document.getElementById("dateforrideerror").innerHTML="Enter a valid date";
	}
}
function checktimeofride(){
	var x=document.getElementById("timeofride").value;
	if(x.length==5){
		var ishour = /^\d+$/.test(x.substring(0,2));
		var isminute = /^\d+$/.test(x.substring(3,5));
		if(ishour&&isminute){
			var hour = parseInt(x.substring(0, 2),10);
			var sign = x.substring(2,3);
			var minute  = parseInt(x.substring(3, 5),10);
			if(!(hour<=23&&sign.localeCompare(":")==0&&minute<=59)){
				document.getElementById("timeofrideerror").innerHTML="Enter a valid time";
			}else{
				document.getElementById("timeofrideerror").innerHTML="";
			}
		}else{
			document.getElementById("timeofrideerror").innerHTML="Enter a valid time";
		}
	}
	else{
		document.getElementById("timeofrideerror").innerHTML="Enter a valid time";
	}
}
function checkcarname(){
	var x=document.getElementById("carname").value;
	if(x.localeCompare("")==0){
		document.getElementById("carnameerror").innerHTML="Enter car name";
	}else{
		document.getElementById("carnameerror").innerHTML="";
	}
}
function checknumofseats(){
	var x=document.getElementById("numofseats").value;
	if(x.localeCompare("0")==0||x.localeCompare("")==0){
		document.getElementById("numofseatserror").innerHTML="Enter number of seats offered";
	}else{
		document.getElementById("numofseatserror").innerHTML="";
	}
}
function updatefield(inputid,inputvalue){
	var str=inputid;
	if(str.localeCompare("destarrivprice")==0)
		str="arrival";
	else
		str="field"+str.substring(11,13);
	var x=document.getElementById(str).value;
	var n=x.indexOf(":");
	x=x.substring(0,n+1);
	document.getElementById(str).value=x+inputvalue;
}
function isvalidated(){
	var x=document.getElementById("carname").value;
	var y=document.getElementById("numofseats").value;
	var a=document.getElementById("carnameerror").innerHTML;
	var b=document.getElementById("numofseatserror").innerHTML;
	var z=document.getElementById("tandccheck").checked;
	if(x.localeCompare("")!=0&&y.localeCompare("")!=0&&a.localeCompare("")==0&&b.localeCompare("")==0&&z){
		return true;
	}else{
		document.getElementById("headerror2").innerHTML="Complete the form properly";
		return false;
	}
}
function whatspagesize(){
	
	document.getElementById("departerror").innerHTML=document.getElementById("timeofrideerror").offsetTop;
	
}
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" placeholder="Stopover point" class="input form-control" id="field' + next + '" name="field' + next + '" type="text">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me""></button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
	var myfoot=document.getElementById("foot");
	myfoot.style.position="absolute";
	var ht=document.getElementById("timeofrideerror").offsetTop+550;
	myfoot.style.top=ht+"px";
    });
    

    
});
$(document).on("click",".next",function(){
	var err1=document.getElementById("departerror").innerHTML;
	var err2=document.getElementById("arrivalerror").innerHTML;
	var err3=document.getElementById("dateforrideerror").innerHTML;
	var err4=document.getElementById("timeofrideerror").innerHTML;
	var form1=document.getElementById("depart").value;
	var form2=document.getElementById("arrival").value;
	var form3=document.getElementById("dateforride").value;
	var form4=document.getElementById("timeofride").value;
	if(err1.localeCompare("")==0&&err2.localeCompare("")==0&&err3.localeCompare("")==0&&err4.localeCompare("")==0&&form1.localeCompare("")!=0&&form2.localeCompare("")!=0&&form3.localeCompare("")!=0&&form4.localeCompare("")!=0){
		document.getElementById("departerror").innerHTML="dfsgdfb";
		document.getElementById("destarriv").innerHTML="<br><br><br>"+form1+" to "+form2+" : ";
		document.getElementById("arrival").value=document.getElementById("arrival").value+":"+"300";
		var ct=document.getElementById("count").value;
		var i;
		var temp=0;
		var spfield;
		var spfieldvalue;
		for(i=1;i<=ct;i++){
			spfield=document.getElementById("field"+i);
			if(spfield&&document.getElementById("field"+i).value.localeCompare("")!=0){
				document.getElementById("fcount").value=document.getElementById("fcount").value.concat(i,",");
				temp++;
				var newitem1=$('#destarriv').clone().attr('id','destsp'+i);
				var newitem2=$('#destarrivprice').clone().attr('id','destspprice'+i);
				var newitem3=$('#destarrivpriceerror').clone().attr('id','destsppriceerror'+i);
				$('#pricetag').append(newitem1);
				$('#pricetag').append(newitem2);
				$('#pricetag').append(newitem3);
				document.getElementById("destsp"+i).innerHTML="<br><br><br>"+form1+" to "+document.getElementById("field"+i).value+" : ";
				document.getElementById("field"+i).value=document.getElementById("field"+i).value+":"+document.getElementById("destspprice"+i).value;
			}
		}
		
		if(animating) return false;
		animating = true;
	
		current_fs = $(this).parent();
		next_fs = $(this).parent().next();
	
		//activate next step on progressbar using the index of next_fs
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
		//show the next fieldset
		next_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'transform': 'scale('+scale+')'});
				next_fs.css({'left': left, 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	}else{
		document.getElementById("headerror1").innerHTML="Fill the credentials properly";
	}
		
	
});
  $(function() {
        var moveLeft = -80;
        var moveDown = -120;
        
        $('a#trigger').hover(function(e) {
          $('div#pop-up').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up').hide();
        });
        
        $('a#trigger').mousemove(function(e) {
          $("div#pop-up").css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
        
      });
</script>
</html>
