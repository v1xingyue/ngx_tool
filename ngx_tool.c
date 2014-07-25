#include "ngx_tool.h"

int main(int argc, char **argv){
	char *module_type;
	if(argc < 2 ){
		printf("Usage : ./ngx_tool <module_name>\n");
		return 1;	
	}

	if(argc >= 3){
		module_type = argv[2];	
	} else {
		module_type = "handler";
	}

	printf("\n^_^  Hello. Begin make module %s \n\n",argv[1]);
	make_module(argv[1],argv[2]);
	return 0;
}

void make_module(char *module_name, char* module_type) {

	void (*work_funs[])(char*) = 	{
		make_dir,
		make_config,
		make_source,
		make_compile,
		make_makefile,
		make_welcome,
		NULL	
	};


	void (**current)(char*) = work_funs;
	do {
		(*current)(module_name);
		current++;	
	} while(*current != NULL);
}

void make_dir(char* module_name) {
	char dir_name[256];
	sprintf(dir_name,"%s/%s",out_dir,module_name);
	printf("Make dir %s \n",dir_name);
	mkdir(dir_name,0755);
}

void make_config(char* module_name) {
	printf("Make config file %s/%s/config \n",out_dir,module_name);
	char new_file_name[128];
	char *replace_args[] = {"{{module_name}}",module_name};
	sprintf(new_file_name,"%s/%s/config",out_dir,module_name);
	parse_file("tpls/config.tpl",new_file_name,replace_args,2);
}

void make_source(char* module_name) {
	printf("Make source file %s/%s/%s.c \n",out_dir,module_name,module_name);
	char new_file_name[128];
	char *replace_args[] = {"{{module_name}}",module_name};
	sprintf(new_file_name,"%s/%s/%s.c",out_dir,module_name,module_name);
	parse_file("tpls/source.tpl",new_file_name,replace_args,2);
}

void make_compile(char* module_name) {
	printf("Make compile.sh %s/%s/comile.sh \n",out_dir,module_name);
	char new_file_name[128];
	char *replace_args[] = {"{{src_dir}}",src_dir};
	sprintf(new_file_name,"%s/%s/compile.sh",out_dir,module_name);
	parse_file("tpls/compile.tpl",new_file_name,replace_args,2);
}

void make_makefile(char* module_name) {
	printf("Make Makefile %s/%s/Makefile \n",out_dir,module_name);
	char buf[4096] = {0}; 
	FILE *fp = NULL ;
	char new_file_name[128];
	char *replace_args[] = {"{{src_dir}}",src_dir,"{{module_name}}",module_name};
	sprintf(new_file_name,"%s/%s/Makefile",out_dir,module_name);
	parse_file("tpls/Makefile.tpl",new_file_name,replace_args,4);
}

void make_welcome(char *module_name) {
	printf("\n");
	printf("^_^ Ok . Now you have create nginx module %s \n",module_name);
	printf("Ok . Now you have create nginx module %s \n",module_name);
	printf("\n");
}

void parse_file(char *tpl_name, char* to_file,char** replace_argv,int replace_argc){
	char buf[4096] = {0}; 
	FILE *fp = NULL ;
	char new_file_name[128];
	int i = 0;
	fp = fopen(tpl_name,"r"); 
	fread(buf,4096,1,fp);
	fclose(fp);
	for(;i < (replace_argc - 1) ; i += 2){
		replace_str(buf,replace_argv[i],replace_argv[i+1]);	
	}
	fp = fopen(to_file,"w+"); 
	fwrite(buf,strlen(buf),1,fp);
	fclose(fp);
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
