jQuery(document).ready(function($) {
// 	//
// 	var nameValue = $('.taxonomy-open_byline_author #tag-name').val();
//
// 	var data = {
// 		'action': 'users_ajax_request',
// 		'whatever': 1234
// 	};
//
// 	// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
// 	jQuery.post(ajaxurl, data, function(response) {
// 		alert('Got this from the server: ' + response);
// 	});
  var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';

   var ajaxaction = 'users_ajax_request';

   $("#tag-name").autocomplete({
       delay: 0,
       minLength: 0,
       source: function(req, response){
           $.getJSON(ajaxurl+'?callback=?&action='+ajaxaction, req, response);
       },
       select: function(event, ui) {
           window.location.href=ui.item.link;
       }
   });




});
