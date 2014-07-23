#include <sys/sysinfo.c>
#include <stdio.h>

// http://stackoverflow.com/questions/4993158/sysinfo-system-call-returns-wrong-load-average-values-on-linux

int main(){

	struct sysinfo info;

	for(;;){
		sysinfo(&info);	
		printf("%ld\n",info.loads[0]);
	}

	return 0;

}
