/*
 * Settings of the sticky menu
 */

jQuery(document).ready(function(){
   var wpAdminBar = jQuery('#wpadminbar');
   if (wpAdminBar.length) {
      jQuery("#tm-headermenu-section").sticky({topSpacing:wpAdminBar.height()});
   } else {
      jQuery("#tm-headermenu-section").sticky({topSpacing:0});
   }
});