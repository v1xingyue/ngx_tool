ngx_addon_name={{module_name}}
HTTP_MODULES="$HTTP_MODULES $ngx_addon_name"
NGX_ADDON_SRCS="$NGX_ADDON_SRCS $ngx_addon_dir/${ngx_addon_name}.c"
#CORE_LIBS="$CORE_LIBS `/data1/mysql/bin/mysql_config --libs`"
#CFLAGS="$CFLAGS `/data1/mysql/bin/mysql_config --include`"
