{% for post in posts %}
	<h1>{{post.title}}</h1>
	<hr />
	<p>{{post.body}}</p>
{% endfor %}