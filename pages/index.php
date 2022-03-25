<div class="py-12">
    <div class="container mx-auto px-3">
        <?php get_template_part('components/molecules/archives-title'); ?>
        <div class="md:grid md:grid-cols-4 md:gap-4">
            <section class="col-span-3">
                <?php if (have_posts()) : ?>
                    <div class="md:grid lg:grid-cols-3 md:grid-cols-2 md:gap-4">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('components/molecules/blog-card'); ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </section>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>