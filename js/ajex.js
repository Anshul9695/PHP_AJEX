$(document).ready(function () {
    $("#save").on("click", function (e) {
        e.preventDefault();
        var first_name = $('#first_name').val();
        var last_name = $("#last_name").val();

        var email = $("#email").val();
        var gender = $('#optradio').val();
        var age = $("#age").val();
        var address = $('#address').val();
        $.ajax({
            url: "register.php",
            type: "POST",
            data: { first_name: first_name, last_name: last_name, email: email, gender: gender, age: age, address: address },
            success: function (data) {
            }
        });
    });
    function loadData() {
        $("#LoadData").on("click", function (e) {
            // alert("hello");

            $.ajax({
                url: "load_data.php",
                type: "POST",
                success: function (data) {
                    //alert(data);
                    $("#display").html(data);
                }
            });
        });
    }
    loadData();

    $(document).on("click", ".delete-btn", function () {
        if (confirm("Do You Really Want to Delete this recored from database")) {
            var recordId = $(this).data("id");
            var elements = this;
            $.ajax({
                url: "ajax-delete.php",
                type: "POST",
                data: { id: recordId },
                success: function (data) {
                    if (data == 1) {
                        $(elements).closest("tr").fadeOut();
                    } else {
                        alert("record not Deleted..");
                    }
                }
            });
        }
    });
    //show model popup with fill the value 
    $(document).on("click", ".edit-btn", function () {
        var studentId = $(this).data("eid");
        // alert(studentId);
        $("#model").show();
        $.ajax({
            url: "update-form.php",
            type: "POST",
            data: { id: studentId },
            success: function (data) {
                $("#model-form table").html(data);
            }
        });

    });
    //hide model popup
    $("#close-btn").on("click", function () {
        $("#model").hide();
    });

    //update the form value in database 
    $(document).on("click", "#edit_submit", function () {
        var edit_id = $("#edit_id").val();
        var edit_fname = $("#edit_fname").val();
        var edit_lname = $("#edit_lname").val();
        var edit_email = $("#edit_email").val();
        var edit_gender = $("#edit_gender").val();
        var edit_age = $("#edit_age").val();
        var edit_address = $("#edit_address").val();
        $.ajax({
            url: "ajax_update_form.php",
            type: "POST",
            data: { edit_id: edit_id, edit_fname:edit_fname, edit_lname: edit_lname, edit_email: edit_email, edit_gender: edit_gender, edit_age: edit_age, edit_address: edit_address },
            success: function (data) {
                if(data==1){
                    $("#model").hide();
                    loadData();
                }
               
            }
        });


    });


});