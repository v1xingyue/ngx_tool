#include <stdio.h>

struct a {
	int a;
	int b;
};

int main(){
	struct a k = {3,4};
	printf("a = %d \n b = %d \n", k.a , k.b);
	return 0;
}
