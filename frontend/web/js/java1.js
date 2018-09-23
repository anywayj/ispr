//1. открытие/скрытие номаризованной матрицы
$(document).ready(function() { 
  var linkNM = document.getElementById('triggerNM');
      $("Button#triggerNM").toggle(function() { 
        $("DIV#box1").fadeIn(); 
        linkNM.innerText = linkNM.getAttribute('data-text-show');
        return false; 
      },  
      function() { 
        $("DIV#box1").fadeOut(); 
          linkNM.innerText = linkNM.getAttribute('data-text-hide');
        return false; 
      }); 
}); 

//2. открытие/скрытие оценок по диплому
$(document).ready(function() { 
  var linkOD = document.getElementById('triggerOD');
      $("Button#triggerOD").toggle(function() { 
        $("DIV#box2").fadeIn(); 
        linkOD.innerText = linkOD.getAttribute('data-text-show');
        return false; 
      },  
      function() { 
        $("DIV#box2").fadeOut(); 
          linkOD.innerText = linkOD.getAttribute('data-text-hide');
        return false; 
      }); 
}); 

//3. открытие/скрытие оценок табличка
$(document).ready(function() { 
  var linkOD = document.getElementById('triggerOcenki');
      $("Button#triggerOcenki").toggle(function() { 
        $("DIV#box3").fadeIn(); 
        linkOD.innerText = linkOD.getAttribute('data-text-show');
        return false; 
      },  
      function() { 
        $("DIV#box3").fadeOut(); 
          linkOD.innerText = linkOD.getAttribute('data-text-hide');
        return false; 
      }); 
}); 

//4. открытие/скрытие розрахунок коефіцієнтів
$(document).ready(function() { 
  var linkDelta = document.getElementById('triggerDelta');
      $("Button#triggerDelta").toggle(function() { 
        $("DIV#box4").fadeIn(); 
        linkDelta.innerText = linkDelta.getAttribute('data-text-show');
        return false; 
      },  
      function() { 
        $("DIV#box4").fadeOut(); 
          linkDelta.innerText = linkDelta.getAttribute('data-text-hide');
        return false; 
      }); 
}); 



