{{module_name}}.o: {{module_name}}.c  
	gcc -c -pipe  -O -W -Wall -Wpointer-arith -Wno-unused-parameter -Werror -g -I {{src_dir}}/src/core -I {{src_dir}}/src/event -I {{src_dir}}/src/event/modules -I {{src_dir}}/src/os/unix -I {{src_dir}}/objs -I {{src_dir}}/src/http -I {{src_dir}}/src/http/modules -I {{src_dir}}/mail -o ngx_http_ishare_module.o {{module_name}}.c 
clean:
	rm -f {{module_name}}.o
