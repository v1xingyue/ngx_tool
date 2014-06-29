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

int main(int argc, char **argv){
	if(argc != 2 ){
		printf("Usage : ./ngx_tool <module_name>\n");
		return 1;	
	}
	printf("\n^_^  Hello. Begin make module %s \n\n",argv[1]);
	make_module(argv[1]);
	return 0;
}

void make_module(char *module_name) {
	void (*work_funs[])(char*) = {
		make_dir,
		make_config,
		make_source,
		make_compile,
		make_welcome,
		NULL	
	};
	void (**current)(char*);
	current = work_funs;
	do {
		(*current)(module_name);
		current++;	
	} while(*current != NULL);
}

void make_dir(char* module_name) {
	printf("Make dir %s \n",module_name);
	mkdir(module_name,0755);
}

void make_config(char* module_name) {
	printf("Make config file %s/config \n",module_name);
	char buf[4096] = {0}; 
	FILE *fp = NULL ;
	char new_file_name[128];
	fp = fopen("tpls/config.tpl","r"); 
	fread(buf,4096,1,fp);
	fclose(fp);
	replace_str(buf,"{{module_name}}",module_name);	
	sprintf(new_file_name,"%s/config",module_name);
	fp = fopen(new_file_name,"w+"); 
	fwrite(buf,strlen(buf),1,fp);
	fclose(fp);
}

void make_source(char* module_name) {
	printf("Make source file %s/%s.c \n",module_name,module_name);
	char buf[4096] = {0}; 
	FILE *fp = NULL ;
	char new_file_name[128];
	fp = fopen("tpls/source.tpl","r"); 
	fread(buf,4096,1,fp);
	fclose(fp);
	replace_str(buf,"{{module_name}}",module_name);	
	sprintf(new_file_name,"%s/%s.c",module_name,module_name);
	fp = fopen(new_file_name,"w+"); 
	fwrite(buf,strlen(buf),1,fp);
	fclose(fp);
}

void make_compile(char* module_name) {
	printf("Make compile.sh %s/comile.sh \n",module_name);
	char buf[4096] = {0}; 
	FILE *fp = NULL ;
	char new_file_name[128];
	fp = fopen("tpls/compile.tpl","r"); 
	fread(buf,4096,1,fp);
	fclose(fp);
	replace_str(buf,"{{module_name}}",module_name);	
	sprintf(new_file_name,"%s/compile.sh",module_name);
	fp = fopen(new_file_name,"w+"); 
	fwrite(buf,strlen(buf),1,fp);
	fclose(fp);
}


void make_welcome(char *module_name) {
	printf("\n");
	printf("^_^ Ok . Now you have create nginx module %s \n",module_name);
	printf("Ok . Now you have create nginx module %s \n",module_name);
	printf("\n");
}

void replace_str(char* content, char *val_name, char *value){
	char *buffer;
	char *p; 
	buffer = (char*)malloc(4096 * sizeof(char));
	do{ 
		bzero(buffer,4096);
		if(!(p = strstr(content, val_name)) || 0 == strcmp(val_name, value)){
			break;
		}   
		strcpy(buffer,p+strlen(val_name));   sprintf(p,"%s%s",value,buffer);
	} while(p);
}
