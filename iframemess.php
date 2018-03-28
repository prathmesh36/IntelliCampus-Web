<?php
require 'assets/backend/connect.php';
require 'assets/backend/core.php';
require 'assets/backend/data.php';
$inner=$_GET['id'];
 ?>
 <style>
	 .element::-webkit-scrollbar { width: 0 !important }
	.element { overflow: -moz-scrollbars-none; }
	.element { -ms-overflow-style: none; }

	.element, .outer-container {
	 width: 270px;
	 height: 280px;
	}
	 
	.outer-container {
	 padding-right:0px;
	 position: relative;
	 overflow: hidden;
	}
	 
	.inner-container {
	 position: absolute;
	 left: 0;
	 overflow-x: hidden;
	 overflow-y: scroll;
	}
	 
	.inner-container::-webkit-scrollbar {
	 display: none;
	}
</style>

 <div class="outer-container">
 <iframe class="inner-container" id="overin" src="iframemmess.php?id=<?php echo $inner; ?>" name="messframen" width="300px" height="300px" style="position:relative;top:-40px;left:-5px;border:1px solid silver;"></iframe></div>
    <script type="text/javascript">
var myIframe = document.getElementById('overin');
myIframe.onload = function () {
    myIframe.contentWindow.scrollTo(3500,3500);
}
 </script>
<br>
<br>
 <?php
 include 'reply_mess.php';
 ?>
