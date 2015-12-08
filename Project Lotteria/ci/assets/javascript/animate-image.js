$(function(){
    $('.home').mouseenter(function(event) {
        $(this).animate({
            'background-position-y': '+=100%'},
            300, function() {
            /* stuff to do after animation is complete */
        });
    });
    $('.home').mouseleave(function(event) {
        $(this).animate({
            'background-position-y': '-=100%'},
            300, function() {
            /* stuff to do after animation is complete */
        });
    });
    $('.image').mouseenter(function(event) {
        $(this).animate({
            'background-position-y': '+=100%'},
            300, function() {
            /* stuff to do after animation is complete */
        });
    });
    $('.image').mouseleave(function(event) {
        $(this).animate({
            'background-position-y': '-=100%'},
            300, function() {
            /* stuff to do after animation is complete */
        });
    });
    $('.share a div').mouseenter(function(event) {
        $(this).animate({
            'background-position-y': '+=100%'},
            300, function() {
            /* stuff to do after animation is complete */
        });
    });
    $('.share a div').mouseleave(function(event) {
        $(this).animate({
            'background-position-y': '-=100%'},
            300, function() {
            /* stuff to do after animation is complete */
        });
    });
    $('.news').mouseenter(function(event) {
        $(this).find('a').animate({
            'background-position-y': '+=120%'},
            300, function() {
            /* stuff to do after animation is complete */
        });
    });
    $('.news').mouseleave(function(event) {
        $(this).find('a').animate({
            'background-position-y': '-=120%'},
            300, function() {
            /* stuff to do after animation is complete */
        });
    });
    $('.group_article').mouseenter(function(event) {
        $(this).find('a').animate({
            'background-position-y': '+=110%'},
            300, function() {
            /* stuff to do after animation is complete */
        });
    });
    $('.group_article').mouseleave(function(event) {
        $(this).find('a').animate({
            'background-position-y': '-=110%'},
            300, function() {
            /* stuff to do after animation is complete */
        });
    });
});