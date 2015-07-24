<?php

use Text\SimpleTable;

require_once __DIR__ . '/../vendor/autoload.php';

main();
exit;

function main()
{
    $table = new SimpleTable(array(10, '国'), array(20, '首都'));
    $table->row('日本', '東京');
    $table->row('America', 'Washington D.C.');
    $table->row('England', 'London');
    $table->row('France', 'Paris');
    $table->row('台湾', '台北');
    echo $table->draw();
}
