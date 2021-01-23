login_url=new URL(window.location.href)
result=login_url.searchParams.get("validation");
if (result == 'true')
{
    document.getElementById("valid-msg1").className = "alert alert-success";
}