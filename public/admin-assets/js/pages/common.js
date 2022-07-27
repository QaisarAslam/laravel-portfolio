// User defined functions
$(document.body).on('click', ".visibility-checkbox", function() {
	if ($(this).is(":checked")) {
		$(this).prop('checked', true);
		$(this).prev('input').val('public');
		$(this).next().find('span').addClass('bg-success').text('Public').removeClass('bg-danger');
	} else if ($(this).is(":not(:checked)")) {
		$(this).prop('checked', false);
		$(this).prev('input').val('private');
		$(this).next().find('span').removeClass('bg-success').text('Private').addClass('bg-danger');
	}
});

$('small').addClass('d-none');
$(".modal").on("hidden.bs.modal", function() {
    $("button#btn-reset").click();
});

$(".modal").on("click", "button#btn-reset", function() {
	refreshErrors();
	refreshVisibility($(this));
	$(".modal").find('.preview-box').addClass('d-none');
});

function successSwalAlert(data) {
    Swal.fire({
        title: data.type,
        text: data.msg,
        icon: "success",
        confirmButtonText: "OK"
    });
}

function notFoundSwalAlert(data) {
    Swal.fire({
        title: data.type,
        text: data.msg,
        icon: "error",
        confirmButtonText: "OK"
    });
}

function errorSwalAlert() {
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Something went wrong!",
    });
}

function refreshErrors() {
    $("input").removeClass("is-invalid");
    $("small").text("").addClass("d-none");
}

function refreshVisibility(resetBtn) {
	let form = resetBtn.parent('div').parent('form');
	let defaultValue = form.find('#visibility-container').attr('data-default');
	let visibilityCheckbox = form.find('input.visibility-checkbox');
	let visibilityInput = form.find("input#visibility");
	let visibilityLabel = form.find("label > span");
	if (defaultValue == 'private') {
		visibilityInput.val("private");
		visibilityLabel.removeClass("bg-success").addClass("bg-danger").text("Private");
	} else {
		visibilityInput.val("public");
		visibilityLabel.removeClass("bg-danger").addClass("bg-success").text("Public");
	}
}

function showValidationErrors(reject, form) {
	if(reject.status == 405)
	{
		alert(reject.responseJSON.message);
		return;
	}
    refreshErrors();
    if (reject.status == 422)
    {
        let errors = $.parseJSON(reject.responseText);
        $.each(errors.errors, function (key, value)
        {
            form.find("#" + key).addClass("is-invalid");
            form.find("#" + key + "Help").removeClass("d-none").text(value[0]);

            if(key === 'tags')
            {
                $('div.form-group select#tags ~ span').find('span[role="combobox"]').css({"border-color": "#e74a3b", "padding-right": "calc(1.5em + .75rem)", "background-image": "url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23e74a3b' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23e74a3b' stroke='none'/%3e%3c/svg%3e\")", "background-repeat": "no-repeat", "background-position": "right calc(.375em + .1875rem) center", "background-size": "calc(.75em + .375rem) calc(.75em + .375rem)"});
            }

        });
    }
}

function table(tableURL) {
    $.ajax({
        type: "GET",
        url: tableURL,
        success: function (data) {
            $("#record-table").html("");
            $("#record-table").html(data);
            $("#dataTable").DataTable();
        },
        error: function () {
            errorSwalAlert();
        }
    });
}
