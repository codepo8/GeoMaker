<?php
/*
  GeoMaker by Christian Heilmann (map include)
  Version: 1.0
  Homepage: http://icant.co.uk/geomaker/
  Copyright (c) 2009, Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
?>
<div id="map"></div>
<script src="http://yui.yahooapis.com/2.7.0/build/utilities/utilities.js"></script>
<script type="text/javascript" src="http://l.yimg.com/d/lib/map/js/api/ymapapi_3_8_2_3.js"></script>
<script type="text/javascript">
var YMAPPID = '<?php echo $key;?>';
              // ^^ REPLACE THIS CODE WITH YOUR OWN!!! ^^
(function(){
  function placeonmap(o){
    if(o.length > 0){
      var geopoints = [];
      var map = new YMap(document.getElementById('map')); 
      map.addZoomLong();
      map.addPanControl();
      for(var i=0;i<o.length;i++){
        var point = new YGeoPoint(o[i].lat,o[i].lon);
        geopoints.push(point);
        var newMarker = new YMarker(point,o[i].id);
        newMarker.addAutoExpand(o[i].title);
        map.addOverlay(newMarker);
      }
      var zac = map.getBestZoomAndCenter(geopoints);        
      map.drawZoomAndCenter(zac.YGeoPoint,zac.zoomLevel);
    }
  }
  placeonmap(<?php echo stripslashes($points);?>);
})();
</script>