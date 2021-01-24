login_url=new URL(window.location.href)
send_verf_email=login_url.searchParams.get("validation");
validation_user_status=login_url.searchParams.get("valid");

if (send_verf_email == 'true')
{
    document.getElementById("valid-msg1").className = "alert alert-primary";
}
if(validation_user_status == 'login')
{
    document.getElementById("valid-msg2").className = "alert alert-success";
}
if(validation_user_status == 'error')
{
    document.getElementById("valid-msg3").className = "alert alert-danger";
}

if (results == '1')
{
    document.getElementById('login-msg1').className = "alert alert-danger alert px-2 py-1";
}

if (results == '2')
{
    document.getElementById('valid-msg1').className = "alert alert-primary px-2 py-1";
}
if (results == '3')
{
    document.getElementById('login-msg2').className = "alert alert-danger alert px-2 py-1";
}
