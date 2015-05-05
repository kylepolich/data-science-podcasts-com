<html>
<body>
<h1>Data Science Podcasts</h1>
<?php
	$files = scandir("feeds");
	foreach ($files as $file) {
		$l = strlen($file);
		$ext = substr($file, $l-4, $l);
		if ($ext == ".rss") {
			echo("<h2>" . $file . "</h2>");
	$xml=simplexml_load_file(".\\feeds\\data-skeptic.rss") or die("Error: Cannot create object"); //XML file loaded for parsing
	echo $xml->channel->title . "<br>";  //Parsed and get title
	echo "<img src=" . $xml->channel->image->url ." height=200 width=250>"; // 
	foreach($xml->channel->children() as $meta) {
	echo $meta->link . "<br>";
	 }
			// TODO: open XML file, parse it
			// TODO: extract title, image, other metadata
			// TODO: link to a dynamic subpage that displays all the episodes
		}
	}
?>
<hr/>
(c) 2016
</body>
</html>
