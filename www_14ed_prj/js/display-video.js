window.addEventListener('load', function() {
  let videoName = getVideoName();
  fetchAsciiFrames(videoName);
});

function getVideoName() {
  let urlParams = new URLSearchParams(window.location.search);
  return urlParams.get('videoName');
}

function fetchAsciiFrames(videoName) {
  let request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let displayProperties = JSON.parse(this.response);
      extractAsciiFrames(videoName, displayProperties);
    }
  }
  request.open("GET", "../js/display-properties.json", true);
  request.send();
}

function extractAsciiFrames(videoName, displayProperties) {
  let request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let frames = JSON.parse(this.response);
      playVideo(frames, displayProperties);
    }
  }
  request.open("GET", "../php/ascii-frames.php?videoName=" + videoName + "&scale=" + displayProperties.scale, true);
  request.send();

  waitForVideo();
}

function playVideo(frames, displayProperties) {
  let framesCount = frames.length;
  for(let frame = 0; frame < framesCount; frame += 1) {
    setTimeout(function() {
      displayFrame(frames[frame], frame===framesCount-1, displayProperties);
    }, displayProperties.timeBetweenFramesInMilliseconds * frame);
  }
}

function displayFrame(frame, isLast, displayProperties) {
  document.querySelector("#screen").style.fontSize = displayProperties.fontSize;
  document.querySelector("#screen").innerHTML = frame;

  if(isLast) {
    document.querySelector("#screen").innerHTML = '<h2>Thanks for watching!</h2><a href="../php/index.php">Browse more videos</a>';
  }
}

function waitForVideo() {
  let screen = document.querySelector('#screen');

  let loadingMessage = document.createElement('h2');
  loadingMessage.innerHTML = 'Please, wait. Your video is being processed...';
  loadingMessage.classList.add('loading-message');

  let loadingImg = document.createElement('img');
  loadingImg.src = '../resources/loading.gif';
  loadingImg.classList.add('loading-img');

  screen.appendChild(loadingMessage);
  screen.appendChild(loadingImg);
}
