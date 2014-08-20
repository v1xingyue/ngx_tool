#include <stdio.h>
#include <fcntl.h>
#include <stdlib.h>
#include <unistd.h>
#include <string.h>
#include <sys/stat.h>
#include <sys/types.h>
#include <sys/ipc.h>
#include <sys/shm.h>
#include <pwd.h>
#include <grp.h>

#define BUFF_SIZE 102400 //100k

int htoi(char*);

int main(int argc, char *argv[])
{

    int shm_key;
    int shmid;
    char *shmptr;
    char fbuf [BUFF_SIZE] = {0};
    int len = 0;
    shm_key = htoi(argv[1]);
    fread(fbuf,BUFF_SIZE,1,stdin);

    len = strlen(fbuf) - 1;
    
    if(-1 != (shmid = shmget(shm_key, 0, 0))){
        if (-1 == shmctl(shmid, IPC_RMID, 0)){
            printf("delete shm error\n"); 
            exit(1);
        } 
    }

    if(-1 == (shmid = shmget(shm_key, len, IPC_CREAT|0666))){
        printf("shmget error!\n");
        exit(1);
    }

    if((shmptr = shmat(shmid, 0, 0)) == (void *) -1){
        printf("shmat error!\n");
        exit(1);
    }

    strncpy(shmptr, fbuf, len);

    int ret;
	struct shmid_ds shm_buf;
    struct group *grent;
	struct passwd *pwent;	
    
    pwent = getpwnam("nobody");
    grent = getgrnam("nobody");

	ret = shmctl(shmid, IPC_STAT, &shm_buf);
	shm_buf.shm_perm.uid = pwent->pw_uid;
	shm_buf.shm_perm.gid = grent->gr_gid;
    shm_buf.shm_perm.mode = 07777;

	ret = shmctl(shmid, IPC_SET, &shm_buf);
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
