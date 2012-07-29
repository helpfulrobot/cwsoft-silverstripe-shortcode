<% require css(cwsoft-shortcode/css/cwsShortCodeRandomQuote.css) %>

<% with cwsRandomQuote %>
</p>
<div class="cwsShortCodeRandomQuote">
	<h2><% _t('QUOTEHEADING','Some thoughts on your way') %></h2>
	<strong>„$Top.quote“</strong>
	<br />
	<em>($Top.author)</em>
</div>
<p>
<% end_with %>