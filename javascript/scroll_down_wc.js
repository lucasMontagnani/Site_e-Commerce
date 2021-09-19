    $(document).ready(function () {
      $(window).scroll(function () {
        var top =  $(".goto-down");
            if ( $('body').height() <= (    $(window).height() + $(window).scrollTop() + 200 )) {
                    top.animate({"margin-left": "0px"},1500);
            } //else {
                //top.animate({"margin-left": "-100%"},1500);
           // }
        });
        $(".goto-down").on('click', function () {
            $("html, body").animate({scrollTop: 700}, 1000);
        });
    });