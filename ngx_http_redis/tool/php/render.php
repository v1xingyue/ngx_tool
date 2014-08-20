<?php

$content = file_get_contents($argv[1]);

$modules = array(
   'a'  
);

foreach($modules as $module_name){
    $module_obj = new $module_name();    
    $content = $module_obj->filter($content);
}

echo $content;

class a {

    public function filter($content){
        return $content;
    }

}
