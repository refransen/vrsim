function DrawConstructionReport(dataArr, labelsArr)
{
    RGraph.Reset(document.getElementById('constructionStudent'));
    var linechart = new RGraph.Line('constructionStudent', dataArr)
    .Set('filled', true)
    .Set('fillstyle', ['Gradient(#ef9c50:rgba(255,255,255,0))'])
    .Set('colors', ['#a94416'])
    .Set('linewidth', 5)
    .Set('hmargin', 25)
    .Set('gutter.left', 0)
    .Set('ymax', 100)
    .Set('noyaxis', true)
    .Set('ylabels', false)
        
    .Set('labels', labelsArr)
    .Set('tooltips', labelsArr)
    .Set('tickmarks', 'circle')
    .Set('tickmarks.dot.color', ['#a94416'])

    .Set('background.grid.autofit.numhlines', 10)
    .Set('background.grid.autofit.numvlines', 40)
    .Set('background.grid.dashed', true)
    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')
    .Draw();
}