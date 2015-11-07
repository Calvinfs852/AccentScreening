'use strict';

//recording using MediaDevices API https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices

// Put variables in global scope to make them available to the browser console.
var audio = document.querySelector('audio');
var constraints = window.constraints = {
    audio: true,
    video: false
};
var errorDisplay = $("#errorMessage");//TODO: Make Error Message display


function record(/*parameter*/)
{
alert("recording");

}

function submit(){

    alert("Data sent to database\nEmail sent to admin\nYou will receive a personalized email with a summary of your results as soon as it is ready\nThank you and have a nice day!")


}

function recordFormData(window)
{

    alert("Your information has been recorded")//TODO: Record information. .Serialize()?
    $("div.registration").hide();
    $("div.screening").show();

}
