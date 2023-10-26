let loader = document.getElementById("preloader");

window.addEventListener("load", function(){
    let hasLoaded = sessionStorage.getItem("hasLoaded");

    if (!hasLoaded) {
      setTimeout(function() {
        loader.style.display = "none";
        sessionStorage.setItem("hasLoaded", true);
      }, 1000); 
    } else {
      loader.style.display = "none";
    }
  });