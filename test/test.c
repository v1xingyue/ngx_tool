#include <stdio.h>

void parse_file(char** b){
	while(*b!=NULL){
		printf("REPLACE %s TO %s \n",*b,*(b+1));
		b+=2;
	}
}

int main(int argc, char** argv){
	char *n[] = {"MMMMMMM","NNNNNNNN","AAAAA","BBBBBB",NULL};
	parse_file((char**) &n);
	return 0;
}

