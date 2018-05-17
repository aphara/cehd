function affiche_aide(question_1) {
            if (false == $(question_1).is(':visible')) {
                $(question_1).show(250);
            }
            else {
                $(question_1).hide(250);
            }
        }

$(".tohide").hide();
$(".btn-group-lg").on("click", affiche_aide() {
  var target = $(this).data("target");
  if(target!==undefined) {
    $(target).toggle();
      $(this).toggleClass("active",$(target).is(":visible"));
  }
});
