#include <stdio.h>

int main(int argc, char** argv){
	char *n[] = {"MMMMMMM","NNNNNNNN","AAAAA","BBBBBB",NULL};
	char **b;
	b = (char**) &n;
	while(*b!=NULL){
		printf("REPLACE %s TO %s \n",*b,*(b+1));
		b+=2;
	}
	return 0;
}
