<?php if (comments_open()): ?>
        <?php if (have_comments()): ?>
                <?php wp_list_comments(); ?>
            <?php the_comments_pagination(); ?>
        <?php endif; ?>
        <?php comment_form(); ?>
<?php endif; ?>
