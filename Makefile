CFLAGS=-g 

src_dir=/Users/xingyue/outcode/source/nginx-1.6.0
out_dir=/Users/xingyue/outcode/ngx_modules

MACRO=-D src_dir=\"${src_dir}\" -D out_dir=\"${out_dir}\"
ngx_tool:ngx_tool.o
	gcc -o ngx_tool ${CFLAGS} ngx_tool.o 
ngx_tool.o:ngx_tool.c ngx_tool.h
	gcc -c -o ngx_tool.o ngx_tool.c ${MACRO}
clean:
	rm ngx_tool *.o
