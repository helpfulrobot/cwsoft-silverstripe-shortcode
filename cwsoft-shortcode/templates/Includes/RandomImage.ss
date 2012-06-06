<% require css(cwsoft-shortcode/thirdparty/colorbox/colorbox.css) %>
<% require css(cwsoft-shortcode/css/RandomImage.css) %>
<% require javascript(cwsoft-shortcode/thirdparty/jquery/jquery.min.js) %>
<% require javascript(cwsoft-shortcode/thirdparty/colorbox/jquery.colorbox-min.js) %>
<% require javascript(cwsoft-shortcode/javascript/RandomImage.js) %>

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