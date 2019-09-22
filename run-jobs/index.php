
<?php
$categories = array("HP" => "Hub-Performance",
                    "WT" => "Hub-To-Hub-Wrong-Tracking",
                    "DD" => "Data-Dump",
                    "MG" => "Misrouting",
                    "RP" => "Rider-Performance",
                    "LT" => "Lost-Tracker",
                    "SP" => "Sort-Performance",
                    "FR" => "Finance-Recon",
                    "BG" => "Backlog",
                    "PD" => "Perf Data");
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
  <script src="https://kit.fontawesome.com/9587973414.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <header>
      <div class="logo">
        <a href="/"><img src="/imgs/dwh_logo.png" alt="Daraz Warehouse Logo" height="60px"></a>
      </div>
    </header>

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
        List Jobs
      </span>
    </div>

  <!-- Server response echoes here -->
    <div class="job-list sspro" id="jobs">
      <table>
        <caption class="f18">LIST OF JOBS FOUND</caption>
        <thead>
          <tr>
            <th colspan="3">Job Name</th>
            <th></th><th></th>
            <th>Status</th>
            <th>Next Execution In</th>
            <th>Run</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="3">PK-LMS-BACKLOG</td>
            <td></td><td></td>
            <td>Finished</td>
            <td>18h 34m</td>
            <td><i class="fas fa-play play"></i></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div> <!-- End of Container div -->
<script type="text/javascript">
  function searchJob() {
    var venture = document.querySelector('input[name=radio]:checked').value;
    var category = document.getElementById('category');
    var opt = category.options[category.selectedIndex].value;
    var url = "/fetch-jobs.php?venture=" + venture + "&category=" + opt;

    // AJAX part goes here;
    request = new XMLHttpRequest();
    request.onreadystatechange = function() {
                  if (request.readyState == 4 && request.status == 200) {
                     document.getElementById("jobs").innerHTML = request.responseText;
                  }
               }
    request.open("GET", url);
    request.send();
  }
</script>
</body>
</html>
