all: ../index.html

../index.html: index.php ../data/01.p.txt
	php index.php > ../index.html

clear_resp:
	rm -f ../data/*.r.txt

clear:
	rm -f ../*.html
	rm -f ../data/*.r.txt
