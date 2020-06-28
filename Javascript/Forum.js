const filter = document.getElementById('filter');
const elContenedor = document.getElementsByClassName('container');
const elh1 = document.querySelectorAll('.container h1');
const btn = document.getElementById('ct-btn');


filter.addEventListener('keyup', filterEl);
function filterEl(e){
    const text = e.target.value.toLowerCase();
    Array.from(elh1).forEach((element)=>{
        const elName = element.textContent;
        if(elName.toLowerCase().indexOf(text) != -1){
            element.parentElement.style.display = 'block';
        }else{
            element.parentElement.style.display = 'none';
        }
    });
    
}

