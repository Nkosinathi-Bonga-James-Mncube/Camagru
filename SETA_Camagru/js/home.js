document.getElementById('user_name').innerHTML=results;

login_url=new URL(window.location.href)
change_pass_status=login_url.searchParams.get("pass");

if (change_pass_status == 'true')
{
    document.getElementById('home-msg1').className = "alert alert-success";
}
if (result2 != 0)
{   
    document.getElementById('notfication_home').className = "btn btn-outline-secondary";
}