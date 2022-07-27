$(function () {
    $('#dataTable').DataTable();

    $('[data-toggle="tooltip"]').tooltip();

    setTimeout(function(){
       $("div.alert.alert-success").remove();
    }, 10000 ); // 10 secs
    $("select.tags").select2({
    	placeholder: "Select Tag(s)"
    });
});
