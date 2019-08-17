$(document).ready(function(){
    var template = $('#template2').html()

    Mustache.parse(template);

    var rendered = Mustache.render(template, {

        list: [
            {
                listinfo: "Home"
            },
            {
                listinfo: "Gameplay"
            },
            {
                listinfo: "Units"
            },
            {
                listinfo: "Artifacts"
            },
            {
                listinfo: "Tier"
            },
            {
                listinfo: "Other"
            }
        ]
    });

    $("#navbar").html(rendered);
})