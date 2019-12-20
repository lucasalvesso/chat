loadChat();

jQuery("textarea").keyup(function (e) {
    if(e.which == 13){
        jQuery("form").submit();
    }
});
jQuery("button").click(function () {
    jQuery("form").submit();
});

jQuery("form").submit(function(){
    var message = jQuery("textarea").val();
    // var user = "<?php echo $user ?>";

    jQuery.post('handlers/messages.php?action=sendMessage&message='+message+'&user=Lucas', function(response){
        loadChat();

        if(response == 1){
            jQuery("textarea").val('');
        }
    });
    return false;
})

function loadChat() {
    jQuery.post('handlers/messages.php?action=getMessages', function(response){
        jQuery("#chat").html(response);
        jQuery("#chat").scrollTop(jQuery("#chat").prop("scrollHeight"));
    });
}