@extends('layouts.base')

@section('title', 'داشبورد')

@section('content')
    <div class="alert alert-info"> {{Auth::user()->name}} خوش آمدید به داشبورد مدیریت 👋</div>
@endsection
