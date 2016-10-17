<?php 

session_start();

include('controller.php');
$db = new Database();
$db->connect();
require 'header.php';

$GLOBALS['ERROR'] = NULL;
$GLOBALS['SUCCESS'] = NULL;


if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"]){

	$date = date('Y-m-d');
	$d = $_POST['dterm'];
	$m = $_POST['mterm'];
	$n = $_POST['name'];

	$dusun = $db->escapeString($d); 
	$malay = $db->escapeString($m); 
	$name  = $db->escapeString($n); 

	$mail = new automail;

	$data = array('dusun'=>strtoupper($dusun),'malay'=>strtoupper($malay),'added_by'=> strtoupper($name),'date_added' => $date,'status' => '1');
	$mail->sendMail($data);

	$db->insert('words',array('dusun'=>strtoupper($dusun),'malay'=>strtoupper($malay),'added_by'=> strtoupper($name),'date_added' => $date,'status' => '1'));  // Table name, column names and respective values
	$res = $db->getResult();  

	if(!empty($res)) {


	$GLOBALS['SUCCESS'] = "Success:Thanks,Your term will be send for review";

	} 

	}else{

	$GLOBALS['ERROR'] = "Error:<br>Wrong captcha";

	session_destroy();
}
?>

<div class="container"> 
<br>

<?php include'search.php';?>

<div class="row">

	<div class="col s12 m4">

	<br>

	<?php

		if($GLOBALS['SUCCESS'] != null){ ?>

			<span class="green-text"><b><?php echo $GLOBALS['SUCCESS'] ;?></b></span>

		<?php}else{?>

			<span class="red-text"><b><?php echo $GLOBALS['ERROR'] ;?></b></span>

		<?php }?>
	
	
	<br>
		
	</div>

	<div class="col s12 m6">
	<br>
	
		<h3 class="chewy">Add a New Term</h3>

		<b class="red-text">Help us build the largest Malay - Bahasa Dusun - Malay dictionary on the web</b>!
		<br>
		<b>Please fill in the form below:</b>
		<br>
		<div class="row">
	    <form class="col s12" method="POST" action="#">

	      <div class="row">
	        <div class="input-field col s12">
	          <input name="mterm" id="mterm" type="text" required>
	          <label for="mterm">MALAY TERM</label>
	        </div>
	      </div>

	      <div class="row">
	        <div class="input-field col s12">
	          <input name="dterm" id="dterm" type="text" required>
	          <label for="dterm">DUSUN TERM</label>
	        </div>
	      </div>

	       <div class="row">
	        <div class="input-field col s12">
	          <input name="name" id="name" type="text" required>
	          <label for="name">YOUR NAME</label>
	        </div>
	      </div>

	        <div class="row">
	        <div class="input-field col s12">
				<input name="captcha" type="text" id="captcha">
				<img src="captcha.php" /><br>
				<label for="captcha">ENTER IMAGE TEXT</label>
	          
	        </div>
	      </div>


	      <div class="row">
	        <div class="input-field col s12">
	          <input name="submit" class="waves-effect waves-light btn" type="submit" value="SUBMIT">
	        </div>
	      </div>

	    </form>
	  </div>

	</div>

	<div class="col s12 m2">
		<!-- extra slot -->
	</div>

</div>

</div>

<?php require 'footer.php';?>