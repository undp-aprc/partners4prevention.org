jQuery(document).ready(function($) {
        var links = $('.file a');
        links.click(function(e) {
        var cookie = CookieControl && CookieControl.getCookie("nat-form")
        if (cookie) {
          console.log("DO POST REQUEST");
          $.post('/cookie/accept', JSON.parse(cookie), function(res) { 
            console.log('---', res, '----');
          });
        }
        else {
          console.log("FIRST TIME") 
          $.colorbox({
             html        : Drupal.settings.odhook['form'],
             width       :"800px",
             opacity     : 0.82,
             height      :  '340px'
          });
        }
    });

    jQuery('#nat-form #edit-submit').live('click', function(e) { 
        var res =  {}
        jQuery("#nat-form input[type='text']").each(function(k, v) {
          $obj = jQuery(v);
          res[$obj.attr('name')] = $obj.val()
        }); 
        CookieControl.setCookie("nat-form", JSON.stringify(res));
        console.log(CookieControl.getCookie("nat-form"));
    });
})
