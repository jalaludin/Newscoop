<td valign=top class="sitemap">

{{ include file="fastnews/homelink.tpl" }}

<h4>Sections</h4>
<ul>
{{ list_sections }}
{{ if $campsite->default_section == $campsite->section }}
	<li><b><a href="{{ uri options="section" }}">{{ $campsite->section->name }}</a></b>
{{ else }}
	<li><a href="{{ uri options="section" }}">{{ $campsite->section->name }}</a>
{{ /if }}
{{ /list_sections }}
</ul>

{{ include file="fastnews/search-sidebar.tpl" }}

{{ include file="fastnews/archive-link.tpl" }}

{{ include file="fastnews/rss-link.tpl" }}

</td>