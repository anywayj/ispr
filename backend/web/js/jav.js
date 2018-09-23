
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".dropdown-menu li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$("#flip").click(function(){
    $(".dropdown-menu").slideToggle();
});


 function viewdiv(id) {
        var el = document.getElementById(id);
        var link = document.getElementById('toggleLink');
        if (el.style.display == "block") {
            el.style.display = "none";
            link.innerText = link.getAttribute('data-text-hide');
        } else {
            el.style.display = "block";
            link.innerText = link.getAttribute('data-text-show');
        }
    }

  function viewdiv(id) {
        var el = document.getElementById(id);
        var link = document.getElementById('toggleLink1');
        if (el.style.display == "block") {
            el.style.display = "none";
            link.innerText = link.getAttribute('data-text-hide');
        } else {
            el.style.display = "block";
            link.innerText = link.getAttribute('data-text-show');
        }
    }   

     



$(document).ready(function(){
 $.fn.animate_Text = function() {
  var string = this.text();
  return this.each(function(){
   var $this = $(this);
   $this.html(string.replace(/./g, '<span class="new">$&</span>'));
   $this.find('span.new').each(function(i, el){
    setTimeout(function(){ $(el).addClass('div_opacity'); }, 20 * i);
   });
  });
 };
 $('#example').show();
 $('#example').animate_Text();
});