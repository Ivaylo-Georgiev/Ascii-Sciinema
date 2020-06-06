let videos = document.querySelectorAll('.video');

for(let video of videos) {
  video.addEventListener('click', function() {
    let name = this.className.split(' ')[1];
    document.location.href = '../html/screen.html?videoName=' + name;
  });
}
