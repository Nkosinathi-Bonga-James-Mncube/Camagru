if (results)
{
    document.getElementById('about_page').className="home_page";
    document.getElementById("login_tag").style.display="none";
    document.getElementById("public_tag").style.display="none";
    document.getElementById("logout_tag").style.display="block";
    document.getElementById("forgot_tag").style.display="none";  
}
else{
    document.getElementById("logout_tag").style.display="none";
    document.getElementById("home_tag").style.display="none";
    document.getElementById("private_tag").style.display="none";
    document.getElementById("change_tag").style.display="none";   
}