# Introduction

This repository contains a PHP module that implements the CAST-128 Encryption Algorithm
as specified by the [RFC 2144](https://tools.ietf.org/html/rfc2144).

# Installation

From the command line:

    composer require dbeurive\cast128

If you want to include this package to your project, then edit your file composer.json and add the following entry:
    
    "require": {
        "dbeurive/cast128": "*"
    }

# Synopsis

    use dbeurive\Cast128\Cast128;
    
    $key = array(0x01, 0x23, 0x45, 0x67, 0x12, 0x34, 0x56, 0x78, 0x23, 0x45);
    $data_to_cypher = array(0x01, 0x23, 0x45, 0x67, 0x89, 0xAB, 0xCD, 0xEF); // 32-bit long!
    $cypher = new Cast128($key);
    $cyphered = $cypher->cypher($data_to_cypher);
    $deciphered = $cypher->decipher($cyphered);

**The key**: The key is represented by an array of 8-bit integer values (from 0 to 255). The array contains from 5 to 16
values. That is, the length of the key varies from 40 to 128 bits.

**The data to cypher/decipher**: This data is represented by an array of exactly 8 values. That it, the data to cypher
is a 32-bit long value.





