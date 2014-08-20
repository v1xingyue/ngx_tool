#!/bin/sh

#home page
php php/render.php  php/home_tpl.php | php | ./c/loadtoshm 0xff13000
./c/readshm 0xff13000 

#detail page
php php/render.php  php/detail_tpl.php | php | ./c/loadtoshm 0xff12000
./c/readshm 0xff12000

#class page
php php/render.php  php/class_tpl.php | php | ./c/loadtoshm 0xff14000
./c/readshm 0xff14000

#class content page
php php/render.php  php/class_content.php | php | ./c/loadtoshm 0xff15000
./c/readshm 0xff15000
