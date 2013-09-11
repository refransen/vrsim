////////////////////////////////////////////////////////
// Created by: Rachel Fransen
// Custom functions for the Lesson Navigation Page
////////////////////////////////////////////////////////

// Defaults only allow GMAW content to show
if(Y.one('#section-4'))
{
    Y.one('#section-4').setStyle('display', 'none');   // practice topic
    Y.one('#section-5').setStyle('display', 'none');  //resources
    Y.one('#section-6').setStyle('display', 'none');  //SMAW
    Y.one('#section-7').setStyle('display', 'none');  //SMAW
    Y.one('#section-8').setStyle('display', 'none');  //SMAW
	    
    Y.one("#practiceButton").on("click", function(e) 
	{
	    // set the colores
	    this.set('className', 'selectedButton');
	    Y.one('#gmawButton').set('className', 'crsNavButton');
	    Y.one('#smawButton').set('className', 'crsNavButton');
	    Y.one('#fcawbutton').set('className', 'crsNavButton');
	    Y.one('#pipeButton').set('className', 'crsNavButton');
	
	    Y.one('#section-1').setStyle('display', 'none');
	    Y.one('#section-2').setStyle('display', 'none');
	    Y.one('#section-3').setStyle('display', 'none');
	    Y.one('#section-4').setStyle('display', 'inline-block');  // practice topic
	    Y.one('#section-5').setStyle('display', 'none');  //resources
	    Y.one('#section-6').setStyle('display', 'none');  //SMAW
	    Y.one('#section-7').setStyle('display', 'none');  //SMAW
	    Y.one('#section-8').setStyle('display', 'none');  //SMAW
	
	
	    Y.one('.pracgrouptitle').setStyle('display', 'inline-block');
	    Y.one('.pracgroupdesc').setStyle('display', 'inline-block');
	    Y.one('.gmawgrouptitle').setStyle('display', 'none');
	    Y.one('.gmawgroupdesc').setStyle('display', 'none');
	    Y.one('.smawgrouptitle').setStyle('display', 'none');
	    Y.one('.smawgroupdesc').setStyle('display', 'none');
	    Y.one('.fcawgrouptitle').setStyle('display', 'none');
	    Y.one('.fcawgroupdesc').setStyle('display', 'none');
	    Y.one('.pipegrouptitle').setStyle('display', 'none');
	    Y.one('.pipegroupdesc').setStyle('display', 'none');
	
	});
	
     //---------------
     Y.one("#gmawButton").on("click", function(e) 
	{
	    this.set('className', 'selectedButton');
	    Y.one('#practiceButton').set('className', 'crsNavButton');
	    Y.one('#smawButton').set('className', 'crsNavButton');
	    Y.one('#fcawbutton').set('className', 'crsNavButton');
	    Y.one('#pipeButton').set('className', 'crsNavButton');
	
	    Y.one('#section-1').setStyle('display', 'inline-block');
	    Y.one('#section-2').setStyle('display', 'inline-block');
	    Y.one('#section-3').setStyle('display', 'inline-block');
	    Y.one('#section-4').setStyle('display', 'none');  // practice topic
	    Y.one('#section-5').setStyle('display', 'none');  //resources
	    Y.one('#section-6').setStyle('display', 'none');  //SMAW
	    Y.one('#section-7').setStyle('display', 'none');  //SMAW
	    Y.one('#section-8').setStyle('display', 'none');  //SMAW
	
	
	    Y.one('.gmawgrouptitle').setStyle('display', 'inline-block');
	    Y.one('.gmawgroupdesc').setStyle('display', 'inline-block');
	    Y.one('.pracgrouptitle').setStyle('display', 'none');
	    Y.one('.pracgroupdesc').setStyle('display', 'none');
	    Y.one('.smawgrouptitle').setStyle('display', 'none');
	    Y.one('.smawgroupdesc').setStyle('display', 'none');
	    Y.one('.fcawgrouptitle').setStyle('display', 'none');
	    Y.one('.fcawgroupdesc').setStyle('display', 'none');
	    Y.one('.pipegrouptitle').setStyle('display', 'none');
	    Y.one('.pipegroupdesc').setStyle('display', 'none');
	});
	
     //---------------
     Y.one("#smawButton").on("click", function(e) 
	{
	    this.set('className', 'selectedButton');
	    Y.one('#practiceButton').set('className', 'crsNavButton');
	    Y.one('#gmawButton').set('className', 'crsNavButton');
	    Y.one('#fcawbutton').set('className', 'crsNavButton');
	    Y.one('#pipeButton').set('className', 'crsNavButton');
	
	    Y.one('#section-1').setStyle('display', 'none');
	    Y.one('#section-2').setStyle('display', 'none');
	    Y.one('#section-3').setStyle('display', 'none');
	    Y.one('#section-4').setStyle('display', 'none');  // practice topic
	    Y.one('#section-5').setStyle('display', 'none');  //resources
	    Y.one('#section-6').setStyle('display', 'inline-block');  //SMAW
	    Y.one('#section-7').setStyle('display', 'inline-block');  //SMAW
	    Y.one('#section-8').setStyle('display', 'inline-block');  //SMAW
	
	    Y.one('.smawgrouptitle').setStyle('display', 'inline-block');
	    Y.one('.smawgroupdesc').setStyle('display', 'inline-block');
	    Y.one('.pracgrouptitle').setStyle('display', 'none');
	    Y.one('.pracgroupdesc').setStyle('display', 'none');
	    Y.one('.gmawgrouptitle').setStyle('display', 'none');
	    Y.one('.gmawgroupdesc').setStyle('display', 'none');
	    Y.one('.fcawgrouptitle').setStyle('display', 'none');
	    Y.one('.fcawgroupdesc').setStyle('display', 'none');
	    Y.one('.pipegrouptitle').setStyle('display', 'none');
	    Y.one('.pipegroupdesc').setStyle('display', 'none');
	});
	
     //---------------
     Y.one("#fcawbutton").on("click", function(e) 
	{
	    this.set('className', 'selectedButton');
	    Y.one('#practiceButton').set('className', 'crsNavButton');
	    Y.one('#gmawButton').set('className', 'crsNavButton');
	    Y.one('#smawButton').set('className', 'crsNavButton');
	    Y.one('#pipeButton').set('className', 'crsNavButton');
	
	    Y.one('#section-1').setStyle('display', 'none');
	    Y.one('#section-2').setStyle('display', 'none');
	    Y.one('#section-3').setStyle('display', 'none');
	    Y.one('#section-4').setStyle('display', 'none');  // practice topic
	    Y.one('#section-5').setStyle('display', 'none');  //resources
	    Y.one('#section-6').setStyle('display', 'none');  //SMAW
	    Y.one('#section-7').setStyle('display', 'none');  //SMAW
	    Y.one('#section-8').setStyle('display', 'none');  //SMAW
	    
	
	    Y.one('.fcawgrouptitle').setStyle('display', 'inline-block');
	    Y.one('.fcawgroupdesc').setStyle('display', 'inline-block');
	    Y.one('.pracgrouptitle').setStyle('display', 'none');
	    Y.one('.pracgroupdesc').setStyle('display', 'none');
	    Y.one('.smawgrouptitle').setStyle('display', 'none');
	    Y.one('.smawgroupdesc').setStyle('display', 'none');
	    Y.one('.gmawgrouptitle').setStyle('display', 'none');
	    Y.one('.gmawgroupdesc').setStyle('display', 'none');
	    Y.one('.pipegrouptitle').setStyle('display', 'none');
	    Y.one('.pipegroupdesc').setStyle('display', 'none');
	});
	
     //---------------
     Y.one("#pipeButton").on("click", function(e) 
	{
	    this.set('className', 'selectedButton');
	    Y.one('#practiceButton').set('className', 'crsNavButton');
	    Y.one('#gmawButton').set('className', 'crsNavButton');
	    Y.one('#smawButton').set('className', 'crsNavButton');
	    Y.one('#fcawbutton').set('className', 'crsNavButton');
	
	    Y.one('#section-1').setStyle('display', 'none');
	    Y.one('#section-2').setStyle('display', 'none');
	    Y.one('#section-3').setStyle('display', 'none');
	    Y.one('#section-4').setStyle('display', 'none');  // practice topic
	    Y.one('#section-5').setStyle('display', 'none');  //resources
	    Y.one('#section-6').setStyle('display', 'none');  //SMAW
	    Y.one('#section-7').setStyle('display', 'none');  //SMAW
	    Y.one('#section-8').setStyle('display', 'none');  //SMAW
	
	    Y.one('.pipegrouptitle').setStyle('display', 'inline-block');
	    Y.one('.pipegroupdesc').setStyle('display', 'inline-block');
	    Y.one('.pracgrouptitle').setStyle('display', 'none');
	    Y.one('.pracgroupdesc').setStyle('display', 'none');
	    Y.one('.smawgrouptitle').setStyle('display', 'none');
	    Y.one('.smawgroupdesc').setStyle('display', 'none');
	    Y.one('.fcawgrouptitle').setStyle('display', 'none');
	    Y.one('.fcawgroupdesc').setStyle('display', 'none');
	    Y.one('.gmawgrouptitle').setStyle('display', 'none');
	    Y.one('.gmawgroupdesc').setStyle('display', 'none');
	});

}