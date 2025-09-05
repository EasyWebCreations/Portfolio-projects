var tbody = document.getElementById("tbody_monthly");
tbody.addEventListener("click", () => {
    $(".edit").click(function() {
        $(this).addClass("editMode");
    });

    // Save data
    $(".edit").focusout(function() {
        $(this).removeClass("editMode");

        var id = this.id; //PAN_1241
        var split_id = id.split("__");
        var field_name = split_id[0]; //PAN
        var edit_id = split_id[1]; //1241  (AADHAR number)
        var month = split_id[2];
        // var trash = split_id[2]
        console.log(field_name, edit_id, month);
        var value = $(this).text(); //PAN number

        // console.log(split_id);
        // console.log(field_name);
        // console.log(edit_id);
        $.ajax({
            url: "update.php",
            type: "post",
            data: { month: month, field: field_name, value: value, id: edit_id },
            success: function(response) {
                if (response == 1) {
                    console.log("Save successfully");
                    console.log(2);
                } else {
                    console.log("Not saved.");
                }
            },
        });
    });
});
$(document).ready(function() {
    // Add Class
});

document.getElementById("butsave").addEventListener("click", () => {
    var Site = document.getElementById("Site_ID").value;
    var rm_month = document.getElementById("rm_month").value;

    var file = document.getElementById("file").value;
    // console.log("Jay shri ram!", Site, month, file);
    document.getElementById("upload_month").value = rm_month;
    document.getElementById("upload_site").value = Site;
    document.getElementById("import_form").submit();
    // $.ajax({
    //     url: "rm_import.php",
    //     type: "post",
    //     data: { Site: Site, month: month, file: file },
    //     success: function(response) {
    //         console.log("Nah mag!!", response);
    //     },
    // });
});