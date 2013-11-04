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

/*******************************************************
** Sort display on different student options
** student,progress,time,learn
*******************************************************/
function sortStudents(arrow,sortype,classid)
{ 
    var sortDirection = "high";
    if(arrow.className == "downarrow") {
        arrow.className = "uparrow";
    }
    else {
        arrow.className = "downarrow"
        sortDirection = "low";
    }
    
    // Set up my spinner
    var opts = {
        lines: 13, // The number of lines to draw
        length: 20, // The length of each line
        width: 10, // The line thickness
        radius: 30, // The radius of the inner circle
        corners: 1, // Corner roundness (0..1)
        rotate: 0, // The rotation offset
        direction: 1, // 1: clockwise, -1: counterclockwise
        color: '#000', // #rgb or #rrggbb or array of colors
        speed: 1, // Rounds per second
        trail: 60, // Afterglow percentage
        shadow: false, // Whether to render a shadow
        hwaccel: false, // Whether to use hardware acceleration
        className: 'spinner', // The CSS class to assign to the spinner
        zIndex: 2e9, // The z-index (defaults to 2000000000)
        top: 'auto', // Top position relative to parent in px
        left: 'auto' // Left position relative to parent in px
    };
    var target = document.getElementById('overviewtable');
    var spinner = new Spinner(opts).spin(target);
    
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
       if (xmlhttp.readyState==4 && xmlhttp.status==200) {
           document.getElementById("overviewtable").innerHTML=xmlhttp.responseText;
           spinner.stop();
       }
    }
    xmlhttp.open("GET","/local/simbuild/teacher/overallchart_sort.php?sort="+sortype+"&dir="+sortDirection+"&class="+classid,true); 
    xmlhttp.send();
}

/**************************************************
* Draw the chart for the overall - Teacher Report
**************************************************/
function DrawOverallChart(dataArr, labelsArr)
{
    /* Make a nice labels lists */
    var myToolTips = new Array();
    for(var i = 0; i < dataArr.length; i++)
    {
        myToolTips[i] = dataArr[i].toString() + ' %';
    }
    
    RGraph.Reset(document.getElementById('overallstudent'));
    var linechart = new RGraph.Line('overallstudent', dataArr)
    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#aadf5d:rgba(217,229,127,0))'])
    .Set('colors', ['#3d7105'])
    .Set('linewidth', 5)
    .Set('hmargin', 35)
    .Set('gutter.left', 0)
    .Set('ymax', 100)
    .Set('noyaxis', true)
    .Set('ylabels', false)
        
    .Set('labels', labelsArr)
    .Set('tooltips', myToolTips)
    .Set('tooltips.coords.page', true)
    .Set('tickmarks', 'circle')
    .Set('tickmarks.dot.color', ['#3d7105'])

    .Set('background.grid.autofit.numhlines', 10)
    .Set('background.grid.autofit.numvlines', 40)
    .Set('background.grid.dashed', true)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')
    .Draw();
}

/**************************************************
* Highlight the button the user clicks on and 
* redraw the chart with ajax
**************************************************/
function OnButtonClick(selectedButton, mydata, mylabels)  {
  
     selectedButton.className = "button selected";
     var buttons = document.getElementsByClassName('button');
     for(var i=0; i < buttons.length; i++)
     {
         if(buttons[i] !== selectedButton)  {
            buttons[i].className = 'button';
         }
     }
          
     var graphWidth = 125 * mylabels.length;
     if(graphWidth < 800)
     { graphWidth = 700; }
     var contentStr = '<canvas id="overallstudent" width="'+graphWidth+'" height="225" >[No canvas support]</canvas>';
     document.getElementById("chartdiv").innerHTML = contentStr;
     
     DrawOverallChart(mydata,mylabels);    
}

/****************************************************
* Draw reports for the Class Skills - Teacher Report
****************************************************/
function DrawAcademicSkills(dataArr, lineDataArr, labelsArr)
{
    var specificLables = new Array();
    for(var i=0; i < dataArr.length; i++)
    {
        specificLables[i] = dataArr[i] + '%';
    }

    /********************
    *  Draw the line chart
    ********************/
    var line = new RGraph.Line('academicskills', lineDataArr)
    .Set('background.grid.dashed', true)
    .Set('background.grid.autofit.numhlines', 5) 
    .Set('background.grid.autofit.numvlines', 10)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')

    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#b848d0:rgba(255,255,255,0))'])
    .Set('colors', ['#911fa9'])
    .Set('linewidth', 2)
    .Set('hmargin', 43)

    .Set('ymax', 100)
    .Set('gutter.left', 40)
    .Set('gutter.bottom', 35)
    .Set('ylabels', false)
    .Set('noaxes', true)
    .Draw();
    
    var newLabelArr = new Array();
    for(var i = 0; i < labelsArr.length; i++)
    {
        var tempLabel = labelsArr[i].split(" ");
        var newLabel = tempLabel;
        if(tempLabel.length > 1) {
            newLabel = tempLabel[0] + '\r\n' + tempLabel[1];
        }
        newLabelArr[i] = newLabel;
    }

    /********************
    *  Draw the bar chart, hiding the background grid and axes
    ********************/
    var bar = new RGraph.Bar('academicskills', dataArr)
    .Set('colors', ['#b848d0'])
    .Set('ymax', 100)
    .Set('background.grid', false) 
    .Set('ylabels.count', 3)
    .Set('ylabels.specific', ['100%', '50%', '0%'])
    .Set('labels', newLabelArr)

    .Set('labels.above.specific', specificLables)
    .Set('hmargin', 15)
    .Set('gutter.left', 40)
    .Set('gutter.bottom', 35)
    .Draw();

}


function DrawFoundationSkills(dataArr, lineDataArr, labelsArr)
{
    var specificLables = new Array();
    for(var i=0; i < dataArr.length; i++)
    {
        specificLables[i] = dataArr[i] + '%';
    }

    /********************
    *  Draw the line chart
    ********************/
    var line = new RGraph.Line('foundationskills', lineDataArr)
    .Set('background.grid.dashed', true)
    .Set('background.grid.autofit.numhlines', 5)
    .Set('background.grid.autofit.numvlines', 10)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')

    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#4796d1:rgba(255,255,255,0))'])
    .Set('colors', ['#1a6aa5'])
    .Set('linewidth', 2)
    .Set('hmargin', 43)

    .Set('ymax', 100)
    .Set('gutter.left', 40)
    .Set('gutter.bottom', 35)
    .Set('ylabels', false)
    .Set('noaxes', true)
    .Draw();

    /********************
    *  Draw the bar chart, hiding the background grid and axes
    ********************/
    var bar = new RGraph.Bar('foundationskills', dataArr)
    .Set('colors', ['#4796d1'])
    .Set('ymax', 100)
    .Set('background.grid', false)
    .Set('ylabels.count', 3)
    .Set('ylabels.specific', ['100%', '50%', '0%'])

    .Set('text.color', '#000000')
    .Set('labels.above.specific', specificLables)
    .Set('hmargin', 15)
    .Set('gutter.left', 40)
    .Set('gutter.bottom', 35)
    .Set('labels', labelsArr)
    .Draw();
}


function DrawBuildingSkills(dataArr, lineDataArr, labelsArr)
{
    var specificLables = new Array();
    for(var i=0; i < dataArr.length; i++)
    {
        specificLables[i] = dataArr[i] + '%';
    }

    /********************
    *  Draw the line chart
    ********************/
    var line = new RGraph.Line('buildingskills', lineDataArr)
    .Set('background.grid.dashed', true)
    .Set('background.grid.autofit.numhlines', 5)
    .Set('background.grid.autofit.numvlines', 20)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')

    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#f58323:rgba(255,255,255,0))'])
    .Set('colors', ['#c45a00'])
    .Set('linewidth', 2)
    .Set('hmargin', 43)

    .Set('ymax', 100)
    .Set('gutter.left', 40)
    .Set('ylabels', false)
    .Set('noaxes', true)
    .Draw();
    
    /********************
    *  Draw the bar chart, hiding the background grid and axes
    ********************/
    var bar = new RGraph.Bar('buildingskills', dataArr)
    .Set('colors', ['#f58323'])
    .Set('ymax', 100)
    .Set('background.grid', false)
    .Set('ylabels.count', 3)
    .Set('ylabels.specific', ['100%', '50%', '0%'])

    .Set('text.color', '#000000')
    .Set('labels.above.specific', specificLables)
    .Set('hmargin', 15)
    .Set('gutter.left', 40)
    .Set('labels', labelsArr)
    .Draw();
}

/*************************************************
* Draw graphs for the Construction Standard Report
*************************************************/
function DrawConstructionReport(dataArr, labelsArr)
{
    /* Make a nice labels lists */
    var myToolTips = new Array();
    for(var i = 0; i < dataArr.length; i++)
    {
        myToolTips[i] = dataArr[i].toString() + ' %';
    }
    
    var linechart = new RGraph.Line('constructionStudent', dataArr)
    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#ea7000:rgba(255,255,255,0))'])
    .Set('colors', ['#a94416'])
    .Set('linewidth', 5)
    .Set('hmargin', 50)
    .Set('gutter.left', 0)
    .Set('gutter.right', 25)
    .Set('ymax', 100)
    .Set('noyaxis', true)
    .Set('ylabels', false)
        
    .Set('labels', labelsArr)
    .Set('tooltips', myToolTips)
    .Set('tooltips.coords.page', true)
    .Set('tickmarks', 'circle')
    .Set('tickmarks.dot.color', ['#a94416'])

    .Set('background.grid.autofit.numhlines', 10)
    .Set('background.grid.autofit.numvlines', 40)
    .Set('background.grid.dashed', true)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')
    .Draw();
}

/***************************************************
* Draw graphs for the academic standards report
***************************************************/
function DrawAcademicReport(dataArr, labelsArr)
{
    /* Make a nice labels lists */
    var myToolTips = new Array();
    for(var i = 0; i < dataArr.length; i++)
    {
        myToolTips[i] = dataArr[i].toString() + ' %';
    }
    
    var linechart = new RGraph.Line('academicStudent', dataArr)
    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#ca90d8:rgba(255,255,255,0))'])
    .Set('colors', ['#731e86'])
    .Set('linewidth', 5)
    .Set('hmargin', 30)
    .Set('gutter.left', 3)
    .Set('ymax', 100)
    .Set('noyaxis', true)
    .Set('ylabels', false)
        
    .Set('labels', labelsArr)
    .Set('tooltips', myToolTips)
    .Set('tooltips.coords.page', true)
    .Set('tickmarks', 'circle')
    .Set('tickmarks.dot.color', ['#731e86'])

    .Set('background.grid.autofit.numhlines', 10)
    .Set('background.grid.autofit.numvlines', 40)
    .Set('background.grid.dashed', true)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')
    .Draw();
}