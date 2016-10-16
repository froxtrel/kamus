<?php
		
		require'controller.php';
		require 'header.php';

		$id = @$_GET['id'];
		// echo $id;

		$db = Database::getInstance();
		$mysqli = $db->getConnection(); 

		$sql_query = "SELECT * FROM words WHERE id = $id";

		$result = $mysqli->query($sql_query);

		if($result->num_rows > 0 ){ 

		while($row = $result->fetch_assoc()) {

                $dusun = $row['dusun'];
                $malay = $row['malay'];
         }

     	 }else{

     	 	header("Location:./");

     	 }
                
?>

<div class="container"> 
<br><br>
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

         	$card =  strtolower($dusun[0]).'%';

         	$related = "SELECT * FROM words WHERE dusun LIKE '$card' LIMIT 8 ";

			$r_result = $mysqli->query($related);

			while($r_row = $r_result->fetch_assoc()) {

	                echo "<small><a class='red-text' href='./dusun.php?id=".$r_row["id"]."'>".$r_row["dusun"]."</a></small><br>";
	         }

         ?>

		</div>
		<div class="col s12 m8">

			
	          <div class="card">
	            <div class="card-content black-text">
	              <span class="black-text card-title"><b><?php echo strtoupper($dusun);?></b></span>
	              <p class="preview"><?php echo strtoupper($malay);?></p>
	            </div>
	          </div>

	          <br>

	           <div class="card">
	            <div class="card-content black-text">
	              <span class="red-text card-title"><b>We need you!</b></span>
	              <p>Is <b>'<?php echo strtolower($dusun);?>'</b>' wrong or has spelling mistakes?</p>
	            </div>
	            <div class="card-action">
	              <a href="#" class="waves-effect waves-light btn">FIX IT</a>
	              <a href="#" class="waves-effect waves-light btn">DELETE IT</a>
	            </div>
	          </div>

	          <br>
	          Discuss this bahasa dusun <b>'<?php echo strtolower($dusun);?>'</b>' translation with the community:

	          <br>


	          <?php  

				function url_origin( $s, $use_forwarded_host = false ) {
				    $ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
				    $sp       = strtolower( $s['SERVER_PROTOCOL'] );
				    $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
				    $port     = $s['SERVER_PORT'];
				    $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
				    $host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
				    $host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
				    return $protocol . '://' . $host;
				}

				function full_url( $s, $use_forwarded_host = false ) {
				    return url_origin( $s, $use_forwarded_host ) . $s['REQUEST_URI'];
				}

				$absolute_url = full_url( $_SERVER );


				?>

			  <div class="fb-comments" data-href="<?php  echo $absolute_url;?>" data-numposts="5"></div>


	          <br>
	       

		</div>
	</div>
</div>

<br><br>
<?php require'footer.php';?>

		