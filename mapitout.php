       <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5aa286f3878d220013f1647e&product=sticky-share-buttons"></script>


                <div class="google-map">
			
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
        <script>
      function initMap() {
        //var loc = {lat: 5.577840, lng: 5.841700}; //Xelowgc
		var loc = {lat: 5.577840, lng: 5.841700};	
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: loc
        });
        var marker = new google.maps.Marker({
          position: loc,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvjGcv3Z8on_-BGxsC9F4ietIRB0Z2Tf8&callback=initMap">
    </script>

    <!--<h3>My Google Maps Demo</h3>-->
    <div id="map"></div>
		
					</div>