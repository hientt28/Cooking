@extends('layouts.index')

@section('content')
@include('methods.create')
<div class="page-content" >
    <div class="form">
        <div class="floated field">
            <div class="two fields">
                <div class="field">
                    <h2 class="header blue">{{ trans('method.method_list') }}</h2>
                </div>
                <div class="field">
                    <div class="vertical teal animated button" tabindex="0">
                        <button class="animated blue button" tabindex="0" data-toggle="modal" data-target="#myModal">
                            <div class="hidden content"><i class="plus icon"></i></div>
                            <div class="visible content">
                                <i class="plus icon"></i>
                            </div>
                        </button>
                    </div>
                    <div class="vertical teal animated button" tabindex="0">
                        <div class="hidden content">
                            <i class="edit icon"></i>
                            {{ trans('method.update_method') }}
                        </div>
                        <div class="visible content">
                            <i class="edit icon"></i>
                        </div>
                    </div>
                    <div class="vertical red animated button" tabindex="0">
                        <div class="hidden teal content">
                            <i class="trash icon"></i>
                            {{ trans('method.delete_method') }}
                        </div>
                        <div class="visible content">
                            <i class="trash icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   	
@endsection
