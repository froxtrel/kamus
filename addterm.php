<?php 

require'controller.php';

$db = Database::getInstance();
$mysqli = $db->getConnection(); 
// $sql_query = "SELECT * FROM words";
// $result = $mysqli->query($sql_query);
require 'header.php';

?>

<div class="container"> 
<br>

<?php include'search.php';?>

<div class="row">

	<div class="col s12 m4">
		
	</div>

	<div class="col s12 m8">
		<h3>Add a New Dictionary Term</h3>

		Help us build the largest Malay - Bahasa Dusun - Malay dictionary on the web!
		<br>
		Please fill in the form below:
		<br>
		<div class="row">
	    <form class="col s12">

	      <div class="row">
	        <div class="input-field col s12">
	          <input id="mterm" type="text" class="validate">
	          <label for="mterm">MALAY TERM</label>
	        </div>
	      </div>

	      <div class="row">
	        <div class="input-field col s12">
	          <input id="dterm" type="email" class="validate">
	          <label for="dterm">DUSUN TERM</label>
	        </div>
	      </div>

	      <div class="row">
	        <div class="input-field col s12">
	          <input class="waves-effect waves-light btn" type="submit" value="SUBMIT">
	        </div>
	      </div>

	    </form>
	  </div>

	</div>

</div>

</div>

<?php require 'footer.php';?>