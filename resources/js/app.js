require('./bootstrap');
// const modal = UIkit.modal("#my_id");
// modal.show();

copyRekening = function(rekening) {
  var copyText = document.getElementById(rekening);
  navigator.clipboard.writeText(copyText.value);
  UIkit.notification({
    message: "&#10004; Berhasil menyalin no rekening!",
    status: 'primary',
    pos: 'top-right',
    timeout: 5000
});
//   alert(`Copied text: ${copyText.value}`)
}