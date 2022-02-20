
// Dom element of the modal

const deleFakeBtn = document.querySelector('.delete-btn');
const modal = document.getElementById('modal-container');
const keep = document.getElementById('keep');
const deleteArt = document.getElementById('delete-art');
const closeBtn = document.getElementById('#close');
const warning = document.querySelector('#warning-delete');
const success = document.querySelector('#success-delete');

// Manage the modal

keep.addEventListener('click',(event)=>{
    modal.style.display ="none";
});

deleteArt.addEventListener('click', ()=>{
    warning.style.display = "none";
    success.style.display = "block";

}); 


/* function deleteF(){

    allowSubmit = false;

        deleteArt.addEventListener('click', ()=>{
            warning.style.display = "none";
            success.style.display = "block";
        
    });
    
    closeBtn.addEventListener('click',()=>{
        modal.style.display ="none";
        warning.style.display = "flex";
        success.style.display = "none";
    }) 
} */


// Get dom element 
const form = document.querySelectorAll('.pCategId');
const finalCategValue = document.querySelector('.finalValueCateg');
console.log(form);

// Pass categ value inside value attribute
for(const a of form){
    a.addEventListener('submit', (e)=>{
        //alert(e.target.value);
        e.preventDefault();
        e.stopPropagation();
        console.log(a.children[0].value);
        modal.style.display ="flex";
        finalCategValue.setAttribute('value',a.children[0].value);
    })
}
