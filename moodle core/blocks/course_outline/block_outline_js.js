function showHideAttempts(myelement)
{
    var children = myelement.getElementsByClassName("outlineattempt");

    for(var i = 0; i < children.length; i++)
    {
        if(children[i].style.display == "block")
        {  children[i].style.display = "none";  }
        else 
        {  children[i].style.display = "block";  }
    }
}

function showHideProjects(myelement)
{
    var children = document.getElementsByClassName("outlineproject");

    for(var i = 0; i < children.length; i++)
    {
        if(children[i].id == myelement.id)
        {
            if(children[i].style.display == "block")
            {  children[i].style.display = "none";  }
            else 
            {  children[i].style.display = "block";  }
        }
    }
}
