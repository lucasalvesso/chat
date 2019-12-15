<?php session_start(); $_SESSION['user'] = 'Lucas';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>WeChat</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-8">
                    <h2>Hello, Lucas</h2>
                    <div id="chat" >
                    </div>
                    <form method="POST">
                        <textarea class="form-control" rows="5" name="text" id="text"></textarea>
                    </form>
                    <button class="btn btn-primary">Send Message</button>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
        <div id="test"></div>

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
</script>