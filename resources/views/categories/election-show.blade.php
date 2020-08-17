@extends('layouts.election-template')

@section('content')
    <div class="banner1">
        <div class="container">
            <div class="banner1-info">
                <h3 id="h3.-bootstrap-heading">{{ $category->name }} </h3>
            </div>
        </div>
    </div>
    <ol class="breadcrumb">
        <li><a href="{!! route('categories.index') !!}">Category</a></li>
        <li class="active">{{ $category->name }}</li>
    </ol>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @include('flash::message')
                    @include('categories.election-show_fields')

                </div>
            </div>
        </div>
        <div class="text-center">
            @if(isset($prevCat))
                <a href="{{$prevCat->id}}"> << {{ $prevCat->name }} </a>
            @endif
            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
            @if(isset($nextCat))
                <a href="{{$nextCat->id}}"> {{ $nextCat->name }} >></a>
            @endif
        </div>
    </div>
@endsection
