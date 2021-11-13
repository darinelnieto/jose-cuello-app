$('.barController').on('click', function(e){
    $('.panelAdmin').animate({'width': 'toggle'});
    e.preventDefault();
});

if($('.panelAdmin').css({'display':'block'})){
    $('.bodyAdmin').css({ 'width':'100%'});
}else if($('.panelAdmin').css({'display':'none'})){
    $('.bodyAdmin').css({ 'width':'85%' });
}
