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
				<section>
					<h1>ENTIDADES</h1>
				</section>
				<section>
					<ul>
						<li>PAIS</li>
						<li>CIUDAD</li>
						<li>INSTITUCION</li>
						<li>PROGRAMA</li>
						<li>DOCENTE</li>
						<li>DEPARTAMENTO</li>
					</ul>
					<aside class="notes">
						<ul>
							<li>Entidades principales</li>
							<li>Dependencia de pais ciudad</li>
							<li>Relacion M-N en Programa-Programa y Programa Docente</li>
							<li>Programa-Programa es prerequisitos</li>
						</ul>
					</aside>
				</section>
				<section>
					<ul>
						<li>TIPO DOCENTE</li>
						<li>TIPO PROGRAMA</li>
						<li>TIPO INSTITUCION</li>
						<li>ENFOQUE</li>
					</ul>
					<aside class="notes"></aside>
				</section>
				<section>
					<h3>ENTIDADES DE ROMPIMIENTO</h3>
					<ul>
						<li>PROGRAMA PROGRAMA</li>
						<li>PROGRAMA DOCENTE</li>
					</ul>
					<aside class="notes"></aside>
				</section>
			</section>
			<section>
				<section>
					<h2>MODELOS</h2>
				</section>
				<section>
					<h3>CONCEPTUAL</h3>
					<img style="height: 450px" src="src/conceptual.png">
				</section>
				<section>
					<h3>LOGICO</h3>
					<img style="height: 450px" src="src/logico.png">
				</section>
				<section>
					<h3>FISICO</h3>
					<img style="height: 450px" src="src/fisico.png">
				</section>
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

			transition: 'fade', // none/fade/slide/convex/concave/zoom

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