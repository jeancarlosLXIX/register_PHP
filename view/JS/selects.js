const labeldirection = document.querySelector('label[for="direction"]')
const directionSelect = document.getElementById('direction');
const directions = document.querySelectorAll('#direction optgroup') //return a nodeList
const labeldepartament = document.querySelector('label[for="departament"]')
const departamentSelect = document.getElementById('departament');
const departamentos = document.querySelectorAll('#departament optgroup')
const botton = document.querySelector('input[name=addPC]')
const errores = document.querySelector('.texto');


//COLOR
document.querySelectorAll('tr > td').forEach(element => {
    console.log(element);
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

//DISABLE SEND BUTTON
document.querySelector('#comments').addEventListener('keyup', e => {
    if(e.target.textLength > 255){
        botton.disabled = true;
        errores.style.display = 'block';
    } else{
        botton.disabled = false;
        errores.style.display = 'none';
    }
})



directionSelect.addEventListener('change',()=>{
    const depa = gettingDataSet(directionSelect, 'departamento');
    superHandler(depa, labeldepartament, departamentSelect, departamentos, 'UNKNOW');
})


//now will get our data-* from this function
function gettingDataSet(element,name){

        switch (name) {
            case 'divi':
            return element.options[element.selectedIndex].dataset.divi
                break;

            case 'seccion':
            return element.options[element.selectedIndex].dataset.seccion
                break;  

            case 'area':
            return element.options[element.selectedIndex].dataset.area
                break;

            case 'departamento':
            return element.options[element.selectedIndex].dataset.departamento
                break;
            default:
            return 'Incorrect property name'
                break;
        }
}

function Display(element,boolean=false){
    if(boolean){
        element.style.display = 'block'
    } else{
        element.style.display = 'none'
    }
}
//to show and hidde base on a class name
function optgroupHandler(elements,cName){
    //Loop through every option in divisions and change visibility
    elements.forEach(element =>{  //here we use forEach cause it's a nodeList
                if(element.classList.contains(cName)){
                    element.style.display = 'block'
                } else{
                    element.style.display = 'none'
                }
            })
}

//I had to use the same code more than 2 times so I made this function for handling those places
function superHandler(hasClass,label,select, nodeList, defaultValue){
    if(hasClass){
        Display(label,true)
        Display(select,true)
        optgroupHandler(nodeList, hasClass)
    } else{
        select.value = defaultValue
        Display(label)
        Display(select)
    }
}

function changeColor(element,color){
    element.parentElement.style.backgroundColor = color
}