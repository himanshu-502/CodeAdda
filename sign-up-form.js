function validateForm()
{
let id=document.myform.userid.value;
let pass=document.myform.password.value;
let pass1=document.myform.password1.value;
let nme=document.myform.name.value;
let phone=document.myform.phone.value;
let em=document.myform.email.value;
let s=document.myform.firm.value;
if(id.length<5||id.length>12)
{
    alert("ID cannot be less than 5 or greater than 12 characters!!!");
    return false;
}
if(pass.length<7||pass.length>12)
{
    alert("Password cannot be less than 7 or greater than 12 characters!!!");
    return false;
}
if(pass1!=pass)
{
    alert("Password does not match!!!");
    return false;
}
if(nme==null||nme==""||isNotFitForName(nme))
{
    alert("Please enter name properly!!!");
    return false;
}
if(phone==null||phone==""||isNotNumeric(phone)||phone.length<10)
{
    alert("Please Enter a valid phone number!!!");
    return false;
}
if(em==null||em==""||notValidEmail(em))
{
    alert("Enter a valid email ID!!!");
    return false;
}
if(s==null||s=="")
{
    alert("Please tell whether you a firm or not!!!");
    return false;
}
return true;
}
function isNotFitForName(str)
{
    for(let i=0;i<str.length;i++)
    {
        let ch=str.charAt(i);
        if(!((ch>='A'&&ch<='Z')||(ch>='a'&&ch<='z')||ch==' '))
        return true;
    }
    return false;
}
function isNotNumeric(str)
{
    for(let i=0;i<str.length;i++)
    {
        let ch=str.charAt(i);
        if(!(ch>='0'&&ch<='9'))
        return true;
    }
    return false;
}
function notValidEmail(e)
{
    for(let i=0;i<e.length;i++)
    {
        let ch=e.charAt(i);
        if(ch=='@')
        return false;
    }
    return true;
}
function firmRemoveDisplay()
{
    radio=document.querySelectorAll('.firmProperties');
    radio.forEach((item)=>{
        item.style.display="none";
    })
}
function firmShowDisplay()
{
    radio=document.querySelectorAll('.firmProperties');
    radio.forEach((item)=>{
        item.style.display="block";
    })
}