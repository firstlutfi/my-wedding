require("./required");
const Swal = require("sweetalert2");

const Toast = Swal.mixin({
    showConfirmButton: false,
    showCloseButton: false,
    showCancelButton: false,
    timer: 3000,
    timerProgressBar: true,
    allowOutsideClick: false,
    allowEscapeKey: false,
    backdrop: true,
});

axios.interceptors.request.use(
    function (config) {
        btn = document.getElementById(config["element"]);
        btn.disabled = true;
        btn.innerHTML = '<div uk-spinner="ratio: 0.5"></div>';
        return config;
    },
    function (error) {
        return Promise.reject(error);
    }
);

copyRekening = function (rekening) {
    UIkit.notification.closeAll();
    var copyText = document.getElementById(rekening);
    navigator.clipboard.writeText(copyText.value);
    UIkit.notification({
        message: "&#10004; Berhasil menyalin no rekening!",
        status: "primary",
        pos: "top-right",
        timeout: 5000,
    });
};

loadMore = function () {
    btn = document.getElementById("btn-load-more");
    axios
        .get(`/comments?page=${parseInt(btn.dataset.currentPage) + 1}`, {
            element: "btn-load-more",
        })
        .then(({ data }) => {
            if (data.metadata.next_page_url === null) {
                btn.innerHTML = "No More Data To Load";
            } else {
                btn.disabled = false;
                btn.innerHTML = "Load More";
            }
            btn.dataset.currentPage = data.metadata.current_page;

            document
                .getElementById("comment-container")
                .insertAdjacentHTML("beforeend", data.render);
        });
};

appendComment = function (data) {
    let temp = `<div class="tw-w-full tw-py-5 tw-px-4 tw-h-auto tw-mb-4 tw-rounded-lg uk-animation-slide-right" style="background: rgba(0,0,0,.05);">
    <div class="tw-flex tw-space-x-2 sm:tw-space-x-4">
        <div class="tw-flex-none tw-h-12 tw-w-12 tw-rounded-full bg-gold tw-relative">
            <span class="tw-font-extrabold tw-text-black tw-text-center tw-text-1xl tw-p-2 tw-mt-0.5 tw-absolute tw-top-0 tw-left-0 tw-right-0">
                ${setNameInitial(data.comment_from)}
            </span>
        </div>
        <div class="tw-w-full">
            <div class="tw-flex tw-justify-between">
                <div>
                    <p class="tw-text-base tw-font-bold">${
                        data.comment_from
                    }</p>
                </div>
                <div class="tw-flex-shrink-0">
                    <p class="text-gold tw-text-xs tw-italic tw-mt-0.5 tw-font-light">${
                        data.created_at
                    }</p>
                </div>
            </div>
            <div>
                <p class="tw-text-gray-600 tw-text-sm white-space comment">${
                    data.comment_text
                }</p>
            </div>
        </div>
    </div>
</div>`;
    return temp;
};

showRsvpResponse = function (rsvp) {
    append = "";
    let yes = `<div id="rsvp-yes" class="uk-animation-scale-up">
    <div class="uk-margin-remove-bottom tw-text-8xl">
        😊
    </div>
    <div class="uk-margin-remove-top">
        <p class="tw-text-center tw-text-xl tw-text-black tw-font-bold tw-break-words">Terima kasih!</p>
        <p class="tw-text-center tw-text-base tw-text-black tw-break-words">
            Anda bersedia akan hadir bersama ${
                rsvp.number_of_attendance - 1
            } orang lainnya.
            <br>Sampai berjumpa tanggal 30 Juli!
        </p>

    </div>
</div>`;

    let no = `<div id="rsvp-no" class="uk-animation-scale-up">
    <div class="uk-margin-remove-bottom tw-text-8xl">
        😢
    </div>
    <div class="uk-margin-remove-top">
        <p class="tw-text-center tw-text-xl tw-text-black tw-font-bold tw-break-words">Yah, sayang sekali...</p>
        <p class="tw-text-center tw-text-base tw-text-black tw-break-words">
            Tiada kesan tanpa kehadiranmu, <br>semoga kita bisa berjumpa di lain waktu.
        </p>
    </div>
</div>`;

    let bottomInfo = `<div class="uk-margin uk-animation-scale-up">
<p class="tw-text-center tw-text-sm tw-text-black tw-break-words">Ingin mengubah data reservasi?
    <br>Silakan hubungi <a class="text-gold" target="_blank" href="https://wa.me/6281214715383?text=Hallo Lutfi! Saya ingin mengubah data reservasi atas nama ${rsvp.guest_name}. Kode undangan saya adalah ${rsvp.invitation_code}.">Lutfi</a> atau <a class="text-gold" target="_blank" href="https://wa.me/6282141002888?text=Hallo Vira! Saya ingin mengubah data reservasi atas nama ${rsvp.guest_name}. Kode undangan saya adalah ${rsvp.invitation_code}.">Vira</a>.
</p>
</div>`;
    append += rsvp.rsvp === "yes" ? yes : no;
    return append + bottomInfo;
};

toggleJumlahTamu = function () {
    document.getElementById("select-attendance").value === "yes"
        ? (document.getElementById("jumlah-tamu").style.display = "block")
        : (document.getElementById("jumlah-tamu").style.display = "none");
};

checkInvitationCode = function () {
    let invitation_code = document.getElementById(
        "input-invitation-code"
    ).value;
    window.location.href = `/?invitation_code=${invitation_code}`;
};

submitRsvp = function (code) {
    valid = document.getElementById("rsvp-form").reportValidity();

    if (valid) {
        axios
            .post(
                "/rsvp",
                {
                    invitation_code: code,
                    rsvp: document.getElementById("select-attendance").value,
                    number_of_attendance: parseInt(
                        document.getElementById("number-of-attendance").value
                    ),
                    comment_text: document.getElementById("comment-box").value,
                },
                { element: "btn-rsvp" }
            )
            .then(({ data }) => {
                if (data.hasOwnProperty("errors")) {
                    Toast.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                } else {
                    newComment = "";
                    document.getElementById("rsvp-form").remove();
                    document.getElementById("rsvp").innerHTML =
                        showRsvpResponse(data.data.rsvp);
                    newComment += appendComment(data.data.comment);
                    let commentList =
                        document.getElementById("comment-container");
                    if (commentList.childElementCount >= 10) {
                        commentList.lastElementChild.remove();
                    }
                    commentList.insertAdjacentHTML("afterbegin", newComment);
                }
            });
    }
};

submitComment = function () {
    valid = document.getElementById("comment-form").reportValidity();
    if (valid) {
        axios
            .post(
                "/comments",
                {
                    invitation_code:
                        document.getElementById("comment-code").value,
                    comment_from: document.getElementById("comment-name").value,
                    comment_text: document.getElementById("comment-text").value,
                },
                { element: "btn-submit-comment" }
            )
            .then(({ data }) => {
                btn = document.getElementById("btn-submit-comment");
                btn.disabled = false;
                btn.innerHTML = "Kirim Ucapan";
                let newComment = "";
                if (data.hasOwnProperty("errors")) {
                    Toast.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                } else {
                    document.getElementById("comment-text").value = "";
                    if (data.data.guest.enable_edit_name === "0") {
                        document.getElementById("comment-card").remove();
                    }
                    newComment += appendComment(data.data.comment);
                    let commentList =
                        document.getElementById("comment-container");
                    if (commentList.childElementCount >= 10) {
                        commentList.lastElementChild.remove();
                    }
                    commentList.insertAdjacentHTML("afterbegin", newComment);
                }
            });
    }
};

setNameInitial = function (name) {
    let split = name.split(" ", 2);
    if (split.length == 1) {
        return split[0][0].toUpperCase();
    }
    return (split[0][0] + split[1][0]).toUpperCase();
};

toggleAudio = function () {
    let music = document.getElementById("music");
    if (music.paused) {
        music.play();
        document
            .querySelector("#toggle-audio span")
            .classList.remove("music-paused");
        document
            .querySelector("#toggle-audio span")
            .classList.add("music-played");
    } else {
        music.pause();
        document
            .querySelector("#toggle-audio span")
            .classList.remove("music-played");
        document
            .querySelector("#toggle-audio span")
            .classList.add("music-paused");
    }
};

const button = document.getElementById('play-sound');
button.addEventListener('click', function () {
    // Start playing audio when the user clicks on the 'buka undangan' button
    const audio = document.getElementById("music");
    audio.play();
}, true);
const modal = UIkit.modal("#my_id");
modal.show();
// UIkit.util.on("#my_id", "hidden", function () {
//     const audio = document.getElementById("music");
//     audio.play();
// });
