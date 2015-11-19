<?php

use Text\SimpleTable;

require_once __DIR__ . '/../vendor/autoload.php';

main();
exit;

function main()
{
    $table = new SimpleTable(array(10, '国'), array(20, '首都'), array(20, '読み'));
    $table->row('日本', '東京', 'とうきょう');
    $table->row('America', 'Washington D.C.', 'わしんとんでーしー');
    $table->row('England', 'London', 'ろんどん');
    $table->row('France', 'Paris', 'ぱり');
    $table->row('台湾', '台北', 'たいぺい');
    echo $table->draw();
}
