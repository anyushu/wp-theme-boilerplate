<?php if (comments_open()) : ?>
    <div class="wp-post-comments mt-12 pt-6 border-t prose">
        <h2 class="text-2xl mb-6 font-bold">Comment</h2>
        <?php if (have_comments()) : ?>
            <ul class="p-0">
                <?php wp_list_comments(); ?>
            </ul>
            <?php the_comments_pagination(); ?>
        <?php endif; ?>
        <?php comment_form(); ?>
    </div>
<?php endif; ?>