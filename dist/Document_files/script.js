   const navLink = document.querySelectorAll('.nav-link');
   //console.log(navLink);
  
   let allowNav = false

   navLink[0].addEventListener('click', (e)=>{

    if(!allownav){
        e.preventDefault();


        setTimeout(function(){allownav = true;}, 3000);
        
    }

    allowNav = false
    
   })



 