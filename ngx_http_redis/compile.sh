#!/bin/sh

other_module=""
m_module=" --add-module=$(pwd) $other_module"

cd  /usr/home/xingyue/source/nginx-1.7.3/
prefix=/data1/nginx173/

#make clean
./configure --prefix=$prefix  $m_module --with-debug && make && make install
/data1/nginx173/sbin/nginx -s stop
/data1/nginx173/sbin/nginx 

#./configure --with-cc-opt=" -finstrument-functions " --prefix=$prefix  --add-module=$module_dir --with-debug && make && make install
