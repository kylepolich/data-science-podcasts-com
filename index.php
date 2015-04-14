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
