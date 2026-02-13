const tracks = [
    {
        name: "Song One",
        artist: "Artist One",
        path: "songs/song1.mp3",
        image: "images/default.jpg"
    },
    {
        name: "Song Two",
        artist: "Artist Two",
        path: "songs/song2.mp3",
        image: "images/default.jpg"
    }
];

let currentTrack = 0;
let isPlaying = false;

const audio = document.getElementById("audio");
const trackName = document.getElementById("track-name");
const trackArtist = document.getElementById("track-artist");
const trackImage = document.getElementById("track-image");
const progress = document.getElementById("progress");
const volume = document.getElementById("volume");
const playlist = document.getElementById("playlist");

function loadTrack(index) {
    const track = tracks[index];

    trackName.textContent = track.name;
    trackArtist.textContent = track.artist;
    trackImage.src = track.image;
    audio.src = track.path;

    highlightActive(index);
}

function playPause() {
    if (isPlaying) {
        audio.pause();
    } else {
        audio.play();
    }
    isPlaying = !isPlaying;
}

function nextTrack() {
    currentTrack = (currentTrack + 1) % tracks.length;
    loadTrack(currentTrack);
    audio.play();
}

function prevTrack() {
    currentTrack = (currentTrack - 1 + tracks.length) % tracks.length;
    loadTrack(currentTrack);
    audio.play();
}

audio.addEventListener("timeupdate", () => {
    const { currentTime, duration } = audio;
    progress.value = (currentTime / duration) * 100 || 0;

    document.getElementById("current-time").textContent = formatTime(currentTime);
    document.getElementById("duration").textContent = formatTime(duration);
});

progress.addEventListener("input", () => {
    audio.currentTime = (progress.value / 100) * audio.duration;
});

volume.addEventListener("input", () => {
    audio.volume = volume.value;
});

function formatTime(time) {
    if (!time) return "0:00";
    const minutes = Math.floor(time / 60);
    const seconds = Math.floor(time % 60);
    return `${minutes}:${seconds < 10 ? "0" + seconds : seconds}`;
}

function highlightActive(index) {
    const items = document.querySelectorAll("#playlist li");
    items.forEach(item => item.classList.remove("active"));
    items[index].classList.add("active");
}

tracks.forEach((track, index) => {
    const li = document.createElement("li");
    li.textContent = track.name;
    li.onclick = () => {
        currentTrack = index;
        loadTrack(index);
        audio.play();
        isPlaying = true;
    };
    playlist.appendChild(li);
});

loadTrack(currentTrack);
