Text\SimpleTable
========

## NAME

Text\SimpleTable - Simple Eyecandy ASCII Tables

## SYNOPSIS

```php
use Text\SimpleTable;

require_once '/path/to/vendor/autoload.php';

$table = new SimpleTable(10, 20);
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

$table = new SimpleTable(array(10, 'KEY'), array(20, 'VALUE'));
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

$table = new SimpleTable(10, 20);
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

$table = new SimpleTable(array(10, '国'), array(20, '首都'));
$table->row('日本', '東京');
$table->row('America', 'Washington D.C.');
$table->row('England', 'London');
$table->row('France', 'Paris');
$table->row('台湾', '台北');
// Set encoding, "UTF-8" by default.
// $table->setEncoding($encoding);
echo $table->draw();
/*
.------------+----------------------.
| 国         | 首都                 |
+------------+----------------------+
| 日本       | 東京                 |
| America    | Washington D.C.      |
| England    | London               |
| France     | Paris                |
| 台湾       | 台北                 |
'------------+----------------------'
*/
```

## INSTALLATION

To install this package into your project via composer, add the following snippet to your `composer.json`. Then run `composer install`.

```
"require": {
    "travail/text-simpletable": "dev-master"
}
```

If you want to install from gihub, add the following:

```
"repositories": [
    {
        "type": "vcs",
        "url": "git@github.com:travail/php-Text-SimpleTable.git"
    }
]
```

## METHODS

### __construct

```php
__construct(int $width [, int $width [, ...]])
```

To draw simple table set *$width* to the number of columns.

```php
__construct(array ($width, $col_name) [, array ($width, $col_name) [, ...]])
```

To draw table with header set *$width* and *$col_name* in array to the number of columns.

### row

```php
void row(string $value [, string $value [, ...]])
```

Draw row.

### hr

```php
void hr(void)
```

Draw horizontal rule.

### setEncoding

```php
void setEncoding(string $encoding)
```

To draw table with multibyte characters set current character encoding. *UTF-8* by default.

### getEncoding

```php
string getEncoding()
```

Returns current character encoding.

### draw

```php
string draw(void)
```

Draw text table.

## THANKS TO

Sebastian Riedel, `sri@cpan.org`.

## AUTHOR

travail

## LICENSE

This library is free software. You can redistribute it and/or modify it under the same terms as PHP itself.
