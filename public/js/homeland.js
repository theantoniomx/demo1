$(document).ready(function() {
    $("#btnSendContactAgentMessage").click((event) => {
        event.preventDefault();
        //alert("Message sent successfully!");

        const propertyId = $("#property_id").val();
        if (!propertyId) {
            alert("Property ID is missing!");
            return;
        }

        const formData = {
            "name": $("#nameContact").val(),
            "email": $("#emailContact").val(),
            "phone": $("#phoneContact").val(),
            "message": $("#messageContact").val(),
            "property_id": $("#property_id").val()
        };

        $.ajax({
            url: "/api/contact_agent",
            type: "post",
            data: formData,
            success: (response) => {
                $("#formContactAgent").trigger("reset");
                $("#successAlert").removeClass("d-none");
                setTimeout(() => {
                    $("#successAlert").addClass("d-none");
                }, 5000);
                //alert("Contact Agent Message has been sent successfully!");
            },
            error: (errors) => {
                console.error(errors);
            }
        });
    });
});
