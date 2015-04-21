
<html>
	<head>
		<title>Data Science Podcasts</title>
	</head>
<body>
<?php
		$files = scandir("feeds");
		foreach ($files as $file) {
		$l = strlen($file);
		$ext = substr($file, $l-4, $l);
		if ($ext == ".rss") {
			// TODO: change to title of podcast
			$path="./feeds/" . $file;
			$xml=simplexml_load_file($path) or die("Error: Cannot create object"); 
			echo "<h1>" . $xml->channel->title . "</h1>"; 
			echo("<h2>" . $file . "</h2>");
			// TODO: put a pretty, responsive output of the metadata
		
			//$xml=simplexml_load_file($path) or die("Error: Cannot create object"); //XML file loaded for parsing
			 //Parsed and get title
			echo "<img src=" . $xml->channel->image->url ." height=200 width=250>";
			// TODO: extract title, image, other metadata
			foreach($xml->channel->children() as $meta) {
				echo $meta->link . "<br>";
				// TODO: list only the most recent 3 episodes
			}
			// TODO: link to a dynamic subpage that displays all the episodes
		}
	}
?>
<hr/>
(c) 2016
</body>
</html>
