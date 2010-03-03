/* 	MENU STRUCTURE
	item=['title', 'link', 'description', 'target','path_to_image_file', item, ..., item]
*/


/* fgfsmenu = menu([['home', '/']]); */

fgfsmenu = menu([
  ['Main', '/', 'Main Home Page', '_self', null,
    ['Home Page', '/'],
    _split,
    ['Introduction', '/introduction.html'],
    ['Features', '/features.html'],
    ['Gallery v2.0', '/Gallery-v2.0/'],
    _split,
    ['Announcements', '/announce.html'],
    ['Calendar', '/calendar.html'],
    ['Events', '/events.html']
  ],
  ['Get FlightGear',
    ['Download Central', '/Downloads/'],
    _split,
    ['  Download Main Program', '/Downloads/binary.shtml'],
    ['  Download More Aircraft', '/Downloads/aircraft-2.0.0/'],
    ['  Download World Scenery', '/Downloads/scenery.html'],
    ['  Download Source Code', '/Downloads/source.shtml'],
    _split,
    ['Purchase a DVD set', 'http://www.flightgear.org/dvd/'],
    _split,
    ['Version Change Log', '/version.html'],
    ['Hardware Requirements', '/hardwarereq.html']
  ],
  ['Support',
    ['The Official Manual (html)', '/Docs/getstart/getstart.html'],
    ['Wiki Collaborative Documentation',
     'http://wiki.flightgear.org/flightgear_wiki/index.php?title=Main_Page'],
    ['Frequently Asked Questions', '/Docs/FAQ.shtml'],
    ['Links to all Documentation', '/docs.html'],
    ['Mailing Lists, Forums, and IRC', '/mail.html']
  ],
  ['Links',
    ['Related Websites', '/links.html'],
    ['Related Projects', '/Projects/']
  ],
  ['Users',
    ['Live Multiplayer Map', 'http://mpmap02.flightgear.org'],
    ['Places to Fly', '/places.html']
  ],
  ['Developers',
    ['CVS Resource', '/cvs.html'],
    ['Source Code ', '/Downloads/source.shtml'],
    ['Goals/Wish list', '/goals.html'],
    ['Contributors', '/thanks.shtml'],
    ['Design Proposals', '/design.html']
  ],
  ['Search', '/search.html']
]);

