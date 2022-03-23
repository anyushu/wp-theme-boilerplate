<?php

$prefix = '';

if (is_category()) {
    $prefix = 'カテゴリー：';
} elseif (is_tag()) {
    $prefix = 'タグ：';
}
?>

<h2 class="text-2xl mb-6 font-bold"><?php single_cat_title($prefix, true); ?></h2>