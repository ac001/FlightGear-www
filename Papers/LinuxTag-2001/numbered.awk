
BEGIN {
	total=32;
	this=0;
	armed=0;
}

/^\%page/ {
	armed=1;
	this++;
}

/^$/ {
	if ( armed ) {
		armed=0;
	$0 = "Slide " this " / " total;
	}
}

{ print $0; }
