<?php 
        require 'php/backend.php';
        $edu = new Artikim();
        $coll = $edu->getCollegesBlanLatLng();
        $coll = json_encode($coll,JSON_UNESCAPED_UNICODE);
        $all = $edu->getAllColleges();
        $all = json_encode($all,JSON_UNESCAPED_UNICODE);
        ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script> let allData = <?php print_r($all)?>; let fromDb = <?php print_r($coll)?>;   </script> 
  </head>

<body class= "color-change-2x">
<div class="container-all">
<div class="container ">
<h1 class ="tracking-in-expand ">MOJO SHOPS</h1>
<div id="map"></div>
</div>
<div class="forms">
<div class="text-center   p-5 col-md-4"  >
<p class="h4 mb-4">ADD SHOP</p>
<input type="text" id="address" class="form-control mb-4" placeholder="הכנס כתובת, לדוגמה:רוטשילד 38, תל אביב">
<input type="text" id="shopName" class="form-control mb-4" placeholder="הכנס את שם החנות">
<button class="btn btn-info btn-block my-4" onclick="AddLocation()" type="submit">Add Address</button>
</div>
<div class="text-center  p-5 col-md-4"  >
<p class="h4 mb-4">DELETE SHOP</p>
<input type="text" id="address-del" class="form-control mb-4" placeholder="הכנס כתובת, לדוגמה:רוטשילד 38, תל אביב">
<input type="text" id="shopName-del" class="form-control mb-4" placeholder="הכנס את שם החנות">
<button class="btn btn-info btn-block " onclick="delLocation()" type="submit">Add Address</button>
</div>
</div>
</div>
   <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key= AIzaSyB3_8yCT6vuqIzMv9XslBHG--OLtbewBEg&callback=initMap">
    </script>
    <script src="index.js"></script>
  </body>
</html>