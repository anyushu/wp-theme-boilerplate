<div class="py-12">
    <div class="container mx-auto px-3">
        <section class="prose">
            <?php if (have_posts()) : the_post(); ?>
                <div id="page-<?php the_ID(); ?>" class="prose">
                    <h1 class="text-3xl mb-6 font-bold"><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
            <?php endif; ?>
        </section>
    </div>
</div>