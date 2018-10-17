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
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ $content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
