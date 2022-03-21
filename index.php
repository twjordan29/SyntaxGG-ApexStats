<?php 
session_unset();
  if(isset($_POST['search'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['platform'] = $_POST['platform'];

    header("location: view");
  }
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/main.css?v=1" rel="stylesheet" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8526857356487258"
     crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="s01">
      <form action="view.php" method="GET">
        <fieldset>
          <center><legend>Search Legend Stats</legend></center>
        </fieldset>
        <div class="inner-form">
          <div class="input-field first-wrap">
            <input id="username" type="text" name="username" placeholder="Enter the username" />
          </div>
          <div class="input-field second-wrap">
            <select name="platform">
              <option value="PC">PC</option>
              <option value="X1">Xbox</option>
              <option value="PS4">PlayStation</option>
            </select>
          </div>
          <div class="input-field third-wrap">
            <input class="btn-search" type="submit" name="search" value="Search">
          </div>
        </div>
      </form>
    </div>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
