{% for post in posts %}
	<h3>{{post.title}}</h3>
	<hr />
	<p>{{post.body}}</p>
{% endfor %}