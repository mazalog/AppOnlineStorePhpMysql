(function(){


    var prevScrollpos=window.pageYOffset;
    window.onscroll=function(){
    var currentScrollPos= window.pageYOffset;
    if(prevScrollpos>currentScrollPos){
    document.getElementById("barrade").style.bottom="0"
    } else{
  
      document.getElementById("barrade").style.bottom="-120px";
    }
    prevScrollpos=currentScrollPos
    }
  

  
  compra1();
  //----------------------------------------
  
  //Transition navbar
    window.addEventListener("scroll",menu)
  //Effect image 
  window.addEventListener("scroll",mostrarScroll)
  window.addEventListener("scroll",mostrarScrolliz)
  window.addEventListener("scroll",mostrarScrollde)
  

  }())
  