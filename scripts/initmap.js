$(document).ready(function() {
    // initialize the map
    var startPosition = new google.maps.LatLng(59.404035,18.436775); // vaxholm
    var myOptions = {
        zoom: 9,
        center: startPosition,
    };
    
    // map:en behöver vara global
    var map = new google.maps.Map(document.getElementById("map"), myOptions);

    alert(map);

    /*markers = []

    // show the search box
    $('span#box1').fancybox({'scrolling': 'no', 'onClosed': function() {  alert('foo'); }}).click();

    addJettyMarkers();

    refreshBoatMarkers();

    //$.everyTime(5*60 + 1, refreshBoatMarkers);
    */
});
/*

function refreshBoatMarkers()
{
    $.getJSON("http://79.99.1.18/~hjon/waxholmsbatarna/data.php?callback=?",
    function(data){
        var boats = data.entries;
        
        if (boats != null)
        {
            // clear markers
            //$.each(markers, function(idx, marker

            // then add them
            $.each(boats, addBoatToMap);
        }
    });
}

function addJettyMarkers()
{   
    $.each(jetties, addJettyToMap);
}

function addBoatToMap(index, boat)
{
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(boat.lat, boat.lng),
        title: boat.name,
        icon: 'images/boat.png',
        zIndex:2
    });
    
    marker.setMap(map);
}

function addJettyToMap(index, jetty)
{
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(jetty.lat, jetty.lng),
        title: jetty.name,
        icon: 'images/jetty.png',
        zIndex:1, // make sure the ships are on top
    });

    marker.setMap(map);
}

*/
