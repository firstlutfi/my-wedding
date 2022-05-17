require("./bootstrap");
const modal = UIkit.modal("#my_id");
modal.show();
axios.interceptors.request.use(
    function (config) {
        btn = document.getElementById(config['element']);
        btn.disabled = true;
        btn.innerHTML = '<div uk-spinner="ratio: 0.5"></div>';
        return config;
    },
    function (error) {
        return Promise.reject(error);
    }
);

copyRekening = function (rekening) {
    var copyText = document.getElementById(rekening);
    navigator.clipboard.writeText(copyText.value);
    UIkit.notification({
        message: "&#10004; Berhasil menyalin no rekening!",
        status: "primary",
        pos: "top-right",
        timeout: 5000,
    });
    //   alert(`Copied text: ${copyText.value}`)
};

loadMore = function () {
    btn = document.getElementById("btn-load-more");
    axios.get(`/comments?page=${parseInt(btn.dataset.currentPage)+1}`, { element: "btn-load-more" }).then(({ data }) => {
        if (data.next_page_url === null){
            btn.innerHTML = 'No More Data To Load';
        }else{
            btn.disabled = false;
            btn.innerHTML = "Load More";
            btn.dataset.currentPage = data.current_page;
        }
        
        let comments = '';
        data.data.forEach(element => {
            comments += appendComment(element);
        });

        document.getElementById('comment-container').insertAdjacentHTML('beforeend', comments);
    });
};

appendComment = function (data) {
    let temp = `<div class="tw-w-full tw-py-5 tw-px-4 tw-h-auto tw-mb-4 tw-rounded-lg uk-animation-slide-right" style="background: rgba(0,0,0,.05);">
                <div class="tw-flex tw-space-x-2 sm:tw-space-x-4">
                    <div class="tw-flex-none tw-h-12 tw-w-12 sm:tw-h-14 sm:tw-w-14 md:tw-h-14 md:tw-w-14 tw-rounded-full tw-bg-brown-lighter tw-relative">
                        <span class="tw-font-extrabold tw-text-white tw-text-center tw-text-1xl tw-p-2 tw-mt-0.5 tw-absolute tw-top-0 tw-left-0 tw-right-0">
                            ${data.comment_from[0]}
                        </span>
                    </div>
                    <div class="tw-w-full">
                        <div class="tw-flex tw-justify-between">
                            <div>
                                <p class="tw-text-gray-600 sm:tw-text-base lg:tw-text-lg tw-font-semibold">${data.comment_from}</p>
                            </div>
                            <div class="tw-flex-shrink-0">
                                <p class="tw-text-gray-600 tw-text-xs tw-mt-0.5 sm:tw-text-sm tw-font-light">${data.created_at}</p>
                            </div>
                        </div>
                        <div class="tw-mt-0.5">
                            <p class="sm:tw-text-base lg:tw-text-lg white-space comment">${data.comment_text}</p>
                        </div>
                    </div>
                </div>
            </div>`
    return temp;        
}

toggleJumlahTamu = function(){
    document.getElementById("select-attendance").value === 'yes' ? document.getElementById("jumlah-tamu").style.display = "block" : document.getElementById("jumlah-tamu").style.display = "none";
}
