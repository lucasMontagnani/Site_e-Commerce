    $(document).ready(function () {
      /*$(window).scroll(function () {
        var top =  $(".goto-top");
            if ( $('body').height() <= (    $(window).height() + $(window).scrollTop() + 200 )) {
                    top.animate({"margin-left": "0px"},1500);
            } //else {
                //top.animate({"margin-left": "-100%"},1500);
           // }
        });*/
        $(".goto-top").on('click', function () {
            $("html, body").animate({scrollTop: 0}, 1000);
        });
    });