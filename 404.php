<?php 

include('controller.php');
$db = new Database();
$db->connect();
require 'header.php';

$id = $db->escapeString($_GET['id']);


?>

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

          
        </div>

        <div class="col s12 m8">
          <div class="preview card grey lighten-4">
            <div class="card-content white-text">
              <span class="red-text card-title"><b class="chewy">We couldn't find any results for your search term.</b></span>
              <p class="black-text">Maybe you were looking for one of these terms?</p>
              <?php

                $id =  strtolower($id[0]).'%';
                $db->select('words','*',null,"malay LIKE '".$id."'",null,10); // Table name, Column Names, WHERE conditions, ORDER BY conditions
                $res = $db->getResult();
                
                foreach ($res as $output) {
                  
                  echo "<a class='red-text' href='./malay.php?id=".$output["id"]."'>".$output['malay']."</a>  :";
                }


              ?>
              <br>
              <p class="black-text">or click add term button.</p>
            </div>
            <div class="card-action">
             
            </div>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="col s12 m4">

          

                

        </div>


          <br>

        </div>

      </div>

    </div>

  </div>

  <script type="text/javascript">

    $( document ).ready(function() {
       
      // Materialize.toast(message, displayLength, className, completeCallback);
      Materialize.toast('Click enter to submit search', 4000) // 4000 is the duration of the toast

    });
  
  </script>

  

  <?php require 'footer.php';?>