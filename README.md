# PHPLint

A configurable linter tool for PHP.

## Introduction

### Installation

```sh
$ composer global require tengattack/phplint
```

### Run

```sh
$ export PATH=$PATH:~/.composer/vendor/bin
$ phplint /path/to/phpfile
```

### Configuration

If no configuration file is specified, it will first read the file `.phplint.yml` on current working directory as configuration,
and if still not exists it will use the default configuration.

You can configure it as you want base on this file: [`.phplint.yml`](./.phplint.yml).

### Example

A php file `test.php` with following content:

```php
<?php

$a =false;
$b = $a ?? 1;
if($b) {

}
```

```sh
$ phplint test.php
```

Output:

```
test.php:
+-----+----------+---------------------------------+-----------------+
| loc | severity | message                         | ruleId          |
+-----+----------+---------------------------------+-----------------+
| 3:5 | error    | Infix operators must be spaced. | space-infix-ops |
| 5:1 | error    | A space is required after 'if'. | keyword-spacing |
| 5:8 | error    | Empty block statement.          | no-empty        |
+-----+----------+---------------------------------+-----------------+
```

## License

MIT
