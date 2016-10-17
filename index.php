<?php 

include('controller.php');
$db = new Database();
$db->connect();
require 'header.php';

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
              <span class="red-text card-title"><b class="chewy">Welcome to Kamus Dusun Project</b></span>
              <p class="black-text">Dedicated entirely to the Bahasa Dusun language ,Kamus Dusun Project provided instant translations to thousands of words, featuring dictionary definitions in Malay from user submitted terms.</p>
            </div>
            <div class="card-action">
              <p>We need you!
              Help us make Kamus Dusun Project the largest human-edited Dusun-Malay dictionary on the web!</p>
              <br>
              <span class="red-text"><b>Disclaimer. We can not guarantee that the information on this page is 100% correct.</b></span> 
            </div>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="col s12 m4">

           <div class="card darken-1 borderz">
            <div class="black-text card-content white-text">
              <span class="black-text card-title"><b class="red-text chewy">FRESH</b> | <small class="red-text chewy"> random terms </small> </span>
             <table>
             
             <?php 

                    $db->select('words','*',null,'status = "0"','rand() ',5); // Table name, Column Names, WHERE conditions, ORDER BY conditions
                    $latest_result = $db->getResult();     
                    $latest_row = $db->numRows($latest_result);        
                    
                    if ($latest_row > 0) {

                    foreach ($latest_result as $key => $latest) {
                      
                    echo "<tr>
                            <td class='center'><a class='black-text 'href='./dusun.php?id=".$latest["id"]."'> <i class='material-icons'>add</i>".$latest["dusun"]."</a></td>
                            <td class='center'><a class='light-green-text' href='./malay.php?id=".$latest["id"]."'> <i class='material-icons'>add</i>".$latest["malay"]."</a></td>
                          </tr>";
                    }

                    echo "</table>";

                    } else {

                    echo "0 results";

                    }
                    

              ?>

             </table>
      
            </div>
          </div>

          <div class="card darken-1 borderz">
            <div class="black-text card-content white-text">
              <span class="black-text card-title"><b class="red-text chewy">THANKS</b> | <small class="red-text chewy"> Top user </small> </span>
             <table>

             <tr>
                <td class='center black-text'>USERNAME</td>
                <td class='center black-text'>TERM SUBMITTED</td>
              </tr>
             
             <?php 


                    $db->sql('SELECT count(*) as count, added_by from words group by added_by order by count(*) DESC LIMIT 10');
                    $res = $db->getResult();
                    foreach($res as $output){


                        echo "<tr>
                            <td class='center'><a class='black-text 'href='./user.php?id=".$output["added_by"]."'> <i class='material-icons'>grade</i>".$output["added_by"]."</a></td>
                            <td class='center'><a class='orange-text' href='#'><span class='new badge'>".$output["count"]."</span></a></td>
                          </tr>";
                    }                                        

              ?>

             </table>
      
            </div>
          </div>

          

        </div>


        <div class="col s12 m8">
           <div class="card z-depth-2 borderz">
            <div class="card-content white-text">

            <?php     


                      $db->select('words','*',null,'status = "0"','RAND()',1); // Table name, Column Names, WHERE conditions, ORDER BY conditions
                      $random_result = $db->getResult();     
                      $random_row = $db->numRows($random_result);        
                      
                      if ($random_row > 0) {

                      foreach ($random_result as $key => $random) {

                      $time = strtotime($random['date_added']);
                        
                      echo
                      '
                      <span class="black-text card-title"><h3><a class="chewy" href="./dusun.php?id='.$random['id'].'">'.$random['dusun'].'</a></h3></span>
                      <div class="preview grey lighten-4 black-text">
                      <p><a class="black-text chewy" href="./malay.php?id='.$random['id'].'"><i class="tiny material-icons">play_arrow</i>'.$random['malay'].'</a></p>
                      <br>
                      <!--<small>ADDED BY : '.$random['added_by'].'</small>-->
                      <br>
                      <small>ADDED : '.$db->humanTiming($time).' ago</small>'
                      ;
                      }

                      echo "</table>";

                      } else {

                      echo "0 results";

                      }

              ?>

              </div>
            </div>
             <div class="card-action">
                <a href="#" class="waves-effect waves-light btn">FIX IT</a>
                <a href="#" class="waves-effect waves-light btn">DELETE IT</a>
              </div>
          </div>

          <br>

          <div class="card z-depth-2 borderz">
            <div class="card-content black-text">
              <span class="card-title black-text chewy">More dictionary terms:</span>
              <div class="row">
                <div class="col s6">
                  <table class="responsive-table">
                     <?php 


                      $db->select('words','*',null,'status = "0"','RAND()',10); // Table name, Column Names, WHERE conditions, ORDER BY conditions
                      $otherd_result = $db->getResult();     
                      $otherd_row = $db->numRows($otherd_result);        
                      
                      if ($otherd_row > 0) {

                      foreach ($otherd_result as $key => $otherd) {
                        
                     echo "<tr>
                              <td class='black-text center'><a class='black-text' href='./dusun.php?id=".$otherd["id"]."'>".$otherd["dusun"]."</a></td>
                              <td class='light-green-text center'><a href='./malay.php?id=".$otherd["id"]."'>".$otherd["malay"]."</a></td>
                            </tr>";
                      }

                      echo "</table>";

                      } else {

                      echo "0 results";

                      }
                                   

                    ?>
                   </table>
                </div>

                <div class="col s6">
                  <table class="responsive-table">
                    <?php 

                      $db->select('words','*',null,'status = "0"','RAND()',10); // Table name, Column Names, WHERE conditions, ORDER BY conditions
                      $otherm_result = $db->getResult();     
                      $otherm_row = $db->numRows($otherm_result);        
                      
                      if ($otherm_row > 0) {

                      foreach ($otherm_result as $key => $otherm) {
                        
                      echo "<tr>
                              <td class='light-green-text center'><a class='black-text' href='./malay.php?id=".$otherm["id"]."'>".$otherm["malay"]."</a></td>
                              <td class='black-text center'><a href='./dusun.php?id=".$otherm["id"]."'>".$otherm["dusun"]."</a></td>                             
                            </tr>";
                      }

                      echo "</table>";

                      } else {

                      echo "0 results";

                      }

                    ?>
                   </table>
                </div>


              </div>
            </div>
          </div>

          <br>

          <div class="card z-depth-2 borderz">
            <div class="card-content grey-text">
              <span class="card-title chewy ">Did you know?</span>
              <p>The majority of the Kadazandusuns are Christians, mainly Roman Catholic and some Protestants.Islam is also practised by a growing minority.</p>
            </div>
          </div>

          <br>

           <div class="card z-depth-2 borderz">
            <div class="card-content white-text">
              <span class="black-text card-title chewy"><small>Share your thoughts:</small></span>

              <div class="fb-comments" data-href="http://localhost/kamus/?#!" data-numposts="5"></div>
            
            </div>       
          </div>

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