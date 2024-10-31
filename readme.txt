=== Processing code directly ===
Contributors: @benoitwimart
Donate link:
Tags: JavaScript, Processing, processingjs, processing-js, code
Requires at least: 3.3
Tested up to: 3.5.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

Processing code directly in your web page with shortcode is using this technique :
http://processingjs.org/articles/jsQuickStart.html#processingcodeinwebpage

and adding prismjs (http://www.prismjs.com) for highlight the code 

= add processing code in your post =
Just add shortcode 

*  [p5js code canvas][/p5js] to show the code and the result
*  [p5js code][/p5js] to show the code
*  [p5js canvas][/p5js] to show the result of the code

= example =

[p5js code canvas]

1. // Processing code
2. void setup() {
3.    size(200, 200);
4.    background(100);
5.    stroke(255);
6.    ellipse(50, 50, 25, 25);
7.    println("hello web!");
8.  }

[/p5js]


== Installation ==


1. Install (download https://github.com/benoitwimart/p5js/archive/master.zip, 
unzip, copy in wordress/wp-content/plugins 
or send .zip on plugin page http://yoursite.com/...wp-admin/plugin-install.php?tab=upload
2. Activate at page http://yoursite.com/.../wp-admin/plugins.php
3. Add shortcode like [p5js code canvas]void setup(){/* your code and more here */}[/p5js] 

tips : p5js button is available in the wp html editor tab

== Frequently Asked Questions ==

- none -

== Screenshots ==

- none -

== Changelog ==

= 1.4.7 = is Processingjs Version
= 1.4.7.1 = remove filter bug
= 1.4.7.2 = remove bug, add keyword, add button show/hide

