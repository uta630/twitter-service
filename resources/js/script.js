// オーバーレイ
$(document).on('click', '.js-overlay-open', () => {
    $('.js-overlay-target').fadeIn();
});
$(document).on('click', '.js-overlay-close', () => {
    $('.js-overlay-target').fadeOut();
});

// チェックボックス
$(document).on('click', '.js-checkbox', () => {
    // チェックマーク
    $('.js-checkbox').toggleClass('is-active');
    // ボタンのdisabled
    $('.js-checkbox-target')[0].disabled = !$('.js-checkbox-target')[0].disabled;
});
