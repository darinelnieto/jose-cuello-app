$('.card.content-product').on('mouseover', function(){
    $('.content-form-animate-order', this).css({'bottom':'0', 'transition':'1s'});
});
$('.card.content-product').on('mouseout', function(){
    $('.content-form-animate-order', this).css({'bottom':'-23%', 'transition':'1s'});
});