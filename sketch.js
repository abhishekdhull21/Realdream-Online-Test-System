

var timeleft = 600;

var startTime = 0;
var currentTime = 0;

function convertSeconds(s) {
  var min = floor(s / 60);
  var sec = s % 60;
  return nf(min, 2) + ':' + nf(sec, 2);
}

var ding;

function preload() {
  ding = loadSound("ding.mp3");
}

function setup() {
  noCanvas();
  startTime = millis();


  var params = getURLParams();
  console.log(params);
  if (params.minute) {
    var min = params.minute;
    timeleft = min * 60;
  }

  var timer = select('#timery');
  timer.html(convertSeconds(timeleft - currentTime));

  var interval = setInterval(timeIt, 1000);

  function timeIt() {
    currentTime = floor((millis() - startTime) / 1000);
    timer.html(convertSeconds(timeleft - currentTime));
    if (currentTime+10 == timeleft) {
      ding.play();
	  //alert("hiii");
      //clearInterval(interval);
      //counter = 0;
    }
	if (currentTime == timeleft) {
      ding.stop();
	  
	document.getElementById("form1").submit();
      clearInterval(interval);
      //counter = 0;
    }
  }


}
