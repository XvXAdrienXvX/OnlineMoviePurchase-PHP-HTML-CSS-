$('.tog').click(function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).closest('.search-dropdown').toggleClass('open');
});

$('.men > li > a').click(function(e) {
  e.preventDefault();
  var clicked = $(this);
  clicked.closest('.dropdown-menu').find('.menu-active').removeClass('menu-active');
  clicked.parent('li').addClass('menu-active');
  clicked.closest('.search-dropdown').find('.toggle-active').html(clicked.html());
});

$(document).click(function() {
  $('.search-dropdown.open').removeClass('open');
});
$(function() {
    $('#searchform').each(function() {
        $(this).find('input').keypress(function(e) {
            // Enter pressed?
            if(e.which == 10 || e.which == 13) {
              var val= document.getElementById("selectedGenre").innerHTML;
             var searchval = document.getElementById("global-search").value;

             window.location="search.php?genre="+val+"&search="+searchval;
             return false;          }
        });

    });
});
