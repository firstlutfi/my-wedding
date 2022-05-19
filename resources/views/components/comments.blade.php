<section class="uk-container uk-container-xsmall" style="max-width: 500px;">
    <div id="guest_comment" class="sm:tw-max-w-screen-sm md:tw-max-w-screen-md lg:tw-max-w-screen-lg tw-mx-auto tw-px-2.5 tw-pt-10 tw-pb-3">
        <h2 class="tw-text-5xl tw-mt-3 tw-text-brown-dark font-cookie tw-text-center tw-pt-10 uk-scrollspy-inview">
            Greetings Card </h2>
        <hr class="divider">
        @if ($guest->attendance_type == 'online' && ($guest->have_comments == 0 || $guest->enable_edit_name == 1) )
        <div class="uk-card uk-card-default uk-margin-top uk-card-body uk-align-center" id="comment-card">
            <form id="comment-form">
                <fieldset class="uk-fieldset">
                    <input type="hidden" id="comment-code" value="{{ $guest->invitation_code }}">
                    <div class="uk-margin uk-margin-remove-top">
                        <div class="uk-form-label">Nama :</div>
                        <input type="text" id="comment-name" value="{{ $guest->guest_name }}" class="guestbook-form" maxlength="20" required {{ $guest->enable_edit_name == 1 ? '' : 'disabled' }}>
                    </div>

                    <div class="uk-margin" style="margin-bottom: 0px">
                        <div class="uk-form-label">Isi Ucapan :</div>
                        <textarea id="comment-text" class="guestbook-form" rows="5" placeholder="Ucapan Selamat (maksimal 200 karakter)" maxlength="200" required></textarea>
                    </div>
                </fieldset>

                <div class="tw-h-4"></div>
                <button class="btn-main tw-bg-brown-dark tw-text-white tw-text-sm tw-w-full tw-p-2 tw-rounded-lg hover:tw-shadow-md" id="btn-submit-comment" onclick="event.preventDefault();submitComment();" aria-expanded="true">Kirim Ucapan</button>
            </form>
        </div>
        @endif
        <div id="comment-container">
            @include('components.partial.comment-list')
        </div>
        <div class="tw-w-full tw-text-center tw-mb-5">
            <button id="btn-load-more" class="btn-main tw-bg-brown-dark tw-text-white tw-text-xs tw-py-2 tw-px-4 tw-rounded-lg sm:tw-w-1/2 md:tw-w-1/2 lg:tw-w-1/3 {{ $comments->nextPageUrl() == null ? 'tw-cursor-not-allowed' : '' }}" type="button" data-current-page="{{ $comments->currentPage() }}" onclick="loadMore()" {{ $comments->nextPageUrl() == null ? 'disabled' : '' }}>{{ $comments->nextPageUrl() == null ? 'No More Data To Load' : 'Load More' }}</button>
        </div>
        <div class="tw-pt-2">
            <img class="tw-mx-auto" src="/images/pemisah.png" alt="divider">
        </div>
    </div>
</section>