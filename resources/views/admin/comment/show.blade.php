@extends('adminetic::admin.layouts.app')

@section('content')
    <x-adminetic-show-page name="comment" route="comment" :model="$comment">
        <x-slot name="content">
       
        </x-slot>
    </x-adminetic-show-page>

@endsection

@section('custom_js')
    @include('admin.layouts.modules.comment.scripts')
@endsection
