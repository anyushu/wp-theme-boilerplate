<article class="bg-white shadow border rounded-lg mb-6 md:mb-0">
    <a href="<?php the_permalink(); ?>" class="block p-5">
        <p class="font-bold text-2xl mb-2"><?php the_title(); ?></p>
        <?php if (get_the_excerpt()) : ?>
            <p class="text-gray-500 mb-0"><?php echo get_the_excerpt(); ?></p>
        <?php endif; ?>
    </a>
</article>