<section class="uk-container uk-container-small">
    <div class="sm:tw-max-w-screen-sm md:tw-max-w-screen-md lg:tw-max-w-screen-lg tw-mx-auto tw-px-2.5 tw-pt-10 tw-pb-3">
        <h2 class="tw-text-4xl md:tw-text-5xl tw-mt-3 text-gold font-cookie tw-text-center tw-pt-10 uk-scrollspy-inview">
            Save The Date </h2>
        <hr class="divider">
        <p class="tw-text-center tw-mt-2 tw-mb-8 tw-text-3xl md:tw-text-4xl tw-font-bold">Sabtu, 30 Juli 2022</p>

        <div class="uk-grid-small uk-flex-center uk-child-width-auto uk-grid uk-countdown uk-scrollspy-inview" uk-grid uk-countdown="date: 2022-07-30T09:00:00+07:00">
            <div>
                <div class="tw-text-2xl md:tw-text-3xl tw-font-semibold text-gold tw-text-center uk-countdown-number uk-countdown-days">
                </div>
                <div class="tw-text-xl md:tw-text-2xl tw-font-semibold uk-countdown-label uk-text-center">
                    Hari</div>
            </div>
            <div class="uk-countdown-separator"></div>
            <div>
                <div class="tw-text-2xl md:tw-text-3xl tw-font-semibold text-gold tw-text-center uk-countdown-number uk-countdown-hours">
                </div>
                <div class="tw-text-xl md:tw-text-2xl tw-font-semibold uk-countdown-label uk-text-center">
                    Jam</div>
            </div>
            <div class="uk-countdown-separator"></div>
            <div>
                <div class="tw-text-2xl md:tw-text-3xl tw-font-semibold text-gold tw-text-center uk-countdown-number uk-countdown-minutes">
                </div>
                <div class="tw-text-xl md:tw-text-2xl tw-font-semibold uk-countdown-label uk-text-center">
                    Menit</div>
            </div>
            <div class="uk-countdown-separator"></div>
            <div>
                <div class="tw-text-2xl md:tw-text-3xl tw-font-semibold text-gold tw-text-center uk-countdown-number uk-countdown-seconds">
                </div>
                <div class="tw-text-xl md:tw-text-2xl tw-font-semibold uk-countdown-label uk-text-center">
                    Detik</div>
            </div>
        </div>

        <div class="uk-width-1-1 uk-text-center tw-py-4">
            <div class="uk-grid-small uk-child-width-expand uk-grid uk-grid-stack" uk-grid="">
                <div class="uk-first-column">
                    <div class="tw-grid tw-grid-cols-2 tw-gap-3">
                        <div class="tw-my-4">
                            <p class="text-gold tw-font-normal tw-text-3xl" style="font-family: Signature;">Akad</p>
                            <p class="tw-text-center tw-mt-1 tw-text-md tw-font-bold">09.00 - 10.00 WIB</p>
                        </div>
                        <div class="tw-my-4">
                            <p class="text-gold tw-font-normal tw-text-3xl" style="font-family: Signature;">Resepsi</p>
                            <p class="tw-text-center tw-mt-1 tw-text-md tw-font-bold">10.30 - 13.00 WIB</p>
                        </div>
                        <div class="tw-col-span-2 tw-mt-4">
                            <p class="text-gold tw-font-normal tw-text-3xl" style="font-family: Signature;">Lokasi Acara</p>
                            @if ($guest->attendance_type == 'offline')
                            <div>
                                <p class="tw-text-center tw-font-bold tw-mt-1 tw-text-xl">Luminor Hotel Jemursari<br>Ballroom Lt. 5</p>
                                <p class="tw-text-center tw-font-bold tw-mt-1 tw-text-base" style="margin: 8px 0 0px 0;">
                                    Jl. Raya Jemursari No.206-208<br>Kecamatan Tenggilis Mejoyo, Kota Surabaya </p>
                                <iframe class="tw-mt-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.325455089946!2d112.75051435094367!3d-7.317289794693134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb1ac9b91b49%3A0x4bb2613bb1da37d1!2sLUMINOR%20Hotel!5e0!3m2!1sen!2sid!4v1652488283770!5m2!1sen!2sid" width="100%" height="450" style="border:2px solid rgba(139, 102, 38, .5);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <p class="tw-text-sm tw-leading-relaxed">
                                &nbsp;
                            </p>
                            <div>
                                <p class="text-gold tw-font-normal tw-text-3xl tw-my-4" style="font-family: Signature;">Protokol Acara</p>
                                <div class="tw-grid tw-grid-cols-2 tw-gap-4">
                                    <div>
                                        <img src="/images/protocol/protocol-2.png" width="85" class="tw-h-auto tw-mx-auto" alt="Sehat">
                                        <p class="tw-text-center tw-text-base tw-font-semibold tw-break-words">Pastikan anda dalam kondisi sehat</p>
                                    </div>
                                    <div>
                                        <img src="/images/protocol/protocol-4.png" width="85" class="tw-h-auto tw-mx-auto" alt="Mencuci Tangan">
                                        <p class="tw-text-center tw-text-base tw-font-semibold tw-break-words">Mencuci tangan menggunakan hand sanitizer atau air + sabun</p>
                                    </div>
                                    <div>
                                        <img src="/images/protocol/protocol-1.png" width="85" class="tw-h-auto tw-mx-auto" alt="Masker">
                                        <p class="tw-text-center tw-text-base tw-font-semibold tw-break-words">Menggunakan masker</p>
                                    </div>
                                    <div>
                                        <img src="/images/protocol/protocol-3.png" width="85" class="tw-h-auto tw-mx-auto" alt="Physical Distancing">
                                        <p class="tw-text-center tw-text-base tw-font-semibold tw-break-words">Menjaga jarak</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="text-gold tw-font-normal tw-text-3xl tw-my-4" style="font-family: Signature;">Konfirmasi Kehadiran</p>
                                @include('components.rsvp')
                            </div>
                            @else
                            <p class="tw-text-center tw-font-bold tw-mt-1 tw-text-md sm:tw-text-base md:tw-text-base" style="font-size: 16px !important;">Kota Surabaya, Jawa Timur</p>
                            <blockquote class="tw-mt-3 tw-py-2 tw-px-2 sidekick">
                                Dikarenakan keterbatasan kami dalam menempuh jarak dan waktu serta kendala kapasitas di lokasi acara, kami terpaksa harus membatasi jumlah tamu undangan yang hadir.
                                Mohon maaf yang sebesar-besarnya jika kami belum bisa mengundang seluruh rekan-rekan dan saudara/i di hari bahagia ini.
                                <br> Tapi jangan khawatir, prosesi pernikahan kami juga bisa disaksikan melalui layanan livestream di bawah.
                            </blockquote>
                            <iframe id="youtube-frame" width="100%" class="tw-mt-5 tw-aspect-video" src="https://www.youtube.com/embed/gHgX6zPu23E" title="Livestream wedding Lutfi & Vira" frameborder="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="tw-mt-5"></iframe>
                            @endif
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <img class="tw-mx-auto" src="/images/pemisah.png" alt="divider">
        </div>
    </div>
</section>