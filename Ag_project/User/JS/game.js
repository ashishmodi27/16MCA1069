$(".block").hover(function() {
  $(this).siblings(".block").fadeOut("fast");
}, function() {
  setTimeout(function() {
    $(this).siblings(".block").fadeIn("fast");
  }.bind(this), 300);
});

$("nav a").on("click", function(e) {
  e.preventDefault();
  $('html, body').animate({
    scrollTop: $($(this).attr("href")).offset().top
  }, 500);
});


