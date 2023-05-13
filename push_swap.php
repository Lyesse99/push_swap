<?php

$la = [];
$lb = [];

function sa(&$la)
{
    if (count($la) >= 2) {
        $tmp = $la[0];
        $la[0] = $la[1];
        $la[1] = $tmp;
    }
    echo "sa ";
}

function sb(&$lb)
{
    if (count($lb) >= 2) {
        $tmp = $lb[0];
        $lb[0] = $lb[1];
        $lb[1] = $tmp;
    }
    echo "sb ";
}

function sc(&$la, &$lb)
{
    sa($la);
    sb($lb);
    echo "sc ";
}

function pa(&$la, &$lb)
{
    if (!empty($lb)) {
        array_unshift($la, array_shift($lb));
        echo "pa ";
    }
}

function pb(&$la, &$lb)
{
    if (!empty($la)) {
        array_unshift($lb, array_shift($la));
        echo "pb ";
    }
}

function ra(&$la)
{
    if (count($la) >= 2) {
        $first = array_shift($la);
        $la[] = $first;
        echo "ra ";
    }
}

function rb(&$lb)
{
    if (count($lb) >= 2) {
        $first = array_shift($lb);
        $lb[] = $first;
        echo "rb ";
    }
}

function rr(&$la, &$lb)
{
    ra($la);
    rb($lb);
    echo "rr ";
}

function rra(&$la)
{
    if (count($la) >= 2) {
        $last = array_pop($la);
        array_unshift($la, $last);
        echo "rra ";
    }
}

function rrb(&$lb)
{
    if (count($lb) >= 2) {
        $last = array_pop($lb);
        array_unshift($lb, $last);
        echo "rrb ";
    }
}

function rrr(&$la, &$lb)
{
    rra($la);
    rrb($lb);
    echo "rrr ";
}

function sortList(&$la)
{
    $lb = [];

    while (!isSorted($la)) {
        if ($la[0] > $la[1]) {
            sa($la);
        } else {
            pb($la, $lb);
        }
    }

    while (!empty($lb)) {
        pa($la, $lb);
    }

    echo "\n";
}

function isSorted(&$list)
{
    $length = count($list);
    for ($i = 0; $i < $length - 1; $i++) {
        if ($list[$i] > $list[$i + 1]) {
            return false;
        }
    }
    return true;
}

?>
