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
                'fgfs-screen-001b.jpg',
                'fgfs-screen-001.jpg',
                'fgfs-screen-002b.jpg',
                'fgfs-screen-002.jpg',
                'fgfs-screen-006.jpg',
                'fgfs-screen-007b.jpg',
                'fgfs-screen-007.jpg',
                'fgfs-screen-009b.jpg',
                'fgfs-screen-009.jpg',
                'fgfs-screen-014.jpg',
                'fgfs-screen-015b.jpg',
                'fgfs-screen-015.jpg',
                'fgfs-screen-018b.jpg',
                'fgfs-screen-018c.jpg',
                'fgfs-screen-018.jpg',
                'fgfs-screen-020b.jpg',
                'fgfs-screen-020c.jpg',
                'fgfs-screen-020.jpg',
                'fgfs-screen-024.jpg',
                'fgfs-screen-027.jpg',
                'fgfs-screen-029.jpg',
                'fgfs-screen-032.jpg',
                'fgfs-screen-036.jpg',
                'fgfs-screen-039b.jpg',
                'fgfs-screen-039.jpg',
                'fgfs-screen-042.jpg',
                'fgfs-screen-043.jpg',
                'fgfs-screen-044.jpg',
                'fgfs-screen-047.jpg',
                'fgfs-screen-049.jpg',
                'fgfs-screen-058.jpg',
                'fgfs-screen-063.jpg',
                'fgfs-screen-069.jpg',
                'fgfs-screen-077.jpg',
                'fgfs-screen-079.jpg',
                'fgfs-screen-084.jpg',
                'fgfs-screen-086.jpg',
                'fgfs-screen-090.jpg',
                'fgfs-screen-096.jpg',
                'fgfs-screen-103b.jpg',
                'fgfs-screen-103.jpg',
                'fgfs-screen-106.jpg',
                'fgfs-screen-108.jpg',
                'fgfs-screen-115.jpg',
                'fgfs-screen-123.jpg',
                'fgfs-screen-136.jpg',
                'fgfs-screen-141.jpg',
                'fgfs-screen-143.jpg',
                'fgfs-screen-146b.jpg',
                'fgfs-screen-146.jpg',
                'fgfs-screen-147b.jpg',
                'fgfs-screen-147.jpg',
                'fgfs-screen-150.jpg',
                'fgfs-screen-151.jpg',
                'fgfs-screen-161.jpg',
                'fgfs-screen-164.jpg',
                'fgfs-screen-165.jpg',
                'fgfs-screen-169.jpg',
                'fgfs-screen-172.jpg',
                'fgfs-screen-177.jpg',
                'fgfs-screen-192.jpg',
                'fgfs-screen-196.jpg',
                'fgfs-screen-199.jpg',
                'fgfs-screen-211.jpg',
                'fgfs-screen-216.jpg',
                'fgfs-screen-233.jpg',
                'fgfs-screen-241.jpg'
              ];

  picts.fgshuffle();

  document.write("<A HREF=\"/Gallery-v2.0/Original/" + picts[0] + "\"><IMG CLASS=\"mainscreen\" WIDTH=\"240\" SRC=\"/Gallery-v2.0/Original/" + picts[0] + "\" ALT=\"" + picts[0] + "\"></A>");
  document.write("<A HREF=\"/Gallery-v2.0/Original/" + picts[1] + "\"><IMG CLASS=\"mainscreen\" WIDTH=\"240\" SRC=\"/Gallery-v2.0/Original/" + picts[1] + "\" ALT=\"" + picts[1] + "\"></A>");
  document.write("<A HREF=\"/Gallery-v2.0/Original/" + picts[2] + "\"><IMG CLASS=\"mainscreen\" WIDTH=\"240\" SRC=\"/Gallery-v2.0/Original/" + picts[2] + "\" ALT=\"" + picts[2] + "\"></A>");
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
  		'ftp://ftp.linux.kiev.ua/pub/mirrors/ftp.flightgear.org/flightgear/',
  		'http://ftp.linux.kiev.ua/pub/fgfs/'
              ];

  // The following need to be checked and added back in once synced
  //
  // 'http://flightgear.mxchange.org/pub/fgfs/',
  // 'http://ftp3.linux.kiev.ua/pub/fgfs/',
  // 'ftp://flightgear.wo0t.de/flightgear-ftp/'
  //

  // requested not to be in the round robin, but is a full mirror
  // 'ftp://ftp.is.co.za/pub/games/flightgear/'
  // 'ftp://ftp.flightgear.org/pub/fgfs/',

  sites.fgshuffle();

  document.write("<a href=\"" + sites[0] + base + "\">[Mirror 1]</a> ");
  document.write("<a href=\"" + sites[1] + base + "\">[Mirror 2]</a> ");
  document.write("<a href=\"" + sites[2] + base + "\">[Mirror 3]</a>");
}
