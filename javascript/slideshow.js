var slideIndex = 0;
var slides = document.getElementsByClassName("mySlides");
var dots = document.getElementsByClassName("dot");

showSlides(slideIndex);

// função que movimenta os slides que chamo pelos botões
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Indica o slide atual
function currentSlide(n) {
  showSlides(slideIndex = n);
}

// Demonstação de slides (efeito tira class/bota class)
function showSlides(n) {
  var i;
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
//-----------------------------------------------------------------------------------
// nesta seção tornamos o slideshow automatico
var myIndex = 0;
function carousel() {
    var i = 0;
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > slides.length) {myIndex = 1}    
    slides[myIndex-1].style.display = "block";  
    setTimeout(carousel, 5000); 
    plusSlides(1); 
}