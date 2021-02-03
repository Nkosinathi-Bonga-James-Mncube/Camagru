
var note = document.getElementById("note");
note.style.visibility = "hidden";
document.getElementById('check').onclick(function()
{
    if (this.checked)
    {
        note.style.visibility = "visible";
        console.log("SHOW");
    }
    else 
    {
        note.style.visibility = "hidden";
        console.log("HIDE");
    }
});
