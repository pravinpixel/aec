    $(document).on('click', '.delete-modal', function (event) {
        $("#delete-confirmation-modal").modal('show');
        var action = $(this).attr('data-action');
        $("#modal-title").html($(this).attr('data-header-title'));
        $("#message").html($(this).attr('data-title'));
        $("#method").val($(this).attr('data-method'))
        var csrfToken = $('meta[name=csrf-token]').attr("content");
        var modal = $("#delete-confirmation-modal");
        modal.find('.modal-footer form').prop("action", action);
        modal.find('input[name="_token"]').prop("value", csrfToken);
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;
        return true;
    }
