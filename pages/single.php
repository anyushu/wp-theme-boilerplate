<div class="py-12">
    <div class="container mx-auto px-3">
        <div class="md:grid md:grid-cols-4 md:gap-4">
            <div class="col-span-3">
                <?php if (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" class="prose">
                        <h1 class="text-3xl mb-6 font-bold"><?php the_title(); ?></h1>
                        <?php
                        the_content();
                        wp_link_pages([
                            'before' => '<div class="wp-post-nav-links flex justify-center items-center mt-12">',
                            'after' => '</div>',
                        ]);
                        ?>
                    </article>
                    <?php comments_template(); ?>
                <?php endif; ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>