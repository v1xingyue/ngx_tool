#!/bin/sh

other_module=""
m_module=" --add-module=$(pwd) $other_module"

cd  /Users/xingyue/outcode/source/nginx-1.6.0
prefix=/data1/nginx_play
rm -rf ${prefix}/{client_body_temp,fastcgi_temp,logs,proxy_temp,sbin,scgi_temp,uwsgi_temp}
make clean
./configure --prefix=$prefix  $m_module --with-debug && make && make install


#./configure --with-cc-opt=" -finstrument-functions " --prefix=$prefix  --add-module=$module_dir --with-debug && make && make install