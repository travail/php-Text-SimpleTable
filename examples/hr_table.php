<?php

use Text\SimpleTable;

require_once __DIR__ . '/../vendor/autoload.php';

main();
exit;

function main()
{
    $table = new SimpleTable(10, 20, 20);
    $table->row('KEY1', 'VALUE1', 'NOTE1');
    $table->hr();
    $table->row('KEY2', 'VALUE2', 'NOTE2');
    $table->hr();
    $table->row('KEY3', 'VALUE3', 'NOTE3');
    echo $table->draw();
}
