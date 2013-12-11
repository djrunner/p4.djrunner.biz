$(function() {


var hours;
var minutes;
var seconds;

$( document ).ready(function() {
	
	for (var i = 0; i < 10; i++)	{
		$("#hours").append("<option>" + i + "</option>");
	}

	for (var i = 0; i < 59; i++)	{
		$("#minutes").append("<option>" + i + "</option>");
	}

	for (var i = 0; i < 59; i++)	{
		$("#seconds").append("<option>" + i + "</option>");
	}

});

$('#hours').click(function() {

	hours  = parseInt($('#hours').find('option:selected').text());

});

$('#minutes').click(function() {

	minutes = parseInt($('#minutes').find('option:selected').text());

});


$('#seconds').click(function() {

	seconds = parseInt($('#seconds').find('option:selected').text());

});


$('#calculate').click(function() {
	console.log("test");
  console.log(hours);
  console.log(minutes);
  console.log(seconds);
});

});


console.log("hello!");