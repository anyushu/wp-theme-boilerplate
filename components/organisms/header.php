<?php
$locations = get_nav_menu_locations(); ?>

<header id="header">
    <nav class="bg-gray-300">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-center sm:justify-between h-16">
                <div class="flex-shrink-0 flex items-center">
                    <h1>
                        <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                    </h1>
                </div>
                <?php if (isset($locations['header-menu'])): ?>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <?php
                            $menu = wp_get_nav_menu_object($locations['header-menu']);
                            $items = wp_get_nav_menu_items($menu);
                            foreach ($items as $item):

                                $class_str =
                                    $_SERVER['REQUEST_URI'] === parse_url($item->url, PHP_URL_PATH)
                                        ? 'bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium'
                                        : 'px-3 py-2 rounded-md text-sm font-medium';
                                $title = $item->title;
                                $url = $item->url;
                                ?>
                                <a href="<?php echo $url; ?>" class="<?php echo $class_str; ?>"><?php echo $title; ?></a>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>