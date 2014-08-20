<?php
include "tool.php";
$real_data = array();

$n_r_o = new ngx_redis_obj();
$d = get_top_three();

foreach($d as $k=>$v){
    $real_data[] = array(
        'top_title' => mb_convert_encoding($v['title'],'utf-8','gbk'),
        'top_url' => $v['local_url'],
        'top_download_times' => $v['downtimes'],
        'top_size' => $v['size'],
        'top_createtime' => substr($v['createtime'],0,10),
        'top_format' => $v['format'],
    );
    save_file_redis($v);
}

$n_r_o->add_assoc_array($real_data);

$class_ids = array(1819,1816,1822,1820,1821,4959);

foreach($class_ids as $classid) {

    $real_data = array();
    $d = get_class_top_five($classid);
    foreach($d as $k=>$v){
        $real_data[] = array(
            'url'=>'http://10.13.0.41/f/' . $v['fileid'] . '.html',
            'createtime'=>substr($v['createtime'],0,10),
            'title'=>mb_convert_encoding($v['title'],'utf-8','gbk'),
         );
        save_file_redis($v);
    }
    $n_r_o->add_assoc_array($real_data,$classid);
}

$n_r_o->save_redis('home');

function get_top_three(){
    $sql = 'select * from fileinfo where local_url != "" and showflag = "y" order by downtimes asc limit 3' ;
    $d = query_sql($sql);
    return $d;
}
function get_class_top_five($classid){
    $sql = 'select * from fileinfo where  showflag = "y" and classid = '. $classid  .' order by downtimes asc limit 5' ;
    $d = query_sql($sql);
    return $d;
}
function query_sql($sql){
    $r = array();
    $con = mysql_connect('localhost','root','');
    mysql_select_db('whatis');
    mysql_query('set names latin1');
    $query =  mysql_query($sql);
    while($db_data = mysql_fetch_assoc($query)) {
        $r[] = $db_data;
    }
    return $r;
}

function save_file_redis($file_info) {
    $file_data = array(
        'file_title' => mb_convert_encoding($file_info['title'],"utf-8","gbk"), 
        'description' => mb_convert_encoding($file_info['title'],"utf-8","gbk"),
        'filesize' => $file_info['size'],
        'file_create_time' => substr($file_info['createtime'],0,10),
        'file_down_times' => $file_info['downtimes'],
        'file_url'=>$file_info['local_url'] == '' ? 'http://ishare.iask.sina.com.cn/f/' . $file_info['fileid'] .'.html' : $file_info['local_url']
    );
    ngx_redis_obj::simple_save($file_info['fileid'],$file_data);
}


