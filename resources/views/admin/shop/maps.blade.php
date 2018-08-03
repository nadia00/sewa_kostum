<!DOCTYPE html>
<html>
  <head>
    <title>Set Address</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        width: 30%;
        top: 10px;
        left: 8%;
        z-index: 5;
        background-color: #fff;
        border-radius: 30px;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
      }
      #address{
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
      }
      #submit{
        padding: 0 25px;
        border-bottom-right-radius: 20px;
        border-top-right-radius: 20px;
      }
      #infowindow-content {
        display: none;
      }
      #map #infowindow-content {
        display: inline-block;
      }

    </style>
  </head>
  <body>

    <div id="floating-panel" class="input-group mb-3">
        <input id="address" onFocus="geolocate()"  type="textbox" class="form-control" placeholder="Surabaya" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-info" id="submit" type="button">Cari</button>
        </div>
      </div>
    <div id="map"></div>
    <div id="infowindow-content" class="text-center">
      <p id="place-address"></p>
      <p id="place-latLng"></p>
      <form>
        <button type="button" class="btn btn-sm btn-info" id="btn-simpan">Simpan Lokasi</button>
      </form>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
      var map, marker, address, btnSimpan;
      var placeSearch, autocomplete;
      var infowindowContent, infowindow, geocoder;
      var options = {
        zoom : 12,
        center: {lat: -7.250445, lng: 112.768845}
      }

      function initAutocomplete() {
        address = document.getElementById('address');
        infowindowContent = document.getElementById('infowindow-content');
        btnSimpan = document.getElementById('btn-simpan');
        map = new google.maps.Map(document.getElementById('map'), options);
        autocomplete = new google.maps.places.Autocomplete(address, {types: ['geocode']});

        infowindow = new google.maps.InfoWindow();
        geocoder = new google.maps.Geocoder();        
        
        document.getElementById('submit').addEventListener('click', function() {
          if (marker != null) {
            marker.setMap(null);
          }
          geocodeAddress(geocoder, map, address);
        });

        google.maps.event.addListener(map, 'click', function(event) {
          if (marker != null) {
            marker.setMap(null);
          }
          var location = event.latLng;
          geocodeLocation(geocoder, map, location);
            
        });
      }

      function geocodeLocation(geocoder, resultsMap, location){
        geocoder.geocode({'location': location}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
                console.log(results);
                var strAddress = results[0].formatted_address;
                var strLat = results[0].geometry.location.lat();
                var strLng = results[0].geometry.location.lng();
                map.setZoom(20);
                map.setCenter(location);
                addMarker(location, map);
                marker.setVisible(true);
                infowindowContent.children['place-address'].textContent = results[0].formatted_address;
                infowindowContent.children['place-latLng'].textContent = results[0].geometry.location;
                infowindow.setContent(infowindowContent);
                infowindow.open(map, marker);
                $('#btn-simpan').click(function(e) {
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
                  e.preventDefault();
                  console.log("{{$url}}");

                  $.ajax({
                    dataType : 'json',
                    type : 'POST',
                    url : "{{ route('location.actionmaps') }}",
                    data: {address: strAddress, lat: strLat, lng: strLng},
                    success : function(data) {
                      console.log(data);  
                      window.location.href = data.url;
    
                    }
                  });

                });
                  
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }

      function geocodeAddress(geocoder, resultsMap, address) {
        geocoder.geocode({'address': address.value}, function(results, status) {
          console.log(results);
          if (status === 'OK') {
            var strAddress = results[0].formatted_address;
            var strLat = results[0].geometry.location.lat();
            var strLng = results[0].geometry.location.lng();
            resultsMap.setZoom(18);
            resultsMap.setCenter(results[0].geometry.location);
            addMarker(results[0].geometry.location, resultsMap)
            marker.setVisible(true);
            infowindowContent.children['place-address'].textContent = strAddress;
            infowindowContent.children['place-latLng'].textContent = results[0].geometry.location;
            infowindow.setContent(infowindowContent);
            infowindow.open(resultsMap, marker);

            $('#btn-simpan').click(function(e) {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              e.preventDefault();

              $.ajax({
                dataType : 'json',
                type : 'POST',
                url : "{{ route('location.actionmaps') }}",
                data: {address: strAddress, lat: strLat, lng: strLng, url : "{{$url}}"},
                success : function(data) {
                  console.log(data);  
                  window.location.href = data.url;
 
                }
              });

            });
            
          } else {            
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }

      function addMarker(location, map) {
        marker = new google.maps.Marker({
          position: location,
          map: map
        });
      }

      function geolocate() {
        console.log(navigator.geolocation);
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }

    </script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgKKkqxI9vHPXPlTQxqT1uHn5zYj_129I&libraries=places&callback=initAutocomplete"
        async defer></script>
    {{-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcLl8mNC7zpEzIOzkfeQgrbBlEmpPZIho&callback=initMap">
    </script> --}}

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>

  </body>
</html>