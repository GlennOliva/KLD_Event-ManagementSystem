$(document).ready(function(){
    $('.delete_userbtn').click(function (e) {
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
                        'user_id': id,
                        'delete_userbtn': true
                    },
                    success: function(response) {
                        response = response.trim(); // Trim whitespace from the response
                        console.log('Response:', response); // Debug output to the console
                        if(response === "2") {
                            swal("Success!", "User Successfully Deleted", "success");
                            $("#admin_table").load(location.href + " #admin_table");
                        } else if (response === "4") {
                            swal("Error!", "Failed to Delete", "error");
                        }
                    }
                });
            }
        });
    });
});
