
// persian num for prices --- only numbers inside tag
var priceTags = $('.persian-num');


[].slice.call(priceTags).forEach(function (priceTags) {
    priceText = priceTags.innerHTML;
    priceNum = parseInt(priceText);
    priceLocale = priceNum.toLocaleString('ar-EG');
    priceTags.innerHTML = priceLocale;
});



// numbers and words inside tab accepted
var arabicNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
$('.translate').text(function (i, v) {
    var chars = v.split('');
    for (var i = 0; i < chars.length; i++) {
        if (/\d/.test(chars[i])) {
            chars[i] = arabicNumbers[chars[i]];
        }
    }
    return chars.join('');
})
