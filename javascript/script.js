// --------------------Pre Loader--------------
let preloader = document.getElementById("preloader");

window.addEventListener('load',()=>{
    preloader.style.display="none"
})



// ************************menu ***************************

let menu_box = document.getElementById("menu")

function menu(){
    menu_box.style.right = "0px";
    console.log("clicked")
}

function cross(){
    menu_box.style.right = '-300px';

}


// **********************menu end***********************




// header color change 

window.addEventListener("scroll", function () {

    let header = document.getElementById("header");

    let content = document.getElementById("content");
  
    let scrolled = window.scrollY > content.offsetTop;
  
    if (scrolled) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }
  });



  
  