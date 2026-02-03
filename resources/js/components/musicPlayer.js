export default () => ({
    player: null,
    currentSong: { name: "", uri: "" },
    status: "paused",
    playlist: [
        {
            name: "heart pt. 6",
            uri: "spotify:track:1SGvjfc85yzqKXsfKcCxn2",
            artist: "Kendrick Lamar",
        },
        {
            name: "auntie diaries",
            uri: "spotify:track:1uY1X8YeBixs1FdQ3fQ7d4",
            artist: "Kendrick Lamar",
        },
        {
            name: "My Love Mine All Mine",
            uri: "spotify:track:3vkCueOmm7xQDoJ17W1Pm3",
            artist: "Mitski",
        },
        {
            name: "... Un Nuevo Disco",
            uri: "spotify:track:5KBdCGfVJ4ydhrT6VNLhet",
            artist: "Bratty",
        },
        {
            name: "no hay problema",
            uri: "spotify:track:6hHvuWEchiY9UyyjHlrs5B",
            artist: "Ed Maverick",
        },
        {
            name: "La Perla",
            uri: "spotify:track:4oVO4fGNRRvEn0CRuFO4qv",
            artist: "La Rosalia",
        },
        {
            name: "luckyy",
            uri: "spotify:track:1fNVYUWkalXzEt08ozR77x",
            artist: "Rojuu",
        },
    ],

    init() {
        window.onSpotifyIframeApiReady = (IFrameAPI) => {
            const element = document.getElementById("spotify-player");
            const options = {
                width: "100%",
                height: "80",
            };
            IFrameAPI.createController(element, options, (EmbedController) => {
                this.player = EmbedController;

                this.player.addListener("playback_update", (e) => {
                    const { isPaused, isBuffering } = e.data;

                    if (isBuffering) {
                        this.status = "loading";
                    } else if (isPaused) {
                        this.status = "paused";
                    } else {
                        this.status = "playing";
                    }
                });
            });
        };
    },
    playSong(song) {
        this.currentSong = song;
        if (this.player) {
            this.player.loadUri(song.uri);
            this.player.play();
        }
    },
    playPause() {
        if (this.player) {
            this.player.togglePlay();
        }
    },
    restart() {
        if (this.player) {
            this.player.restart();
        }
    },
});
