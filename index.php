<?php

get_template_part('components/templates/header');

if (is_404()) {
    get_template_part('pages/404');
} elseif (is_page()) {
    get_template_part('pages/page');
} elseif (is_single()) {
    get_template_part('pages/single');
} else {
    get_template_part('pages/index');
}

get_template_part('components/templates/footer');
