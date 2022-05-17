<section>
    <div id="rsvp" class="uk-card uk-card-default uk-margin-top uk-card-body uk-align-center uk-width-1-2@m">
        <form @submit.prevent="storeComment" id="guest_form">
            <fieldset class="uk-fieldset">
                <div class="uk-margin">
                    <div class="uk-form-label tw-text-left">Nama Tamu :</div>
                    <input type="text" value="{{ $guest->guest_name }}" class="uk-input guestbook-form" required disabled>
                </div>

                <div class="uk-margin">
                    <div class="uk-form-label tw-text-left">Pilih Kehadiran :</div>
                    <select class="uk-select guestbook-form" id="select-attendance" onchange="toggleJumlahTamu()" required>
                        <option value="yes">Berkenan hadir</option>
                        <option value="no">Maaf tidak bisa hadir</option>
                    </select>
                </div>

                <div class="uk-margin" id="jumlah-tamu">
                    <div class="uk-form-label tw-text-left">Jumlah Tamu:</div>
                    <select class="uk-select guestbook-form">
                        @for($i=1; $i<=$guest->max_attendance; $i++)
                        <option value="{{ $i }}">{{ $i }} Orang</option>
                        @endfor
                    </select>
                </div>

                <div class="uk-margin">
                    <div class="uk-form-label tw-text-left">Beri Ucapan Untuk Kedua Mempelai :</div>
                    <textarea class="uk-textarea guestbook-form" rows="5" placeholder="Ucapan Selamat" required></textarea>
                </div>

            </fieldset>

            <div class="tw-h-4"></div>
            <button class="tw-bg-brown-dark tw-text-white tw-text-sm tw-w-full tw-p-2 tw-rounded-lg hover:tw-shadow-md" aria-expanded="true">RSVP</button>
        </form>
    </div>
</section>