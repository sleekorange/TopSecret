
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
    console.log("Click!");
    sendForm(formId);
    
});


function sendForm(formId) {
    console.log("Send form is running..");
    // Get the form.
    var form = "#"+formId;
    console.log(form);

    // // Get the messages div.
    // var formMessages = $('#form-messages');

    var count = 1;
    console.log(count);
    /// Set up an event listener for the contact form.
    $(form).submit(function(event) {
        var form = this;
        
        // Stop the browser from submitting the form.
        event.preventDefault();

            // Serialize the form data.
        var formData = $(form).serialize();
        
        if(count == 1){
            $.ajax({
                url: $(form).attr('action'),
                data: formData,
                method: "POST"
            }).done(function (data) {
                if(data == "success") {
                    count++;
                   console.log(data); 

                   //location.reload(); 
               } else {
                    count++;
                   console.log(data); 
               }
            })
            .fail(function (data) {
                console.log("Error " + data);
            });
        }

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