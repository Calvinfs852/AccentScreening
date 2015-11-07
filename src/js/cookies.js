/**
 * Created by Calvin Scott on 11/6/2015.
 */
function showCookies() {
    alert(document.cookie);
}

function checkCookies() {
    numNames = getCookie("numNames");
    if (numNames == null)
        setCookie("numNames", "0");
}

function getNumNames() {
    numNames = getCookie("numNames");
    if (numNames == null) {
        setCookie("numNames", "0");
        return(0);
    }
    else
        return(parseInt(numNames));
}

function addCookie() {
    cookieValue = document.getElementById("name").value;
    if (cookieValue != "") {
        numNames = 1 + getNumNames();
        setCookie("numNames", numNames);
        setCookie("Name" + numNames, cookieValue);
    }
    return(true);
}

function setCookie(c_name,value,exdays)
{
    var exdate=new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
    document.cookie=c_name + "=" + c_value;
}

function getCookie(c_name)
{
    var i,x,y,ARRcookies=document.cookie.split(";");
    for (i=0;i<ARRcookies.length;i++) {
        x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
        y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
        x=x.replace(/^\s+|\s+$/g,"");
        if (x==c_name)
            return unescape(y);
    }
    return(null);
}

function deleteCookies() {
    cookieArray=document.cookie.split(";");
    for (i=0;i<cookieArray.length;i++) {
        name=cookieArray[i].substr(0,cookieArray[i].indexOf("="));
        name=name.replace(/^\s+|\s+$/g,"");
        deleteCookie(name);
    }
}

function deleteCookie(name) {
    document.cookie = name + "=; expires=" + new Date;
}
