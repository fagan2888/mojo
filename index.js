var map;
var geocoder;
function initMap() {
    var map = new google.maps.Map(
    document.getElementById('map'), {zoom: 13, center: {lat:31.771959, lng: 35.217018}});    
    geocoder = new google.maps.Geocoder();
    infoWindow = new google.maps.InfoWindow;
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
    
          infoWindow.setPosition(pos);
          infoWindow.setContent('המיקום שלך.');
          infoWindow.open(map);
          map.setCenter(pos);
        }, function() {
          handleLocationError(true, infoWindow, map.getCenter());
        });
      } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
      }
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
    let allData = document.getElementById('firstData').innerText;
    let fromDb = document.getElementById('secondData').innerText;

    codeAddress(fromDb)
    showAllAddress(allData);
    function showAllAddress(allData){
        allData.forEach(data=>{
            var marker = new google.maps.Marker({
                map: map,
                icon: 'summer.png',
                position: new google.maps.LatLng(data.lat ,data.lng),
            });
        })
    }
    function codeAddress(fromDb) {
        fromDb.forEach(data => {
            let address =  data.address;
            address.trim()
            geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == 'OK') {
            map.setCenter(results[0].geometry.location);
             map.getCenter().lat()
             let points = {}
                 points.id = data.id
                 points.lat = map.getCenter().lat();
                 points.lng = map.getCenter().lng();
                 updateCollegeWithLatLng(points)
  
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
    })
      }
    function  updateCollegeWithLatLng(points){

        $.ajax({
            url:'action.php',
            method:'post',
            data:points,
            success:function(res){
                console.log(res);
            }
        })
         
      }


  }
  
  function AddLocation(){
   
    let address = document.getElementById('address').value;
    let shopName = document.getElementById('shopName').value;
    let newShop = {
        address :address,
        name :shopName
    }
    
    $.ajax({
        url:'insert.php',
        method:'post',
        data:newShop,
        success:function(res){
            console.log(res);
        }
    })
  }
  
  