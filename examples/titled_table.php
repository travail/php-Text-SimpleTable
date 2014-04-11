<?php

require_once __DIR__ . '/../vendor/autoload.php';

main();
exit;

function main()
{
    $table = new \Text\SimpleTable(array(10, 'KEY'), array(20, 'VALUE'));
    $table->row('KEY1', 'VALUE1');
    $table->row('KEY2', 'VALUE2');
    $table->row('KEY3', 'VALUE3');
    $table->row('KEY4', 'VALUE4');
    $table->row('KEY5', 'VALUE5');
    echo $table->draw();
}
