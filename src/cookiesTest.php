<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Calvin Scott-->
<!-- * Date: 11/6/2015-->
<!-- * Time: 6:01 PM-->
<!-- */-->
<html>
<head><title>PHP Cookie Form</title>
<script type="text/javascript">
//
// Display an alert with a string containing all cookies.
//
function showCookies() {
    alert(document.cookie);
}

//
// See if the "numNames" cookie has yet been defined. If not,
// initialize it with zero (meaning that no name cookies have
// yet been created.
//
function checkCookies() {
    numNames = getCookie("numNames");
    if (numNames == null)
        setCookie("numNames", "0");
}

//
// Utility function to return the "numNames" cookie value as
// an integer. If the cookie doesn't exist, it will also be
// created with a value of zero.
//
function getNumNames() {
    numNames = getCookie("numNames");
    if (numNames == null) {
        setCookie("numNames", "0");
        return(0);
    }
    else
        return(parseInt(numNames));
}

//
// Add a cookie using the contents of the "name" text field.
// The name of the cookie is generated based on the number of
// already created as follows: Name1, Name2, Name3, ... up to
// and including the number of names specified in the "numNames"
// cookie.
//
function addCookie() {
    cookieValue = document.getElementById("name").value;
    if (cookieValue != "") {
        numNames = 1 + getNumNames();
        setCookie("numNames", numNames);
        setCookie("Name" + numNames, cookieValue);
    }
    return(true);
}

//
// Set a cookie with the given name, value and number of days
// until expiration. If the number of days is not specified,
// the cookie will be deleted when the browser is closed.
//
function setCookie(c_name, value, exdays)
{
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
    document.cookie = c_name + "=" + c_value;
}

//
// Return the value of the specified cookie, or null if the
// specified cookie does not exist.
//
function getCookie(c_name)
{
    cookieArray = document.cookie.split(";");
    for (i = 0; i < cookieArray.length; i++) {
        name = cookieArray[i].substr(0,cookieArray[i].indexOf("="));
      value = cookieArray[i].substr(cookieArray[i].indexOf("=")+1);
      name = name.replace(/^\s+|\s+$/g,"");
      if (name == c_name)
          return unescape(value);
   }
    return(null);
}

//
// Deletes all cookies.
//
function deleteCookies() {
    cookieArray=document.cookie.split(";");
    for (i = 0; i < cookieArray.length; i++) {
        name = cookieArray[i].substr(0,cookieArray[i].indexOf("="));
      name = name.replace(/^\s+|\s+$/g,"");
      deleteCookie(name);
   }
    location.reload(true);
}

//
// Delete the specified cookie.
//
function deleteCookie(name) {
    document.cookie = name + "=; expires=" + new Date;
}
</script>
</head>
<body onload="checkCookies();">
<form method="post" action="" onsubmit="addCookie();">
    Name: <input type="text" ID="name"> <input type="submit" value="Add">
<hr />
</form>
<input type="submit" value="Delete Cookies" onclick="deleteCookies();">
<hr />
<?php
   $numNames = $_COOKIE['numNames'];
   print("<h4>$numNames cookies:</h4>\n<ul>\n");
   for($i = 1; $i <= $numNames; $i++) {
       $cookieName = "Name" . $i;
       $name = $_COOKIE[$cookieName];
       print("<li>$cookieName=$name</li>\n");
   }
   print("</ul>\n");
?>
</body>
</html>