let table = new DataTable('#myTable');

$('document').ready(() => {
    $('#create-form').hide();

    $('#create-new').click(() => {
        $('#create-form').fadeToggle();
    })

    $('#create-close-btn').click(() => {
        $("#create-form").fadeOut();
    })

    $('#add-new').submit((e) => {
        e.preventDefault();

        insertRole();

        $("#name").val("");
        $("#display_name").val("");
        $("#description").val("");
    })

    $("#myTable").on("click", ".delete-btn", function () {
        // Find the parent row of the clicked button
        let row = $(this).closest("tr");

        // Find the id from the closest action column
        let roleId = row.find(".action-col").attr("id");

        console.log("Role ID:", roleId);

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "The role has been deleted.",
                    icon: "success"
                });

                $.ajax({
                    type: "DELETE",
                    url: `/home/${roleId}`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: roleId },
                    success: (response) => {
                        console.log("response:", response);
                        reRender(response);
                    },
                    error: (e) => {
                        console.error("Error Delete:", e);
                    }
                });
            }
        });
    });

})



function insertRole() {
    $.ajax({
        type: "POST",
        url: "/home/store",
        data: $('#add-new').serialize(),
        success: (response) => {
            console.log("Response:", response);

            reRender(response);

            $('#create-form').fadeOut();
            showToast("Successfully Inserted");

            $("#error-name").text("");
            $("#error-display_name").text("");
            $("#error-description").text("");

        },
        error: (e) => {
            const errors = e.responseJSON.errors;
            console.log("ERROR:", errors);
            console.log(errors.display_name);

            !errors.hasOwnProperty('name') ? $("#error-name").text("") : $("#error-name").text(errors.name)

            !errors.hasOwnProperty('display_name') ? $("#error-display_name").text("") : $("#error-display_name").text(errors.display_name)

            !errors.hasOwnProperty('description') ? $("#error-description").text("") : $("#error-description").text(errors.description)
        }
    });
}

function reRender(responseData) {
    if ($.fn.DataTable.isDataTable('#myTable')) {
        $('#myTable').DataTable().destroy();
    }

    $('#myTable').DataTable({
        data: responseData,
        columns: [{
            data: 'name'
        },
        {
            data: 'display_name'
        },
        {
            data: 'description'
        },
        {
            "data": null, // Use "null" when you don't have a data source for this column
            "className": "action-col", // Center-align the buttons
            "defaultContent": ` 
                    <button  class="btn-edit text-white bg-blue-500 hover:bg-blue-300 p-2 rounded-md transition duration-300">Edit</button>
                    <button class="delete-btn text-white bg-red-500 hover:bg-red-300 p-2 rounded-md transition duration-300">Delete</button>`,
            "orderable": false, // Disable ordering on this column
        },
        ],
        rowCallback: function (row, data, index) {
            $(row).find(".action-col").attr("id", data.id);
        }
    });
}

function showToast(title, icon = "success", timer = 1000) {
    Swal.fire({
        position: "center",
        icon: icon,
        title: title,
        showConfirmButton: false,
        timer: timer
    });
}
