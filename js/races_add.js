$(function() {


var time_hours = 0;
var time_minutes = 0;
var time_seconds = 0;

var pace_minutes = 0;
var pace_seconds = 0;

$( document ).ready(function() {
	
	for (var i = 0; i < 10; i++)	{
		$("#time_hours").append("<option>" + i + "</option>");
	}

	for (var i = 0; i < 59; i++)	{
		$("#time_minutes").append("<option>" + i + "</option>");
	}

	for (var i = 0; i < 59; i++)	{
		$("#time_seconds").append("<option>" + i + "</option>");
	}

	for (var i = 0; i < 59; i++)	{
		$("#pace_minutes").append("<option>" + i + "</option>");
	}

	for (var i = 0; i < 59; i++)	{
		$("#pace_seconds").append("<option>" + i + "</option>");
	}

});

$('#time_hours').click(function() {

	time_hours  = parseInt($('#time_hours').find('option:selected').text());

});

$('#time_minutes').click(function() {

	time_minutes = parseInt($('#time_minutes').find('option:selected').text());

});


$('#time_seconds').click(function() {

	time_seconds = parseInt($('#time_seconds').find('option:selected').text());

});


$('#calculate').click(function() {
	console.log("test");
  console.log(time_hours);
  console.log(time_minutes);
  console.log(time_seconds);
});

});

$("#race_add_form").validate();