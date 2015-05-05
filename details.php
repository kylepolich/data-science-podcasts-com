<html>
	<head>
		<title>Data Science Podcasts</title>
	</head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script language="javascript" src="js/jquery-2.1.0.min.js"></script>
    <script language="javascript" src="js/bootstrap.min.js"></script>
<body>
<?php

$file=$_GET["p"];
	//	$files = scandir("feeds");
	//	foreach ($files as $file) {
		$l = strlen($file);
		$ext = substr($file, $l-4, $l);
		if ($ext == ".rss") {
			// TODO: change to title of podcast  ... Done
			$path="./feeds/" . $file;
			$xml=simplexml_load_file($path) or die("Error: Cannot create object"); 
			?>
			<div class="container">
            	<div class="row">
			<?php
			echo "<h1 class=\"chanel-title\"><a href=details.php?p=$file>" .  $xml->channel->title . "</a></h1>"; 
			//echo("<h2 class=\"file-nam\">". $file . "</h2>");
			// TODO: put a pretty, responsive output of the metadata
		
			echo "<img src=" . $xml->channel->image->url ." class=\"imgz img-responsive\" height=200 width=250>";
			// TODO: extract title, image, other metadata
			
			foreach($xml->channel->children() as $meta) {
				//echo $meta->link . "<br>";
				
				if(empty($meta))
				{
					echo"";
				}
				else
				{
					?>
				
					<div class="row inner-row">
                    	<div class="col-sm-6"><?php echo "<p class=\"meta-link\" style=\"padding:5px;\">$meta->title </p>"  ; ?></div>
                        <div class="col-sm-6"><?php echo "<p style=\"padding:5px;\" class=\"meta-link\">$meta->pubDate</p>"  ; ?></div>
                        <div class="col-sm-12"><?php echo "<p style=\"padding:5px;\" class=\"meta-link\"><a href=\"$meta->link\" >$meta->link</a></p>"  ; ?></div>
                    </div><!-- inner row  -->
				<?php
				//echo "<p class=\"meta-link\"><a href=\"$meta->link\" >$meta->link</a></p>"  ;
				// TODO: list only the most recent 3 episodes	
				}
				
		}
			?>
            	</div><!-- row end here -->
			</div>	<!-- container end here -->
			<?php	
			// TODO: link to a dynamic subpage that displays all the episodes
		}
	
?>
(c) 2016
</body>
</html>