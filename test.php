<!DOCTYPE html>
<html>
<head>
<style> 
div {
    width: 100px;
    height: 100px;
    position: relative;
    -webkit-animation-name: example;  /* Safari 4.0 - 8.0 */
    -webkit-animation-duration: 3s;  /* Safari 4.0 - 8.0 */    
    -webkit-animation-fill-mode: forwards; /* Safari 4.0 - 8.0 */
    animation-duration: 3s;    
    animation-fill-mode: forwards;
}

/* Safari 4.0 - 8.0 */
@-webkit-keyframes example {
    from {top: 0px;}
    to {top: 200px; background-color: blue;}
}

@keyframes example {
    from {top: 0px;}
    to {top: 200px; background-color: blue;}
}
</style>
</head>
<body>

<p>Let the div element retain the style values from the last keyframe when the animation ends:</p>

<div></div>

<p><strong>Note:</strong> The animation-fill-mode property is not supported in Internet Explorer 9 and earlier versions.</p>

</body>
</html>