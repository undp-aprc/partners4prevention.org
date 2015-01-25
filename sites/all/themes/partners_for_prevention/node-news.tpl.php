<?php
$location = "<p><span class='italics caps'>".$node->field_news_location['0']['safe']." - "." </span>";
$body_text = $node->content['body']['#value'];

$body_text = preg_replace("^<p>^", $location, $body_text, 1);
?>

<div id="news-node-content">
<div id="news-node-content-photo"><?php print($node->field_news_photo['0']['view']); ?></div>
<div id="news-node-content-text"><div id="news-node-content-date" class="bold"><?php print($node->field_news_date['0']['view']); ?></div><?php echo $body_text; ?>
</div>
</div>