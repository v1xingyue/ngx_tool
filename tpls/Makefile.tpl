{{module_name}}.o: {{module_name}}.c  
	gcc -c -pipe  -O -W -Wall -Wpointer-arith -Wno-unused-parameter -Werror -g   -I {{src_path}}core -I
clean:
	rm -f {{module_name}}.o
