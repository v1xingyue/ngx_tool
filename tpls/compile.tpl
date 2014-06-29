#!/bin/sh

module_dir=$(pwd)
cd  /usr/home/xingyue/source/nginx-1.6.0/
prefix=/data1/nginx_play
ccopt=" --with-cc-opt=' -finstrument-functions '";
rm -rf ${prefix}/{client_body_temp,fastcgi_temp,logs,proxy_temp,sbin,scgi_temp,uwsgi_temp}
make clean
./configure --prefix=$prefix  --add-module=$module_dir --with-debug $ccopt && make && make install
