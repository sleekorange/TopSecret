
// $(document).on('click', '#submit', function () {

// 	var content = tinyMCE.get('content').getContent();

// 	$.ajax({
//         "url": "johan/post.php",
//         "data": {
//             "content": content
//         },
//         method: "POST",
//         dataType: "html"
//     }).done(function (data) {
//     	$("#comments").append(data);
//     })
// 	.fail(function (data) {
// 	    console.log("Error");
// 	});

// });


$(document).ready(function() {
    // Get the form.
    var form = $('#ajaxLoginForm');

    // // Get the messages div.
    // var formMessages = $('#form-messages');

    /// Set up an event listener for the contact form.
    $(form).submit(function(event) {
        // Stop the browser from submitting the form.
        event.preventDefault();

            // Serialize the form data.
        var formData = $(form).serialize();
        console.log(formData);

        $.ajax({
            url: $(form).attr('action'),
            data: formData,
            method: "POST"
        }).done(function (data) {
            console.log(data);
            if(data == "success") {
               location.reload(); 
           } else {
               console.log(data); 
           }
            
        })
        .fail(function (data) {
            console.log("Error " + data);
        });
    });


});

$(document).on("click", "#logOutBtn", function(){
    
    $.ajax({
            url: "functions/functions.php",
            data: {"function": "logOut"},
            method: "POST"
        }).done(function (data) {
            console.log(data);
            location.reload();
            
        })
        .fail(function (data) {
            console.log("Error " + data);
        });
});