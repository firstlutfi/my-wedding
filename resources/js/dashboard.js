require("./required");

$(document).ready(function () {
    $("#guest-table").DataTable({
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 5] }],
        order: [],
        dom: '<"row"<"col-md-4"l><"col-md-4"f><"col-md-4"B>>rtip',
        buttons: [
            {
                text: 'Add New Guest',
                className: 'btn btn-primary',
                attr:  {
                    title: 'Add New Guest',
                    id: 'trigger-modal-create'
                }
            },
            {
                text: 'Import From CSV',
                className: 'btn btn-primary',
                attr:  {
                    title: 'Import From CSV',
                    id: 'trigger-modal-import'
                }
            }
        ],
        language: {
            lengthMenu: "Show maximum _MENU_ rows",
        },
        initComplete: function(settings, json) {
            const enabled = process.env.MIX_ENABLE_IMPORT === 'true' ? true : false;
            if (enabled){
                $('#trigger-modal-import').removeClass('dt-button');    
            }else{
                $('#trigger-modal-import').remove();    
            }
            
            $('#trigger-modal-create').removeClass('dt-button');
            $('.dt-buttons').addClass('float-right');
          }
    });

    $("#guest-table tbody").on('click', 'tr .trigger-modal-view', function () {
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
            $("#static-qr-code").attr('src', `data:image/png;base64,${data.qr_code}`);
            $("#modal-view").modal();
        });
    });

    $("#guest-table tbody").on('click', 'tr .trigger-modal-edit', function () {
        axios.get(`/guest/${$(this).data("code")}`).then(({ data }) => {
            if (data.attendance_type == "offline") {
                $("#input-attendance-type").val("offline").change();
                $('#max-attendance-row').show();
            } else {
                $("#input-attendance-type").val("online").change();
                $('#max-attendance-row').hide();
                $('#input-max-attendance').val(0);
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

    $("#btn-create").click(function () {
        valid = document.getElementById('form-edit-create').reportValidity();
        if (valid) {
            axios
            .post('/guest', {
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

    $("#btn-import").click(function () {
        valid = document.getElementById('form-import').reportValidity();
        if (valid) {
            $("#modal-import").modal('toggle');
            $("#modal-import-progress").modal();
            var formData = new FormData();
            var imagefile = $('#input-file').prop('files')[0];
            formData.append("image", imagefile);
            formData.append("clear_data", $("#input-clear-data").is(':checked'));
            axios
            .post('/import', formData, {
                headers: {
                  'Content-Type': 'multipart/form-data'
                }
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

    $("#trigger-modal-create").click(function () {
        $("#invitation-code-row").hide();
        $("#rsvp-row").hide();
        $("#max-attendance-row").hide();
        $("#number-of-attendance-row").hide();
        $("#btn-update").hide();
        $("#modal-create-edit").modal();
    });

    $("#trigger-modal-import").click(function () {
        $("#modal-import").modal();
    });

    $('#input-attendance-type').change(function (){
        if ($(this).val() == 'offline') {
            $('#rsvp-row').show();
            $("#input-rsvp").val("-").change();
            $('#number-of-attendance-row').show();
            $('#input-number-of-attendance').val(0).change();
            $('#max-attendance-row').show();
            $('#input-max-attendance').attr({ min: 1 }).val(1);
        } else {
            $('#rsvp-row').hide();
            $("#input-rsvp").val("-").change();
            $('#number-of-attendance-row').hide();
            $('#input-number-of-attendance').val(0).change();
            $('#max-attendance-row').hide();
            $('#input-max-attendance').attr({ min: 0 }).val(0).change();
        }
    });

    $('#input-max-attendance').change(function (){
        $('#input-number-of-attendance').attr({ max: $(this).val(), min: 0 })
    });

    $('#input-rsvp').change(function (){
        if ($(this).val() != 'yes') {
            $('#input-number-of-attendance').val(0);
        }
    });

    $('#input-number-of-attendance').keyup(function (){
        if ($('#input-rsvp').val() == 'yes') {
            if (parseInt($(this).val()) > parseInt($('#input-max-attendance').val())) {
                $(this).val($('#input-max-attendance').val());
            }else if (parseInt($(this).val()) < 0) {
                $(this).val(0);
            }
        }else{
            $(this).val(0);
        }
        
    });

    $('#input-max-attendance').keyup(function (){
        if (parseInt($(this).val()) < 1) {
            $(this).val(1);
        }
    });

    $("#guest-table tbody").on('click', 'tr .trigger-delete', function () {
        let choice = confirm(`Are you sure want to delete guest with code ${$(this).data("code")}?`);
        if (choice) {
            axios.delete(`/guest/${$(this).data("code")}`).then(({ data }) => {
                if (data.hasOwnProperty('errors')){
                    alert(data.errors);
                }else{
                    window.location.reload();
                }
            }).catch(function (error) {
                alert(error.message);
            });
        }
        
    });
});
