@php
$segments = request()->segments();

$labels = [
    'admin' => 'Admin',
    'dashboard' => 'Dashboard',
    'web_profile' => 'Web Profile',
    'web_contact' => 'Web Contact',
    'privacy-policies' => 'Privacy Policy',
    'about-banner' => 'About Banner',
    'contact-banner' => 'Contact Banner',
    'gallery-banner' => 'Gallery Banner',
    'milestone-banner' => 'Milestone Banner',
    'news-banner' => 'News Banner',
    'hero' => 'Hero Banner',
    'sports' => 'Sports',
    'galleries' => 'Gallery',
    'university-coverages' => 'University Coverage',
    'milestones' => 'Milestone',
    'news' => 'News',
    'create' => 'Create',
    'edit' => 'Edit',
];

$path = '';
@endphp


<div class="card bg-light border-0 shadow-sm mb-3">
    <div class="card-body py-2">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Home</a>
                </li>

                @foreach ($segments as $index => $segment)

                    @php
                        $path .= '/'.$segment;
                        $label = $labels[$segment] ?? ucwords(str_replace('-', ' ', $segment));
                        $isLast = $index === count($segments) - 1;
                    @endphp


                    @if ($segment === 'admin' && !$isLast)

                        <li class="breadcrumb-item">
                            <a href="{{ url('/admin/dashboard') }}">Admin</a>
                        </li>

                    @elseif ($isLast)

                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $label }}
                        </li>

                    @else

                        <li class="breadcrumb-item">
                            <a href="{{ url($path) }}">{{ $label }}</a>
                        </li>

                    @endif

                @endforeach

            </ol>
        </nav>

    </div>
</div>
