.PHONY: default clean %.x rsync alleps

alljpg:=$(wildcard *.jpg)
alleps:=$(alljpg:.jpg=.eps)

default: handout.pdf index.html fgfs.pdf

clean:
	rm -f *.aux *.dvi *.log *.ps *.pdf $(alleps)

alleps: $(alleps)
	ls -al $(alleps)

%.x: %.dvi
	xdvi -paper a4 $<

.PRECIOUS: %.dvi
%.dvi: %.tex linuxtag.sty $(alleps)
	latex $<
	latex $<

%.pdf: %.ps
	ps2pdf $<

handout.ps: numbered.ps
	psnup -pa4 -Pletter -l -m1cm -b-0.2cm -4 -c $< $@

%.ps: %.dvi $(alleps)
	dvips $< -t a4 -o $@

%.x: %.mgp
	mgp -x vflib $< -t45 # -Q100

%.ps: %.mgp $(alleps) default.mgp
	mgp2ps -c -i -pletter $< | psnup -pletter -l -m1cm -1 -c -d > $@

%.eps:  %.jpg
	djpeg -pnm $< | pnmtops -rle -noturn > $@

%.mgp: %.awk slides.mgp
	awk -f $< < slides.mgp > $@

%.html: %.mgp
	mgp2html.pl $< > $@
