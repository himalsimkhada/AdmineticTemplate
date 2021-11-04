@extends('adminetic::admin.layouts.app')

@section('content')
<x-adminetic-create-page name="comment" route="comment">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('admin.layouts.modules.comment.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-create-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.comment.scripts')
@endsection