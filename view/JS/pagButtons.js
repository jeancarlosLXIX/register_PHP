const aTags = document.querySelectorAll('a')
let number = location.search.match(/\d+/g)[0]
let currentPage = parseInt(number)

aTags.forEach(e=>{
    if(parseInt(e.dataset.nav)===currentPage){
        e.className = "active"
    }
})
