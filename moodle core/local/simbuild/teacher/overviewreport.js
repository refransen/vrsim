function DrawOverallChart(dataArr, labelsArr)
{
    RGraph.Reset(document.getElementById('overallstudent'));
    var linechart = new RGraph.Line('overallstudent', dataArr)
    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#aadf5d:rgba(217,229,127,0))'])
    .Set('colors', ['#3d7105'])
    .Set('linewidth', 5)
    .Set('hmargin', 25)
    .Set('gutter.left', 0)
    .Set('ymax', 100)
    .Set('noyaxis', true)
    .Set('ylabels', false)
        
    .Set('labels', labelsArr)
    .Set('tooltips', labelsArr)
    .Set('tickmarks', 'circle')
    .Set('tickmarks.dot.color', ['#3d7105'])

    .Set('background.grid.autofit.numhlines', 10)
    .Set('background.grid.autofit.numvlines', 40)
    .Set('background.grid.dashed', true)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')
    .Draw();
}

function DrawWeeklyChart(dataArr, labelsList)
{
    RGraph.Reset(document.getElementById('overallstudent'));
    var linechart = new RGraph.Line('overallstudent', dataArr)
    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#aadf5d:rgba(217,229,127,0))'])
    .Set('colors', ['#3d7105'])
    .Set('linewidth', 5)
    .Set('hmargin', 25)
    .Set('gutter.left', 0)
    .Set('ymax', 100)
    .Set('noyaxis', true)
    .Set('ylabels', false)
        
    .Set('labels', labelsList)
    .Set('tooltips', labelsList)
    .Set('tickmarks', 'circle')
    .Set('tickmarks.dot.color', ['#3d7105'])

    .Set('background.grid.autofit.numhlines', 10)
    .Set('background.grid.autofit.numvlines', 40)
    .Set('background.grid.dashed', true)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')
    .Draw();
}

function DrawMonthlyChart(dataArr, labelsArr)
{
    RGraph.Reset(document.getElementById('overallstudent'));
    var linechart = new RGraph.Line('overallstudent', dataArr)
    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#aadf5d:rgba(217,229,127,0))'])
    .Set('colors', ['#3d7105'])
    .Set('linewidth', 5)
    .Set('hmargin', 25)
    .Set('gutter.left', 0)
    .Set('ymax', 100)
    .Set('noyaxis', true)
    .Set('ylabels', false)
        
    .Set('labels', labelsArr)
    .Set('tooltips', labelsArr)
    .Set('tickmarks', 'circle')
    .Set('tickmarks.dot.color', ['#3d7105'])

    .Set('background.grid.autofit.numhlines', 10)
    .Set('background.grid.autofit.numvlines', 40)
    .Set('background.grid.dashed', true)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')
    .Draw();
}