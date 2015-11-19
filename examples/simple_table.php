<?php

use Text\SimpleTable;

require_once __DIR__ . '/../vendor/autoload.php';

main();
exit;

function main()
{
    $table = new SimpleTable(10, 20, 20);
    $table->row('KEY1', 'VALUE1', 'NOTE1');
    $table->row('KEY2', 'VALUE2', 'NOTE2');
    $table->row('KEY3', 'VALUE3', 'NOTE3');
    $table->row('KEY4', 'VALUE4', 'NOTE4');
    $table->row('KEY5', 'VALUE5', 'NOTE5');
    echo $table->draw();
}
