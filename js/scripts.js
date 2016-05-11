
$(document).on('click', '#submit', function () {

	var content = tinyMCE.get('content').getContent();

	$.ajax({
        "url": "johan/post.php",
        "data": {
            "content": content
        },
        method: "POST",
        dataType: "html"
    }).done(function (data) {
    	$("#comments").append(data);
    })
	.fail(function (data) {
	    console.log("Error");
	});

});