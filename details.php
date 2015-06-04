<html>
	<head>
		<title>Data Science Podcasts</title>
	</head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
            	<div class="row main-row">
			<?php
			//echo "<h1 class=\"chanel-title\"><a href=details.php?p=$file>" .  $xml->channel->title . "</a></h1>"; 
			//echo("<h2 class=\"file-nam\">". $file . "</h2>");
			// TODO: put a pretty, responsive output of the metadata
		
			//echo "<img src=" . $xml->channel->image->url ." class=\"imgz img-responsive\" height=200 width=250>";
			// TODO: extract title, image, other metadata
				?>
                	<div class="row">
                    	<div class="col-sm-3">
                        	<?php
                            	echo "<img src=" . $xml->channel->image->url ." class=\"imgz img-responsive\" height=200 width=250>";
							?>
                        </div><!-- col-sm-4 end here -->
                        <div class="col-sm-9">
                        	<?php
                            	echo "<h1 class=\"chanel-title\">" .  $xml->channel->title . "</h1>";
								echo "<p class=\"chanel-detail\" style=\"padding-left:36px;\">".date('n/j/Y H:i:s',strtotime($xml->channel->lastBuildDate))."</p>";
								$a=strip_tags($xml->channel->description);
								echo "<p class=\"chanel-detail\" style=\"padding-left:36px;\">". $a ."</p>";
							?>
                        </div><!-- col-sm-8 end here -->
                    </div>
				<?php
			
			$count = 0 ;
			foreach($xml->channel->children() as $meta) {
				//echo $meta->link . "<br>";
				if(empty($meta) )
				{
					echo "";
				}
				else
				{
								?>
					
							<div class="row inner-row">
							<div class="col-sm-6"><?php echo "<p class=\"meta-link\" style=\"padding:5px;\"><b>Title: $meta->title </b></p>"  ; ?></div>
							<div class="col-sm-6"><?php echo "<p style=\"padding:5px;\" class=\"meta-link\"><b>Publish Date & Time: </b>".date('n/j/Y H:i:s',strtotime($meta->pubDate))."</p>"  ; ?></div>
							
                            <div class="col-sm-12">
	<?php 
	if(str_word_count($meta->description)<200)
	echo $meta->description;
	else
{
	
	$x=strip_tags($meta->description);
	echo implode(' ', array_slice(str_word_count($x, 2), 0, 200)) . " <a href='#'>Read More</a>";
}?></div>    
						</div><!-- inner row  -->
							<?php
                            			
				
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
