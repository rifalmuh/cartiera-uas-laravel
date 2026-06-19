<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$databasePath = $root.'/database/database.sqlite';
$outputPath = $root.'/database/cartiera_uas.sql';

if (! is_file($databasePath)) {
    fwrite(STDERR, "Database SQLite tidak ditemukan.\n");
    exit(1);
}

$pdo = new PDO('sqlite:'.$databasePath);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$tables = $pdo->query(
    "SELECT name, sql FROM sqlite_master WHERE type = 'table' AND name NOT LIKE 'sqlite_%' ORDER BY name"
)->fetchAll(PDO::FETCH_ASSOC);

$lines = [
    '-- Cartiera UAS database export',
    '-- Generated: '.date('Y-m-d H:i:s'),
    'PRAGMA foreign_keys=OFF;',
    'BEGIN TRANSACTION;',
    '',
];

foreach ($tables as $table) {
    $name = $table['name'];
    $lines[] = 'DROP TABLE IF EXISTS "'.str_replace('"', '""', $name).'";';
    $lines[] = rtrim($table['sql'], ';').';';

    $rows = $pdo->query('SELECT * FROM "'.str_replace('"', '""', $name).'"')->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $columns = array_map(fn (string $column): string => '"'.str_replace('"', '""', $column).'"', array_keys($row));
        $values = array_map(function (mixed $value) use ($pdo): string {
            if ($value === null) {
                return 'NULL';
            }
            return $pdo->quote((string) $value);
        }, array_values($row));
        $lines[] = sprintf('INSERT INTO "%s" (%s) VALUES (%s);', str_replace('"', '""', $name), implode(', ', $columns), implode(', ', $values));
    }
    $lines[] = '';
}

$lines[] = 'COMMIT;';
$lines[] = 'PRAGMA foreign_keys=ON;';

file_put_contents($outputPath, implode(PHP_EOL, $lines).PHP_EOL);
echo "Export dibuat: {$outputPath}".PHP_EOL;
