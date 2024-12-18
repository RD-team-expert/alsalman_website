@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

    @include('partials.hero')            <!-- Hero Section -->
    @include('partials.features')        <!-- Features Section -->
    @include('partials.gallery')         <!-- Gallery Section -->
    @include('partials.testimonials')    <!-- Testimonials Section -->
    @include('partials.projects')        <!-- Projects Section -->
    @include('partials.services')        <!-- Services Section -->
    @include('partials.content')         <!-- Content Section -->
    @include('partials.blog')            <!-- Blog Section -->
 
@endsection
