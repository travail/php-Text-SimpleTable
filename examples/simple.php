<?php

require_once dirname(__FILE__) . '/../lib/Text/SimpleTable.php';

main();
exit;

function main()
{
    $table = new \Text\SimpleTable(array(15, 'KEY'), array(25, 'VALUE'));
    $table->row('LM_DEBUG', true);
    $table->row('LM_LOG_LEVEL', 'debug');
    $table->row('LM_COLOR', true);
    echo $table->draw();
}
