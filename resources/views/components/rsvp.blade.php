<section>
    @if ($guest->rsvp == null)
    <div id="rsvp" class="uk-card uk-card-default uk-margin-top uk-card-body uk-align-center uk-width-2-3@m">
        <form id="rsvp-form" name="rsvp-form" method="post">
            @csrf
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
                    <div class="uk-form-label tw-text-left">Jumlah Tamu (Termasuk Anda):</div>
                    <select class="uk-select guestbook-form" id="number-of-attendance">
                        @for($i=1; $i<=$guest->max_attendance; $i++)
                            <option value="{{ $i }}">{{ $i }} Orang</option>
                            @endfor
                    </select>
                    <div class="tw-text-left"><i class="tw-text-xs tw-text-red-500">*Anak-anak usia di bawah 5 tahun tidak perlu dihitung</i></div>
                    
                </div>

                <div class="uk-margin">
                    <div class="uk-form-label tw-text-left">Beri Ucapan Untuk Kedua Mempelai :</div>
                    <textarea class="uk-textarea guestbook-form" rows="5" placeholder="Ucapan Selamat (maksimal 200 karakter)" id="comment-box" maxlength="200" required></textarea>
                </div>

            </fieldset>

            <div class="tw-h-4"></div>
            <button class="btn-main bg-gold tw-text-black tw-text-sm tw-w-full tw-p-2 tw-rounded-lg hover:tw-shadow-md" id="btn-rsvp" type="submit" onclick="event.preventDefault();submitRsvp('{{$guest->invitation_code}}');" aria-expanded="true">RSVP</button>
        </form>
    </div>
    @else
    <div id="rsvp-response" class="uk-card uk-card-default uk-margin-top uk-card-body uk-align-center uk-width-2-3@m">
        @if ($guest->rsvp == 'yes')
        <div id="rsvp-yes">
            <div class="uk-margin-remove-bottom tw-text-8xl">
                😊
            </div>
            <div class="uk-margin-remove-top">
                <p class="tw-text-center tw-text-xl tw-text-black tw-font-bold tw-break-words">Terima kasih!</p>
                <p class="tw-text-center tw-text-base tw-text-black tw-break-words">
                    Anda bersedia akan hadir bersama {{ $guest->number_of_attendance - 1 }} orang lainnya.
                    <br>Sampai berjumpa tanggal 30 Juli!
                </p>

            </div>
        </div>
        @else
        <div id="rsvp-no">
            <div class="uk-margin-remove-bottom tw-text-8xl">
                😢
            </div>
            <div class="uk-margin-remove-top">
                <p class="tw-text-center tw-text-xl tw-text-black tw-font-bold tw-break-words">Yah, sayang sekali...</p>
                <p class="tw-text-center tw-text-base tw-text-black tw-break-words">
                    Tiada kesan tanpa kehadiranmu, <br>semoga kita bisa berjumpa di lain waktu.
                </p>

            </div>
        </div>
        @endif
        <div class="uk-margin">
            <p class="tw-text-center tw-text-sm tw-text-black tw-break-words">Ingin mengubah data reservasi?
                <br>Silakan hubungi <a class="text-gold" target="_blank" href="https://wa.me/6281214715383?text=Hallo Lutfi! Saya ingin mengubah data reservasi atas nama {{ $guest->guest_name }}. Kode undangan saya adalah {{ $guest->invitation_code }}.">Lutfi</a> atau <a class="text-gold" target="_blank" href="https://wa.me/6282141002888?text=Hallo Vira! Saya ingin mengubah data reservasi atas nama {{ $guest->guest_name }}. Kode undangan saya adalah {{ $guest->invitation_code }}.">Vira</a>.
            </p>
        </div>
    </div>
    @endif
</section>