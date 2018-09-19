<?php

/**
 * This script generates the PHP code that represents the so-called "S-Boxes", defined within the RCF 2144.
 * The files "S1.data", "S2.data"... and so on contains data extracted from the RFC.
 *
 * Usage: just run the script. The result will be printed to the standard output.
 */

$INDENT = "\t";

// ---------------------------------------------------------
// Get the list of data files.
// ---------------------------------------------------------

if (false === $dh = opendir(__DIR__)) {
    fprintf(STDERR, "Unexpected error: can not open current directory '%s'\n", __DIR__);
    exit(1);
}
$sboxes = array();
while (false !== $entry = readdir($dh)) {
    $matches = array();
    if (! preg_match('/^S([1-8])\.data/', $entry, $matches)) {
        continue;
    }
    $sboxes[] = $matches[1];
}
closedir($dh);

// ---------------------------------------------------------
// Extract data from the data files.
// ---------------------------------------------------------

sort($sboxes);
$sboxesData = array();
/** @var int $_index */
foreach ($sboxes as $_index) {
    $dataSource = __DIR__ . DIRECTORY_SEPARATOR . "S${_index}.data";
    if (false === $data = file_get_contents($dataSource)) {
        fprintf(STDERR, "Unexpected error: can not load file '%s'\n", $dataSource);
        exit(1);
    }
    $data = preg_replace('/\s+$/m', '', $data);
    $lines = preg_split('/\r?\n/', $data);
    if (32 != count($lines)) {
        fprintf(STDERR, "Unexpected error: wrong number of lines in file '%s' (expected 32 lines, got %d lines)\n", $dataSource, count($lines));
        exit(1);
    }

    $elements = array();
    /** @var string $_line */
    foreach ($lines as $_line) {
        $columns = preg_split('/\s+/', $_line);
        if (8 != count($columns)) {
            fprintf(STDERR, "Unexpected error: wrong number of columns in file '%s' (expected 8 columns, got %d lines)\n", $dataSource, count($columns));
            exit(1);
        }
        foreach ($columns as $_column) {
            $elements[] = "0x${_column}";
        }
    }

    $sboxesData[$_index] = $elements;
}

// ---------------------------------------------------------
// Generate the output.
// ---------------------------------------------------------

$sboxesDef = array();
/**
 * @var string $_name
 * @var array $_data
 */
foreach ($sboxesData as $_index => $_data) {
    $container = array();
    for ($l=0; $l<32; $l++) {
         $container[] = $INDENT . $INDENT. implode(', ', array_slice($_data, 8*$l, 8));
    }
    $sboxesDef[] = "${INDENT}${_index} => array(\n" .
        implode(",\n", $container) .
        "\n${INDENT})";
}


print "array(\n";
print implode(",\n", $sboxesDef);
print "\n);\n";
