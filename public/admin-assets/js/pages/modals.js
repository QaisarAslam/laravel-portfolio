$(function () {
	$("#add-modal").on("submit", "#add-form", function(e) {
	    e.preventDefault();
	    let form = $(this);
	    // let formData = new FormData($(this)[0]);
	    let formData = new FormData(this)
	    let targetURL = form.attr("action");
	    // console.log(formData);
	    // console.log(targetURL);
	    $.ajax({
	        type: "POST",
			contentType: false,
			processData: false,
	        url: targetURL,
	        data: formData,
	        success: function(data) {
	            $("#add-modal").modal("hide");
	            $("button#btn-reset").click();
	            successSwalAlert(data);
	            table(pageTableURL);
	        },
	        error: function(reject) {
	        	showValidationErrors(reject, form);
	        }
	    });
	});

	$("#edit-modal").on("show.bs.modal", function(e) {
	    let button = $(e.relatedTarget);
	    let targetURL = button.attr("data-url");
	    let editRequestData = $(this).find("#edit-request-data");
	    editRequestData.empty();
	    $.ajax({
	        type: "GET",
	        url: targetURL,
	        success: function (data) {
	            editRequestData.html(data);
	            $("select.tags").select2({
	            	placeholder: "Select Tag(s)"
	            });
	        },
	        error: function () {
	            errorSwalAlert();
	        }
	    });
	});

	$("#edit-modal").on("submit", "#edit-form", function(e) {
	    e.preventDefault();
	    let form = $(this);
	    let formData = new FormData($(this)[0]);
	    let targetURL = form.attr("action");
	    console.log(formData);
	    console.log(targetURL);
	    $.ajax({
	        type: "POST",
			contentType: false,
			processData: false,
	        url: targetURL,
	        data: formData,
	        success: function(data) {
	            $("#edit-modal").modal("hide");
	            $("button#btn-reset").click();
	            successSwalAlert(data);
	            table(pageTableURL);
	        },
	        error: function(reject) {
	            showValidationErrors(reject, form);
	        }
	    });
	});

	$("#delete-modal").on("show.bs.modal", function (e) {
	    var button = $(e.relatedTarget);
	    var targetAction = button.attr("data-url");
	    var name = button.attr("data-name");
	    var modal = $(this);
	    modal.find(".modal-body .text-danger").text(name);
	    modal.find(".modal-dialog .delete-form").attr("action", targetAction);
	});

	$("#delete-form").on("submit", function (e) {
	    e.preventDefault();
	    let form = $(this);
	    let formData = form.serialize();
	    let formURL = form.attr("action");
	    $.ajax({
	        type: "POST",
	        url: formURL,
	        data: formData,
	        success: function (data) {
	            $("#delete-modal").modal("hide");
	            if (data.type == 'success') {
	                successSwalAlert(data);
	                table(pageTableURL);
	            } else {
	            	notFoundSwalAlert(data);
	            }
	        },
	        error: function () {
	            errorSwalAlert();
	        }
	    });
	});

	$("#restore-modal").on("show.bs.modal", function (e) {
	    var button = $(e.relatedTarget);
	    var targetAction = button.attr("data-url");
	    var name = button.attr("data-name");
	    var modal = $(this);
	    modal.find(".modal-body .text-danger").text(name);
	    modal.find(".modal-dialog .restore-form").attr("action", targetAction);
	});

	$("#restore-modal").on("submit", '#restore-form', function (e) {
	    e.preventDefault();
	    let form = $(this);
	    let formData = form.serialize();
	    let formURL = form.attr("action");
	    $.ajax({
	        type: "POST",
	        url: formURL,
	        data: formData,
	        success: function (data) {
	            $("#restore-modal").modal("hide");
	            $("button#btn-reset").click();
	            successSwalAlert(data);
	            table(pageTableURL);
	        },
	        error: function (reject) {
	        	console.log(reject);
	            errorSwalAlert();
	        }
	    });
	});

	$("#force-delete-modal").on("show.bs.modal", function (e) {
	    var button = $(e.relatedTarget);
	    var targetAction = button.attr("data-url");
	    var name = button.attr("data-name");
	    var modal = $(this);
	    modal.find(".modal-body .text-danger").text(name);
	    modal.find(".modal-dialog .force-delete-form").attr("action", targetAction);
	});

	$("#force-delete-form").on("submit", function (e) {
	    e.preventDefault();
	    let form = $(this);
	    let formData = form.serialize();
	    let formURL = form.attr("action");
	    $.ajax({
	        type: "POST",
	        url: formURL,
	        data: formData,
	        success: function (data) {
	            $("#force-delete-modal").modal("hide");
	            $("button#btn-reset").click();
	            successSwalAlert(data);
	            table(pageTableURL);
	        },
	        error: function () {
	            errorSwalAlert();
	        }
	    });
	});
});
