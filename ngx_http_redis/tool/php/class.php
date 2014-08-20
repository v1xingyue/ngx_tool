<?php
$redis = new redis();
$redis->pconnect('127.0.0.1');


$real_data = array();

$class_ids = array(1819,1816,1822,1820,1821,4959);

foreach($class_ids as $classid) {
    $real_data = array('{_content_}'=>'Hello this is place holder');
    for($i = 0; $i < 10 ; $i++) {

        $real_data['{_page_count_}'] = $i;
        $real_data['{_class_id_}'] = $classid;
        $class_data = get_class_data($classid,$i * 20,20); 
        foreach($class_data as $k=>$v){
            $real_data['{_title_'.$k.'_}'] = mb_convert_encoding($v['title'],"utf-8","gbk");
            $real_data['{_create_time_'.$k.'_}'] = $v['createtime'];
            $real_data['{_format_'.$k.'_}'] = $v['format'];
            $real_data['{_down_times_'.$k.'_}'] = $v['downtimes'];
            $real_data['{_size_'.$k.'_}'] = $v['size'];
            $real_data['{_file_id_'.$k.'_}'] = $v['fileid'];
            save_file_redis($redis,$v);
        }
        $res = $redis->set( $classid . '_' . $i ,json_encode($real_data));

    }
//    $d = get_class_top_five($classid);
//
//    foreach($d as $k=>$v){
//        echo $real_data['{_'. $classid .'_title_' . $k . '_}' ] = mb_convert_encoding($v['title'],"utf-8","gbk");
//        echo $real_data['{_'. $classid  .'_createtime_' . $k . '_}' ] = substr($v['createtime'],0,10);
//        echo $real_data['{_'. $classid .'_url_' . $k . '_}' ] = 'http://10.13.0.41:8706/f/' . $v['fileid'] . '.html';
//        $redis->set($v['fileid'],json_encode(array('{_content_}'=>'Hello detail page.')));
//    }
//
    $res = $redis->set('c/' . $classid ,json_encode($real_data));

}


$redis->close();

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

function get_class_data($classid,$offset,$limit){
    $sql = 'select * from fileinfo where  showflag = "y" and classid = '. $classid  .' order by createtime desc limit '  .  $offset . ',' .  $limit;
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

function save_file_redis($redis,$file_info) {
    $file_title = mb_convert_encoding($file_info['title'],"utf-8","gbk");
    
    $redis->set($file_info['fileid'],json_encode(array(
        '{_file_title_}' => $file_title, 
        '{_description_}'=>$file_title,
        '{_filesize_}'=>$file_info['size'],
        '{_file_create_time_}'=>$file_info['createtime'],
        '{_file_down_times_}'=>$file_info['downtimes'],
        '{_file_url_}'=>$file_info['local_url'] == '' ? 'http://ishare.iask.sina.com.cn/f/' . $file_info['fileid'] .'.html' : $file_info['local_url'])));
}


