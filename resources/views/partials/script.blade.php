<script>
    $(document).on("click", ".item-delete", function () {
        var $button = $(this), $row = $(this).closest("tr");
        console.log($button);
        $.ajax({
            "type": "POST",
            "url": $button.data("url"),
            "data": {_method: "DELETE"},
            "success": function () {
                $row.addClass("danger").fadeOut();
            },
            "error": function () {
                bootbox.alert("Delete failed!");
            }
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
