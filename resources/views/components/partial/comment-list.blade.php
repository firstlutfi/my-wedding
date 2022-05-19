@foreach($comments as $cmt)
<div class="tw-w-full tw-py-5 tw-px-4 tw-h-auto tw-mb-4 tw-rounded-lg uk-animation-slide-right" style="background: rgba(0,0,0,.05);">
    <div class="tw-flex tw-space-x-2 sm:tw-space-x-4">
        <div class="tw-flex-none tw-h-12 tw-w-12 tw-rounded-full tw-bg-brown-dark tw-relative">
            <span class="tw-font-extrabold tw-text-white tw-text-center tw-text-1xl tw-p-2 tw-mt-0.5 tw-absolute tw-top-0 tw-left-0 tw-right-0">
                {{ UtilityHelper::setNameInitial($cmt->comment_from) }}
            </span>
        </div>
        <div class="tw-w-full">
            <div class="tw-flex tw-justify-between">
                <div>
                    <p class="tw-text-base tw-font-bold">{{ $cmt->comment_from }}</p>
                </div>
                <div class="tw-flex-shrink-0">
                    <p class="tw-text-brown-dark tw-text-xs tw-italic tw-mt-0.5 tw-font-light">{{ $cmt->created_at }}</p>
                </div>
            </div>
            <div>
                <p class="tw-text-gray-600 tw-text-sm white-space comment">{{ $cmt->comment_text }}</p>
            </div>
        </div>
    </div>
</div>
@endforeach