<?= '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL ?>
<rss version="2.0">
    <channel>
        <title><![CDATA[ DevDojo ]]></title>
        <link><![CDATA[ https://your-website.com/feed ]]></link>
        <description><![CDATA[ Your website description ]]></description>
        <language>en</language>
        <pubDate>{{ now() }}</pubDate>

        @foreach($blogs as $blog)
            <item>
                <title><![CDATA[{{ $blog->post_title }}]]></title>
                {{-- <link>{{ $post->slug }}</link> --}}
                <description><![CDATA[{!! $blog->description !!}]]></description>
                <category>Tech</category>
                <author><![CDATA[{{$blog->auther}}]]></author>
                <guid>{{ $blog->id }}</guid>
                <pubDate>{{ $blog->created_at->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>