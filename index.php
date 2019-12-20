<?php include 'config/getUser.php';
    $user = new GetUser();
    $user = $user->getSessionUser();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>WeChat</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="js/chat.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div>
            <header>
                <h1>WeChat</h1>
            </header>
        </div>
        <?php include 'chat.php'; ?>
    </body>
</html>

<script>
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
        var user = "<?php echo $user ?>";

        jQuery.post('handlers/messages.php?action=sendMessage&message='+message+'&user='+user, function(response){
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
</script>