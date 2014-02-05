# \Text\SimpleTable

## NAME

\Text\SimpleTable - Simple Eyecandy ASCII Tables port of [Text::SimpleTable](https://metacpan.org/pod/Text::SimpleTable)

## SYNOPSIS

```php
require_once '/path/to/Text/SimpleTable.php';

$table = new \Text\SimpleTable(10, 20);
$table->row('KEY1', 'VALUE1');
$table->row('KEY2', 'VALUE2');
$table->row('KEY3', 'VALUE3');
$table->row('KEY4', 'VALUE4');
$table->row('KEY5', 'VALUE5');
echo $table->draw();
/*
.------------+----------------------.
| KEY1       | VALUE1               |
| KEY2       | VALUE2               |
| KEY3       | VALUE3               |
| KEY4       | VALUE4               |
| KEY5       | VALUE5               |
'------------+----------------------'
*/

$table = new \Text\SimpleTable(array(10, 'KEY'), array(20, 'VALUE'));
$table->row('KEY1', 'VALUE1');
$table->row('KEY2', 'VALUE2');
$table->row('KEY3', 'VALUE3');
$table->row('KEY4', 'VALUE4');
$table->row('KEY5', 'VALUE5');
echo $table->draw();
/*
.------------+----------------------.
| KEY        | VALUE                |
+------------+----------------------+
| KEY1       | VALUE1               |
| KEY2       | VALUE2               |
| KEY3       | VALUE3               |
| KEY4       | VALUE4               |
| KEY5       | VALUE5               |
'------------+----------------------'
*/

$table = new \Text\SimpleTable(10, 20);
$table->row('KEY1', 'VALUE1');
$table->hr();
$table->row('KEY2', 'VALUE2');
$table->hr();
$table->row('KEY3', 'VALUE3');
echo $table->draw();

/*
.------------+----------------------.
| KEY1       | VALUE1               |
+------------+----------------------+
| KEY2       | VALUE2               |
+------------+----------------------+
| KEY3       | VALUE3               |
'------------+----------------------'
*/

```

## METHODS

### __construct

`__construct(int $width [, int $width [, ...]])`
`__construct(array ($width, $col_name) [, array ($width, $col_name) [, ...]])`

### draw

`string draw(void)`

### hr

`void hr(void)`

### row

`void row(string $value [, string $value [, ...]])`

## THANKS TO

Sebastian Riedel, `sri@cpan.org`.

## AUTHOR

travail

## LICENSE

This library is free software. You can redistribute it and/or modify it under the same terms as PHP itself.
