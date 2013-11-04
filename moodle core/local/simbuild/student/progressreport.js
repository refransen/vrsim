function toggleBlock1(contentName)
{     
     // Make it appear
     if(document.getElementById('hideblock1').style.display == 'none')  {
         document.getElementById(contentName).style.display = 'block';
         document.getElementById('hideblock1').style.display = 'block';
         document.getElementById('showblock1').style.display = 'none';
     }
     else  {
         document.getElementById(contentName).style.display = 'none';
         document.getElementById('hideblock1').style.display = 'none';
         document.getElementById('showblock1').style.display = 'block';
     }
}

function toggleBlock2(contentName)
{     
     // Make it appear
     if(document.getElementById('hideblock2').style.display == 'none')  {
         document.getElementById(contentName).style.display = 'block';
         document.getElementById('hideblock2').style.display = 'block';
         document.getElementById('showblock2').style.display = 'none';
     }
     else  {
         document.getElementById(contentName).style.display = 'none';
         document.getElementById('hideblock2').style.display = 'none';
         document.getElementById('showblock2').style.display = 'block';
     }
}

//////////////////////////////////////////////////////
// Send Ajax request to load the correct batch of 
// work orders
//////////////////////////////////////////////////////
function showSystem(homeurl, systemID, selectedbutton)
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
    
    xmlhttp.open("GET",homeurl+"/local/simbuild/student/site_systems.php?system="+systemID,true);
    xmlhttp.send();
}

//////////////////////////////////////////////////////
// Send Ajax request to load the correct batch of 
// activities
//////////////////////////////////////////////////////
function showActivities(homeurl, orderID, selectedbutton)
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

    xmlhttp.open("GET",homeurl+"/local/simbuild/student/activities.php?orderID="+orderID,true); 
    xmlhttp.send();
}