'use strict';

//recording using MediaDevices API https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices
//Using recorder.js from github

// Put variables in global scope to make them available to the browser console.
var audio = document.querySelector('audio');
var constraints = window.constraints = {
    audio: true,
    video: false
};
var errorDisplay = $("#errorMessage");//TODO: Make Error Message display

var screeningAudioContext = new (window.AudioContext || window.webkitAudioContext);

var bufferLength = 4096;
var inputChannels = 1;
var outputChannels = 1;

var processor = screeningAudioContext.createScriptProcessor(bufferLength, inputChannels, outputChannels); //4096 buffer size, 1 input channel, 1 output channel. No particular reason for 4096.

var workerpath = "js/vendor/Recorderjs/recorderWorker.js";

var recorderConfig = {workerPath : workerpath, bufferLen : bufferLength };

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
    var now = new Date().getTime();
    imprint = email + now;

    $("div.registration").hide();
    $("div.screening").show();
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
        numChannels: inputChannels
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
    button.previousElementSibling.disabled = false;
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
