<nav class="text-sm font-medium mb-4">
    <ol class="list-reset flex text-gray-600">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($loop->last)
                <!-- Last breadcrumb (not clickable) -->
                <li class="text-gray-500">{{ $breadcrumb->title }}</li>
            @else
                <!-- Breadcrumb with a link -->
                <li>
                    <a href="{{ $breadcrumb->url }}" class="text-blue-600 hover:underline">
                        {{ $breadcrumb->title }}
                    </a>
                    <span class="mx-2 text-gray-500"> &gt; </span> <!-- Custom Separator -->
                </li>
            @endif
        @endforeach
    </ol>
</nav>
