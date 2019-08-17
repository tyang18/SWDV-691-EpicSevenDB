$(document).ready(function(){
    var template = $('#template').html()

    Mustache.parse(template);

    var rendered = Mustache.render(template, {
        header: "About Epic Seven",
        
        info: "With Epic Seven's outstanding illustrations, it's the first domestic RPG to feature full frame animation for all of its characters and cutscenes. It's a turn-based RPG that has good pace, visuals that rival an action game, and unique strategies to challenge players during battles.",

        info2: "Play alongside 3 million Heirs! An animated RPG world in the palm of your hand",

        list: [
            {
                listinfo: "Over 1,000 Stories; An epic for the modern age. We invite you into the 7th World."
            },
            {
                listinfo: "Fully Playable 2D Animation; Dazzling skill animations in battle! Cutscene-quality 2D animated graphics!"
            },
            {
                listinfo: "Strategy Shaped by Story; Dual Attack system affected by relationships between characters. Immerse yourself in all the stories and perfect your own strategy!"
            },
            {
                listinfo: "Raid Labyrinth; In the depths of the Labyrinth, an ancient queen awakens from her slumber. Embark on a monster hunt with incredible rewards."
            },
            {
                listinfo: "PvP Arena; Who will achieve fame and victory in the Arena? Showcase your unique strategy to the world every season!"
            }
        ]
    });

    $("#maindiv").html(rendered);
})
