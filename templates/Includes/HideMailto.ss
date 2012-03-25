<% require javascript(cwsoft-shortcode/javascript/cdc.js) %>

<% control HideMailto %>
	<a href="javascript:cdc('$Top.email','$Top.subject')">$Top.description</a>
<% end_control %>