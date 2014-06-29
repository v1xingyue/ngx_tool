#ifndef XY_NGX_TOOL_H
#define XY_NGX_TOOL_H

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/stat.h> 

void replace_str(char*, char*, char*);
void make_module(char *module_name) ;
void make_dir(char *module_name) ;
void make_config(char *module_name) ;
void make_source(char *module_name) ;
void make_welcome(char *module_name) ;
void make_compile(char *module_name) ;

#ifndef src_dir
#define src_dir "./"
#endif

#ifndef out_dir
#define out_dir "./"
#endif


#endif
