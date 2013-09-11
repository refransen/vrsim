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