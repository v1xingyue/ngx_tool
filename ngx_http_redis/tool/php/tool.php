<?php

/**
 * object save to redis
 */
class ngx_redis_obj {
    
    public $vars = array() ;
    public $host ;
    public $port;

    public function __construct($host = 'localhost' , $port = 6379 ){
        $this->host = $host;
        $this->port = $port; 
    }
    
    public function add_assoc_array($d,$before = false){
        $before = $before === false ? '' : $before . '_';
        if(is_array($d)){
            foreach($d as $k=>$obj){
                foreach($obj as $n=>$v){
                    $this->add_var( $before . $n . '_' . $k, $v);
                } 
            }
        }
    }

    public function add_assoc($obj){
        if(is_array($obj)){
            foreach($obj as $k=>$v){
                $this->add_var($k,$v); 
            } 
        }
    }

    public function add_var($name,$str){
        $name = '{_' . $name . '_}';
        $this->vars[$name] = $str;
    }

    public function save_redis($k) {
        $redis = new redis(); 
        $redis->connect($this->host);
        $redis->set($k,json_encode($this->vars));
        $redis->close();
    }
   
    public static function simple_save($key,$obj){
        $me_obj = new self();     
        $me_obj->add_assoc($obj);
        $me_obj->save_redis($key);
    }

}

