require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$('.close-list-script').on("click", function () {
    $(".action-btn").toggleClass('hidden');
});

$(".setup_id").on("click", function () {
    if ($(".action-btn").hasClass('hidden')) {
        let id_user = $(this).attr('id_user'),
            device_name = $(this).attr('name');
        $(".action-btn").toggleClass('hidden');
        $('.script').each(function () {
            let url = '/exec_command/' + $(this).attr('script-id') + "/" + id_user;
            $(this).attr('href', url);
        });
        $(".device_name").html(device_name);
    }
});
