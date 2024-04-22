/**
 * Created by Fer on 2/23/17.
 */
"use restrict";

let $psOne = $("#psone");
let $blackout = $("#blackout");
let $audio = $("#ps-audio")[0];

$("#close-intro").click(function (){
    closeIntro();
});

function runIntro(){
    //Audio play
    $blackout.show();
    $psOne.css('display', 'flex').hide().fadeIn(3000);
    $audio.play();
    $psOne.addClass("psone-center");
    $psOne.fadeIn(3000);
}

function closeIntro(){
    $psOne.fadeOut();
    $blackout.fadeOut();
    $audio.pause();
    $audio.currentTime = 0;
}