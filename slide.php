
<html>
<head>

<!--image slide show-->
<link rel="stylesheet" href="nivo-slider/nivo-slider.css" type="text/css" media="screen" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="nivo-slider/jquery.nivo.slider.pack.js" type="text/javascript"></script>


<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider();
});
</script>

</head>



<body>
<div class="slider-wrapper">
    <div id="slider" class="nivoSlider">
        <img src="nivo-slider/demo/images/nemo.jpg" alt="" />
        <a href="http://dev7studios.com"><img src="nivo-slider/demo/images/toystory.jpg" alt="" title="#htmlcaption" /></a>
        <img src="nivo-slider/demo/images/up.jpg" alt="" title="This is an example of a caption" />
        <img src="nivo-slider/demoimages/walle.jpg" alt="" />
    </div>
</div>
<div id="htmlcaption" class="nivo-html-caption">
    <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
</div>
</body>
</html>