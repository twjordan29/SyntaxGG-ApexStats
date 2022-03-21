<?php
    if(isset($_GET['username']) && $_GET['platform']) {
        $username = $_GET['username'];
        $platform = $_GET['platform'];
    }
    $apiKey = "e38vPHPzOxUzYFU9fJmG";
    $url = "https://api.mozambiquehe.re/bridge?version=5&platform=" . $platform . "&player=" . $username . "&auth=" . $apiKey . "";
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
        <title>SyntaxGG - <?php echo $dd['global']['name']; ?>'s Apex Stats</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css?v=20" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php include('inc/nav.php'); ?>
            <div style="container-fluid">
                <div class="apex">
                    <div class="legends">
                       <h6>You are currently viewing <b><?php echo $dd['global']['name']; ?>'s</b> stats!</h6>
                    </div>
                </div>
            </div>
            <div class="container my-5">
              <div class="row">
                <div class="col-sm-4">
                    <div class="card shadow-lg" id="myScrollspy">
                        <div class="card-apexheader"><center><b><?php echo $dd['global']['name']; ?> Stats</b></center></div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                              <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#"><img src="imgs/al.png" width="32" height="32" alt=""> <b>Overview</b></a>
                              <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#SelectedLegend"><img src="imgs/pubs.png" width="32" height="32" alt=""> <b>Selected Legend Stats</b></a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#RankedStats"><img src="imgs/apex.png" width="32" height="32" alt=""> <b>Ranked Stats</b></a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#RankedArenasStats"><img src="imgs/apex.png" width="32" height="32" alt=""> <b>Ranked Arenas Stats</b></a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#AllLegends"><img src="imgs/alstats.png" width="32" height="32" alt=""> <b>All Legend Stats</b></a>
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
                  <div class="card shadow-lg mt-4">
                    <div class="card-apexheader">Advertisement</div>
                    <div class="card-body">

                    </div>
                  </div>
                </div>
                <?php if($dd['realtime']['selectedLegend'] == "Bloodhound") { ?>
                <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-bloodhound"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/bloodhound/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/bloodhound/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/bloodhound/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/bloodhound/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/bloodhound/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/bloodhound/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/bloodhound/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                              else if($dd['legends']['selected']['gameInfo']['intro'] == "The fight honors me") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/thefighthonorsme.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                              else if($dd['legends']['selected']['gameInfo']['intro'] == "The hunt begins") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/thehuntbegins.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                              else if($dd['legends']['selected']['gameInfo']['intro'] == "The true test") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/thetruetest.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                              else if($dd['legends']['selected']['gameInfo']['intro'] == "Victory is already written") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/victoryisalreadywritten.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                              else if($dd['legends']['selected']['gameInfo']['intro'] == "When we meet, I will slaughter") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/whenwemeetiwillslaughter.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                              else if($dd['legends']['selected']['gameInfo']['intro'] == "Your honor to face me") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/bloodhound/yourhonortofaceme.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                            ?>
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Gibraltar") {?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-gibraltar"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/gibraltar/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/gibraltar/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/gibraltar/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/gibraltar/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/gibraltar/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/gibraltar/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/gibraltar/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <?php 
                              // Bloodhounds Intro
                              if($dd['legends']['selected']['gameInfo']['intro'] == "Try and move me") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/gibby/tryandmoveme.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                              else if($dd['legends']['selected']['gameInfo']['intro'] == "I just do the job") { echo "<audio controls class='mt-4' style='width:100%;'> <source src='mp3/gibby/ijustdothejob.mp3' type='audio/mpeg'> Your browser does not support the audio element.</audio>"; } 
                            ?>
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Lifeline") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-lifeline"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/lifeline/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/lifeline/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/lifeline/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/lifeline/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/lifeline/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/lifeline/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/lifeline/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Pathfinder") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-pathfinder"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/pathfinder/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/pathfinder/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/pathfinder/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/pathfinder/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/pathfinder/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/pathfinder/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/pathfinder/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Wraith") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-wraith"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/wraith/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/wraith/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/wraith/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/wraith/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/wraith/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/wraith/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/wraith/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                            </div>
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Bangalore") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-bangalore"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/bangalore/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/bangalore/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/bangalore/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/bangalore/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/bangalore/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/bangalore/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/bangalore/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Caustic") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-caustic"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/caustic/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/caustic/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/caustic/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/caustic/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/caustic/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/caustic/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/caustic/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                            </div>
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Mirage") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-mirage"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/mirage/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/mirage/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/mirage/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/mirage/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/mirage/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/mirage/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/mirage/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                            </div>
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Octane") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-octane"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/octane/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/octane/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/octane/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/octane/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/octane/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/octane/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/octane/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Wattson") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-wattson"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/wattson/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/wattson/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/wattson/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/wattson/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/wattson/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/wattson/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/wattson/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Crypto") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-crypto"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/crypto/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/crypto/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/crypto/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/crypto/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/crypto/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/crypto/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/crypto/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Revenant") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-revenant"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/revenant/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/revenant/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/revenant/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/revenant/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/revenant/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/revenant/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/revenant/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Loba") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-loba"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/loba/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/loba/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/loba/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/loba/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/loba/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/loba/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/loba/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Rampart") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-rampart"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/rampart/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/rampart/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/rampart/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/rampart/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/rampart/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/rampart/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/rampart/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Horizon") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-horizon"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/horizon/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/horizon/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/horizon/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/horizon/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/horizon/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/horizon/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/horizon/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Fuse") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-fuse"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/fuse/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/fuse/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/fuse/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/fuse/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/fuse/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/fuse/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/fuse/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Valkyrie") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-valkyrie"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/valkyrie/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/valkyrie/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/valkyrie/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/valkyrie/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/valkyrie/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/valkyrie/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/valkyrie/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Seer") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-seer"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/seer/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/seer/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/seer/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/seer/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/seer/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/seer/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/seer/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="row text-center">
                              <div class="col">
                                <?php if(isset($dd['legends']['selected']['gameInfo']['badges'][0]['name'])) { ?>
                                  <img src="imgs/badges/<?php echo $dd['legends']['selected']['gameInfo']['badges'][0]['name']; ?>.png" alt="">
                                <?php } else { echo "No badge to display!"; } ?>
                              </div>
                              <div class="col">
                                <?php if(isset($dd['legends']['selected']['gameInfo']['badges'][1]['name'])) { ?>
                                  <img src="imgs/badges/<?php echo $dd['legends']['selected']['gameInfo']['badges'][1]['name']; ?>.png" alt="">
                                <?php } else { echo "No badge to display!"; } ?>
                              </div>
                              <div class="col">
                                <?php if(isset($dd['legends']['selected']['gameInfo']['badges'][2]['name'])) { ?>
                                  <img src="imgs/badges/<?php echo $dd['legends']['selected']['gameInfo']['badges'][2]['name']; ?>.png" alt="">
                                <?php } else { echo "No badge to display!"; } ?>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Ash") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-ash"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/ash/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/ash/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/ash/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/ash/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/ash/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/ash/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/ash/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                        </div>
                    </div>
                </div>
                <?php } else if($dd['realtime']['selectedLegend'] == "Mad Maggie") { ?>
                  <div id="SelectedLegend" class="col-sm-8">
                    <div class="card shadow-lg">
                        <div class="card-madmaggie"></div>
                        <div class="card-body">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/madmaggie/info/tracker1.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][0])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][0]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][0]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/madmaggie/info/tracker2.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][1])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][1]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][1]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/madmaggie/info/tracker3.png" alt="apextracker1" style="width:100%;">
                              <?php if(isset($dd['legends']['selected']['data'][2])) { ?>
                                <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['data'][2]['name']); ?></b> <?php echo $dd['legends']['selected']['data'][2]['value']; ?></div>
                              <?php } else { ?>
                                <div class="centered"><b>None</b></div>
                              <?php } ?>
                            </div>
                            <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/madmaggie/info/skin.png" alt="skinbanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['skin']); ?> (<?php if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['skinRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/madmaggie/info/frame.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['frame']); ?> (<?php if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['frameRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/madmaggie/info/pose.png" alt="pose" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['pose']); ?> (<?php if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['poseRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
                            </div>
                            <div class="imgcontainer mt-3">
                              <img src="imgs/legends/madmaggie/info/intro.png" alt="framebanner" style="width:100%;">
                              <div class="centered"><b><?php echo ucwords($dd['legends']['selected']['gameInfo']['intro']); ?> (<?php if($dd['legends']['selected']['gameInfo']['introRarity'] == "Common") { echo "<i style='color:#e0e0e0;'>Common</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Rare") { echo "<i style='color:#00abd6;'>Rare</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Epic") { echo "<i style='color:#ac4af7;'>Epic</i>"; } else if($dd['legends']['selected']['gameInfo']['introRarity'] == "Legendary") { echo "<i style='color:gold;'>Legendary</i>"; }?>)</b></div>
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
                        </div>
                    </div>
                </div>
                <?php } ?>
              </div>
            </div>
            <div class="container mb-5">
              <div class="row">
                <div class="col-sm-4">
                  
                </div>
                <div class="col-sm-8" id="RankedStats">
                  <div class="card shadow-lg">
                      <div class="card-apexheader"><center><b><?php echo $dd['global']['name']; ?> Ranked Stats</b></center></div>
                      <div class="card-body">
                        <div class="imgcontainer mt-3">
                            <img src="imgs/ranked/rankedscore.png" alt="pose" style="width:100%;">
                            <div class="centered"><b><?php echo $dd['global']['rank']['rankScore'];?> RP</b></div>
                        </div>
                              <?php if($dd['global']['rank']['rankName'] == "Bronze" && $dd['global']['rank']['rankDiv'] == "4") {
                                echo "<img src='imgs/ranked/bronze4.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Bronze" && $dd['global']['rank']['rankDiv'] == "3") {
                                echo "<img src='imgs/ranked/bronze3.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Bronze" && $dd['global']['rank']['rankDiv'] == "2") {
                                echo "<img src='imgs/ranked/bronze2.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Bronze" && $dd['global']['rank']['rankDiv'] == "1") {
                                echo "<img src='imgs/ranked/bronze1.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Silver" && $dd['global']['rank']['rankDiv'] == "4") {
                                echo "<img src='imgs/ranked/silver4.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Silver" && $dd['global']['rank']['rankDiv'] == "3") {
                                echo "<img src='imgs/ranked/silver3.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Silver" && $dd['global']['rank']['rankDiv'] == "2") {
                                echo "<img src='imgs/ranked/silver2.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Silver" && $dd['global']['rank']['rankDiv'] == "1") {
                                echo "<img src='imgs/ranked/silver1.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Gold" && $dd['global']['rank']['rankDiv'] == "4") {
                                echo "<img src='imgs/ranked/gold4.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Gold" && $dd['global']['rank']['rankDiv'] == "3") {
                                echo "<img src='imgs/ranked/gold3.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Gold" && $dd['global']['rank']['rankDiv'] == "2") {
                                echo "<img src='imgs/ranked/gold2.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Gold" && $dd['global']['rank']['rankDiv'] == "1") {
                                echo "<img src='imgs/ranked/gold1.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Platinum" && $dd['global']['rank']['rankDiv'] == "4") {
                                echo "<img src='imgs/ranked/platinum4.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Platinum" && $dd['global']['rank']['rankDiv'] == "3") {
                                echo "<img src='imgs/ranked/platinum3.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Platinum" && $dd['global']['rank']['rankDiv'] == "2") {
                                echo "<img src='imgs/ranked/platinum2.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Platinum" && $dd['global']['rank']['rankDiv'] == "1") {
                                echo "<img src='imgs/ranked/platinum1.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Diamond" && $dd['global']['rank']['rankDiv'] == "4") {
                                echo "<img src='imgs/ranked/diamond4.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Diamond" && $dd['global']['rank']['rankDiv'] == "3") {
                                echo "<img src='imgs/ranked/diamond3.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Diamond" && $dd['global']['rank']['rankDiv'] == "2") {
                                echo "<img src='imgs/ranked/diamond2.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Diamond" && $dd['global']['rank']['rankDiv'] == "1") {
                                echo "<img src='imgs/ranked/diamond1.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Master") {
                                echo "<img src='imgs/ranked/platinum1.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['rank']['rankName'] == "Apex Predator") {
                                echo "<img src='imgs/ranked/pred.png' alt='' class='mt-3' style='width:100%;'>"; 
                              }
                              ?>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="container mb-5">
              <div class="row">
                <div class="col-sm-4">
                  
                </div>
                <div class="col-sm-8" id="RankedArenasStats">
                  <div class="card shadow-lg">
                      <div class="card-apexheader"><center><b><?php echo $dd['global']['name']; ?> Ranked Arenas Stats</b></center></div>
                      <div class="card-body">
                        <div class="imgcontainer mt-3">
                            <img src="imgs/ranked/arenasscore.png" alt="pose" style="width:100%;">
                            <div class="centered"><b><?php echo $dd['global']['arena']['rankScore'];?> RP</b></div>
                        </div>
                              <?php if($dd['global']['arena']['rankName'] == "Bronze" && $dd['global']['arena']['rankDiv'] == "4") {
                                echo "<img src='imgs/ranked/bronze4.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Bronze" && $dd['global']['arena']['rankDiv'] == "3") {
                                echo "<img src='imgs/ranked/bronze3.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Bronze" && $dd['global']['arena']['rankDiv'] == "2") {
                                echo "<img src='imgs/ranked/bronze2.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Bronze" && $dd['global']['arena']['rankDiv'] == "1") {
                                echo "<img src='imgs/ranked/bronze1.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Silver" && $dd['global']['arena']['rankDiv'] == "4") {
                                echo "<img src='imgs/ranked/silver4.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Silver" && $dd['global']['arena']['rankDiv'] == "3") {
                                echo "<img src='imgs/ranked/silver3.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Silver" && $dd['global']['arena']['rankDiv'] == "2") {
                                echo "<img src='imgs/ranked/silver2.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Silver" && $dd['global']['arena']['rankDiv'] == "1") {
                                echo "<img src='imgs/ranked/silver1.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Gold" && $dd['global']['arena']['rankDiv'] == "4") {
                                echo "<img src='imgs/ranked/gold4.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Gold" && $dd['global']['arena']['rankDiv'] == "3") {
                                echo "<img src='imgs/ranked/gold3.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Gold" && $dd['global']['arena']['rankDiv'] == "2") {
                                echo "<img src='imgs/ranked/gold2.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Gold" && $dd['global']['arena']['rankDiv'] == "1") {
                                echo "<img src='imgs/ranked/gold1.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Platinum" && $dd['global']['arena']['rankDiv'] == "4") {
                                echo "<img src='imgs/ranked/platinum4.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Platinum" && $dd['global']['arena']['rankDiv'] == "3") {
                                echo "<img src='imgs/ranked/platinum3.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Platinum" && $dd['global']['arena']['rankDiv'] == "2") {
                                echo "<img src='imgs/ranked/platinum2.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Platinum" && $dd['global']['arena']['rankDiv'] == "1") {
                                echo "<img src='imgs/ranked/platinum1.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Diamond" && $dd['global']['arena']['rankDiv'] == "4") {
                                echo "<img src='imgs/ranked/diamond4.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Diamond" && $dd['global']['arena']['rankDiv'] == "3") {
                                echo "<img src='imgs/ranked/diamond3.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Diamond" && $dd['global']['arena']['rankDiv'] == "2") {
                                echo "<img src='imgs/ranked/diamond2.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Diamond" && $dd['global']['arena']['rankDiv'] == "1") {
                                echo "<img src='imgs/ranked/diamond1.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Master") {
                                echo "<img src='imgs/ranked/platinum1.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Apex Predator") {
                                echo "<img src='imgs/ranked/pred.png' alt='' class='mt-3' style='width:100%;'>"; 
                              } else if($dd['global']['arena']['rankName'] == "Unranked") {
                                echo "<img src='imgs/ranked/unranked.png' alt='' class='mt-3' style='width:100%;'>"; 
                              }
                              ?>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="container mb-5">
              <div class="row">
                <div class="col-sm-4">
                  
                </div>
                <div class="col-sm-8" id="AllLegends">
                  <div class="card shadow-lg">
                      <div class="card-apexheader"><center><b><?php echo $dd['global']['name']; ?>'s' All Legends Stats</b></center></div>
                      <div class="card-body">
                        <center><p><small><i>If values aren't showing, that means the person doesn't have trackers equipped!</i></small></p></center>
                          <img src="imgs/legends/bloodhound-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Bloodhound']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Bloodhound']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Bloodhound']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Bloodhound']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Bloodhound']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Bloodhound']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Bloodhound']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Bloodhound']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Bloodhound']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Bloodhound']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Bloodhound']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Bloodhound']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/gibraltar-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Gibraltar']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Gibraltar']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Gibraltar']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Gibraltar']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Gibraltar']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Gibraltar']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Gibraltar']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Gibraltar']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Gibraltar']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Gibraltar']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Gibraltar']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Gibraltar']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/lifeline-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Lifeline']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Lifeline']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Lifeline']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Lifeline']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Lifeline']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Lifeline']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Lifeline']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Lifeline']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Lifeline']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Lifeline']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Lifeline']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Lifeline']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/pathfinder-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Pathfinder']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Pathfinder']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Pathfinder']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Pathfinder']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Pathfinder']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Pathfinder']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Pathfinder']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Pathfinder']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Pathfinder']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Pathfinder']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Pathfinder']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Pathfinder']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/wraith-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Wraith']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Wraith']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Wraith']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Wraith']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Wraith']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Wraith']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Wraith']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Wraith']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Wraith']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Wraith']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Wraith']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Wraith']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/bangalore-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Bangalore']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Bangalore']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Bangalore']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Bangalore']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Bangalore']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Bangalore']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Bangalore']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Bangalore']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Bangalore']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Bangalore']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Bangalore']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Bangalore']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/caustic-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Caustic']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Caustic']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Caustic']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Caustic']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Caustic']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Caustic']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Caustic']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Caustic']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Caustic']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Caustic']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Caustic']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Caustic']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/mirage-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Mirage']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Mirage']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Mirage']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Mirage']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Mirage']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Mirage']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Mirage']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Mirage']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Mirage']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Mirage']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Mirage']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Mirage']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/octane-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Octane']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Octane']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Octane']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Octane']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Octane']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Octane']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Octane']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Octane']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Octane']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Octane']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Octane']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Octane']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/wattson-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Wattson']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Wattson']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Wattson']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Wattson']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Wattson']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Wattson']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Wattson']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Wattson']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Wattson']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Wattson']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Octane']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Wattson']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/crypto-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Crypto']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Crypto']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Crypto']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Crypto']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Crypto']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Crypto']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Crypto']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Crypto']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Crypto']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Crypto']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Crypto']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Crypto']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/revenant-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Revenant']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Revenant']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Revenant']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Revenant']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Revenant']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Revenant']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Revenant']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Revenant']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Revenant']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Revenant']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Revenant']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Revenant']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/loba-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Loba']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Loba']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Loba']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Loba']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Loba']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Loba']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Loba']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Loba']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Loba']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Loba']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Loba']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Loba']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/rampart-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Rampart']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Rampart']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Rampart']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Rampart']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Rampart']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Rampart']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Rampart']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Rampart']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Rampart']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Rampart']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Rampart']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Rampart']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/horizon-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Horizon']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Horizon']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Horizon']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Horizon']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Horizon']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Horizon']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Horizon']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Horizon']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Horizon']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Horizon']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Horizon']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Horizon']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/fuse-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Fuse']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Fuse']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Fuse']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Fuse']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Fuse']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Fuse']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Fuse']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Fuse']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Fuse']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Fuse']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Fuse']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Fuse']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/valkyrie-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Valkyrie']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Valkyrie']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Valkyrie']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Valkyrie']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Valkyrie']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Valkyrie']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Valkyrie']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Valkyrie']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Valkyrie']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Valkyrie']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Valkyrie']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Valkyrie']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/seer-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Seer']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Seer']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Seer']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Seer']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Seer']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Seer']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Seer']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Seer']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Seer']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Seer']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Seer']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Seer']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/ash-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Ash']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Ash']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Ash']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Ash']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Ash']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Ash']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Ash']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Ash']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Ash']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Ash']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Ash']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Ash']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                          <img src="imgs/divider.png" class="mt-3 mb-3" style="width:100%;" alt="divider">
                          <img src="imgs/legends/madmaggie-ac.png" alt="pose" style="width:100%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tracker Name</th>
                                <th scope="col">Tracker Value</th>
                                <th scope="col">Top %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($dd['legends']['all']['Mad Maggie']['data'][0])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Mad Maggie']['data'][0]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Mad Maggie']['data'][0]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Mad Maggie']['data'][0]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Mad Maggie']['data'][1])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Mad Maggie']['data'][1]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Mad Maggie']['data'][1]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Mad Maggie']['data'][1]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                              <?php if(isset($dd['legends']['all']['Mad Maggie']['data'][2])) {
                              echo "<tr>";
                              echo  "<td>". ucwords($dd['legends']['all']['Mad Maggie']['data'][2]['name']) ."</td>";
                              echo  "<td>". $dd['legends']['all']['Mad Maggie']['data'][2]['value'] ."</td>";
                              echo  "<td>". $dd['legends']['all']['Mad Maggie']['data'][2]['rank']['topPercent'] ."%</td>";
                              echo "</tr>";
                              } ?>
                            </tbody>
                          </table>
                      </div>
                    </div>
                </div>
              </div>
            </div>
        </main>
        <!-- Footer-->
        <?php include('inc/footer.php'); ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></scrip>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>