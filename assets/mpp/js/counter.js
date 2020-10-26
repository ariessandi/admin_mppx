(function() {
    let medias = [
            'http://thenewcode.com/assets/videos/lake.mp4',
            'http://thenewcode.com/assets/images/vid-mountain.jpg',
            'http://thenewcode.com/assets/videos/glacier.mp4',
        ],
        videos,
        currentVideoIndex = 0,
        currentVideo = null,
        imageDuration = 3000;

    const onLoadPlaylist = () => {
        playerContainer = document.getElementById('player-container');

        videos = medias.map(item => {
            let video = document.createElement('video');
            video.preload = true;
            video.autoplay = true;
            video.muted = true;
            video.classList.add('player');

            if (!isImage(item)) {
                video.src = item;
                video.load();
            } else {
                video.poster = item;
                video.src = "#";
                video.load();
            }

            video.onended = handleEndedVideo;
            playerContainer.appendChild(video);

            return video;
        });

        window.videos = videos;

        play();
    };

    const isImage = (url) => {
        return /.\.jpg/.test(url);
    }

    const nextVideo = () => {
        currentVideoIndex += 1;
        currentVideoIndex = (currentVideoIndex > videos.length - 1) ? 0 : currentVideoIndex;
        let oldVideo = currentVideo;
        currentVideo = videos[currentVideoIndex];

        if (!currentVideo.poster) {
            oldVideo.classList.remove('player-show');
            currentVideo.classList.add('player-show');
            oldVideo.pause();
            currentVideo.play();
        } else {
            oldVideo.classList.remove('player-show');
            currentVideo.classList.add('player-show');

            oldVideo.pause();
            setTimeout(nextVideo, imageDuration);
        }
    }

    const play = () => {
        currentVideo = videos[currentVideoIndex];
        currentVideo.classList.add('player-show');
        currentVideo.currentTime = 0;
        currentVideo.play();
    }

    const handleEndedVideo = () => {
        nextVideo();
    }

    onLoadPlaylist();
})();

function showTime() {
    var a_p = "";
    var today = new Date();
    var curr_hour = today.getHours();
    var curr_minute = today.getMinutes();
    var curr_second = today.getSeconds();
    if (curr_hour < 12) {
        a_p = "AM";
    } else {
        a_p = "PM";
    }
    if (curr_hour == 0) {
        curr_hour = 12;
    }
    if (curr_hour > 12) {
        curr_hour = curr_hour - 12;
    }
    curr_hour = checkTime(curr_hour);
    curr_minute = checkTime(curr_minute);
    curr_second = checkTime(curr_second);
    document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
setInterval(showTime, 500);

var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
var date = new Date();
var day = date.getDate();
var month = date.getMonth();
var thisDay = date.getDay(),
    thisDay = myDays[thisDay];
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;
$('#tanggal').text(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);