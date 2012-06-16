<% require css(cwsoft-shortcode/css/RandomQuote.css) %>

<% control RandomQuote %>
</p>
<div class="cwsoftRandomQuote">
	<h2><% _t('QUOTEHEADING','Some thoughts on your way') %></h2>
	<strong>„$Top.quote“</strong>
	<br />
	<em>($Top.author)</em>
</div>
<p>
<% end_control %>