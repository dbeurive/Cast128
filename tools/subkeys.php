<?php

/**
 * This script generates the PHP code that produces the subkeys.
 * Usage: just run the script. The result will be printed to the standard output.
 */

define('KEY_LINE', 'line');
define('KEY_NAME', 'name');
define('KEY_FORMULA', 'formula');
define('KEY_INDEX', 'index');
define('KEY_VAR', 'var');

$ALGORITHM1 = <<<EOT
   z0z1z2z3 = x0x1x2x3 ^ S5[xD] ^ S6[xF] ^ S7[xC] ^ S8[xE] ^ S7[x8]
   z4z5z6z7 = x8x9xAxB ^ S5[z0] ^ S6[z2] ^ S7[z1] ^ S8[z3] ^ S8[xA]
   z8z9zAzB = xCxDxExF ^ S5[z7] ^ S6[z6] ^ S7[z5] ^ S8[z4] ^ S5[x9]
   zCzDzEzF = x4x5x6x7 ^ S5[zA] ^ S6[z9] ^ S7[zB] ^ S8[z8] ^ S6[xB]
   K1  = S5[z8] ^ S6[z9] ^ S7[z7] ^ S8[z6] ^ S5[z2]
   K2  = S5[zA] ^ S6[zB] ^ S7[z5] ^ S8[z4] ^ S6[z6]
   K3  = S5[zC] ^ S6[zD] ^ S7[z3] ^ S8[z2] ^ S7[z9]
   K4  = S5[zE] ^ S6[zF] ^ S7[z1] ^ S8[z0] ^ S8[zC]
   x0x1x2x3 = z8z9zAzB ^ S5[z5] ^ S6[z7] ^ S7[z4] ^ S8[z6] ^ S7[z0]
   x4x5x6x7 = z0z1z2z3 ^ S5[x0] ^ S6[x2] ^ S7[x1] ^ S8[x3] ^ S8[z2]
   x8x9xAxB = z4z5z6z7 ^ S5[x7] ^ S6[x6] ^ S7[x5] ^ S8[x4] ^ S5[z1]
   xCxDxExF = zCzDzEzF ^ S5[xA] ^ S6[x9] ^ S7[xB] ^ S8[x8] ^ S6[z3]
   K5  = S5[x3] ^ S6[x2] ^ S7[xC] ^ S8[xD] ^ S5[x8]
   K6  = S5[x1] ^ S6[x0] ^ S7[xE] ^ S8[xF] ^ S6[xD]
   K7  = S5[x7] ^ S6[x6] ^ S7[x8] ^ S8[x9] ^ S7[x3]
   K8  = S5[x5] ^ S6[x4] ^ S7[xA] ^ S8[xB] ^ S8[x7]
   z0z1z2z3 = x0x1x2x3 ^ S5[xD] ^ S6[xF] ^ S7[xC] ^ S8[xE] ^ S7[x8]
   z4z5z6z7 = x8x9xAxB ^ S5[z0] ^ S6[z2] ^ S7[z1] ^ S8[z3] ^ S8[xA]
   z8z9zAzB = xCxDxExF ^ S5[z7] ^ S6[z6] ^ S7[z5] ^ S8[z4] ^ S5[x9]
   zCzDzEzF = x4x5x6x7 ^ S5[zA] ^ S6[z9] ^ S7[zB] ^ S8[z8] ^ S6[xB]
   K9  = S5[z3] ^ S6[z2] ^ S7[zC] ^ S8[zD] ^ S5[z9]
   K10 = S5[z1] ^ S6[z0] ^ S7[zE] ^ S8[zF] ^ S6[zC]
   K11 = S5[z7] ^ S6[z6] ^ S7[z8] ^ S8[z9] ^ S7[z2]
   K12 = S5[z5] ^ S6[z4] ^ S7[zA] ^ S8[zB] ^ S8[z6]
   x0x1x2x3 = z8z9zAzB ^ S5[z5] ^ S6[z7] ^ S7[z4] ^ S8[z6] ^ S7[z0]
   x4x5x6x7 = z0z1z2z3 ^ S5[x0] ^ S6[x2] ^ S7[x1] ^ S8[x3] ^ S8[z2]
   x8x9xAxB = z4z5z6z7 ^ S5[x7] ^ S6[x6] ^ S7[x5] ^ S8[x4] ^ S5[z1]
   xCxDxExF = zCzDzEzF ^ S5[xA] ^ S6[x9] ^ S7[xB] ^ S8[x8] ^ S6[z3]
   K13 = S5[x8] ^ S6[x9] ^ S7[x7] ^ S8[x6] ^ S5[x3]
   K14 = S5[xA] ^ S6[xB] ^ S7[x5] ^ S8[x4] ^ S6[x7]
   K15 = S5[xC] ^ S6[xD] ^ S7[x3] ^ S8[x2] ^ S7[x8]
   K16 = S5[xE] ^ S6[xF] ^ S7[x1] ^ S8[x0] ^ S8[xD]
EOT;

$ALGORITHM2 = <<<EOT
   z0z1z2z3 = x0x1x2x3 ^ S5[xD] ^ S6[xF] ^ S7[xC] ^ S8[xE] ^ S7[x8]
   z4z5z6z7 = x8x9xAxB ^ S5[z0] ^ S6[z2] ^ S7[z1] ^ S8[z3] ^ S8[xA]
   z8z9zAzB = xCxDxExF ^ S5[z7] ^ S6[z6] ^ S7[z5] ^ S8[z4] ^ S5[x9]
   zCzDzEzF = x4x5x6x7 ^ S5[zA] ^ S6[z9] ^ S7[zB] ^ S8[z8] ^ S6[xB]
   K17 = S5[z8] ^ S6[z9] ^ S7[z7] ^ S8[z6] ^ S5[z2]
   K18 = S5[zA] ^ S6[zB] ^ S7[z5] ^ S8[z4] ^ S6[z6]
   K19 = S5[zC] ^ S6[zD] ^ S7[z3] ^ S8[z2] ^ S7[z9]
   K20 = S5[zE] ^ S6[zF] ^ S7[z1] ^ S8[z0] ^ S8[zC]
   x0x1x2x3 = z8z9zAzB ^ S5[z5] ^ S6[z7] ^ S7[z4] ^ S8[z6] ^ S7[z0]
   x4x5x6x7 = z0z1z2z3 ^ S5[x0] ^ S6[x2] ^ S7[x1] ^ S8[x3] ^ S8[z2]
   x8x9xAxB = z4z5z6z7 ^ S5[x7] ^ S6[x6] ^ S7[x5] ^ S8[x4] ^ S5[z1]
   xCxDxExF = zCzDzEzF ^ S5[xA] ^ S6[x9] ^ S7[xB] ^ S8[x8] ^ S6[z3]
   K21 = S5[x3] ^ S6[x2] ^ S7[xC] ^ S8[xD] ^ S5[x8]
   K22 = S5[x1] ^ S6[x0] ^ S7[xE] ^ S8[xF] ^ S6[xD]
   K23 = S5[x7] ^ S6[x6] ^ S7[x8] ^ S8[x9] ^ S7[x3]
   K24 = S5[x5] ^ S6[x4] ^ S7[xA] ^ S8[xB] ^ S8[x7]
   z0z1z2z3 = x0x1x2x3 ^ S5[xD] ^ S6[xF] ^ S7[xC] ^ S8[xE] ^ S7[x8]
   z4z5z6z7 = x8x9xAxB ^ S5[z0] ^ S6[z2] ^ S7[z1] ^ S8[z3] ^ S8[xA]
   z8z9zAzB = xCxDxExF ^ S5[z7] ^ S6[z6] ^ S7[z5] ^ S8[z4] ^ S5[x9]
   zCzDzEzF = x4x5x6x7 ^ S5[zA] ^ S6[z9] ^ S7[zB] ^ S8[z8] ^ S6[xB]
   K25 = S5[z3] ^ S6[z2] ^ S7[zC] ^ S8[zD] ^ S5[z9]
   K26 = S5[z1] ^ S6[z0] ^ S7[zE] ^ S8[zF] ^ S6[zC]
   K27 = S5[z7] ^ S6[z6] ^ S7[z8] ^ S8[z9] ^ S7[z2]
   K28 = S5[z5] ^ S6[z4] ^ S7[zA] ^ S8[zB] ^ S8[z6]
   x0x1x2x3 = z8z9zAzB ^ S5[z5] ^ S6[z7] ^ S7[z4] ^ S8[z6] ^ S7[z0]
   x4x5x6x7 = z0z1z2z3 ^ S5[x0] ^ S6[x2] ^ S7[x1] ^ S8[x3] ^ S8[z2]
   x8x9xAxB = z4z5z6z7 ^ S5[x7] ^ S6[x6] ^ S7[x5] ^ S8[x4] ^ S5[z1]
   xCxDxExF = zCzDzEzF ^ S5[xA] ^ S6[x9] ^ S7[xB] ^ S8[x8] ^ S6[z3]
   K29 = S5[x8] ^ S6[x9] ^ S7[x7] ^ S8[x6] ^ S5[x3]
   K30 = S5[xA] ^ S6[xB] ^ S7[x5] ^ S8[x4] ^ S6[x7]
   K31 = S5[xC] ^ S6[xD] ^ S7[x3] ^ S8[x2] ^ S7[x8]
   K32 = S5[xE] ^ S6[xF] ^ S7[x1] ^ S8[x0] ^ S8[xD]
EOT;

function process_algo(string $in_description) {

    $name2vars = function(string $in_name) {
        return str_split($in_name, 2);
    };

    $name2formula = function(string $in_name) {
        $vars = array();
        foreach (str_split($in_name, 2) as $_index => $_value) {
            $pos = 32 - 8*($_index + 1);
            if ($pos > 0) {
                $vars[] = sprintf('($%s << %d)', $_value, $pos);
            } else {
                $vars[] = sprintf('$%s', $_value);
            }

        }
        return join(' | ', $vars);
    };

    $lines = preg_split('/\n/', $in_description);
    $data = array();
    foreach ($lines as $_index => $_value) {
        if (1 === preg_match('/^\s*$/', $_value)) {
            continue;
        }
        if (1 === preg_match('/^\s*([^\s]+)\s*=\s*(.+)$/', $_value, $tokens)) {
            $data[] = array(
                KEY_LINE => sprintf("%s = %s", $tokens[1], $tokens[2]),
                KEY_NAME => $tokens[1],
                KEY_FORMULA => $tokens[2]);
        } else {
            error("Invalid line detected (${_value})");
        }
    }


    foreach ($data as $_index => $_value) {
        printf("\n// %s\n", $_value[KEY_LINE]);

        if (8 == strlen($_value[KEY_NAME])) {

            // z0z1z2z3 = x0x1x2x3 ^ S5[xD] ^ S6[xF] ^ S7[xC] ^ S8[xE] ^ S7[x8]

            if (1 === preg_match('/([^\s]+)\s*\^\s*S(\d)\[([^\]]+)\]\s*\^\s*S(\d)\[([^\]]+)\]\s*\^\s*S(\d)\[([^\]]+)\]\s*\^\s*S(\d)\[([^\]]+)\]\s*\^\s*S(\d)\[([^\]]+)\]/', $_value[KEY_FORMULA], $tokens)) {
                $origin = $tokens[1];
                $operands = array(
                    sprintf("\$this->__S%d(\$%s)", $tokens[2], $tokens[3]),
                    sprintf("\$this->__S%d(\$%s)", $tokens[4], $tokens[5]),
                    sprintf("\$this->__S%d(\$%s)", $tokens[6], $tokens[7]),
                    sprintf("\$this->__S%d(\$%s)", $tokens[8], $tokens[9]),
                    sprintf("\$this->__S%d(\$%s)", $tokens[10], $tokens[11])
                );

                printf("\$%s = %s;\n",
                    $origin,
                    $name2formula($origin));

                printf("\$%s = \$%s ^ %s;\n",
                    $_value[KEY_NAME],
                    $origin,
                    join(' ^ ', $operands));
            } else {
                error("Invalid formula detected: {$_value[KEY_FORMULA]}");
            }

            $names = $name2vars($_value[KEY_NAME]);
            foreach ($names as $_pos => $_val) {
                $mask = 0xFF << (24 - ($_pos * 8));
                $decal = 24-8*$_pos;
                if ($decal > 0) {
                    printf("\$%s = (\$%s & 0x%X) >> %d;\n", $_val, $_value[KEY_NAME], $mask, $decal);
                } else {
                    printf("\$%s = \$%s & 0x%X;\n", $_val, $_value[KEY_NAME], $mask);
                }

            }
        } elseif (1 === preg_match('/^K\d+$/', $_value[KEY_NAME])) {

            // K17 = S5[z8] ^ S6[z9] ^ S7[z7] ^ S8[z6] ^ S5[z2]

            if (1 === preg_match('/S(\d)\[([^\]]+)\]\s*\^\s*S(\d)\[([^\]]+)\]\s*\^\s*S(\d)\[([^\]]+)\]\s*\^\s*S(\d)\[([^\]]+)\]\s*\^\s*S(\d)\[([^\]]+)\]/', $_value[KEY_FORMULA], $tokens)) {

                $operands = array(
                    sprintf("\$this->__S%d(\$%s)", $tokens[1], $tokens[2]),
                    sprintf("\$this->__S%d(\$%s)", $tokens[3], $tokens[4]),
                    sprintf("\$this->__S%d(\$%s)", $tokens[5], $tokens[6]),
                    sprintf("\$this->__S%d(\$%s)", $tokens[7], $tokens[8]),
                    sprintf("\$this->__S%d(\$%s)", $tokens[9], $tokens[10])
                );

                printf("\$%s = %s;\n",
                    $_value[KEY_NAME],
                    join(' ^ ', $operands));

            } else {
                error("Invalid formula detected: {$_value[KEY_FORMULA]}");
            }
        } else {
            error("Invalid name for variable {$_value[KEY_NAME]}");
        }
    }
}

function error(string $in_message) {
    printf("An error occurred: %s\n", $in_message);
    exit(1);
}

$key = str_split('x0x1x2x3x4x5x6x7x8x9xAxBxCxDxExF', 2);
foreach ($key as $_index => $_value) {
    printf("\$%s = \$this->__key[%d];\n", $_value, $_index);
}

process_algo($ALGORITHM1);
process_algo($ALGORITHM2);

$list = array();

for ($i=1; $i<=16; $i++) {
    $list[] = sprintf('array(self::KEY_MASK => $K%d, self::KEY_ROTATE => $K%d & 0x1F )', $i, $i+16);
}
printf("\nreturn array(\n%s\n);\n", join(",\n", $list));


?>
