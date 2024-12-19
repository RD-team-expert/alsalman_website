@extends('layouts.app')

@section('title', 'Alsalman Nfp')

@section('content')

    @include('partials.hero')            <!-- Hero Section -->
    @include('partials.features')        <!-- Features Section -->
    @include('partials.gallery')         <!-- Gallery Section -->
   
    @include('partials.projects')        <!-- Projects Section -->
    @include('partials.services')        <!-- Services Section -->
    {{-- @include('partials.content') --}}
    {{-- @include('partials.blog')             --}}
 
@endsection
