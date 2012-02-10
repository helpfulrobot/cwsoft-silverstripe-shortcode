<% require css(cws-shortcode/thirdparty/colorbox/colorbox.css) %>
<% require javascript(cws-shortcode/thirdparty/jquery/jquery.min.js) %>
<% require javascript(cws-shortcode/thirdparty/colorbox/jquery.colorbox-min.js) %>
<% require javascript(cws-shortcode/javascript/RandomImage.js) %>
<% require css(cws-shortcode/css/RandomImage.css) %>

<% control RandomImage %>
	</p>
	<div class="cwsRandomImage $Top.align">
		<a href="$URL" title="$Top.caption" rel="colorbox">
			<% if Orientation == 2 %>
				$SetRatioSize(240,180)
			<% else %>
				$CroppedImage(240,180)
			<% end_if %>
		</a>
	</div>
	<p>
<% end_control %>