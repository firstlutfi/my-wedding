<section class="uk-container uk-container-small">
    <div id="guest_comment" class="sm:tw-max-w-screen-sm md:tw-max-w-screen-md lg:tw-max-w-screen-lg tw-mx-auto tw-px-2.5 tw-pt-10 tw-pb-3">
        <h2 class="tw-text-5xl tw-mt-3 tw-text-brown-dark font-cookie tw-text-center tw-pt-10 uk-scrollspy-inview">
            Greetings Card </h2>
        <hr class="divider">
        <div class="uk-card uk-card-default uk-margin-top uk-card-body uk-align-center">
        <form @submit.prevent="storeComment" id="guest_form">
            <fieldset class="uk-fieldset">
                <div class="uk-margin">
                    <div class="uk-form-label">Nama :</div>
                    <input type="text" value="{{ $guest->guest_name }}" class="guestbook-form" required>
                </div>

                <div class="uk-margin" style="margin-bottom: 0px">
                    <div class="uk-form-label">Isi Ucapan :</div>
                    <textarea class="guestbook-form" rows="5" placeholder="Ucapan Selamat" required></textarea>
                </div>
            </fieldset>

            <div class="tw-h-4"></div>
            <button class="tw-bg-brown-dark tw-text-white tw-text-sm tw-w-full tw-p-2 tw-rounded-lg hover:tw-shadow-md" :class="{ 'tw-opacity-50 tw-cursor-not-allowed' : isPressed }" aria-expanded="true">Kirim Ucapan</button>
        </form>
    </div>
        <div id="comment-container">
            @foreach($comments as $cmt)
            <div class="tw-w-full tw-py-5 tw-px-4 tw-h-auto tw-mb-4 tw-rounded-lg" style="background: rgba(0,0,0,.05);">
                <div class="tw-flex tw-space-x-2 sm:tw-space-x-4">
                    <div class="tw-flex-none tw-h-12 tw-w-12 sm:tw-h-14 sm:tw-w-14 md:tw-h-14 md:tw-w-14 tw-rounded-full tw-bg-brown-lighter tw-relative">
                        <span class="tw-font-extrabold tw-text-white tw-text-center tw-text-1xl tw-p-2 tw-mt-0.5 tw-absolute tw-top-0 tw-left-0 tw-right-0">
                            {{ $cmt->comment_from[0] }}
                        </span>
                    </div>
                    <div class="tw-w-full">
                        <div class="tw-flex tw-justify-between">
                            <div>
                                <p class="tw-text-gray-600 sm:tw-text-base lg:tw-text-lg tw-font-semibold">{{ $cmt->comment_from }}</p>
                            </div>
                            <div class="tw-flex-shrink-0">
                                <p class="tw-text-gray-600 tw-text-xs tw-mt-0.5 sm:tw-text-sm tw-font-light">{{ $cmt->created_at }}</p>
                            </div>
                        </div>
                        <div class="tw-mt-0.5">
                            <p class="sm:tw-text-base lg:tw-text-lg white-space comment">{{ $cmt->comment_text }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="tw-w-full tw-text-center">
            <button id="btn-load-more" class="tw-bg-brown-dark tw-text-white tw-text-xs tw-py-2 tw-px-4 tw-rounded-lg sm:tw-w-1/2 md:tw-w-1/2 lg:tw-w-1/4" type="button" data-current-page="{{ $comments->currentPage() }}" onclick="loadMore()" {{ $comments->nextPageUrl() == null ? 'disabled' : '' }}>{{ $comments->nextPageUrl() == null ? 'No More Data To Load' : 'Load More' }}</button>
        </div>
    </div>
</section>