#include <ngx_config.h>
#include <ngx_core.h>
#include <ngx_http.h>

typedef struct {
	ngx_str_t ecdata;
} h_loc_conf_t;

static ngx_int_t h_handler(ngx_http_request_t *);
static void* h_create_loc_conf(ngx_conf_t *cf);

static char* command_router(ngx_conf_t *cf, ngx_command_t *cmd, void *conf) {
	ngx_http_core_loc_conf_t  *clcf;
	clcf = ngx_http_conf_get_module_loc_conf(cf, ngx_http_core_module);
	clcf->handler = h_handler;
	ngx_conf_set_str_slot(cf,cmd,conf);
	return NGX_CONF_OK;	
}

static ngx_command_t module_commands[] = {
	{
		ngx_string("h_handler"),
		NGX_HTTP_MAIN_CONF | NGX_HTTP_SRV_CONF | NGX_HTTP_LOC_CONF | NGX_HTTP_LMT_CONF | NGX_CONF_NOARGS ,
		command_router,
		NGX_HTTP_LOC_CONF_OFFSET,
		0,
		NULL
	}
	,ngx_null_command
};

static ngx_http_module_t h_module_ctx = {
	NULL,
	NULL,
	NULL,
	NULL,
	NULL,
	NULL,
	h_create_loc_conf,
	NULL
};

ngx_module_t h = {
	NGX_MODULE_V1,
	&h_module_ctx,
	module_commands,
	NGX_HTTP_MODULE,
	NULL,
	NULL,
	NULL,
	NULL,
	NULL,
	NULL,
	NULL,
	NGX_MODULE_V1_PADDING
};


static ngx_int_t h_handler(ngx_http_request_t *r){
	ngx_int_t rc;	
	ngx_chain_t out;
    ngx_buf_t    *b;

	if (!(r->method & NGX_HTTP_GET)) {
		return NGX_HTTP_NOT_ALLOWED;
	}

	rc = ngx_http_discard_request_body(r);
	if( NGX_OK != rc){
		return rc;
	}

	ngx_str_t type = ngx_string("text/html");
	r->headers_out.content_type = type;

	ngx_str_t response = ngx_string("Hello world, Now you make a module named h");
	r->headers_out.status = NGX_HTTP_OK;
	r->headers_out.content_length_n = response.len;

	rc = ngx_http_send_header(r);
	if(NGX_ERROR == rc || rc > NGX_OK || r->header_only){
		return rc;
	}
	
	b = ngx_create_temp_buf(r->pool, response.len);
    if(NULL == b){
        ngx_log_error(NGX_LOG_ERR, r->connection->log, 0, "Failed to allocate response buffer.");
        return NGX_HTTP_INTERNAL_SERVER_ERROR;
    }

    ngx_memcpy(b->pos, response.data, response.len);
    b->last = b->pos + response.len;
    b->memory = 1;
    b->last_buf = 1; 

    out.buf = b;
    out.next = NULL;

	return ngx_http_output_filter(r, &out);
}

static void* h_create_loc_conf(ngx_conf_t *cf){
	h_loc_conf_t  *conf;
	conf = ngx_pcalloc(cf->pool, sizeof(h_loc_conf_t));
	if (conf == NULL) {
		return NGX_CONF_ERROR;
	}
	ngx_str_null(&conf->ecdata);
	return conf;
}
