#include <stdio.h>
#include <stdarg.h>

void mu(char *format , ...){
	va_list ap;
	printf("%s\n",format);
	va_start(ap,format);
	printf("%d ", va_arg(ap, int));
	printf("%d ", va_arg(ap, int));
	printf("%d ", va_arg(ap, int));
	printf("%s ", va_arg(ap, char*));
	va_end(ap);
	printf("\n");
}

int main(int argc, char **argv){
	mu("Hello wrold.",1,2,3,"Hello new str");	
	return 0;
}
