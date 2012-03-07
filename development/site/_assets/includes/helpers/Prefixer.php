<form action="?" method="post" accept-charset="utf-8">
<textarea name="prefix" rows="7" cols="35">
/* comment */
body {  text-decoration: none;
            color: navy;
            font-family: "arial";
            font-size: 12pt;
            font-weight: medium; }
.title {  text-decoration: bold;
             color: green;
             font-family: "ms sans serif";
             font-size: 24pt;
             font-weight: heavy; }
.bold {  text-decoration: bold;
             color: black;
             font-family: "courier, arial";
             font-size: 14pt;
             font-weight: heavy; }
a:link {  text-decoration: none;
             color: red;
             font-family: "ms sans serif";
             font-size: 12pt;
             font-weight: heavy; }
.head  {  color: #000000;
             font-family: "ms sans serif";
             font-size: 35px;
             margin-top: 35px;
             margin-left: 28px; }
.foo      {  text-decoration: underline;
             color: #00FF00;
             font-family: "courier";
             font-size: 14pt;
             font-weight: heavy; }
</textarea><br><br>
<button type="submit">Submit</button>
</form>

<?php
$input = trim($_POST['prefix']);
// $input = preg_match('[^;\r\n\s\t\}\{]+:', $input);
// $input = explode('}', $input);
// foreach ($input as $value) {
// 	echo "<br><hr>".$value.'}';
// }
str_split($input);
echo $input;
$properties = array(
	$animDuration = array('animation-duration','-moz-animation-duration','-webkit-animation-duration'),
	$animTiming = array('animation-timing-function','-moz-animation-timing-function','-webkit-animation-timing-function:linear'),
	$animDelay = array('animation-delay','-moz-animation-delay','-webkit-animation-delay'),
	$animName = array('animation-name','-moz-animation-name','-webkit-animation-name'),
	$animation = array('animation','-moz-animation','-webkit-animation'),
	$animPlayState = array('animation-play-state','-moz-animation-play-state','-webkit-animation-play-state',),
	$animDirection= array('animation-direction','-moz-animation-direction','-webkit-animation-direction'),
	$animIterationCount= array('animation-iteration-count','-moz-animation-iteration-count','-webkit-animation-iteration-count'),
	$boxSizing = array('box-sizing','-moz-box-sizing','-webkit-box-sizing'),
	$boxOrdinalGroup = array('-moz-box-ordinal-group','-webkit-box-ordinal-group','box-ordinal-group'),
	$borderImage = array('-moz-border-image','-webkit-border-image','-o-border-image','border-image'),
	$borderRadius = array('-webkit-border-radius','-moz-border-radius','border-radius'),
	$transition = array('transition','-moz-transition','-webkit-transition','-o-transition'),
	$transDelay = array('transition-delay','-moz-transition-delay','-webkit-transition-delay','-o-transition-delay'),
	$transTimingFunction = array('transition-timing-function','-moz-transition-timing-function','-webkit-transition-timing-function','-o-transition-timing-function'),
	$transDuration= array('transition-duration','-moz-transition-duration','-webkit-transition-duration','-o-transition-duration'),
	$transProperty= array('transition-property','-moz-transition-property','-webkit-transition-property','-o-transition-property'),
	$perspectiveOrigin= array('perspective-origin','-webkit-perspective-origin'),
	$perspective = array('perspective','-webkit-perspective'),
	$colCount= array('-moz-column-count','-webkit-column-count','column-count'),
	$columns = array('columns','-webkit-columns','-moz-columns'),
	$colWidth = array('-moz-column-width','-webkit-column-width','column-width'),
	$colSpan = array('-webkit-column-span','column-span'),
	$colRuleWidth= array('-moz-column-rule-width','-webkit-column-rule-width','column-rule-width'),
	$colRuleStyle= array('-moz-column-rule-style','-webkit-column-rule-style','column-rule-style'),
	$colRuleColor= array('-moz-column-rule-color','-webkit-column-rule-color','column-rule-color'),
	$colRule= array('-moz-column-rule','-webkit-column-rule','column-rule'),
	$colGap= array('-moz-column-gap','-webkit-column-gap','column-gap'),
	$backgroundClip = array('background-clip','-webkit-background-clip'),
	$backfaceVisibility= array('backface-visibility','-webkit-backface-visibility','-moz-backface-visibility'),
	$apperance = array('appearance','-moz-appearance','-webkit-appearance'),
	$transform = array('transform','-webkit-transform','-ms-transform','-moz-transform','-o-transform'),
	$transStyle = array('transform-style', '-webkit-transform-style'),
	$transOrigin = array('transform-origin','-ms-transform-origin','-webkit-transform-origin','-moz-transform-origin','-o-transform-origin')
);

// Loop through each to see if property exists
// foreach ($properties as $arr) {
// 	foreach ($arr as $value) {
// 		if(in_array($input, $properties)){
// 			var_dump($value);
// 		}
// 	}
// }
// Special Attention Properties
	// ==== Gradient Properties ====
		// // Linear Gradient
		// 	background: -moz-linear-gradient(black, white); /* FF 3.6+ */
		//     background: -ms-linear-gradient(black, white); /* IE10 */
		//     background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #000000), color-stop(100%, #ffffff)); /* Safari 4+, Chrome 2+ */
		//     background: -webkit-linear-gradient(black, white); /* Safari 5.1+, Chrome 10+ */
		//     background: -o-linear-gradient(black, white); /* Opera 11.10 */
		//     filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#000000', endColorstr='#ffffff'); /* IE6 & IE7 */
		//     -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#000000', endColorstr='#ffffff')"; /* IE8+ */
		//     background: linear-gradient(black, white); /* the standard */
  //   	// Radial
		// 	background-image: -webkit-radial-gradient(center center, circle contain, black 0%, blue 25%, green 40%, red 60%, purple 80%, white 100%);
		// 	background-image: -moz-radial-gradient(center center, circle contain, black 0%, blue 25%, green 40%, red 60%, purple 80%, white 100%);
		// 	background-image: -o-radial-gradient(center center, circle contain, black 0%, blue 25%, green 40%, red 60%, purple 80%, white 100%);
		// 	background-image: -ms-radial-gradient(center center, circle contain, black 0%, blue 25%, green 40%, red 60%, purple 80%, white 100%);
		// 	background-image: radial-gradient(center center, circle contain, black 0%, blue 25%, green 40%, red 60%, purple 80%, white 100%); /* standard syntax */
	// @keyframes mymove
	// {
	// from {top:0px;}
	// to {top:200px;}
	// }



	// -moz-box-flex
	// -webkit-box-flex
	// box-flex
	// display:-moz-box;
	// -moz-box-direction
	// display:-webkit-box;
	// -webkit-box-direction:reverse;
	// display:box;
	// box-direction:reverse;


	// display:-moz-box;
	// -moz-box-orient
	// -moz-box-pack
	// -moz-box-align
	// display:-webkit-box;
	// -webkit-box-orient
	// -webkit-box-pack
	// -webkit-box-align
	// display:box;
	// box-orient
	// box-pack
	// box-align
