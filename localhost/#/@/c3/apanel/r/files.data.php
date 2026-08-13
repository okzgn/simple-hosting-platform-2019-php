<?php return [
    'S' => ['.' => 1, '..' => 1],
    'D' => ['.' => 1, '..' => 1, 'cfg' => 1, 'editor' => 1, 'dynamics.php' => 1],
    'E' => [],
    'M' => 20,
    'N' => (80 + strlen($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'] . '/')),
    'U' => [
        'x' => 1, 'php' => 1, 'php3' => 1, 'php4' => 1, 'php5' => 1,
        'php7' => 1, 'phtml' => 1, 'phar' => 1, 'inc' => 1, 'htaccess' => 1,
        'run' => 1, 'sh' => 1, 'cgi' => 1, 'pl' => 1
    ],
]; ?>
