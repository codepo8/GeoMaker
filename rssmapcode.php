<div id="rss2map"></div>
<script src="http://yui.yahooapis.com/2.7.0/build/utilities/utilities.js"></script>
<script type="text/javascript" src="http://l.yimg.com/d/lib/map/js/api/ymapapi_3_8_2_3.js"></script>
<style type="text/css" media="screen">
  #rss2map{width:100%;height:300px;}
  #rss2map table,#rss2map td{padding:0;margin:0;border:none;}
  #rss2map h2{margin:0;padding-bottom:.5em;font-size:110%;}
  #rss2map h2 a{color:#369;text-decoration:none;}
  #rss2map table{width:300px;}
</style>
<script type="text/javascript">
var YMAPPID = '<?php echo $key;?>';
              // ^^ REPLACE THIS CODE WITH YOUR OWN!!! ^^
function rss2map(o){
  if(o.length > 0){
    var geopoints = [];
    var map = new YMap(document.getElementById('rss2map')); 
    map.addZoomLong();
    map.addPanControl();
    for(var i=0;i<o.length;i++){
      var point = new YGeoPoint(o[i].lat,o[i].lon);
      geopoints.push(point);
      var newMarker = new YMarker(point);
      newMarker.addAutoExpand(o[i].title + ' (click for more)');
      newMarker.content = o[i].content;
      YEvent.Capture(newMarker, EventsList.MouseClick, function(){
         this.openSmartWindow(this.content);
      });
      map.addOverlay(newMarker);
    }
    var zac = map.getBestZoomAndCenter(geopoints);        
    map.drawZoomAndCenter(zac.YGeoPoint,zac.zoomLevel);
  }
}
rss2map(<?php echo stripslashes($points);?>);
</script>
