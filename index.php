<?php 

require'controller.php';

$db = Database::getInstance();
$mysqli = $db->getConnection(); 
// $sql_query = "SELECT * FROM words";
// $result = $mysqli->query($sql_query);


;?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Kamus Dusun Project</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=481185458719244";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"><img width="60px" src="images/kdp1.png"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Login</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Login</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="container">

  <br>

  <nav id="malay" style="display: none;">
    <div class="nav-wrapper">

<!-- MALAY SEARCH -->
      <form action="./malay.php" method="POST">
        <div class="input-field">
          <input id="search" type="search" required placeholder="Search for a terms..">
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>

<!-- DUSUN SEARCH -->
 <nav id="dusun">
    <div class="nav-wrapper">
    
      <form action="./dusun.php" method="POST">
        <div class="input-field">
          <input id="search" type="search" required placeholder="Search for a terms..">
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>

  <form>
    <p>
    <input name="group1" type="radio" id="DM" checked="true" value="DM" />
    <label for="DM">Dusun » Malay</label>

    <input name="group1" type="radio" id="MD" value="MD" />
    <label for="MD">Malay » Dusun</label>

  </form>

  <br>
  <div class="row">

        <div class="col s12 m4">
        <br>
          <div class="row">

            <div class="col s6">
                <a class="waves-effect waves-light btn modal-trigger" href="#modal1">ADD TERMS</a>
            </div>

            <div class="col s6">
                <a class="waves-effect waves-light btn modal-trigger" href="#modal1">GIVE IDEA</a>
            </div>

          </div>
         
         <div class="fb-page" data-href="https://www.facebook.com/kdProject2016/" data-tabs="timeline" data-height="260" data-small-header="false" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/kdProject2016/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/kdProject2016/">Dusun Dictionary Project</a></blockquote></div>

          
        </div>

        <div class="col s12 m8">
          <div class="preview card grey lighten-4">
            <div class="card-content white-text">
              <span class="red-text card-title"><b>Welcome to Kamus Dusun Project</b></span>
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
              <span class="black-text card-title"><b class="red-text">FRESH</b> | <small class="red-text"> latest terms </small> </span>
             <table>
             
             <?php 

                $sql_query = "SELECT * FROM words WHERE status = '0' ORDER BY date_added DESC limit 5  ";
                $result = $mysqli->query($sql_query);

                if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {

                echo "<tr><td class='center'><a class='black-text 'href='./dusun.php?id=".$row["id"]."'>".$row["dusun"]."</a></td>
                          <td class='center'><a class='light-green-text' href='./malay.php?id=".$row["id"]."'>".$row["malay"]."</a></td></tr>";

                }

                echo "</table>";

                } else {

                echo "0 results";

                }
                             

              ?>

             </table>
      
            </div>
          </div>

          <!-- <div class="card darken-1 borderz">
            <div class="black-text card-content white-text">
              <span class="black-text card-title"><b class="red-text">THANKS</b> | <small class="red-text"> most active user </small> </span>
             <table>
               
              <?php 

                $sql_query = "SELECT * FROM words GROUP BY added_by ORDER BY RAND() DESC limit 5";
                $result = $mysqli->query($sql_query);

                if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {

                $add []= $row["added_by"];

                echo "<tr><td class='black-text center'>".$row["added_by"]."</td></tr>";

                }


                $total = "SELECT COUNT(*) as test FROM words WHERE added_by = '".$add[0]."'";
                $result_0 = $mysqli->query($total);

                while($rows_0 = $result_0->fetch_assoc()) {

                 echo "<tr><td class='black-text center'>".$rows_0['test']."</td></tr>";

                }


                echo "</table>";

                } else {

                echo "0 results";

                }
                
              

              ?>

             </table>
            </div>
          </div> -->

        </div>


        <div class="col s12 m8">
           <div class="card z-depth-2 borderz">
            <div class="card-content white-text">

            <?php 

                      $sql_query = "SELECT * FROM words  WHERE status = '0'  ORDER BY RAND() DESC limit 1";
                      $result = $mysqli->query($sql_query);

                      if ($result->num_rows > 0) {

                      while($row = $result->fetch_assoc()) {

                      $time = strtotime($row['date_added']);

                      function humanTiming ($time) {

                          $time = time() - $time; // to get the time since that moment
                          $time = ($time<1)? 1 : $time;
                          $tokens = array (
                              31536000 => 'year',
                              2592000 => 'month',
                              604800 => 'week',
                              86400 => 'day',
                              3600 => 'hour',
                              60 => 'minute',
                              1 => 'second'
                          );

                          foreach ($tokens as $unit => $text) {
                              if ($time < $unit) continue;
                              $numberOfUnits = floor($time / $unit);
                              return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
                          }

                      }

                      echo
                      '
                      <span class="black-text card-title"><h3><a href="./dusun.php?id='.$row['id'].'">'.$row['dusun'].'</a></h3></span>
                      <div class="preview grey lighten-4 black-text">
                      <p><a class="black-text" href="./malay.php?id='.$row['id'].'">'.$row['malay'].'</a></p>
                      <br>
                      <small>ADDED BY : '.$row['added_by'].'</small>
                      <br>
                      <small>ADDED : '.humanTiming($time).' ago</small>'
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
               <br>
            </div>
          </div>

          <br>

          <div class="card z-depth-2 borderz">
            <div class="card-content black-text">
              <span class="card-title black-text">More dictionary terms on Kamus.net:</span>
              <div class="row">
                <div class="col s6">
                  <table class="responsive-table">
                     <?php 

                      $sql_query = "SELECT * FROM words WHERE status = '0' ORDER BY RAND() DESC limit 5";
                      $result = $mysqli->query($sql_query);

                      if ($result->num_rows > 0) {

                      while($row = $result->fetch_assoc()) {

                      echo "<tr>
                              <td class='black-text center'><left><a class='black-text' href='./dusun.php?id=".$row["id"]."'>".$row["dusun"]."</a></left></td>
                              <td class='light-green-text center'><a href='./malay.php?id=".$row["id"]."'>".$row["malay"]."</a></td>
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

                      $sql_query = "SELECT * FROM words WHERE status = '0' ORDER BY RAND() DESC limit 5";
                      $result = $mysqli->query($sql_query);

                      if ($result->num_rows > 0) {

                      while($row = $result->fetch_assoc()) {

                      echo "<tr>
                              <td class='light-green-text center'><a class='black-text' href='./malay.php?id=".$row["id"]."'>".$row["malay"]."</a></td>
                              <td class='black-text center'><a href='./dusun.php?id=".$row["id"]."'>".$row["dusun"]."</a></td>                             
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
              <span class="card-title">Did you know?</span>
              <p>The majority of the Kadazandusuns are Christians, mainly Roman Catholic and some Protestants.Islam is also practised by a growing minority.</p>
            </div>
          </div>

          <br>

           <div class="card z-depth-2 borderz">
            <div class="card-content white-text">
              <span class="black-text card-title"><small>Share your thoughts:</small></span>

              <div class="fb-comments" data-href="http://localhost/kamus/?#!" data-numposts="5"></div>
            
            </div>       
          </div>

        </div>

      </div>

    </div>

  </div>

  <footer class="page-footer light-blue lighten-1">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text"><img src="images/kdp.png"></h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <!-- <h5 class="white-text">Settings</h5> -->
          <!-- <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul> -->
        </div>
        <div class="col l3 s12">
         <!--  <h5 class="white-text">Connect</h5> -->
         <!--  <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul> -->
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">KDP 2016</a>
      </div>
    </div>
  </footer>
 

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>

<!-- Modal Structure -->
  <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
          
  <script type="text/javascript">
    
    $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
    });

    // Materialize.toast(message, displayLength, className, completeCallback);
    Materialize.toast('Click enter to submit search', 4000) // 4000 is the duration of the toast
    
     $('input[type=radio][name=group1]').change(function() {

        if (this.value == 'DM') {
            
            $('#malay').toggle();
            $('#dusun').toggle();
        }
        else if (this.value == 'MD') {

            $('#malay').toggle();
            $('#dusun').toggle();
        }
    });

  </script>