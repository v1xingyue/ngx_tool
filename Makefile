CFLAGS=-g 

ngx_tool:ngx_tool.o
	gcc -o ngx_tool ${CFLAGS} ngx_tool.o
ngx_tool.o:ngx_tool.c
	gcc -c -o ngx_tool.o ngx_tool.c
clean:
	rm ngx_tool *.o
