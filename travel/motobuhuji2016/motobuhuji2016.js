/**
 * ワクガンス | 本部富士の登山2016夏
 * @date 2016-6-18
 */

$(function(){
	var latlng = new google.maps.LatLng(26.674070,127.905269);
		
	var opts = {
		zoom: 17,//ズーム
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scaleControl: true,//スケール表示
	};
	var gmap1 = new google.maps.Map(document.getElementById("gmap"), opts);
	
    var kmlUrl = "2016-06-18c.kml";
    var kmlLayer = new google.maps.KmlLayer(kmlUrl);
    kmlLayer.setMap(gmap1);
});