@php
    $currentRoute = Request::route();
    $currentRouteName = $currentRoute->getName();
@endphp

<a href="{{ route($route, ['project' => $project]) }}"
    @class([
        'active' => str_starts_with($currentRouteName, 'project.thread')
            ? $route === 'project.forum'
            : $route === $currentRouteName,
    ])>
    {{ $label }}
</a>
