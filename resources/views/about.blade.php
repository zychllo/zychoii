@extends('layouts.app')

@section('title', 'About - My Portfolio')

@section('content')
<div style="padding: 4rem 0;">
    <div class="container">
        <h1 style="font-size: 3rem; margin-bottom: 2rem; text-align: center;">About Me</h1>
        
        <div style="max-width: 800px; margin: 0 auto; font-size: 1.1rem; line-height: 1.8;">
            <p style="margin-bottom: 1.5rem;">
                Welcome to my portfolio! I'm a passionate web developer with experience in building modern web applications.
                This is your about section - customize it with your background, education, and experience.
            </p>
            
            <h2 style="font-size: 2rem; margin: 3rem 0 1.5rem 0;">Skills</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px;">
                    <h3 style="color: #4ecca3; margin-bottom: 0.5rem;">Frontend</h3>
                    <p>HTML, CSS, JavaScript, Vue.js</p>
                </div>
                <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px;">
                    <h3 style="color: #4ecca3; margin-bottom: 0.5rem;">Backend</h3>
                    <p>PHP, Laravel, MySQL</p>
                </div>
                <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px;">
                    <h3 style="color: #4ecca3; margin-bottom: 0.5rem;">Tools</h3>
                    <p>Git, VSCode, Laragon</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
