


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://use.fontawesome.com/8f2d22fdf5.js"></script>
<link href="styles/home.css" rel="stylesheet">

<?php 
  $url = "http://statici.behindthevoiceactors.com/behindthevoiceactors/_img/chars/tracer-overwatch-62.5.jpg";
  session_start();
  $call_sign = $_SESSION['cs'];
  $link = mysqli_connect("localhost","dcaligiuri","","social");
  if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $servername = "localhost";
  $username = "dcaligiuri";
  $password = "";
  $dbname = "social";

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "SELECT id, cs, name, age, height, occupation, boo, affliation, pic FROM users WHERE cs='$call_sign'";
  $result = mysqli_query($conn, $sql);
  
  
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $pro_pic = $row["pic"];
        $call_sign = $row["cs"];
        $name = $row["name"];
        $age = $row["age"]; 
        $height = $row["height"]; 
        $occupation = $row["occupation"];
        $boo = $row["boo"]; 
        $affliation = $row["affliation"];
    }
    
} else {
    echo "0 results";
}

mysqli_close($conn);

    
?>

<html>
  
  <head>
    <title><?php echo $call_sign; ?></title>
  </head>
  
    <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6"><form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" id="search-bar" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default" id="magnifying-glass"><span class="glyphicon glyphicon-search"></span></button>
  </form>
  </div>
   
  <div class="col-md-3">
    <img id="corner-pic" src="<?php echo $pro_pic; ?>" alt="Smiley face" height="42" width="42" class="pull-right">
    <button id="upload" class="btn btn-default pull-right">Upload</button>
        </div>
  </div> 

    </div>
  </div>
</nav>



<body>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 stuff">
              <img class="pull-left" id="pro-pic" src="<?php echo $pro_pic; ?>" width="200" height="200"</img>
              <h1 id="call-sign" class="pull-left"><?php echo $call_sign; ?></h1>
              <a href="home.php"><button type="button" class="btn btn-secondary btn-custom">About</button></a>
              <a href="friends.php"><button type="button" class="btn btn-secondary btn-custom">Friends</button></a>
              <button type="button" class="btn btn-secondary btn-custom">Photos</button>
              <button type="button" class="btn btn-secondary btn-custom">More</button>
        </div> 
        <div class="col-md-1"><h5>.</h5></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 stuff">

        </div>
    </div>
    
    
   
</body>

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 profile-stats">
          <?php 
            echo "<h2>Call Sign : $call_sign</h2>";
            echo "<h2>Real Name : $name</h2>";
            echo "<h2>Age : $age</h2>";
            echo "<h2>Height : $height</h2>";
            echo "<h2>Affiliation : $affliation</h2>";
            echo "<h2>Occupation : $occupation</h2>";
            echo "<h2>Base Of Operations : $boo</h2>";
          ?>
          </div>
        </div> 
        <div class="col-md-1"><h5>.</h5></div>
    </div>


  <?php
    echo "Want to log out?";
    echo "<a href='index.html'><button type='button' class='btn btn-secondary'>Logout</button></a>";
  ?>


</html>


