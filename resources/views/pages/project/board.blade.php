@extends('layouts.project')

@section('title', $project->name)
@push('main-classes', 'project-board-main ')

@section('project-content')
    <section class="project-board">
        @each('partials.project.board.task-group', $project->taskGroups, 'group')
        @include('partials.project.board.task-group')


        @if (Auth::user()?->projects->contains($project))
            <a id="new-task-button" data-bs-toggle="offcanvas"
                href="#new-task-offcanvas" role="button"
                aria-controls="new-task-offcanvas">
                <i class="bi bi-plus"></i> Create task
            </a>
        @endif
    </section>

    <aside id="task-offcanvas" @class(['show' => $show_task ?? false, 'offcanvas'])>
        @include('partials.project.task')
    </aside>

    @if (Auth::user()?->projects->contains($project))
        <aside id="new-task-offcanvas">
            <header class="offcanvas-header">
                <h2 class="offcanvas-title h4" id="new-task-offcanvas-title">
                    New task
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                    data-bs-target="#new-task-offcanvas"
                    aria-label="Close"></button>
            </header>
            @include('partials.project.task.new')
        </aside>
    @endif
@endsection
