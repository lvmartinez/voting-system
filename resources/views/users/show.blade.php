@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="" style="padding-left: 20px">
                    @include('users.show_fields')
                    <a href="{!! route('users.edit', [$user->id]) !!}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
@endsection
