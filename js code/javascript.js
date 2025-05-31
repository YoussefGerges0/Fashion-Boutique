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
