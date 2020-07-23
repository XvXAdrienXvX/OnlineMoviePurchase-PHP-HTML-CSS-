//prevent resubmission of form

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }


//for modals
var modal = document.getElementById('id01');
var modal2 = document.getElementById('id02');


//end of model
function searchGen(){
  var val= document.getElementById("selectedGenre").innerHTML;
var searchval = document.getElementById("global-search").value;

window.location="search.php?genre="+val+"&search="+searchval;
}
