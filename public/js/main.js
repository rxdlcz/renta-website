function homepage() {

    /* ==============[Scroll to location cluster]================ */

    $('.unit-card').on('click', function(){
        var unitName = $(' .card .card-body .card-title', this).text().toLowerCase();
        $('#unit-input').val(unitName);
    });

    $('.scroll-link').on('click', function (event) {

        if (this.hash !== "") {
            event.preventDefault();

            var hash = this.hash;

            var locationName = $(hash + ' .content-header .text-center .location-name').text();
            $('#location-input').val(locationName);

            //Check If Cluster has Card
            var cardNum = $(hash + ' .cluster .row .unit-card').length;
            var noUnit = $(hash + ' .cluster .row .no-unit');
            if (cardNum > 0) {
                noUnit.addClass('d-none');
                noUnit.removeClass('d-block');
            } else {
                noUnit.removeClass('d-none');
                noUnit.addClass('d-block');
            }

            //Show Card with Animation
            $('.cluster-section').each(function () {
                $('.cluster-section').removeAttr('style');
                $('.cluster-section .cluster').removeAttr('style');
            });
            $(hash).show();
            $(hash + ' .cluster').fadeIn();


            //Scroll to Unit cluster
            if ($('.fixed-top').height() > 150) {
                $('html, body').animate({
                    scrollTop: $(hash).offset().top - 100
                }, 1000, function () {});
            } else {
                $('html, body').animate({
                    scrollTop: $(hash).offset().top - $('.fixed-top').height()
                }, 1000, function () {});
            }
        }
    });
    /* [END]============[Scroll to location cluster]================ */


    /* ==============[View More Button]================ */
    $('.viewAll-link').click('click', function (e) {
        e.preventDefault();
        var hash = this.hash;
        var cardLength = $(hash + ' .cluster .row .more-card').length;

        $(hash + ' .cluster .row .more-card').slideToggle(function () {
            if ($(this).is(':visible')) {
                $(hash + '-btn').text('view less')
            } else {
                $(hash + '-btn').text('view all')
            }
        });
    });
    /* [END]============[View More Button]================ */


    /* ==============[Scroll To Top Function]================ */
    $(window).scroll(function () {

        if ($(this).scrollTop() > 600) {
            $("#btn-back-to-top").fadeIn();
        } else {
            $("#btn-back-to-top").fadeOut();
        }
    });
    $("#btn-back-to-top").click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    /* [END]============[Scroll To Top Function]================ */

}
