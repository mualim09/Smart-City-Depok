var articles = [
["Vanilla JS Browser Default Java Script.","http://www.9lessons.info/2015/11/customize-youtube-embed-player.html"],
["Facebook Style Background Image Upload and Position Adjustment.","http://www.9lessons.info/2015/02/facebook-style-background-image-upload.html"],
["Create a RESTful services using Slim PHP Framework","http://www.9lessons.info/2014/12/create-restful-services-using-slim-php.html"],
["Social Network Script","http://www.thewallscript.com"],
["9lesosns Demos","http://demos.9lessons.info"],
["Pagination with Jquery, PHP , Ajax and MySQL.","http://www.9lessons.info/2010/10/pagination-with-jquery-php-ajax-and.html"],
["Ajax Select and Upload Multiple Images with Jquery","http://www.9lessons.info/2013/09/multiple-ajax-image-upload-jquery.html"],
["Ajax PHP Login Page with Shake Animation Effect.","http://www.9lessons.info/2014/07/ajax-php-login-page.html"],
["Vanilla JS Browser Default Java Script.","http://www.9lessons.info/2015/11/customize-youtube-embed-player.html"],
["Vanilla JS Browser Default Java Script.","http://www.9lessons.info/2015/11/customize-youtube-embed-player.html"]
];

//Fungsi untuk set notifikasi timeoutnya
setTimeout(function(){ 
var x = Math.floor((Math.random() * 10) + 1);
var title=articles[x][0];
var desc='Most popular article.';
var url=articles[x][1];
notifyBrowser(title,desc,url);
}, 200000);



document.addEventListener('DOMContentLoaded', function () 
{
    
if (Notification.permission !== "granted")
{
Notification.requestPermission(); //Meminta izin untuk memunculkan notifikasi
}

document.querySelector("#notificationButton").addEventListener("click", function(e)
{
var x = Math.floor((Math.random() * 10) + 1);
var title=articles[x][0];
var desc='Most popular article.';
var url=articles[x][1];
notifyBrowser(title,desc,url);
e.preventDefault();
});

});

function notifyBrowser(title,desc,url) 
{
if (!Notification) {
console.log('Desktop notifications not available in your browser..'); //Jika notifikasi tidak bisa dijalankan di browsernya
return;
}
if (Notification.permission !== "granted")
{
Notification.requestPermission(); //Sama seperti dengan yang di atas
}
else {
var notification = new Notification(title, { // Ini titlenya
icon:'https://lh3.googleusercontent.com/-aCFiK4baXX4/VjmGJojsQ_I/AAAAAAAANJg/h-sLVX1M5zA/s48-Ic42/eggsmall.png', // Ini untuk iconnya
body: desc, // Ini untuk deskripsinya
}); // Membuat fungsi notifikasi
// Semuanya ada di var yang sudah didefinisikan di atas


// Remove the notification from Notification Center when clicked.
notification.onclick = function () {
window.open(url); // Jika di klik akan membuka url yang sudah di setting di atas     
};

// Callback function when the notification is closed.
notification.onclose = function () {
console.log('Notification closed'); // Memunculkan teks berikut di console jika notifikasi ditutup
};

}
}