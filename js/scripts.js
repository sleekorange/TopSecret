
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


    //Get ID
$(document).on("click", "button[type='submit']", function(){
    var formId =  $(this).attr("data-id");
    
    sendForm(formId);
});


function sendForm(formId) {
    console.log(formId);
    // Get the form.
    var form = "#"+formId;
    console.log(form);

    // // Get the messages div.
    // var formMessages = $('#form-messages');

    /// Set up an event listener for the contact form.
    $(form).submit(function(event) {
        // Stop the browser from submitting the form.
        event.preventDefault();

            // Serialize the form data.
        var formData = $(form).serialize();

        $.ajax({
            url: $(form).attr('action'),
            data: formData,
            method: "POST"
        }).done(function (data) {
            console.log(data);
            if(data == "success") {
               location.reload(); 
           } else {
               location.reload(); 
           }
            
        })
        .fail(function (data) {
            console.log("Error " + data);
        });
    });
}

$('.changeInfoCheck').on('change', function() {
                    $('.changeInfoCheck').not(this).prop('checked', false); 
                    var selected =  $(this).val();
                    console.log(selected);
                    switch(selected)
                    {
                        case 'passwordCheck':
                                $('.changeInfoForm').fadeOut();
                                $('#passwordForm').fadeIn();
                        break;
                        case 'firstNameCheck':
                                $('.changeInfoForm').fadeOut();
                                $('#firstNameForm').fadeIn();
                        break;
                        case 'lastNameCheck':
                                $('.changeInfoForm').fadeOut();
                                $('#lastNameForm').fadeIn();
                        break;
                        case 'phoneCheck':
                                $('.changeInfoForm').fadeOut();
                                $('#phoneForm').fadeIn();
                        break;
                    }
               
                })



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