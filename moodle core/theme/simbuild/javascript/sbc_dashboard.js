function toggleBlock(blockname)
{     
     // Make it appear
     if(document.getElementById('hideblock').style.display == 'none')  {
         document.getElementById(blockname).style.display = 'block';
         document.getElementById('hideblock').style.display = 'block';
         document.getElementById('showblock').style.display = 'none';
     }
     else  {
         document.getElementById(blockname).style.display = 'none';
         document.getElementById('hideblock').style.display = 'none';
         document.getElementById('showblock').style.display = 'block';
     }
}
/****************************************************
* Draw reports for the Class Skills - Dashboard -NEW 
****************************************************/
function DrawAcademicSkills(dataArr, lineDataArr, labelsArr)
{
    var specificLables = new Array();
    for(var i=0; i < dataArr.length; i++)
    {
        specificLables[i] = dataArr[i] + '%';
    }
    
    var momLables = new Array();
    for(var i=0; i < lineDataArr.length; i++)
    {
        momLables[i] = lineDataArr[i] + '%';
    }

    /********************
    *  Draw the line chart
    ********************/
    var line = new RGraph.Line('academicskills', lineDataArr)
    .Set('background.grid.dashed', true)
    .Set('background.grid.autofit.numhlines', 10) 
    .Set('background.grid.autofit.numvlines', 30)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')

    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#8ebfe3:rgba(255,255,255,0))'])
    .Set('colors', ['#56a1d9'])
    .Set('linewidth', 2)
    .Set('hmargin', 43)
    
    .Set('tooltips', momLables)
    .Set('tickmarks', 'circle')
    .Set('tickmarks.dot.color', ['#56a1d9'])

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
    .Set('colors', ['#56a1d9'])
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

/************************************************
** Draw Academic charts on the Dashboard - OLD WITH BUTTONS
************************************************/
function DrawMathChart(selectedButton, dataArr, labelArr)
{    
    /* Make a nice labels lists */
    var myToolTips = new Array();
    for(var i = 0; i < dataArr.length; i++)
    {
        myToolTips[i] = dataArr[i].toString() + ' %';
    }
    
    RGraph.Reset(document.getElementById('linechart'));
    var linechart = new RGraph.Line('linechart', dataArr)
    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#8ebfe3:rgba(255,255,255,0))'])
    .Set('colors', ['#56a1d9'])
    .Set('linewidth', 5)
    .Set('hmargin', 25)
    .Set('gutter.left', 0)
    .Set('ymax', 100)
    .Set('noyaxis', true)
    .Set('ylabels', false)
        
    .Set('labels', labelArr)
    .Set('tooltips', myToolTips)
    .Set('tickmarks', 'circle')
    .Set('tickmarks.dot.color', ['#56a1d9'])

    .Set('background.grid.autofit.numhlines', 10)
    .Set('background.grid.autofit.numvlines', 40)
    .Set('background.grid.dashed', true)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')
    .Draw();

    /*************************
    * Now select the button
    **************************/
    selectedButton.className = "chartbutton blueborder";
    selectedButton.getElementsByTagName('div')[0].className = "leftbutton bluehighlight";
    selectedButton.getElementsByTagName('h3')[0].className = "selected";

    var buttons = document.getElementsByClassName('chartbutton');
    for(var i=0; i < buttons.length; i++)
    {
        if(buttons[i] !== selectedButton)
        {
            buttons[i].className = "chartbutton";
            buttons[i].getElementsByTagName('div')[0].className = "leftbutton";
            buttons[i].getElementsByTagName('h3')[0].className = "";
        }
    } 
}

function DrawReadingChart(selectedButton, dataArr, labelArr)
{
    /* Make a nice labels lists */
    var myToolTips = new Array();
    for(var i = 0; i < dataArr.length; i++)
    {
        myToolTips[i] = dataArr[i].toString() + ' %';
    }
    
    RGraph.Reset(document.getElementById('linechart'));
    var readingChart = new RGraph.Line('linechart',dataArr)
    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#e78481:rgba(255,255,255,0))'])
    .Set('colors', ['#c73e3e'])
    .Set('linewidth', 5)
    .Set('hmargin', 25)
    .Set('gutter.left', 0)
    .Set('ymax', 100)
    .Set('noyaxis', true)
    .Set('ylabels', false)

    .Set('labels', labelArr)
    .Set('tooltips', myToolTips)
    .Set('tickmarks', 'circle')
    .Set('tickmarks.dot.color', ['#c73e3e'])

    .Set('background.grid.autofit.numhlines', 10)
    .Set('background.grid.autofit.numvlines', 40)
    .Set('background.grid.dashed', true)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')
    .Draw();
    
    /*************************
    * Now select the button
    **************************/
    selectedButton.className = "chartbutton blueborder";
    selectedButton.getElementsByTagName('div')[0].className = "leftbutton redhighlight";
    selectedButton.getElementsByTagName('h3')[0].className = "selected";

    var buttons = document.getElementsByClassName('chartbutton');
    for(var i=0; i < buttons.length; i++)
    {
        if(buttons[i] !== selectedButton)
        {
            buttons[i].className = "chartbutton";
            buttons[i].getElementsByTagName('div')[0].className = "leftbutton";
            buttons[i].getElementsByTagName('h3')[0].className = "";
        }
    } 
}

function DrawKnowledgeChart(selectedButton,dataArr, labelArr)
{    
    /* Make a nice labels lists */
    var myToolTips = new Array();
    for(var i = 0; i < dataArr.length; i++)
    {
        myToolTips[i] = dataArr[i].toString() + ' %';
    }
    
    RGraph.Reset(document.getElementById('linechart'));
    var knowledgeChart = new RGraph.Line('linechart', dataArr)
    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#39cf8e:rgba(255,255,255,0))'])
    .Set('colors', ['#58967b'])
    .Set('linewidth', 5)
    .Set('hmargin', 25)
    .Set('gutter.left', 0)
    .Set('ymax', 100)
    .Set('noyaxis', true)
    .Set('ylabels', false)
    
    .Set('labels', labelArr)
    .Set('tooltips', myToolTips)
    .Set('tickmarks', 'circle')
    .Set('tickmarks.dot.color', ['#58967b'])

    .Set('background.grid.autofit.numhlines', 10)
    .Set('background.grid.autofit.numvlines', 40)
    .Set('background.grid.dashed', true)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')
    .Draw();
    
    /*************************
    * Now select the button
    **************************/
    selectedButton.className = "chartbutton blueborder";
    selectedButton.getElementsByTagName('div')[0].className = "leftbutton greenhighlight";
    selectedButton.getElementsByTagName('h3')[0].className = "selected";

    var buttons = document.getElementsByClassName('chartbutton');
    for(var i=0; i < buttons.length; i++)
    {
        if(buttons[i] !== selectedButton)
        {
            buttons[i].className = "chartbutton";
            buttons[i].getElementsByTagName('div')[0].className = "leftbutton";
            buttons[i].getElementsByTagName('h3')[0].className = "";
        }
    } 
}

function DrawSolvingChart(selectedButton,dataArr,labelArr)
{    
    /* Make a nice labels lists */
    var myToolTips = new Array();
    for(var i = 0; i < dataArr.length; i++)
    {
        myToolTips[i] = dataArr[i].toString() + ' %';
    }
    
    RGraph.Reset(document.getElementById('linechart'));
    var solvingChart = new RGraph.Line('linechart', dataArr)
    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#be5ee1:rgba(255,255,255,0))'])
    .Set('colors', ['#975eac'])
    .Set('linewidth', 5)
    .Set('hmargin', 25)
    .Set('numxticks', 7)
    .Set('gutter.left', 0)
    .Set('noyaxis', true)
    .Set('ylabels', false)
    
    .Set('labels', labelArr)
    .Set('tooltips', myToolTips)
    .Set('tickmarks', 'circle')
    .Set('tickmarks.dot.color', ['#975eac'])

    .Set('background.grid.autofit.numhlines', 10)
    .Set('background.grid.autofit.numvlines', 40)
    .Set('background.grid.dashed', true)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')
    .Draw();

    /*************************
    * Now select the button
    **************************/
    selectedButton.className = "chartbutton blueborder";
    selectedButton.getElementsByTagName('div')[0].className = "leftbutton purplehighlight";
    selectedButton.getElementsByTagName('h3')[0].className = "selected";

    var buttons = document.getElementsByClassName('chartbutton');
    for(var i=0; i < buttons.length; i++)
    {
        if(buttons[i] !== selectedButton)
        {
            buttons[i].className = "chartbutton";
            buttons[i].getElementsByTagName('div')[0].className = "leftbutton";
            buttons[i].getElementsByTagName('h3')[0].className = "";
        }
    } 
}