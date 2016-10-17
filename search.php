<nav id="malay" style="display: none;">
    <div class="nav-wrapper">

<!-- MALAY SEARCH -->
      <form action="./smalay.php" method="POST">
        <div class="input-field">
          <input name="smalay" id="search" type="search" required placeholder="Search for a terms..">
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>

<!-- DUSUN SEARCH -->
 <nav id="dusun">
    <div class="nav-wrapper">
    
      <form action="./sdusun.php" method="POST">
        <div class="input-field">
          <input name="sdusun" id="search" type="search" required placeholder="Search for a terms..">
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>

  <form>
    <p>
    <input name="group1" type="radio" id="DM" checked="true" value="DM" />
    <label for="DM" class="chewy">Dusun » Malay</label>

    <input name="group1" type="radio" id="MD" value="MD" />
    <label for="MD" class="chewy">Malay » Dusun</label>

  </form>