<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/about') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/news') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/contact') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <priority>0.8</priority>
    </url>
    @foreach ($news as $item)
        <url>
            <loc>{{ url('/news') }}/{{ $item->slug }}</loc>
            <lastmod>{{ $item->created_at->toAtomString() }}</lastmod>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>
