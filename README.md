ngx_tool
========

A tool to make nginx modules.  It will become very easy to make nginx modules by this tool.

<pre>
<code>
$ git clone https://github.com/qixingyue/ngx_tool.git
$ cd ngx_tool
$ vim Makefile
$ make
$./ngx_tool hello

^_^  Hello. Begin make module hello 

Make dir hello 
Make config file hello/config 
Make source file hello/hello.c 

^_^ Ok . Now you have create nginx module hello 
Ok . Now you have create nginx module hello 

</code>
</pre>

========

Tips:
You may edit some tpls :
	tpls/compile.tpl : Line 7 , make your own prefix .
	ngx_tool.h  : Line 5 , make your own src dir.
	ngx_tool.h  : Line 9 , make your own destination dir .

