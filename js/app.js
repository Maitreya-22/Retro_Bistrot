window.addEventListener('resize', function(){
    addRequiredClass();
})


function addRequiredClass() {
    if (window.innerWidth < 768) {
        document.body.classList.add('mobile')
    } else {
        document.body.classList.remove('mobile') 
    }
}

window.onload = addRequiredClass


let hamburger = document.querySelector('.hamburger')
let mobileNav = document.querySelector('.nav-list')  
hamburger.addEventListener('click',function(){
    mobileNav.classList.toggle('open')
})


/*$(".container").css("background", "#05386b")
        $(".container").css("border-bottom", "1px solid #DAA520")*/


/*
$(".container").css("background", "#05386b")
        $(".container").css("border-bottom", "1px solid #DAA520")*/
