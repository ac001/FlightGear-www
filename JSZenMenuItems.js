/* 	MENU STRUCTURE
	item=['title', 'link', 'description', 'target','path_to_image_file', item, ..., item]
*/


fgfsmenu = menu([
  ['Home', '/', 'Main Home Page', '_self', null,
    ['Home Page', '/'],
    ['Introduction', '/introduction.html'],
    ['Features', '/features.html'],
    ['Gallery', '/Gallery-v1.0/'],
    ['Announcements', '/announce.html'],
    ['Events', '/events.html']
  ],
  ['Get FlightGear',
    ['Download FlightGear',
      ['FlightGear Program', '/Downloads/binary.shtml'],
      ['Additional Aircraft', '/Downloads/aircraft/'],
      ['World Scenery', '/Downloads/scenery.html'],
      ['Source Code', '/Downloads/source.shtml'],
      ['Main Download Page', '/Downloads/'],
    ],
    ['Purchase a CD or DVD set', 'http://www.flightgear.org/cdrom/']
  ],
  ['Support',
    ['Version Change Log', '/version.html'],
    ['Hardware Requirements', '/hardwarereq.html'],
    ['Documentation', '/docs.html'],
    ['Places to Fly', '/places.html'],
    ['Mailing Lists, Forums, and IRC', '/mail.html'],
    ['Wiki', 'http://wiki.flightgear.org/flightgear_wiki/index.php?title=Main_Page'],
    ['FAQ', '/Docs/FAQ.shtml']
  ],
  ['Links',
    ['Related Websites', '/links.html'],
    ['Related Projects', '/Projects/']
  ],
  ['Developers',
    ['CVS Resource', '/cvs.html'],
    ['Source Code', '/Downloads/source.shtml'],
    ['Goals/Wish list', '/goals.html'],
    ['Contributors', '/thanks.shtml'],
    ['Design Proposals', '/design.html']
  ],
  ['Search', '/search.html']
]);

