$(".delete").on("click", function() {
    
    var buttonId = $(this).attr('id');
    var mealName = $(this).attr("data");

    console.log(buttonId);
    console.log(mealName);
    console.log($(".foods form").attr("action"));
    var kva = "/foods/" + buttonId;
    $(".meals-show form").attr('action', "meals/" + buttonId);
    $(".foods form").attr('action', kva );
    $(".modal-title").text(mealName);
  
  });