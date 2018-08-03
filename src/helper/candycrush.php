<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 8/3/18
 * Time: 5:49 PM
 */

namespace helper\CandyCrush;

/**
 * @param array $param
 * @return int
 */
function getCount(array $param) : int {

    $processed = [];
    $count = 0;

    foreach ($param as $indexRow => $row) {
        foreach ($row as $indexCol=> $col) {
            if (!isset($processed[generateProcessedKey($indexRow, $indexCol)])) {
                $count++;
                getRelated($param, $indexRow, $indexCol, $processed);
            }
        }
    }

    return $count;
}

function getRelated($param, $indexRow, $indexCol, &$processed)
{
    /**
     * current
     */
    $processed[generateProcessedKey($indexRow, $indexCol)] = 1;
    $value = $param[$indexRow][$indexCol];

    /**
     * Top
     */
    if (!isset($processed[generateProcessedKey( $indexRow - 1, $indexCol)])
        && isset($param[$indexRow - 1][$indexCol])
        && $param[$indexRow - 1][$indexCol] === $value
    ) {
        getRelated($param, $indexRow - 1, $indexCol, $processed);
    }

    /**
     * Bottom
     */
    if (!isset($processed[generateProcessedKey($indexRow + 1,$indexCol)])
        && isset($param[$indexRow + 1][$indexCol])
        && $param[$indexRow + 1][$indexCol] === $value
    ) {
        getRelated($param,$indexRow + 1,$indexCol, $processed);
    }

    /**
     * Right
     */
    if (!isset($processed[generateProcessedKey($indexRow, $indexCol + 1)])
        && isset($param[$indexRow][$indexCol + 1])
        && $param[$indexRow][$indexCol + 1] === $value
    ) {
        getRelated($param,$indexRow, $indexCol + 1, $processed);
    }

    /**
     * Left
     */
    if (!isset($processed[generateProcessedKey($indexRow, $indexCol - 1)])
        && isset($param[$indexRow][$indexCol - 1])
        && $param[$indexRow][$indexCol - 1] === $value
    ) {
        getRelated($param,$indexRow, $indexCol - 1, $processed);
    }

    /**
     * Top Diagonal Right
     */
    if (!isset($processed[generateProcessedKey($indexRow - 1, $indexCol + 1)])
        && isset($param[$indexRow - 1][$indexCol + 1])
        && $param[$indexRow - 1][$indexCol + 1] === $value
    ) {
        getRelated($param,$indexRow - 1, $indexCol + 1, $processed);
    }

    /**
     * Top Diagonal Left
     */
    if (!isset($processed[generateProcessedKey($indexRow - 1, $indexCol - 1)])
        && isset($param[$indexRow - 1][$indexCol - 1])
        && $param[$indexRow - 1][$indexCol - 1] === $value
    ) {
        getRelated($param,$indexRow - 1, $indexCol - 1, $processed);
    }

    /**
     * Bottom Diagonal Right
     */
    if (!isset($processed[generateProcessedKey($indexRow + 1, $indexCol + 1)])
        && isset($param[$indexRow + 1][$indexCol + 1])
        && $param[$indexRow + 1][$indexCol + 1] === $value
    ) {
        getRelated($param,$indexRow + 1, $indexCol + 1, $processed);
    }

    /**
     * Bottom Diagonal Left
     */
    if (!isset($processed[generateProcessedKey($indexRow + 1, $indexCol - 1)])
        && isset($param[$indexRow + 1][$indexCol - 1])
        && $param[$indexRow + 1][$indexCol - 1] === $value
    ) {
        getRelated($param,$indexRow + 1, $indexCol - 1, $processed);
    }
}

function generateProcessedKey($indexRow, $indexCol)
{
    return sprintf('%d,%d', $indexRow, $indexCol);
}