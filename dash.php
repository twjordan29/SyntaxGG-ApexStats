<?php
    if(isset($_GET['username']) && $_GET['platform']) {
        $username = $_GET['username'];
        $platform = $_GET['platform'];
    }
    $api = "e38vPHPzOxUzYFU9fJmG";
    $url = "https://api.mozambiquehe.re/bridge?version=5&platform=" . $platform . "&player=" . $username . "&auth=" . $api . "";
    $gd = file_get_contents($url);
    $dd = json_decode($gd, true);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modern Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css?v=10" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php include('inc/nav.php'); ?>
            <!-- Header-->
            <header class="py-5 apex-gradient">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2"><?php echo $dd['global']['name']; ?></h1>
                                <p class="lead fw-normal text-white mb-4">You're currently looking at the stats for <b><?php echo $dd['global']['name']; ?></b>. This player is currently <?php echo $dd['realtime']['currentState']; ?>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container my-5">
              <div class="row">
                <div class="col-sm-4">
                    <div class="card shadow-lg" id="myScrollspy">
                        <div class="card-apexheader"><center><b><?php echo $dd['global']['name']; ?> Stats</b></center></div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#"><img src="imgs/al.png" width="32" height="32" alt=""> <b>Overview</b></a>
                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#legend-stats"><img src="imgs/pubs.png" width="32" height="32" alt=""> <b>Legend Stats</b></a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!" id="rankedDiv"><img src="imgs/apex.png" width="32" height="32" alt=""> <b>Ranked Stats</b></a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!" id="rankedArenasDiv"><img src="imgs/apex.png" width="32" height="32" alt=""> <b>Ranked Arenas Stats</b></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="overviewDiv" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-apexheader"><center><b><?php echo $dd['global']['name']; ?> Overview</b></center></div>
                        <div class="card-body">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <td colspan="2">👉🏽 <b>UID</b></td>
                                  <td>👉🏽 <?php echo $dd['global']['uid']; ?></td>
                                </tr>
                                <tr>
                                  <td colspan="2">👉🏽 <b>Level</b></td>
                                  <td>👉🏽 <?php echo $dd['global']['level']; ?></td>
                                </tr>
                                <tr>
                                  <td colspan="2">👉🏽 <b>Platform</b></td>
                                  <td>👉🏽 <?php echo $dd['global']['platform']; ?></td>
                                </tr>
                                <tr>
                                  <td colspan="2">👉🏽 <b>Status</b></td>
                                  <td>👉🏽 <?php if($dd['realtime']['currentState'] == "offline") { 
                                        echo "<b style='color:red;'>Offline</b>";
                                      } else if($dd['realtime']['currentState'] == "online") {
                                        echo "<b style='color:green;'>Online</b>";
                                      }
                                         ?>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            
                            <hr>
                        </div>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">

                </div>
                <div id="legend-stats" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-apexheader"><center><b><?php echo $dd['global']['name']; ?> Legend Stats (Selected Legend Only)</b></center></div>
                        <div class="card-body">
                            <div class="accordion" id="accordionExample">
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                  <button class="accordion-button collapsed 
                                    <?php
                                      if($dd['realtime']['selectedLegend'] == "Bloodhound") {
                                        echo "a-bloodhound";
                                      } else if($dd['realtime']['selectedLegend'] == "Gibraltar") {
                                        echo "a-gibraltar";
                                      } else if($dd['realtime']['selectedLegend'] == "Lifeline") {
                                        echo "a-lifeline";
                                      } else if($dd['realtime']['selectedLegend'] == "Pathfinder") {
                                        echo "a-pathfinder";
                                      } else if($dd['realtime']['selectedLegend'] == "Wraith") {
                                        echo "a-wraith";
                                      } else if($dd['realtime']['selectedLegend'] == "Bangalore") {
                                        echo "a-bangalore";
                                      } else if($dd['realtime']['selectedLegend'] == "Caustic") {
                                        echo "a-caustic";
                                      } else if($dd['realtime']['selectedLegend'] == "Mirage") {
                                        echo "a-mirage";
                                      } else if($dd['realtime']['selectedLegend'] == "Octane") {
                                        echo "a-octane";
                                      } else if($dd['realtime']['selectedLegend'] == "Wattson") {
                                        echo "a-wattson";
                                      } else if($dd['realtime']['selectedLegend'] == "Crypto") {
                                        echo "a-crypto";
                                      } else if($dd['realtime']['selectedLegend'] == "Revenant") {
                                        echo "a-revenant";
                                      } else if($dd['realtime']['selectedLegend'] == "Loba") {
                                        echo "a-loba";
                                      } else if($dd['realtime']['selectedLegend'] == "Rampart") {
                                        echo "a-rampart";
                                      } else if($dd['realtime']['selectedLegend'] == "Horizon") {
                                        echo "a-horizon";
                                      } else if($dd['realtime']['selectedLegend'] == "Fuse") {
                                        echo "a-fuse";
                                      } else if($dd['realtime']['selectedLegend'] == "Valkyrie") {
                                        echo "a-valkyrie";
                                      } else if($dd['realtime']['selectedLegend'] == "Seer") {
                                        echo "a-seer";
                                      } else if($dd['realtime']['selectedLegend'] == "Ash") {
                                        echo "a-ash";
                                      } else if($dd['realtime']['selectedLegend'] == "Mad Maggie") {
                                        echo "a-madmaggie";
                                      }
                                    ?>
                                  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    
                                  </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <img src="imgs/trackerhead.png" style="width:100%;" alt="">
                                    <div class="imgcontainer mt-3">
                                      <img src="imgs/apextracker1.png" alt="apextracker1" style="width:100%;">
                                      <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                        <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                                      <?php } else { ?>
                                        <div class="centered"><b>None</b></div>
                                      <?php } ?>
                                    </div>
                                    <div class="imgcontainer mt-3">
                                      <img src="imgs/apextracker2.png" alt="apextracker2" style="width:100%;">
                                      <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                        <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                                      <?php } else { ?>
                                        <div class="centered"><b>None</b></div>
                                      <?php } ?>
                                    </div>
                                    <div class="imgcontainer mt-3">
                                      <img src="imgs/apextracker3.png" alt="apextracker3" style="width:100%;">
                                      <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                        <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                                      <?php } else { ?>
                                        <div class="centered"><b>None</b></div>
                                      <?php } ?>
                                    </div>
                                    <img src="imgs/lihead.png" style="width:100%;" class="mt-5" alt="">
                                    <div class="imgcontainer mt-3">
                                      <img src="imgs/skinbanner.png" alt="skinbanner" style="width:100%;">
                                      <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                                    </div>
                                    <div class="imgcontainer mt-3">
                                      <img src="imgs/framebanner.png" alt="framebanner" style="width:100%;">
                                      <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                                    </div>
                                    <div class="imgcontainer mt-3">
                                      <img src="imgs/posebanner.png" alt="posebanner" style="width:100%;">
                                      <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                                    </div>
                                    <div class="imgcontainer mt-3">
                                      <img src="imgs/introbanner.png" alt="introbanner" style="width:100%;">
                                      <div class="centered"><b>
                                        <?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                                    </div>
                                    <?php 
                                      // Bloodhounds Intro
                                      if($dd['legends']['selected']['gameInfo']['intro'] == "Prepared for your end?") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/preparedforyourend.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                                      else if($dd['legends']['selected']['gameInfo']['intro'] == "Honor the Allfather") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/honortheallfather.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                                      else if($dd['legends']['selected']['gameInfo']['intro'] == "May the gods bless you") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/maythegodsblessyou.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                                      else if($dd['legends']['selected']['gameInfo']['intro'] == "Only when the gods will it") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/onlywhenthegodswillit.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                                      else if($dd['legends']['selected']['gameInfo']['intro'] == "The hunter the gods have sent") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/thehunterthegodshavesent.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                                      else if($dd['legends']['selected']['gameInfo']['intro'] == "A good day to fight") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/agooddaytofight.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                                      else if($dd['legends']['selected']['gameInfo']['intro'] == "Blessings are upon me") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/blessingsareuponme.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                                      else if($dd['legends']['selected']['gameInfo']['intro'] == "Every day is a new victory") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/everydayisanewvictory.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                                      else if($dd['legends']['selected']['gameInfo']['intro'] == "Fight. Win. Fight again") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/fightwinfightagain.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                                      else if($dd['legends']['selected']['gameInfo']['intro'] == "Find me and we will battle") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/findmeandwewillbattle.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                                      else if($dd['legends']['selected']['gameInfo']['intro'] == "Honor is in the challenge") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/honorisinthechallenge.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                                      else if($dd['legends']['selected']['gameInfo']['intro'] == "I will slaughter") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/iwillslaughter.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                                      else if($dd['legends']['selected']['gameInfo']['intro'] == "Never disappoint my brethren") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/neverdisappointmybrethren.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                                      else if($dd['legends']['selected']['gameInfo']['intro'] == "Prove your strength") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/proveyourstrength.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                                      else if($dd['legends']['selected']['gameInfo']['intro'] == "The day is mine") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/thedayismine.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                                    ?>
                                    <img src="imgs/badgeshead.png" style="width:100%;" class="mt-5" alt="">
                                    <div class="imgcontainer mt-3">
                                      <img src="imgs/badge1.png" alt="badge1" style="width:100%;">
                                      <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['badges'][0]['name']); ?></b></div>
                                    </div>
                                    <div class="imgcontainer mt-3">
                                      <img src="imgs/badge2.png" alt="badge3" style="width:100%;">
                                      <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['badges'][1]['name']); ?></b></div>
                                    </div>
                                    <div class="imgcontainer mt-3">
                                      <img src="imgs/badge3.png" alt="badge3" style="width:100%;">
                                      <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['badges'][2]['name']); ?></b></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2021</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></scrip>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
