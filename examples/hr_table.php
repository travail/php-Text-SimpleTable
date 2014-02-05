<?php

require_once dirname(__FILE__) . '/../lib/Text/SimpleTable.php';

main();
exit;

function main()
{
    $table = new \Text\SimpleTable(10, 20);
    $table->row('KEY1', 'VALUE1');
    $table->hr();
    $table->row('KEY2', 'VALUE2');
    $table->hr();
    $table->row('KEY3', 'VALUE3');
    echo $table->draw();
}
