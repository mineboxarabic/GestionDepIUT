let lastClickedElement = null;
function getPageName() {
    var path = window.location.pathname;
    var page = path.split("/").pop();
    return page;
}

function testFunction(){
   
    lastClickedElement = element;
}
function ColorATags(){
    let ATags = document.querySelectorAll('a');
    ATags.forEach(element => {
        if(element.innerText == 'Éliminer'){
            element.style.backgroundColor = '#e74b4b';
        }
        if(element.innerText == 'Restaurer'){
            element.style.backgroundColor = '#3ddf3d';
        }
    });
}
addEventListener('DOMContentLoaded',()=>{
    let element = document.querySelector('.'+getPageName());
    element.classList.add('active');

    ColorATags();
})