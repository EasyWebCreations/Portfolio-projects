<?php
function get_previous_month($subtractby = 1)
{
    $M = date('m');
    $M = (int)$M - $subtractby;
    $Y = date('Y');
    $Y = (int)$Y;
    if ((int)$M <= 0) {
        $Y = $Y - (int)(1 + $M / -12);
        $M = 12 * (int)(1 + $M / -12) + (int)$M;
    }
    if ((int)$M < 10 and (int)$M > 0) {
        return date(($Y) . '-0' . ($M) . '-01');
    } else {
        return date(($Y) . '-' . ($M) . '-01');
    }
}

function get_current_month()
{
    $M = date('m');
    $M = (int)$M;
    $Y = date('Y');

    if ((int)$M < 10) {
        return date(($Y) . '-0' . ($M) . '-01');
    } else {
        return date(($Y) . '-' . ($M) . '-01');
    }
}