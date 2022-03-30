<?php if (get_option('ga-id') !== null): ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-<?php echo get_option('ga-id'); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-<?php echo get_option('ga-id'); ?>');
</script>
<?php endif; ?>