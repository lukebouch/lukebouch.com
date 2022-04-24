<entry>
    <id></id>
    <link type="text/html" rel="alternate" href="" />
    <title>{{ $entry->title }}</title>
    <published>{{ $entry->date }}</published>
    <updated></updated>
    <author>
        <name>Luke Bouch</name>
    </author>

    <content type="html">
        {{ $entry->html }}
    </content>
</entry>
