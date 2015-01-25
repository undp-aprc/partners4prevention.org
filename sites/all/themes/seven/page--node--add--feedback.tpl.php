
  <div id="page">
    <p class="heading-message">We would appreciate it if you could provide the following information, to help us improve our resources. This survey is completely voluntary.</p>
    <div id="content" class="clearfix">
      <?php if ($messages): ?>
        <div id="console" class="clearfix"><?php print $messages; ?></div>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </div>

    <div id="footer">
      <?php print $feed_icons; ?>
    </div>

  </div>
