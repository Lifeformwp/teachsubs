import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';
import Modal from './Modal';
import videojs from 'video.js';

ReactDOM.render(
    <App  />,
    document.getElementById('root')
);
var myPlayer = videojs("vjs_video_3_html5_api");
$(document).on('mouseover', '.words-separate', function(){
    myPlayer.pause();
    var log = $(this).text();
    console.log($(this).text());
    ReactDOM.render(
    <Modal  nodes={log}/>,
        document.getElementById('data')
    );
    $(this).css('background', "#0000ff");
});
$(document).on('mouseout', '.words-separate', function(){
    $(this).css('background', "#000000");
});

window.onclick = function(event) {
    if (event.target == document.getElementById('myModal')) {
        document.getElementById('myModal').style.display = "none";
    }
};
