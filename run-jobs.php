
<?php
$categories = array("HP" => "Hub-Performance",
                    "WT" => "Hub-To-Hub-Wrong-Tracking",
                    "DD" => "Data-Dump",
                    "MG" => "Misrouting",
                    "RP" => "Rider-Performance",
                    "LT" => "Lost-Tracker",
                    "SP" => "Sort-Performance",
                    "FR" => "Finance-Recon",
                    "BG" => "Backlog");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Run Jobs</title>
  <link rel="stylesheet" href="/css/master.css">
  <link rel="stylesheet" href="/css/runjob.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <div class="logo">
      <a href="/"><img src="/imgs/dwh_logo.png" alt="Daraz Warehouse Logo" height="60px"></a>
    </div>
  </header>

  <div class="headline">
    <p class="sspro f16 black">Using <b>Rundeck</b> APIs</p>
  </div>

  <div class="ventures-wrapper sspro f16">
    <div class="venture-head f18">
      Select Venture
    </div>
    <div class="ventures">
      <div class="options">
        <input type="radio" name="radio" checked value="all">
        <label for="allVentuer">ALL</label>
      </div>
      <div class="options">
        <input type="radio" name="radio" value="pk">
        <label for="pk">PK</label>
      </div>
      <div class="options">
        <input type="radio" name="radio" value="bd">
        <label for="bf">BD</label>
      </div>
      <div class="options">
        <input type="radio" name="radio" value="pk">
        <label for="lk">LK</label>
      </div>
      <div class="options">
        <input type="radio" name="radio" value="np">
        <label for="np">NP</label>
      </div>
      <div class="options">
        <input type="radio" name="radio" value="mm">
        <label for="mm">MM</label>
      </div>
    </div>
  </div>
  <div class="category-wrapper sspro f16">
    <div class="venture-head f18">
      Select Job Category
    </div>
    <div class="options-wrapper">
      <select class="lms-options ptr" id="category">
      <?php
      $i=0;
      foreach ($categories as $key => $value) {
      ?>
        <option class="sspro f14 b" value="<?= $key ?>"><?= $value ?></option>
      <?php
        }
      ?>
      }
    </select>
    </div>
  </div>
  <div class="search" onclick="searchJob();">
    <span class="sspro f16 ptr">
      Search Jobs
    </span>
  </div>
<script type="text/javascript">
  function searchJob() {
    var venture = document.querySelector('input[name=radio]:checked').value;
    var category = document.getElementById('category');
    var opt = category.options[category.selectedIndex].value;
    url = "/run-jobs.php?venture=" + venture + "&category=" + opt;
    console.log(url); 
  }
</script>
</body>
</html>
