
.PHONY: default clean %.x rsync

default: index.html handout.pdf

alljpg:=$(wildcard *.jpg)
alleps:=$(alljpg:.jpg=.eps)

clean:
	rm -f *.aux *.dvi *.log *.ps *.eps *.pdf numbered.mgp index.mgp

%.x: %.dvi
	xdvi -paper a4 $<

.PRECIOUS: %.dvi %.eps
%.dvi: %.tex linuxtag.sty $(alleps)
	latex $<
	latex $<

%.pdf: %.ps
	ps2pdf $<

%.ps: %.dvi
	dvips $< -t a4 -o $@

%.x: %.mgp
	mgp -F 1,0,0,0 -Q 100 -t 30 -x vflib $<

%.ps: %.mgp $(alleps) default.mgp
	mgp2ps -c -i -pletter $< | psnup -pletter -l -m1cm -1 -c -d > $@

handout.ps: numbered.ps
	# psnup -pa3 -Pletter -l -m1cm -b-0.3cm -8 -c $< $@
	  psnup -pa4 -Pletter -l -m1cm -b-0.2cm -4 -c $< $@

rsync:
	rsync -cvu -e ssh * p2:fs/ukuug
	rsync -cvu -e ssh   p2:fs/ukuug/* .

%.mgp: %.awk slides.mgp
	awk -f $< < slides.mgp > $@

%.eps:	%.jpg
	djpeg -pnm $< | pnmtops -rle -noturn > $@

%.html: %.mgp
	mgp2html.pl $< > $@
