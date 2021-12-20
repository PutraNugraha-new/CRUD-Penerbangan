$('.page-scroll').on('click', function (e){
    var tujuan = $(this).attr('href');
    var elementujuan = $(tujuan);

    $('body').animate({
        scrollTop: elementujuan.offset().top
    }, 1250, 'linear')
    e.preventDefault();
});