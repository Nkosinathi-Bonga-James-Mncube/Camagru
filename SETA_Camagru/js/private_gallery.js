if (results == '1')
{
    document.getElementById('upload-msg1').className = "alert alert-danger alert px-2 py-1";
}

if (results == '2')
{
    document.getElementById('upload-msg2').className = "alert alert-danger px-2 py-1";
}
if (results == '3')
{
    document.getElementById('upload-msg3').className = "alert alert-danger px-2 py-1";
}

if (results == '-1')
{
    // window.location.href="./private_gallery.php";
    document.getElementById('upload-msg4').className = "alert alert-success px-2 py-1";
    var hold =  setInterval(redirect_page, 1500);
}

function redirect_page()
{
    window.location.href="./private_gallery.php";
    // document.getElementById('upload-msg4').className = "alert alert-success px-2 py-1";
}