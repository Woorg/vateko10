export function heroVideo() {
    const $video = document.querySelector('.hero__video');

    // if ($video.length > 0) {
    const video = document.querySelector('.hero__video');
    const circlePlayButton = document.querySelector('.hero__video-button');

    function togglePlay() {
        if (video.paused || video.ended) {
            video.play();
        } else {
            video.pause();
        }
    }
    circlePlayButton.addEventListener('click', togglePlay);
    video.addEventListener('playing', function () {
        circlePlayButton.style.opacity = 0;
    });
    video.addEventListener('pause', function () {
        circlePlayButton.style.opacity = 1;
    });
    // }
}
