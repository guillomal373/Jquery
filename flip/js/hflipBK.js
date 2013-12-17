$(document).ready(function () {
	var actual = "1";
    var margin = $("#frente"+actual).width() / 2;
    var width = $("#frente"+actual).width();
    var height = $("#frente"+actual).height();

    $("#siguiente").click(function () {
    	actual++;
    	alert(actual);
    });

    $("#anterior").click(function () {
    	actual--;
    	alert(actual);
    });

    $("#reverso"+actual).stop().css({
        width: '0px',
        height: '' + height + 'px',
        marginLeft: '' + margin + 'px',
        opacity: '0.5'
    });
    $("#frente"+actual).click(function () {
        $(this).stop().animate({
            width: '0px',
            height: '' + height + 'px',
            marginLeft: '' + margin + 'px',
            opacity: '0.5'
        }, {
            duration: 500
        });
        window.setTimeout(function () {
            $("#reverso"+actual).stop().animate({
                width: '' + width + 'px',
                height: '' + height + 'px',
                marginLeft: '0px',
                opacity: '1'
            }, {
                duration: 500
            });
        }, 500);
    });
    
    $("#reverso"+actual).click(function () {
        $(this).stop().animate({
            width: '0px',
            height: '' + height + 'px',
            marginLeft: '' + margin + 'px',
            opacity: '0.5'
        }, {
            duration: 500
        });
        window.setTimeout(function () {
            $("#frente"+actual).stop().animate({
                width: '' + width + 'px',
                height: '' + height + 'px',
                marginLeft: '0px',
                opacity: '1'
            }, {
                duration: 500
            });
        }, 500);
    });

});