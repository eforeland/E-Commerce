$('.menu').click(function(){
    $('#Guitar-Content').show();
})
$('#viewcart').click(function(){
    location.href = "cart.html";
})

$(document).mouseup(function(e) 
{
    var container = $("#Guitar-Content");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.hide();
    }
});

