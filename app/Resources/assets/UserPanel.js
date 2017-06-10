import React from 'react';
import ReactDOM from 'react-dom';
import Panel from './Panel';

$(document).on('mouseover', '.words-separate', function(){
    var log = $(this).text();
    console.log($(this).text());
    ReactDOM.render(
    <Panel  nodes={log} />,
        document.getElementById('data')
    );
    $(this).css('background', "#00FFEE");
});
$(document).on('mouseout', '.words-separate', function(){
    $(this).css('background', "#fff");
});
