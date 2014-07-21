#include <stdio.h>

void f_1(char* a){
	printf("f_1\n");
}
void f_2(char* a){
	printf("f_2\n");
}
void f_3(char* a){
	printf("f_3\n");
}
void f_4(char* a){
	printf("f_4\n");
}

int main(int argc, char** argv){

	
	void (*p[4])(char*) ;

	p[0] = f_1;
	p[1] = f_4;
	p[2] = NULL;

	void (**current)(char*) = p;
	do {
		(*current)("Hello world.");
		current++;	
	} while(*current != NULL);

	return 0;
}

