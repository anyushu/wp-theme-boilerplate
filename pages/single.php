<div class="py-12">
    <div class="container mx-auto px-3">
        <div class="md:grid md:grid-cols-4 md:gap-4">
            <section class="col-span-3">
                <?php if (have_posts()) : ?>
                    <article id="post-<?php the_ID(); ?>" class="prose">
                        <h1 class="text-3xl mb-6 font-bold"><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                    </article>
                <?php endif; ?>
            </section>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>