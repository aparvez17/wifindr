//<![CDATA[


    function loadMap(x, y) {
      var map = new google.maps.Map(document.getElementById("map-canvas"), {
       center: new google.maps.LatLng(x,y),
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: true
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("markers.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b> <br/>" + address;
          var marker = new google.maps.Marker({
            map: map,
            position: point,
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }
	
	function doNothing() {}
    //]]>
