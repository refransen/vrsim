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
    .Set('hmargin', ((350) / lineDataArr.length) / 2)

    .Set('ymax', 100)
    .Set('gutter.left', 40)
    .Set('ylabels', false)
    .Set('noaxes', true)
    .Draw();

    /********************
    *  Draw the bar chart, hiding the background grid and axes
    ********************/
    var bar = new RGraph.Bar('academicskills', dataArr)
    .Set('colors', ['#b848d0'])
    .Set('ymax', 100)
    .Set('background.grid', false) 
    .Set('ylabels.count', 3)
    .Set('ylabels.specific', ['100%', '50%', '0%'])
    .Set('labels', labelsArr)

    .Set('labels.above.specific', specificLables)
    .Set('hmargin', 15)
    .Set('gutter.left', 40)
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
    .Set('hmargin', ((350) / lineDataArr.length) / 2)

    .Set('ymax', 100)
    .Set('gutter.left', 40)
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
    .Set('labels', labelsArr)
    .Draw();
}


function DrawBuildingSkills(dataArr, labelsArr)
{
    var specificLables = new Array();
    for(var i=0; i < dataArr.length; i++)
    {
        specificLables[i] = dataArr[i] + '%';
    }

    var barchart = new RGraph.Bar('buildingskills', dataArr)
    .Set('background.grid.dashed', true)
    .Set('background.grid.autofit.numhlines', 10)
    .Set('background.grid.autofit.numvlines', 40)

    .Set('chart.background.barcolor1', '#fafafa')
    .Set('chart.background.barcolor2', '#fafafa')
    .Set('ymax', 100)
    .Set('numyticks', 10)
    .Set('gutter.left', 40)
    .Set('hmargin', 15)

    .Set('ylabels.count', 3)
    .Set('ylabels.specific', ['100%', '50%', '0%'])
    .Set('labels', labelsArr)
    .Set('labels.above.specific', specificLables)

    .Set('colors', ['#f58323'])
    .Draw();
}



