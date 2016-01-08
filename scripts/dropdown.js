var slideheights = [];
function load()
{
	var i;
	for(i=0;i<NUM_SLIDES;i++)
	{
		var d = document.getElementById("slide_"+i);
		var b = document.getElementById("slide_button_"+i);
		var l = document.getElementById("slide_li_"+i);
		slideheights[i] = d.clientHeight;
		
		d.style.height="0px";
		b.innerHTML = "+";
		l.setAttribute("style", "-webkit-border-bottom-right-radius: 5px;-moz-border-radius-bottomright: 5px;-webkit-border-bottom-left-radius: 5px;-moz-border-radius-bottomleft: 5px;margin-bottom:5px; font-size:18px;"); 
		b.setAttribute("style","-webkit-border-bottom-left-radius: 5px;-moz-border-radius-bottomleft: 5px;");
	}

	
}
function expand(id)
{
	
	if(document.getElementById("slide_button_"+id).innerHTML!="+")
	{
		var d = document.getElementById("slide_"+id);
		d.style.height = '0px';
		
		var b = document.getElementById("slide_button_"+id);
		b.innerHTML = "+";
		
		var l = document.getElementById("slide_li_"+id);
	
		step(1,function(){ 
		if(d.style.height=="0px")
		{
		l.setAttribute("style", "-webkit-border-bottom-right-radius: 5px;-moz-border-radius-bottomright: 5px;-webkit-border-bottom-left-radius: 5px;-moz-border-radius-bottomleft: 5px;margin-bottom:5px; font-size:18px;"); 
		b.setAttribute("style","-webkit-border-bottom-left-radius: 5px;-moz-border-radius-bottomleft: 5px;");
		}
		});
	}
	else
	{
		var d = document.getElementById("slide_"+id);
		
		d.style.height=slideheights[id];
		
		var l = document.getElementById("slide_li_"+id);
		
		var b = document.getElementById("slide_button_"+id);
		b.innerHTML = "-";
		
		l.setAttribute("style", "-webkit-border-bottom-right-radius: 0px;-moz-border-radius-bottomright: 0px;-webkit-border-bottom-left-radius: 0px;-moz-border-radius-bottomleft: 0px;margin-bottom:0px;");
		b.setAttribute("style","-webkit-border-bottom-left-radius: 0px;-moz-border-radius-bottomleft: 0px;");
		
		step(2,function(){ 
			d.style.opacity = '100'; 
		});
	}
}

function step(seconds, action)
{
	var counter = 0;
    var time = window.setInterval( function ()
    {
        counter++;
        if ( counter >= seconds )
        {
            action();
            window.clearInterval( time );
        }
    }, 1000 );
}
