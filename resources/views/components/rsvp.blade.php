<section>
    <button class="uk-button uk-button-success uk-align-center" type="button" uk-toggle="target: #buku; animation:  uk-animation-slide-left;" style="margin-bottom:0px;" aria-expanded="false">
    <span><i class="fa-solid fa-pen-to-square"></i></span>
        Konfirmasi Kehadiran
    </button>
    <div id="buku" hidden class="uk-card uk-card-default uk-margin-top uk-card-body uk-align-center uk-width-1-2@m">
        <form @submit.prevent="storeComment" id="guest_form">
            <fieldset class="uk-fieldset">
                <div class="uk-margin">
                    <div class="uk-form-label">Nama Tamu :</div>
                    <input type="text" value="{{ $guest->guest_name }}" class="guestbook-form" required disabled>
                </div>

                <div class="uk-margin">
                    <div class="uk-form-label">Pilih Kehadiran :</div>
                    <select v-model="guest.presence" class="guestbook-form" @change="setPresence" required>
                        <option value="1">Berkenan hadir</option>
                        <option value="0">Maaf tidak bisa hadir</option>
                    </select>
                </div>

                <div :class="{ 'tw-hidden' : isHidden }">
                    <div class="uk-form-label">Jumlah Tamu:</div>
                    <select v-model="guest.person" class="guestbook-form">
                        <option value="1">1 Orang</option>
                        <option value="2">2 Orang</option>
                    </select>
                </div>

                <div class="uk-margin" style="margin-bottom: 0px">
                    <div class="uk-form-label">Isi Ucapan :</div>
                    <textarea v-model="guest.comment" class="guestbook-form" rows="5" placeholder="Ucapan Selamat" required></textarea>
                </div>

            </fieldset>

            <div class="tw-h-4"></div>
            <button class="tw-bg-brown-dark tw-text-white tw-text-sm tw-w-full tw-p-2 tw-rounded-lg hover:tw-shadow-md" :class="{ 'tw-opacity-50 tw-cursor-not-allowed' : isPressed }" uk-toggle="target: #buku; animation:  uk-animation-slide-left, uk-animation-slide-left uk-animation-reverse;" aria-expanded="true">Kirim Ucapan</button>
            <button class="tw-bg-gray-100 tw-text-black tw-text-sm tw-w-full tw-p-2 tw-mt-3 tw-rounded-lg" type="button" uk-toggle="target: #buku; animation:  uk-animation-slide-left, uk-animation-slide-left uk-animation-reverse;" aria-expanded="true">Batal</button>

        </form>
    </div>
</section>