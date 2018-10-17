<?php
/**
 * Created by PhpStorm.
 * User: iFeras93
 * Date: 10/16/2018
 * Time: 4:39 PM
 */ ?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Message</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ url()->current() }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="title"
                                       placeholder="Enter message title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="content">Message Content <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="content" id="content" cols="30"
                                                  style="width: 100%">{{ old('content') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">create 😍</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
