<section>
    <div>
        <audio id="audio" muted autoplay loop>
            <source src="assets/music/young-lex.mp3">
        </audio>
    </div>
    <div>
        <div class="music-box">
            <button class="music-box-toggle-btn"></button>
            <button class="music" id="unmute-sound" @click="unMuteAudio" v-show="!isMute">
                <span class="uk-icon uk-icon-image"
                    style="background-image: url('/images/unmute.png'); margin-top: -5px;"></span>
            </button>
            <button class="music" id="mute-sound" @click="muteAudio" v-show="isMute">
                <span class="uk-icon uk-icon-image"
                    style="background-image: url('/images/mute.png'); margin-top: -5px;"></span>
            </button>
        </div>
    </div>
</section>