all: ../index.html

../index.html: id=01
../index.html: index.php
	php index.php $(id) > ../$(id).html

clear_resp:
	rm -f ../data/*.r.txt

clear:
	rm -f ../*.html
	rm -f ../data/*.r.txt
