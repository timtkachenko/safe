
function dialog_destroy(dialog) {
    $(dialog).parent('div').detach(); // totally delete dialog
}
function dialog_close(dialog) {
    $(dialog).dialog('close');
}
function dialog_get_button( dialog_selector, button_name )
{
  var buttons = $($(dialog_selector).parent('div')).find('.ui-dialog-buttonset>button' );
  for ( var i = 0; i < buttons.length; ++i )
  {
     var jButton = $( buttons[i] );
     if ( jButton.text() == button_name )
     {
         return jButton;
     }
  }

  return null;
}
function dialog_hide_button( dialog_selector, button_name) {
    var btn = dialog_get_button(dialog_selector, button_name);
    $(btn).hide();
}
function dialog_show_button( dialog_selector, button_name) {
    var btn = dialog_get_button(dialog_selector, button_name);
    $(btn).show();
}
function dialog_enabled_button( dialog_selector, button_name) {
    var btn = dialog_get_button(dialog_selector, button_name);
    $(btn).removeAttr('disabled').removeClass( 'ui-state-disabled' );
}
function dialog_disabled_button( dialog_selector, button_name) {
    var btn = dialog_get_button(dialog_selector, button_name);
    $(btn).attr('disabled',true).addClass( 'ui-state-disabled' );
}


function centerDialog(dialog_id) {
    $(dialog_id).parent('div').position({
        my: "center",
        at: "center",
        of: window
    });
}