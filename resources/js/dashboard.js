require("./required");

$(document).ready(function () {
    $("#guest-table").DataTable({
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 5] }],
        order: [],
    });

    $(".trigger-modal-view").click(function () {
        axios.get(`/guest/${$(this).data("code")}`).then(({ data }) => {
            $("#static-attendance-type").val(data.attendance_type);
            $("#static-enable-edit-name").val(
                data.enable_edit_name == 1 ? "yes" : "no"
            );
            $("#static-guest-name").val(data.guest_name);
            $("#static-max-attendance").val(data.max_attendance);
            $("#static-number-of-attendance").val(data.number_of_attendance);
            $("#static-rsvp").val(
                data.attendance_type == "online"
                    ? "-"
                    : data.rsvp == null
                    ? "Not Yet"
                    : _.capitalize(data.rsvp)
            );
            $("#static-invitation-code").val(data.invitation_code);
            $("#modal-view").modal();
        });
    });

    $(".trigger-modal-edit").click(function () {
        axios.get(`/guest/${$(this).data("code")}`).then(({ data }) => {
            if (data.attendance_type == "offline") {
                $("#input-attendance-type").val("offline").change();
            } else {
                $("#input-attendance-type").val("online").change();
            }

            if (data.enable_edit_name == 1) {
                $("#input-enable-edit-name").val("1").change();
            } else {
                $("#input-enable-edit-name").val("0").change();
            }

            if (data.rsvp == "yes") {
                $("#input-rsvp").val("yes").change();
            } else if (data.rsvp == "no") {
                $("#input-rsvp").val("no").change();
            } else {
                $("#input-rsvp").val("-").change();
            }

            $("#input-guest-name").val(data.guest_name);
            $("#input-max-attendance").val(data.max_attendance);
            $("#input-number-of-attendance")
                .attr({ max: data.max_attendance, min: 0 })
                .val(data.number_of_attendance);
            $("#input-invitation-code")
                .val($(this).data("code"))
                .prop("disabled", true);
            $("#btn-create").hide();
            $("#modal-create-edit").modal();
        });
    });

    $("#btn-update").click(function () {
        valid = document.getElementById('form-edit-create').reportValidity();
        if (valid) {
            axios
            .patch(`/guest/${$("#input-invitation-code").val()}`, {
                invitation_code: $("#input-invitation-code").val(),
                guest_name: $("#input-guest-name").val(),
                attendance_type: $("#input-attendance-type").val(),
                rsvp: $("#input-rsvp").val(),
                number_of_attendance: $("#input-number-of-attendance").val(),
                max_attendance: $("#input-max-attendance").val(),
                enable_edit_name: $("#input-enable-edit-name").val(),
            })
            .then(({ data }) => {
                if (data.hasOwnProperty('errors')){
                    alert(data.errors);
                }else{
                    window.location.reload();
                }
            });
        }
        
    });
});
