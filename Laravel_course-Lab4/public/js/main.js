$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});

(function () {

    $(".deletePost").click( function (e) {
        e.preventDefault();

        let btn = $(this);
        let url = $(this).parents("form").attr("action");

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "delete",
                        url: url,
                        success: function (data) {
                            btn.parents("tr").remove();
                        },
                        error: function (data) {
                            swal({
                                title: "Error",
                                text: "Error deleting!",
                                icon: "error",
                                buttons: true,
                                dangerMode: true,
                            })
                        }
                    });
                }
            });


    })
})();
