$(function(){

  function setIP(ip) {
    $('#ip').text(ip);
    fitIP();
  }

  function fitIP() {
    var ip = $('#ip');
    ip.css('color', 'white');
    ip.show();

    var h = $(window).height();
    var w = $(window).width();

    for(i=100; i>=1; i--)
    {
      ip.css('font-size', i/10+'em');

      var sx = ip.width();
      var sy = ip.height();

      if ((sx<w) && (sy<h)) break;
    }

    ip.css('font-size', i/10+'em');

    var px = (w-sx)/2;
    var py = (h-sy)/2;

    ip.css('margin-left', px);
    $('#ip-holder').css('margin-top', py);

    ip.hide();
    ip.css('color', 'black');
    ip.fadeIn(250);
  }

  $(window).bind('resize', function() {
    fitIP();
  });

  var rnd = Math.random();

  if (rnd<0.33) {
    $.get('text', {}, function(t){setIP(t);}, 'text');
  }
  else if (rnd<0.66) {
    $.get('json', {}, function(j){setIP(j.ip);}, 'json');
  }
  else {
    $.get('xml', {}, function(x){setIP($(x).find('ip').text());}, 'xml' );
  }

});