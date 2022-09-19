// JavaScript Document
function clear()
{
setTimeout("clear_r()",10000);
}
function clear_r()
{
document.getElementById('response').style.display = "none"; 
}

function adminTransfer(url)
{
document.userForm.action=url;
$("#userForm").submit();
}

function orderTransfer(url)
{
document.orderForm.action=url;
$("#orderForm").submit();
}
