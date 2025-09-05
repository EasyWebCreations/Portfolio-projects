<?php
$prev = 2;
$options = '';
while ($prev < 12) {
    $options .= '<option value=' . get_previous_month($prev) . '>' . substr(get_previous_month($prev), 0, 7) . '</option>
    ';
    $prev += 1;
}
echo $options;