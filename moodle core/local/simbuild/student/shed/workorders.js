//////////////////////////////////////////////////////
// Send Ajax request to load the correct batch of 
// work orders
//////////////////////////////////////////////////////
function showSystem(systemID, selectedbutton)
{
    if (systemID=="")
    {
        document.getElementById("systemcontent").innerHTML="";
        return;
    } 
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
       xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
               document.getElementById("systemcontent").innerHTML=xmlhttp.responseText;
            }
        }
     
     /******************************
     ** Highlight the correct system Button
     ******************************/
     selectedbutton.className = "chartbox selected";
     var buttons = document.getElementsByClassName('chartbox');
     for(var i=0; i < buttons.length; i++)
     {
         if(buttons[i] !== selectedbutton)  {
            buttons[i].className = 'chartbox';
         }
     }   

    switch(systemID)
    {
        // intro
        case 1:
        {
            xmlhttp.open("GET","/local/simbuild/student/shed/system_intro.php",true);
        }break;
        
        // prepare
        case 2:
        {
            xmlhttp.open("GET","/local/simbuild/student/shed/system_prepare.php",true);
        }break;
        
        // floorwall
        case 3:
        {
            xmlhttp.open("GET","/local/simbuild/student/shed/system_floorWall.php",true);
        }break;
        
        // windowDoor
        case 4:
        {
            xmlhttp.open("GET","/local/simbuild/student/shed/system_windowDoor.php",true);
        }break;
        
        // roof
        case 5:
        {
            xmlhttp.open("GET","/local/simbuild/student/shed/system_roof.php",true);
        }break;
        
        // review
        case 6:
        {
            xmlhttp.open("GET","/local/simbuild/student/shed/system_review.php",true);
        }break;
    }
    xmlhttp.send();
}

//////////////////////////////////////////////////////
// Send Ajax request to load the correct batch of 
// activities
//////////////////////////////////////////////////////
function showActivities(orderID, selectedbutton)
{
    if (orderID=="")
    {
        document.getElementById("activitiesInfo").innerHTML="";
        return;
    } 
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
       xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
               document.getElementById("activitiesInfo").innerHTML=xmlhttp.responseText;
            }
        }
     
     /******************************
     ** Highlight the correct system Button
     ******************************/
     selectedbutton.className += " selected";
     var buttons = document.getElementsByClassName('ordertext');
     for(var i=0; i < buttons.length; i++)
     {
         if(buttons[i] !== selectedbutton)  {
            var str = buttons[i].className;
            var newName = str.replace("selected","");
            buttons[i].className = newName;
         }
     }   

    xmlhttp.open("GET","/local/simbuild/student/shed/activities.php?orderID="+orderID,true); 
    xmlhttp.send();
}