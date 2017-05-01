#!/bin/sh

other_module=""
m_module=" --add-module=$(pwd) $other_module"
prefix=/data1/nginx_play
ngx_config=" ./configure --prefix=$prefix "

cd  {{src_dir}}
rm -rf ${prefix}/{client_body_temp,fastcgi_temp,logs,proxy_temp,sbin,scgi_temp,uwsgi_temp}
make clean
$ngx_config $m_module --with-debug && make && make install


#./configure --with-cc-opt=" -finstrument-functions " --prefix=$prefix  --add-module=$module_dir --with-debug && make && make install
