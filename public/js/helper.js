function resetForm() {
    $(".reset").val("");
}

function submitForm(id, btn, url, reload) {
    var form = $("#" + id);
    var submit = $("#" + btn + " span");

    form.on("submit", function (e) {
        e.preventDefault();
        submit.attr("disabled", "disabled");
        submit.html("Saving..");

        $.ajax({
            data: form.serialize(),
            url: url,
            type: "POST",
            dataType: "json",
            success: function (data) {
                submit.removeAttr("disabled");
                submit.html("Save");
                swal.fire({
                    title: "Saved!",
                    text: "Your data has been saved.",
                    type: "success",
                    timer: 1500,
                });
                reload.ajax.reload(null, false);
            },
            error: function (data) {
                submit.removeAttr("disabled");
                console.log("Error:", data);
                swal.fire({
                    title: "Error!",
                    text: data.responseJSON.message,
                    type: "error",
                    timer: 1500,
                });
            },
        });
    });
}

function deleteData(url, id, token, callback) {
    Swal.fire({
        title: "Confirm Delete?",
        text: "You weren't able to recover this record!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, delete data!",
        confirmButtonColor: "#f46a6a",
        cancelButtonText: "No, cancel!",
        reverseButtons: !0,
    }).then((confirm) => {
        if (confirm.value) {
            $.ajax({
                url: url,
                type: "DELETE",
                data: {
                    id: id,
                    _method: "delete",
                    _token: token,
                },
                success: function (results) {
                    swal.fire({
                        title: "Deleted!",
                        text: "Your data has been deleted.",
                        type: "success",
                        timer: 2500,
                    });
                    callback();
                },
                error: function (data) {
                    console.log("Error:", data);
                    swal.fire({
                        title: "Error!",
                        text: data.responseJSON.message,
                        type: "error",
                        timer: 2500,
                    });
                },
            });
        }
    });
}
