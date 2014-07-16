#ifndef XY_NGX_TOOL_H
#define XY_NGX_TOOL_H

#ifndef src_dir
#define src_dir "./"
#endif

#ifndef out_dir
#define out_dir "./"
#endif

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/stat.h> 

void replace_str(char*, char*, char*);
void make_module(char *, char*) ;
void make_dir(char *) ;
void make_config(char *) ;
void make_source(char *) ;
void make_welcome(char *) ;
void make_compile(char *) ;
void make_makefile(char *) ;
void parse_file(char *, char* ,char** ,int );

#endif
