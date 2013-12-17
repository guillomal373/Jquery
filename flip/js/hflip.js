$(document).ready(function () {

    var frente = new Array("frente1","frente2", "frente3", "frente4");
    var reverso = new Array("reverso1","reverso2", "reverso3", "reverso4");

    var actual = 0;

    $("#siguiente").click(function () {
        actual++;
        FFlip(actual);
    });

    $("#anterior").click(function () {
        actual--;
        FFlip(actual);
    });

    FFlip(actual);

});

function FFlip(actual){

        var frente = new Array("frente1","frente2", "frente3", "frente4");
        var reverso = new Array("reverso1","reverso2", "reverso3", "reverso4");

        var margin = $("#"+frente[actual]).width() / 2;
        var width = $("#"+frente[actual]).width();
        var height = $("#"+frente[actual]).height();

        $("#"+reverso[actual]).stop().css({
            width: '0px',
            height: '' + height + 'px',
            marginLeft: '' + margin + 'px',
            opacity: '0.5'
        });

        $("#"+frente[actual]).click(function () {
            $("#siguiente, #anterior").css("display","none");
            $(this).stop().animate({
                width: '0px',
                height: '' + height + 'px',
                marginLeft: '' + margin + 'px',
                opacity: '0.5'
            }, {
                duration: 500
            });
            window.setTimeout(function () {
                $("#"+reverso[actual]).stop().animate({
                    width: '' + width + 'px',
                    height: '' + height + 'px',
                    marginLeft: '0px',
                    opacity: '1'
                }, {
                    duration: 500
                });
            }, 500);
        });

        $("#"+reverso[actual]).click(function () {
            $("#siguiente, #anterior").css("display","inline");
            $(this).stop().animate({
                width: '0px',
                height: '' + height + 'px',
                marginLeft: '' + margin + 'px',
                opacity: '0.5'
            }, {
                duration: 500
            });
            window.setTimeout(function () {
                $("#"+frente[actual]).stop().animate({
                    width: '' + width + 'px',
                    height: '' + height + 'px',
                    marginLeft: '0px',
                    opacity: '1'
                }, {
                    duration: 500
                });
            }, 500);
        });
    };