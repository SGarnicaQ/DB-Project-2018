<?php 
	include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>SLIDES</title>
	<link rel="stylesheet" href="Presentacion/css/reveal.css">
	<link rel="stylesheet" href="Presentacion/lib/css/zenburn.css">
	<link rel="stylesheet" href="Presentacion/css/theme/black.css">
	
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>
	<div class="reveal">
		<div class="slides">
			<section>
				<section>
					<h1>Formacion pedagogica de los docentes Universidad Nacional</h1>
				</section>
				<section>
					<h4>Integrantes</h4>
					<ul>
						<li>Sebastian</li>
						<li>Nicolas</li>
						<li>Andres</li>
					</ul>
				</section>
			</section>
			<section>
				<h1>hola</h1>
			</section>
		</div>
	</div>

	<script src="Presentacion/lib/js/head.min.js"></script>
	<script src="Presentacion/js/reveal.js"></script>

	<script>
		Reveal.initialize({
			controls: true,
			progress: true,
			history: true,
			center: true,

			transition: 'slide', // none/fade/slide/convex/concave/zoom

			dependencies: [

			{ src: 'Presentacion/lib/js/classList.js', condition: function()
			{ return !document.body.classList; } },

			{ src: 'Presentacion/plugin/markdown/marked.js', condition: function() 
			{ return !!document.querySelector( '[data-markdown]' ); } },

			{ src: 'Presentacion/plugin/markdown/markdown.js', condition: function() 
			{ return !!document.querySelector( '[data-markdown]' ); } },

			{ src: 'Presentacion/plugin/highlight/highlight.js', async: true, callback: function()
			{ hljs.initHighlightingOnLoad(); } },

			{ src: 'Presentacion/plugin/zoom-js/zoom.js', async: true },

			{ src: 'Presentacion/plugin/notes/notes.js', async: true }
			]
		});
	</script>
</body>
</html>