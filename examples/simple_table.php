<?php

require_once dirname(__FILE__) . '/../lib/Text/SimpleTable.php';

main();
exit;

function main()
{
    $table = new \Text\SimpleTable(10, 20);
    $table->row('KEY1', 'VALUE1');
    $table->row('KEY2', 'VALUE2');
    $table->row('KEY3', 'VALUE3');
    $table->row('KEY4', 'VALUE4');
    $table->row('KEY5', 'VALUE5');
    echo $table->draw();
}
