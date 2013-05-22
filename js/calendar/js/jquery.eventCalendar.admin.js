  jQuery(function(){
    $(".bt").on("click", function(event){
      alert($(this).text());
      return false;
    });
  });