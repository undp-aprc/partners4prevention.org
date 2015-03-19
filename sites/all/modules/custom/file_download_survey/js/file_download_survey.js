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

  Drupal.behaviors.file_download_survey = {
    attach: function(context, settings) {
      if (Drupal.settings.feedback_form.enabled != 1) {
        $('.survey', context).once('survey', function() {
          $(this).click(function(e) {
            var nid = $(this).data('nid');
            var path = $(this).data('path');
            showFeedbackForm(nid);
            window.open(path);
          });
        });
      }
    }
  };

})(jQuery);
