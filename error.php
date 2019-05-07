<?php ob_start(); ?>

<?php 

if(isset($_GET['e'])){

    $error_type = $_GET['e'];

    switch($error_type){
    case 404 : $e_msg = "404 Resource Not Found";
               $s_status = "200";
               $e_content_pOne = "Recource you've requested is not found.";
               $e_content_pTwo = "You will be redirected back to home page now...";
               break;

    case 500 : $e_msg = "500 Internal Server Error";
               $s_status = "500";
               $e_content_pOne = "We are currently experiencing a server error.";
               $e_content_pTwo = "We are right on it, We'll be back in no time...";
               break;

    default : $e_msg = "400 Bad Request";
              $s_status = "200";
              $e_content_pOne = "Recource you've requested cannot be located.";
              $e_content_pTwo = "You will be redirected back to home page now...";
              break;
    }
    
}else{
        $error_type = 400;
        $e_msg = "400 Bad Request";
        $s_status = "200";
        $e_content_pOne = "Recource you've requested cannot be located.";
        $e_content_pTwo = "You will be redirected back to home page now...";

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
    <link rel="stylesheet" type="text/css" href="public/css/error.css">	
    
    


</head>
<body oncontextmenu="return false;">
    
<div id="particles-js"></div>
<div class="terminal-window">
    <header>
        <div class="button green"></div>
        <div class="button yellow"></div>
        <div class="button red"></div>
    </header>
    <section class="terminal">
        <div class="history"></div>
        $&nbsp;<span class="prompt"></span>
        <span class="typed-cursor"></span>
        
    </section>
</div>
</div>

<script type="text/javascript" src="public/js/jquery.min.js"></script>
<script type="text/javascript" src="public/js/typed.custom.js"></script>
<script type="text/javascript" src="public/js/menu-override.js"></script>

<script>
    
$(function() {
var data = [
    {
    action: 'type',
    strings: ["Accessing restricted files.."],
    output: 'grabbing files..<br><br>',
    postDelay: 1000
    },
{ 
    action: 'type',
    strings: ["<?php echo $e_msg; ?>"],
    output: '<span class="gray">iHeartCoding | Sever Staus : <?php echo $s_status; ?> </span><br>&nbsp;',
    postDelay: 1000
},
{ 
    action: 'type',
    strings: ["<?php echo $e_content_pOne; ?>", "<?php echo $e_content_pTwo; ?>"],
    postDelay: 2000
}

];
runScripts(data, 0);
});

function runScripts(data, pos) {
    var prompt = $('.prompt'),
        script = data[pos];
    if(script.clear === true) {
    $('.history').html(''); 
    }
    switch(script.action) {
        case 'type':
        // cleanup for next execution
        prompt.removeData();
        $('.typed-cursor').text('');
        prompt.typed({
            strings: script.strings,
            typeSpeed: 30,
            callback: function() {
            var history = $('.history').html();
            history = history ? [history] : [];
            history.push('$ ' + prompt.text());
            if(script.output) {
                history.push(script.output);
                prompt.html('');
                $('.history').html(history.join('<br>'));
            }
            // scroll to bottom of screen
            $('section.terminal').scrollTop($('section.terminal').height());
            // Run next script
            pos++;
            if(pos < data.length) {
                setTimeout(function() {
                runScripts(data, pos);
                }, script.postDelay || 1000);
            }
            }
        });
        break;
        case 'view':

        break;
    }

    <?php 

    switch($error_type){
        case 404 : 
            echo "setTimeout(function() {
                window.location.href = '/';
                }, 15000);";
          break;

        case 400 : 
            echo "setTimeout(function() {
            window.location.href = '/';
            }, 15000);";
        break;

        case 500 : break;

        default :  
            echo "setTimeout(function() {
            window.location.href = '/';
            }, 15000);";
            break;
    }
    ?>
    
}

</script>
</body>
</html>