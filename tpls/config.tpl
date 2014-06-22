ngx_addon_name={{module_name}}
HTTP_MODULES="$HTTP_MODULES $ngx_addon_name"
NGX_ADDON_SRCS="$NGX_ADDON_SRCS $ngx_addon_dir/${ngx_addon_name}.c"
