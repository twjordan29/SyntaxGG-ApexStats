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