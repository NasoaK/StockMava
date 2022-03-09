button = document.querySelector('#burger-btn');
bars = document.querySelectorAll('#burger-btn span');
menu = document.querySelector('#menu');
console.log(bars[0]);  
//bars[0]
mobileMenu= false;

function menuAnimation(){
    mobileMenu = !mobileMenu;
    
    if(mobileMenu){
        bars[0].style.top = '50%';
        bars[0].style.height = "5px";
        bars[0].style.transform = "translateY(-50%)rotateZ(-45deg)";
        bars[1].style.opacity = 0
        bars[2].style.transform = "translateY(-50%)rotateZ(45deg)"; 
        bars[2].style.top = "50%";
        bars[2].style.height = "5px";
        menu.style.height = "100vh";
        setTimeout(() => {
            menu.querySelector('ul').style.display = "flex";
            setTimeout(() => {
                menu.querySelector('ul').style.opacity = "1";
            }, 200);
        }, 150);
    }
    else{
        bars[0].style.top = '0';
        bars[0].style.height = "5px";
        bars[0].style.transform = null;
        bars[1].style.opacity = 1
        bars[2].style.transform = null; 
        bars[2].style.top = null;
        bars[2].style.height = "5px";
        menu.style.height = "100%";
        menu.querySelector('ul').style.display = "none";
        menu.querySelector('ul').style.opacity = 0;
    }
}

var x = window.matchMedia("(max-width: 900px)");


button.addEventListener('click',menuAnimation);

