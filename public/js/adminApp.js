$('.barController').on('click', function(e){
    $('.panelAdmin').animate({'width': 'toggle'});
    if($('.panelAdmin').css({'width':0})){
        $('#left').css({'display':'none'});
        $('#right').css({'display':'block'});
    }else if($('.panelAdmin').css({'width':'15%'})){
        $('#left').css({'display':'block'});
        $('#right').css({'display':'none'});
    }
    e.preventDefault();
});
if($('.panelAdmin').css({'display':'block'})){
    $('.bodyAdmin').css({ 'width':'100%'});
    
}else if($('.panelAdmin').css({'display':'none'})){
    $('.bodyAdmin').css({ 'width':'85%' });
}