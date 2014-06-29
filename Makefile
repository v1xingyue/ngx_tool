CFLAGS=-g 

SRC_DIR=/usr/home/xingyue/




MACRO=-D SRC_DIR=\"${SRC_DIR}\"
ngx_tool:ngx_tool.o
	gcc -o ngx_tool ${CFLAGS} ngx_tool.o 
ngx_tool.o:ngx_tool.c ngx_tool.h
	gcc -c -o ngx_tool.o ngx_tool.c ${MACRO}
clean:
	rm ngx_tool *.o
