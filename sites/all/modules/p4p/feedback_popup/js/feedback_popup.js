(function($) {

  var showFeedbackForm = function(nid) {
    $.colorbox({
      iframe: true,
      href: Drupal.settings.basePath + 'node/add/feedback?field_fb_resource=' + nid,
      width: 700,
      height: 700,
      opacity: 0.82,
      onClosed: function(e) {
        window.location.reload();
      }
    });
  };

  Drupal.behaviors.feedbackPopup = {
    attach: function(context, settings) {
      if (Drupal.settings.feedback_form.enabled === 1) {
        $('a.feedback-popup', context).once('feedback-popup', function() {
          $(this).click(function(e) {
            var nid = $(this).data('nid');
            showFeedbackForm(nid);
          });
        });
      }
    }
  };

})(jQuery);
