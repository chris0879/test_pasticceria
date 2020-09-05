@extends('layouts.admin.basic')


@section('content')
<div class="app-title">
        <div>
            <h1><i class="fa fa-cogs"></i> Setting</h1>
        </div>
    </div>
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    @include('admin.setting.general')
                </div>
            </div>
        </div>
    </div>

@stop