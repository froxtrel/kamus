<?php
		
include('controller.php');
$db = new Database();
$db->connect();


		if(isset($_POST['smalay'])){

			$name = $_POST['smalay'];

			$db->select('words','id',null,'malay ="'.$name.'"',null,1); // Table name, Column Names, WHERE conditions, ORDER BY conditions

            $result = $db->getResult();     
            $row    = $db->numRows($result);      
            $id     = $result[0]['id'];

            if($row > 0 ) {

			$db = new Database();
		    $db->connect();
		    require 'header.php';

			$db->select('words','*',null,'id='.$id.'',null,null); // Table name, Column Names, WHERE conditions, ORDER BY conditions

            $result = $db->getResult();     
            $row = $db->numRows($result);        
                    
            if ($row > 0) {

            foreach ($result as $key => $row) {
                      
            $dusun = $row['dusun'];
            $malay = $row['malay'];

            }                

            } else {

            header("Location:./404.php?id=".$name."");

            }

            }else{

            header("Location:./404.php?id=".$name."");


            }

            }
                
?>

<?php require 'geturl.php' ?>

<div class="container"> 
<br>

<?php include'search.php';?>

<br>

	<div class="row">
		<div class="col s12 m4">
			<br>
          <div class="row">

            <div class="col s6">
                <a class="waves-effect waves-light btn modal-trigger" href="./addterm.php">ADD TERMS</a>
            </div>

            <div class="col s6">
                <a class="waves-effect waves-light btn modal-trigger" href="#idea">GIVE IDEA</a>
            </div>

          </div>
         
         <div class="fb-page" data-href="https://www.facebook.com/kdProject2016/" data-tabs="timeline" data-height="260" data-small-header="false" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/kdProject2016/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/kdProject2016/">Dusun Dictionary Project</a></blockquote></div>

         <br><br>

         Nearby & related entries:<br><br>

         <?php

         	$card =  strtolower($malay[0]).'%';

         	$db->select('words','*',null,"malay LIKE '".$card."'",null,10); // Table name, Column Names, WHERE conditions, ORDER BY conditions

            $latest = $db->getResult();     
            $l_row = $db->numRows($latest);        
                    
            if ($l_row > 0) {

            foreach ($latest as $key => $related) {
                      
            echo "<small><a class='red-text' href='./malay.php?id=".$related["id"]."'>".$related["malay"]."</a></small><br>";

            }                

            } else {

            echo 'No match';

            }    	

         ?>

		</div>
		<div class="col s12 m6">

			
	          <div class="card">
	            <div class="card-content black-text">
	              <span class="blue-text card-title"><b class="chewy"><?php echo strtoupper($malay);?></b></span>
	              <p class="preview chewy"><?php echo strtoupper($dusun);?></p>
	            </div>
	            <div class="card-action">
	              
	            	<div class="fb-like" data-href="<?php  echo $absolute_url;?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

	            </div>
	          </div>

	          <br>

	           <div class="card">
	            <div class="card-content black-text">
	              <span class="red-text card-title"><b>We need you!</b></span>
	              <p>Is <b>'<?php echo strtolower($malay);?>'</b>' wrong or has spelling mistakes?</p>
	            </div>
	            <div class="card-action">
	              <a href="#" class="waves-effect waves-light btn">FIX IT</a>
	              <a href="#" class="waves-effect waves-light btn">DELETE IT</a>
	            </div>
	          </div>

	          <br>
	          Discuss this bahasa melayu <b>'<?php echo strtolower($malay);?>'</b>' translation with the community:

	          <br>



			  <div class="fb-comments" data-href="<?php  echo $absolute_url;?>" data-numposts="5"></div>


	          <br>
	       

		</div>

		<div class="col s12 m2">
		<!-- extra slot -->
		</div>

	</div>
</div>

<br><br>
<?php require'footer.php';?>