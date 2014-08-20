#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#include <sys/ipc.h>
#include <sys/shm.h>

int htoi(char*);

int main(int argc, char *argv[])
{
    int shmid;
    int shm_key;
    char *shmptr;
    shm_key = htoi(argv[1]);
    if(-1 ==(shmid = shmget(shm_key, 0, 0))){
        printf("shmget error!\n");
        exit(1);
    }

    if((shmptr = shmat(shmid, 0, 0)) == (void *) -1){
        printf("shmat error!\n");
        exit(1);
    }

    printf("read from shm:%s \nfile len: %ld\n", shmptr,strlen(shmptr));
    shmdt(shmptr);

    return 0;
}

int htoi(char *s) {

    int len = strlen(s) ;
    int res = 0, jz = 1,wz = 0;
    char c = '0';

    while(len--) {
        if(s[len] == 'x' || s[len] == 'X')  break;
        c = s[len];
        if(c <= '9' && c >= '0' ) {
            wz = c - '0';
        } else if (c <= 'f' && c >= 'a') {
            wz = c - 'a' + 10;
        } else {
            wz = 0; 
        }
        res += jz * wz;
        jz *= 16;
    }
    return res;
}
