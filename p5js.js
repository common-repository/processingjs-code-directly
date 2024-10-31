jQuery(document).ready(function($){
  $('pre').slideUp(0);
  $("p.bw").click(function () {
    $t=$(this).children();
    if($t.hasClass('show')){
    $t.text('hide code');
    $t.parent().next().slideDown();
    $t.removeClass().addClass('hide genericon genericon-hide');
    }else{
    $t.text('show code');
    $t.parent().next().slideUp();
    $t.removeClass().addClass('show genericon genericon-show');
    }
  });
});