function toggleBlock()
{     
     // Make it appear
     if(document.getElementById('hideblock').style.display == 'none')  {
         document.getElementById('reportcontent').style.display = 'block';
         document.getElementById('hideblock').style.display = 'block';
         document.getElementById('showblock').style.display = 'none';
     }
     else  {
         document.getElementById('reportcontent').style.display = 'none';
         document.getElementById('hideblock').style.display = 'none';
         document.getElementById('showblock').style.display = 'block';
     }
}

