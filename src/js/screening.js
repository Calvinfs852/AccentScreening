'use strict';


var index = 0;
function nextButton()
{

    var buttons = $("button.recordButton");
    var button = buttons[index];
    var realButtonPerhaps = $(button);
    realButtonPerhaps.removeAttr("disabled");

    console.log(button);
    index++;
}

nextButton();
//window.onload = nextButton();


//recording using MediaDevices API https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices
//Using recorder.js from github

// Put variables in global scope to make them available to the browser console.
var audio = document.querySelector('audio');


var currentPrompt;
var imprint;

function record(/*parameter*/)
{
alert("recording");


}

function submit(){

    alert("Data sent to database\nEmail sent to admin\nYou will receive a personalized email with a summary of your results as soon as it is ready\nThank you and have a nice day!")


}

function recordFormData(window)
{
    var email = $("input#email").val();
    var now = new Date();
    var month = now.getMonth() +1; //JS date is 0-based.
    if (month<10)
    {
        month = "0"+month;
    }
    var day = now.getDate();//getDay returns day of the week. -_-
    if (day<10)
    {
        day = "0"+day;
    }
    var datetime = "" + now.getFullYear() + month + day + now.getHours() + now.getMinutes() + now.getSeconds();
    imprint = email + datetime; //@ and . valid in file names. TODO: consider what other special characters are valid in emails that may not be valid in file names.

    $("div.registration").hide();
    $("div.screening").show();
    $('#imprint').attr('value',imprint);
}


/*
Below moved from recordmp3.js/index.html inline script to here
and then modified
 */

function __log(e, data) {
    /*
    This doesn't do anything without the log page element
    Leaving it here for now because useful for debugging
     */
    //log.innerHTML += "\n" + e + " " + (data || '');
}

var audio_context;
var recorder;

function startUserMedia(stream) {
    var input = audio_context.createMediaStreamSource(stream);
    __log('Media stream created.' );
    __log("input sample rate " +input.context.sampleRate);

    // Feedback!
    //input.connect(audio_context.destination);
    __log('Input connected to audio context destination.');

    recorder = new Recorder(input, {
        numChannels: 1
    });
    /*
    Unsure if inputChannels is accurate, but is equal to outputChannels for now so irrelevant
     */
    __log('Recorder initialised.');
}

function startRecording(button, prompt) {
    currentPrompt = prompt;
    recorder && recorder.record();
    button.disabled = true;
    button.nextElementSibling.disabled = false;
    __log('Recording...');
}

function stopRecording(button) {
    recorder && recorder.stop();
    button.disabled = true;
    //button.previousElementSibling.disabled = false;
    __log('Stopped recording.');

    // create WAV download link using audio data blob
    createDownloadLink();

    recorder.clear();
}

function createDownloadLink() {
    recorder && recorder.exportWAV(function(blob) {
        /*var url = URL.createObjectURL(blob);
         var li = document.createElement('li');
         var au = document.createElement('audio');
         var hf = document.createElement('a');

         au.controls = true;
         au.src = url;
         hf.href = url;
         hf.download = new Date().toISOString() + '.wav';
         hf.innerHTML = hf.download;
         li.appendChild(au);
         li.appendChild(hf);
         recordingslist.appendChild(li);*/
        nextButton(); //enables next button on callback
    });
}

window.onload = function init() {
    try {
        // webkit shim
        window.AudioContext = window.AudioContext || window.webkitAudioContext;



        navigator.getUserMedia = ( navigator.getUserMedia ||
        navigator.webkitGetUserMedia ||
        navigator.mozGetUserMedia ||
        navigator.msGetUserMedia);
        window.URL = window.URL || window.webkitURL;

        audio_context = new AudioContext;
        __log('Audio context set up.');
        __log('navigator.getUserMedia ' + (navigator.getUserMedia ? 'available.' : 'not present!'));
    } catch (e) {
        alert('No web audio support in this browser!');
    }

    navigator.getUserMedia({audio: true}, startUserMedia, function(e) {
        __log('No live audio input: ' + e);
    });
};
