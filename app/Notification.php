<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<script type="text/javascript">

var articles = <?php echo json_encode($articles); ?>;
//Fungsi untuk set notifikasi timeoutnya
setTimeout(function(){ 
var x = Math.floor((Math.random() * 4) + 1);
var title=articles[x][0];
var desc=articles[x][2];
var url=articles[x][1];
notifyBrowser(title,desc,url);
}, 1000);



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
var desc=articles[x][2];
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
icon:'http://hidepok.id/img/minilogo.png', // Ini untuk iconnya
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



</script>	
</body>
</html>