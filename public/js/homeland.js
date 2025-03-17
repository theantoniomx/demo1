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

    let table = new DataTable('#tblProperties1');

    new DataTable('#tblProperties2', {
        ajax: '/api/properties/datatables',
        columns: [
            { data: 'address' },
            { data: 'price' },
            { data: 'list_type.name' },
            { data: 'offer_type' },
            { data: 'city.name' }
        ]
    });

    $("#btnGetEmployeesUsingFetch").click((event) => {
        /* fetch("http://localhost:3000/api/v1/employees")
        .then(response => response.json())
        .then(results => {
            console.table(results)
        }).catch(error => console.error(error)); */
        new DataTable('#tblEmployees1', {
            ajax: 'http://localhost:3000/api/v1/employees',
            columns: [
                { data: 'emp_number' },
                { data: 'first_name' },
                { data: 'last_name' },
                { data: 'email' },
                { data: 'gender' },
                { data: 'salary' },
                { data: 'department' }
            ]
        });
    });
});
