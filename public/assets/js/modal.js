// Common Modal
$(document).on('click', 'a[data-ajax-popup="true"], button[data-ajax-popup="true"]', function (e) {
    var title = $(this).data('title');
    var size = ($(this).data('size') == '') ? 'md' : $(this).data('size');
    var url = $(this).data('url');

    $("#commonModal .modal-title").html(title);
    $("#commonModal .modal-dialog").addClass('modal-' + size);

    $.ajax({
        url: url,
        cache: false,
        success: function (data) {
            $('#commonModal .modal-body ').html(data);
            $("#commonModal").modal('show');
            commonLoader();
            validation();
            summernote();
        },
        error: function (data) {
            data = data.responseJSON;
            show_toastr('Error', data.error, 'error')
        }
    });
    e.stopImmediatePropagation();
    return false;
});