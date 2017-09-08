<?php
return array(
    'setting'=>array(
        'DB_TYPE'               =>  'mysql',
        'DB_HOST'               =>  '127.0.0.1',
        'DB_NAME'               =>  'sz24hours',
        'DB_USER'               =>  'root',
        'DB_PWD'                =>  'root',
        'DB_PORT'               =>  '3306',
        'DB_PREFIX'             =>  't_',
        'TOKEN_ON'      =>    true,
        'TOKEN_NAME'    =>    '__hash__',
        'TOKEN_TYPE'    =>    'md5',
        'TOKEN_RESET'   =>    true,
        'TMPL_ACTION_SUCCESS' => 'Public:success',
        'settingfile_path' => __ROOT__.'/Application/Admin/Conf/',
        'URL'           =>  __ROOT__.'/Application/Admin/Public/',
        ),
);

?>