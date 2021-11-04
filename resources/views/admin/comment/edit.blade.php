@extends('adminetic::admin.layouts.app')

@section('content')
<x-adminetic-edit-page name="comment" route="comment" :model="$comment">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('admin.layouts.modules.comment.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-edit-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.comment.scripts')
@endsection