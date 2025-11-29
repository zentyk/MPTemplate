<?php
$config = parse_ini_file(__DIR__.'/config.dev.ini', true);

print($config['database']['hostname']);

phpinfo();