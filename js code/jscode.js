function Innerimmg(e) {
    var imgSrc = e.querySelector('img').src;
    var productName = e.querySelector('h4').innerText;
    var productPrice = e.querySelector('p').innerText;


    var url = 'innering.php?img=' + encodeURIComponent(imgSrc) + '&name=' + encodeURIComponent(productName) + '&price=' + encodeURIComponent(productPrice);
    
    window.location.href = url;
}
function Innerimmg2(e) {
    var imgSrc = e.querySelector('img').src;
    var productName = e.querySelector('h4').innerText;
    var productPrice = e.querySelector('p').innerText;


    var url = 'Innerimmg2.php?img=' + encodeURIComponent(imgSrc) + '&name=' + encodeURIComponent(productName) + '&price=' + encodeURIComponent(productPrice);
    
    window.location.href = url;
}
function Innerimmg3(e) {
   var imgSrc = e.querySelector('img').src;
   var productName = e.querySelector('h4').innerText;
   var productPrice = e.querySelector('p').innerText;


   var url = 'innering-shoes.php?img=' + encodeURIComponent(imgSrc) + '&name=' + encodeURIComponent(productName) + '&price=' + encodeURIComponent(productPrice);
   
   window.location.href = url;
}


let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () =>{
   menu.classList.toggle('fa-times');
   navbar.classList.toggle('active');
};

window.onscroll = () =>{
   menu.classList.remove('fa-times');
   navbar.classList.remove('active');
};


document.querySelector('#close-edit').onclick = () =>{
   document.querySelector('.edit-form-container').style.display = 'none';
   window.location.href = 'admin.php';
};