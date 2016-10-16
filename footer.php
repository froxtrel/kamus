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
  
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
         
  <script type="text/javascript">
    
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