<html>
<head>
<style type="text/css">
<!--
// This will be the place holder for the previewed data
#preview_text {  display:none;  }
-->
</style>

<script language="javascript">
<!--
// This function checks if the place holder exists and set to hidden, if so changes it to display information in text box
function show_lay()
{  	
  if(document.getElementById)   	
  {   		
    var lay = document.getElementById("preview_text");  		
    if( lay.style.display = "none")   		
    {  			
      lay.style.display = 'block';  		
    }  	
  }
}

function preview()
{  	
   // This will take the text entered in the text box and assign it to the preview placeholder area
   document.getElementById('preview_text').innerHTML = document.dataform.data.value;  	
}
 -->
</script>
</head>
<body>
<center>
<div id="preview_text">Preview goes here</div>  <h2>THIS IS A TEST</h2>  <hr>

<form name="dataform">
<textarea name="data" rows="15" cols="30"></textarea>  <br>
<input type="button" value="Preview" onClick="preview();show_lay();">
</form>
</center>
</body>
</html>