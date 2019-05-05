
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
    strings: ["500 Internal Error"],
    output: '<span class="gray">iHeartCoding | Sever Staus : 500 </span><br>&nbsp;',
    postDelay: 1000
},
{ 
    action: 'type',
    strings: ["We are currently experiencing a server error.", "We are right on it, We'll be back in no time..."],
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
}
