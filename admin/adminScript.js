const hamburger = document.querySelector("#toggle-btn");
hamburger.addEventListener("click",function() {
    document.querySelector("#sidebar").classList.toggle("expand");
})

function load_content(id ){
    
    $('.sidebar-link').removeClass('active');
    $('#'+id).addClass('active');

}