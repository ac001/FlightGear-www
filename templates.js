/* Display the main graphical logo */
function MainLogo()
{
  var root = arguments[0];

  document.write("<div id=\"top\">");
  document.write("  <a href=\"" + root + "\"><img id=\"titlebar\" src=\"" + root + "/images/fglogosm.jpg\" alt=\"\"></a>");
  document.write("</div>");
}


/* Display the google site search form */
function SiteSearchGoogle()
{
  document.write("<form method=\"get\" action=\"http://www.google.com/custom\" target=\"_top\">");
  document.write("<table border=\"0\" bgcolor=\"#ffffff\" id=\"page\">");
  document.write("<tr><td nowrap=\"nowrap\" valign=\"top\" align=\"left\" height=\"32\">");
  document.write("<a href=\"http://www.google.com/\">");
  document.write("<img src=\"http://www.google.com/logos/Logo_25wht.gif\"");
  document.write("border=\"0\" alt=\"Google\"></img></a>");
  document.write("<br/>");
  document.write("<input type=\"hidden\" name=\"domains\" value=\"flightgear.org\"></input>");
  document.write("<input type=\"text\" name=\"q\" size=\"15\" maxlength=\"255\" value=\"\"></input>");
  document.write("</td></tr>");
  document.write("<tr>");
  document.write("<td nowrap=\"nowrap\">");
  document.write("<table>");
  document.write("<tr>");
  document.write("<td>");
  document.write("<input type=\"radio\" name=\"sitesearch\" value=\"\"></input>");
  document.write("<font size=\"-1\" color=\"#000000\">Web</font>");
  document.write("</td>");
  document.write("<td>");
  document.write("<input type=\"radio\" name=\"sitesearch\" value=\"flightgear.org\" checked=\"checked\"></input>");
  document.write("<font size=\"-1\" color=\"#000000\">FlightGear.org</font>");
  document.write("</td>");
  document.write("</tr>");
  document.write("</table>");
  document.write("<input type=\"submit\" name=\"sa\" value=\"Search\"></input>");
  document.write("<input type=\"hidden\" name=\"client\" value=\"pub-2485404446552133\"></input>");
  document.write("<input type=\"hidden\" name=\"forid\" value=\"1\"></input>");
  document.write("<input type=\"hidden\" name=\"ie\" value=\"ISO-8859-1\"></input>");
  document.write("<input type=\"hidden\" name=\"oe\" value=\"ISO-8859-1\"></input>");
  document.write("<input type=\"hidden\" name=\"safe\" value=\"active\"></input>");
  document.write("<input type=\"hidden\" name=\"cof\" value=\"GALT:#008000;GL:1;DIV:#336699;VLC:663399;AH:center;BGC:FFFFFF;LBGC:336699;ALC:0000FF;LC:0000FF;T:000000;GFNT:0000FF;GIMP:0000FF;FORID:1;\"></input>");
  document.write("<input type=\"hidden\" name=\"hl\" value=\"en\"></input>");
  document.write("</td></tr></table>");
  document.write("</form>");
}

/* Display the main menu */
function MainMenu()
{
  var root = arguments[0];

  document.write("<h3>Main</h3>");
  document.write("<a href=\"" + root + "/index.shtml\">Home</a><br>");
  document.write("<a href=\"" + root + "/introduction.html\">Introduction</a><br>");
  document.write("<a href=\"" + root + "/features.html\">Features</a><br>");
  document.write("<a href=\"" + root + "/Gallery-v1.9/\">Gallery</a><br>");
  document.write("<a href=\"" + root + "/Downloads/\">Downloads</a><br>");
  document.write("<a href=\"http://www.flightgear.org/dvd/\">DVD's</a><br>");
  document.write("<h3>Support</h3>");
  document.write("<a href=\"" + root + "/version.html\">Version Change Log</a><br>");
  document.write("<a href=\"" + root + "/hardwarereq.html\">Hardware Requirements</a><br>");
  document.write("<a href=\"" + root + "/docs.html\">Documentation</a><br>");
  document.write("<a href=\"" + root + "/places.html\">Places to Fly</a><br>");
  document.write("<a href=\"" + root + "/mail.html\">Lists, Forums, and IRC</a><br>");
  document.write("<a href=\"" + root + "/Docs/FAQ.shtml\">FAQ</a><br>");
  document.write("<h3>Links</h3>");
  document.write("<a href=\"" + root + "/links.html\">Related Websites</a><br>");
  document.write("<a href=\"" + root + "/Projects/\">Related Projects</a><br>");
  document.write("<h3>Contribute</h3>");
  document.write("<a href=\"" + root + "/contributing.html\">Contributing</a><br>");
  document.write("<a href=\"" + root + "/cvs.html\">CVS Resources</a><br>");
  document.write("<a href=\"" + root + "/goals.html\">Goals/Wish list</a><br>");
  document.write("<a href=\"" + root + "/thanks.shtml\">Contributors</a><br>");
  document.write("<a href=\"" + root + "/design.html\">Design Proposals</a><br>");
  document.write("<a href=\"" + root + "/events.html\">Events</a><br>");
}


function BottomMenu()
{
  var root = arguments[0];

  // document.write("<a href=\"/\">Home</a> | ");
  // document.write("<a href=\"" + root + "/Downloads/\">Downloads</a> | ");
  // document.write("<a href=\"" + root + "/Gallery-v1.9/\">Gallery</a> |");
  // document.write("<a href=\"" + root + "/docs.html\">Documentation</a>");
}


// Array.shuffle( deep ) - Randomly interchange elements
Array.prototype.fgshuffle = function( b ) {
 var i = this.length, j, t;
 while( i ) {
  j = Math.floor( ( i-- ) * Math.random() );
  t = b && typeof this[i].shuffle!=='undefined' ? this[i].shuffle() : this[i];
  this[i] = this[j];
  this[j] = t;
 }
 return this;
};

function RandomFrontImages()
{
  var base = arguments[0];

  var picts = [
		'picture-0001',
		'picture-0002',
		'picture-0003',
		'picture-0004',
		'picture-0005',
		'picture-0006',
		'picture-0007',
		'picture-0008',
		'picture-0009',
		'picture-0010',
		'picture-0011',
		'picture-0012',
		'picture-0013',
		'picture-0014',
		'picture-0015',
		'picture-0016',
		'picture-0017',
		'picture-0018',
		'picture-0019',
		'picture-0020',
		'picture-0021',
		'picture-0022',
		'picture-0026',
		'picture-0027',
		'picture-0028',
		'picture-0029',
		'picture-0032',
		'picture-0033',
		'picture-0034',
		'slide_fgfs-screen-002',
		'slide_fgfs-screen-008',
		'slide_fgfs-screen-017',
		'slide_fgfs-screen-036',
		'slide_fgfs-screen-047',
		'slide_fgfs-screen-062',
		'slide_fgfs-screen-065',
		'slide_fgfs-screen-096',
		'slide_fgfs-screen-101',
		'slide_fgfs-screen-114',
		'slide_fgfs-screen-136',
		'slide_fgfs-screen-137',
		'slide_fgfs-screen-144',
		'slide_fgfs-screen-155',
		'slide_fgfs-screen-163',
		'slide_fgfs-screen-166',
		'slide_fgfs-screen-169',
		'slide_fgfs-screen-215',
		'slide_fgfs-screen-217'
              ];

  picts.fgshuffle();

  //document.write("<A HREF=\"/Gallery-v1.9/Link/" + picts[0] + ".html\"><IMG CLASS=\"mainscreen\" WIDTH=\"160\" HEIGHT=\"120\" SRC=\"/Gallery-v1.9/Small/" + picts[0] + ".jpg\" ALT=\"" + picts[0] + "\"></A>");
  //document.write("<A HREF=\"/Gallery-v1.9/Link/" + picts[1] + ".html\"><IMG CLASS=\"mainscreen\" WIDTH=\"160\" HEIGHT=\"120\" SRC=\"/Gallery-v1.9/Small/" + picts[1] + ".jpg\" ALT=\"" + picts[1] + "\"></A>");
  //document.write("<A HREF=\"/Gallery-v1.9/Link/" + picts[2] + ".html\"><IMG CLASS=\"mainscreen\" WIDTH=\"160\" HEIGHT=\"120\" SRC=\"/Gallery-v1.9/Small/" + picts[2] + ".jpg\" ALT=\"" + picts[2] + "\"></A>");
  document.write("<A HREF=\"/Gallery-v1.9/Link/" + picts[0] + ".html\"><IMG CLASS=\"mainscreen\" WIDTH=\"240\" SRC=\"/Gallery-v1.9/Small/" + picts[0] + ".jpg\" ALT=\"" + picts[0] + "\"></A>");
  document.write("<A HREF=\"/Gallery-v1.9/Link/" + picts[1] + ".html\"><IMG CLASS=\"mainscreen\" WIDTH=\"240\" SRC=\"/Gallery-v1.9/Small/" + picts[1] + ".jpg\" ALT=\"" + picts[1] + "\"></A>");
  document.write("<A HREF=\"/Gallery-v1.9/Link/" + picts[2] + ".html\"><IMG CLASS=\"mainscreen\" WIDTH=\"240\" SRC=\"/Gallery-v1.9/Small/" + picts[2] + ".jpg\" ALT=\"" + picts[2] + "\"></A>");
}


function RandomURLS()
{
  // Contacts
  // ftp://mirrors.ibiblio.org/pub/mirrors/flightgear/ftp/
  // ftp://ftp.ibiblio.org/pub/mirrors/flightgear/ftp/ Don Sizemore - dls
  //   at metalab dt unc dt edu
  // ftp://ftp.kingmont.com/flightsims/flightgear/ - Jim Brennan jjb
  //   at kingmont dt com
  // http://flight.frozenwebhost.com/ - Steve support at
  //   frozenwebhost dt com
  // http://mirror.fslutd.org/ - Philip White pmw at qnan dt org
  // http://flightgear.mxchange.org/pub/fgfs/ - Roland Hadar r.haeder
  //   at will-hier-weg dt de
  // ftp://ftp.linux.kiev.ua/pub/mirrors/ftp.flightgear.org/ - Michael
  //   Shigorin mike at osdn dt org dt ua
  // http://www.very-clever.com/download/flightgear/ - Ewald Kicker ewald
  //   dot kicker at sozialprojekte dot com
  // ftp://flightgear.wo0t.de/flightgear-ftp - David Shulz - coby at fu110 dot de

  var base = arguments[0];

  var sites = [
                'ftp://mirrors.ibiblio.org/pub/mirrors/flightgear/ftp/',
                'http://mirrors.ibiblio.org/pub/mirrors/flightgear/ftp/',
                'ftp://ftp.ibiblio.org/pub/mirrors/flightgear/ftp/',
                'ftp://ftp.kingmont.com/flightsims/flightgear/',
                'ftp://ftp.de.flightgear.org/pub/fgfs/',
		'http://flightgear.mxchange.org/pub/fgfs/',
		'ftp://ftp.linux.kiev.ua/pub/mirrors/ftp.flightgear.org/flightgear/',
		'http://ftp3.linux.kiev.ua/pub/fgfs/',
		'ftp://flightgear.wo0t.de/flightgear-ftp/'
              ];

  // requested not to be in the round robin, but is a full mirror
  // 'ftp://ftp.is.co.za/pub/games/flightgear/'
  // 'ftp://ftp.flightgear.org/pub/fgfs/',

  sites.fgshuffle();

  document.write("<a href=\"" + sites[0] + base + "\">[Mirror 1]</a> ");
  document.write("<a href=\"" + sites[1] + base + "\">[Mirror 2]</a> ");
  document.write("<a href=\"" + sites[2] + base + "\">[Mirror 3]</a>");
}
