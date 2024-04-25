$(document).ready(function(){
    $('.delete_organizerbtn').click(function (e) {
        e.preventDefault();
        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this venue.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'organizer_id': id,
                        'delete_organizerbtn': true
                    },
                    success: function(response) {
                        response = response.trim(); // Trim whitespace from the response
                        console.log('Response:', response); // Debug output to the console
                        if(response === "4") {
                            swal("Success!", "Organizer Successfully Deleted", "success");
                            $("#admin_table").load(location.href + " #admin_table");
                        } else if (response === "8") {
                            swal("Error!", "Failed to Delete", "error");
                        }
                    }
                });
            }
        });
    });
});
