const aTags = document.querySelectorAll('a')
let number = location.search.match(/\d+/g)[0]
let currentPage = parseInt(number)

aTags.forEach(e=>{
    if(parseInt(e.dataset.nav)===currentPage){
        e.className = "active"
    }
})

//COLOR
document.querySelectorAll('tr > td').forEach(element => {
    console.log(element,'aqui');
    switch (element.textContent) {
        case 'Nuevo':
            changeColor(element, '#90EE90')
            break;
        case 'Descargado':
            changeColor(element, '#FF7F7F')
            break;
        case 'Usado':
            changeColor(element, '#FFFF66')
            break;
    
    }
});

function changeColor(element,color){
    element.parentElement.style.backgroundColor = color
}