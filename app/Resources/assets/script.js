import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';
import videojs from 'video.js';

ReactDOM.render(
    <App  />,
    document.getElementById('root')
);
var myPlayer = videojs("vjs_video_3_html5_api");
$(document).on('mouseover', '.words-separate', function(){
    myPlayer.pause();
    console.log($(this).text());
    $(this).css('background', "#0000ff");
});
$(document).on('mouseout', '.words-separate', function(){
    $(this).css('background', "#000000");
});
