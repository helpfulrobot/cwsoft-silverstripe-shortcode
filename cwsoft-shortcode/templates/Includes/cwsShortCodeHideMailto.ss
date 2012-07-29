<% require javascript(cwsoft-shortcode/javascript/cwsShortCodeCdc.js) %>

<% with HideMailto %>
	<a href="javascript:cdc('$Top.email','$Top.subject')">$Top.description</a>
<% end_with %>