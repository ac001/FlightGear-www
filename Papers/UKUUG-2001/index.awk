# Make some changes so that the slides are compatible with HTML generation.


/newimage / {
	fname = $0;
	quote = index ( fname, "\"" );
	fname = substr ( fname, quote+1 );
	quote = index ( fname, "\"" );
	fname = substr ( fname, 1, quote-1 );
	$0 = "<img src=\"" fname "\" alt=\"" fname "\" width=\"80%\" >";
}

/bimage / {
	fname = $0;
	quote = index ( fname, "\"" );
	fname = substr ( fname, quote+1 );
	quote = index ( fname, "\"" );
	fname = substr ( fname, 1, quote-1 );
	$0 = "<img src=\"" fname "\" alt=\"" fname "\" width=\"80%\" >";
}


1 {	print $0;
}
