$(document).ready(function(){
    var template = $('#template').html()

    Mustache.parse(template);

    var rendered = Mustache.render(template, {
        header: "Gameplay and Info",
        
        info: "The many great wars with the Archdemons have caused an endless cycle of creation and destruction. This is the story of Ras, the Heir of the Covenant, who awoke many years after the destruction of the Sixth World, and is trying to prevent the Seventh World from meeting the same fate."

    });

    $("#maindiv").html(rendered);
})

