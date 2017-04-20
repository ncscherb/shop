<?php
    echo 'hello word';
    $mem = new Memcached;
    $mem->connect("localhost",11211);
    $mem->set('key','This is a test!', 0, 60);
    $val = $mem->get('key');
    echo $val;
