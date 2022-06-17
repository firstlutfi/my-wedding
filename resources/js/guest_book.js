require("./required");
const Swal = require("sweetalert2");

const Toast = Swal.mixin({
    showConfirmButton: false,
    showCloseButton: false,
    showCancelButton: false,
    timer: 2000,
    timerProgressBar: true,
    allowOutsideClick: false,
    allowEscapeKey: false,
    backdrop: true,
});

onScanSuccess = function(decodedText, decodedResult) {
    let result = decodedText.match(/https:\/\/lutfiandvira\.wedding\/\?invitation_code=(.+)/);
    if (result){
        html5QrcodeScanner.pause(true);
        axios.get(`/guest/${result[1]}`).then(({ data }) => {
            if (!data.hasOwnProperty("guest_name")){
                Toast.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Invitation code not found! Please re-scan.",
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                      console.log('I was closed by the timer');
                      html5QrcodeScanner.resume();
                    }
                  });
            }else{
                let temp = '';
                document.getElementById("guest-book-invitation-code").value = data.invitation_code;
                document.getElementById("guest-book-name").value = data.guest_name;
                for (let index = 1; index <= data.number_of_attendance; index++) {
                    temp += `<option value=${index}>${index}</option>`
                }
                document.getElementById("guest-book-number-of-attendance").insertAdjacentHTML("afterbegin",temp);
                UIkit.modal("#modal-guest-book").show();
            }
        });
    }
}

var html5QrcodeScanner = new Html5QrcodeScanner(
	"qr-reader", { fps: 10,
        qrbox: 300,
        aspectRatio: 1.777778,
        disableFlip: true,
        formatsToSupport: [ Html5QrcodeSupportedFormats.QR_CODE ]
    });
html5QrcodeScanner.render(onScanSuccess);
