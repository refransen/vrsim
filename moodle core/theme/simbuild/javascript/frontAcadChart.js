window.onload = function ()
{
    /**** Always display the math chart and button first ********/
    var mathButton = document.getElementsByClassName('chartbutton')[0];
    DrawMathChart(mathButton);
    
    var yaxis = new RGraph.Drawing.YAxis('axes', 57)
    .Set('max', linechart.max)
    .Set('numticks', 2)
    .Set('colors', ['black'])
    .Set('numlabels', 3)
    .Set('labels.specific', ['Excellent','Good','Poor'])
    .Draw();
}

function DrawMathChart(selectedButton)
{
    RGraph.Reset(document.getElementById('linechart'));
    var linechart = new RGraph.Line('linechart', [50, 40, 30, 50, 75, 75, 75, 50, 40, 30, 50, 75, 75, 75])
    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#8ebfe3:rgba(255,255,255,0))'])
    .Set('colors', ['#56a1d9'])
    .Set('linewidth', 5)
    .Set('hmargin', 25)
    .Set('gutter.left', 0)
    .Set('ymax', 100)
    .Set('noyaxis', true)
    .Set('ylabels', false)
        
    .Set('labels', ['Mon','Tues','Wed','Thur','Fri','Sat','Sun', 'Mon','Tues','Wed','Thur','Fri','Sat','Sun'])
    .Set('tooltips', ['Mon','Tues','Wed','Thur','Fri','Sat','Sun', 'Mon','Tues','Wed','Thur','Fri','Sat','Sun'])
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
    selectedButton.getElementsByTagName('div')[0].className = "leftbutton blue";
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

function DrawReadingChart(selectedButton)
{
    RGraph.Reset(document.getElementById('linechart'));
    var readingChart = new RGraph.Line('linechart', [80, 25, 43, 50, 37, 37, 37, 80, 25, 43, 50, 37, 37, 37])
    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#e78481:rgba(255,255,255,0))'])
    .Set('colors', ['#c73e3e'])
    .Set('linewidth', 5)
    .Set('hmargin', 25)
    .Set('gutter.left', 0)
    .Set('ymax', 100)
    .Set('noyaxis', true)
    .Set('ylabels', false)

    .Set('labels', ['Mon','Tues','Wed','Thur','Fri','Sat','Sun', 'Mon','Tues','Wed','Thur','Fri','Sat','Sun'])
    .Set('tooltips', ['Mon','Tues','Wed','Thur','Fri','Sat','Sun', 'Mon','Tues','Wed','Thur','Fri','Sat','Sun'])
    .Set('tickmarks', 'circle')
    .Set('tickmarks.dot.color', ['#c73e3e'])

    .Set('background.grid.autofit.numhlines', 10)
    .Set('background.grid.autofit.numvlines', 30)
    .Set('background.grid.dashed', true)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')
    .Draw();
    
    /*************************
    * Now select the button
    **************************/
    selectedButton.className = "chartbutton blueborder";
    selectedButton.getElementsByTagName('div')[0].className = "leftbutton blue";
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

function DrawKnowledgeChart(selectedButton)
{
    RGraph.Reset(document.getElementById('linechart'));
    var knowledgeChart = new RGraph.Line('linechart', [25, 30, 62, 50, 72, 72, 60, 25, 30, 62, 50, 72, 72, 60])
    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#39cf8e:rgba(255,255,255,0))'])
    .Set('colors', ['#58967b'])
    .Set('linewidth', 5)
    .Set('hmargin', 25)
    .Set('gutter.left', 0)
    .Set('ymax', 100)
    .Set('noyaxis', true)
    .Set('ylabels', false)
    
    .Set('labels', ['Mon','Tues','Wed','Thur','Fri','Sat','Sun', 'Mon','Tues','Wed','Thur','Fri','Sat','Sun'])
    .Set('tooltips', ['Mon','Tues','Wed','Thur','Fri','Sat','Sun', 'Mon','Tues','Wed','Thur','Fri','Sat','Sun'])
    .Set('tickmarks', 'circle')
    .Set('tickmarks.dot.color', ['#58967b'])

    .Set('background.grid.autofit.numhlines', 10)
    .Set('background.grid.autofit.numvlines', 30)
    .Set('background.grid.dashed', true)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')
    .Draw();
    
    /*************************
    * Now select the button
    **************************/
    selectedButton.className = "chartbutton blueborder";
    selectedButton.getElementsByTagName('div')[0].className = "leftbutton blue";
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

function DrawSolvingChart(selectedButton)
{
    RGraph.Reset(document.getElementById('linechart'));
    var solvingChart = new RGraph.Line('linechart', [43, 47, 50, 67, 75, 25, 25, 43, 47, 50, 67, 75, 25, 25])
    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#be5ee1:rgba(255,255,255,0))'])
    .Set('colors', ['#975eac'])
    .Set('linewidth', 5)
    .Set('hmargin', 25)
    .Set('numxticks', 7)
    .Set('gutter.left', 0)
    .Set('noyaxis', true)
    .Set('ylabels', false)
    
    .Set('labels', ['Mon','Tues','Wed','Thur','Fri','Sat','Sun', 'Mon','Tues','Wed','Thur','Fri','Sat','Sun'])
    .Set('tooltips', ['Mon','Tues','Wed','Thur','Fri','Sat','Sun', 'Mon','Tues','Wed','Thur','Fri','Sat','Sun'])
    .Set('tickmarks', 'circle')
    .Set('tickmarks.dot.color', ['#975eac'])

    .Set('background.grid.autofit.numhlines', 10)
    .Set('background.grid.autofit.numvlines', 30)
    .Set('background.grid.dashed', true)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')
    .Draw();

    /*************************
    * Now select the button
    **************************/
    selectedButton.className = "chartbutton blueborder";
    selectedButton.getElementsByTagName('div')[0].className = "leftbutton blue";
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