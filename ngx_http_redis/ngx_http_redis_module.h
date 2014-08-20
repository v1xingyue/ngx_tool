#ifndef REDIS_DATA_STRUCT_H
#define REDIS_DATA_STRUCT_H

#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#include <sys/ipc.h>
#include <sys/shm.h>

#include "cJSON.h"

typedef struct {
    char *uri;
    int compare_len;
    int len_range;
    int key_data_range; 
    int tpl_shm;
} ngx_http_redis_uri_config ;

static ngx_http_redis_uri_config uri_configs[] = {
        //{uri,compare_len,len-,left+,shm_id}
        { "/home",5,-1,+1, 0xff13000 },
        { "/f/",3,-8,+3, 0xff12000 },  // /f/12.html
        { "/c/",3,-6,+1, 0xff14000 },  // /c/12.html => c/12  
        { "/class_content/",15,-20,+15, 0xff15000 },  // /c/12.html => c/12  
        { NULL ,0,0,0, 0}
};

void ngx_http_redis_replace_str(char*, char*, char*);
int ngx_http_redis_parse_tpl(char *,char** ,int ,int );
static int ngx_http_redis_rebuild_response(u_char *,ssize_t,ssize_t*,u_char **,int,ngx_log_t*);

#define ngx_http_redis_buffer_size 1024 * 1024

#endif
