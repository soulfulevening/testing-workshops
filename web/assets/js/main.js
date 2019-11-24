(function ($) {

    function updateSubscriptionCounter() {
        $.getJSON('/ajax/subscription/counter', function (json, textStatus, jqXHR) {

            if (jqXHR.status !== 200) {
                return;
            }

            let $counter = $('#subscription-counter');
            let currentCount = parseInt($counter.text());

            if (!json.count || json.count === 'undefined' || json.count === currentCount) {
                return;
            }

            $counter.fadeOut(function () {
                $(this).text(json.count).fadeIn();
            });

        });

    }

    setInterval(updateSubscriptionCounter, 5000);


})(jQuery);