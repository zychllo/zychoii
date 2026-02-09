@extends('layouts.app')

@section('title', 'Contact - My Portfolio')

@section('content')
<div style="padding: 4rem 0; background: #f8f9fa;">
    <div class="container">
        <h1 style="font-size: 3rem; margin-bottom: 1rem; text-align: center;">Get In Touch</h1>
        <p style="text-align: center; color: #666; margin-bottom: 3rem; font-size: 1.1rem;">
            Have a project in mind? Let's work together!
        </p>
        
        <div style="max-width: 600px; margin: 0 auto; background: white; padding: 3rem; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <form>
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Name</label>
                    <input type="text" style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;" placeholder="Your name">
                </div>
                
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Email</label>
                    <input type="email" style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;" placeholder="your@email.com">
                </div>
                
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Message</label>
                    <textarea rows="5" style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem; resize: vertical;" placeholder="Your message..."></textarea>
                </div>
                
                <button type="submit" style="width: 100%; background: #4ecca3; color: #1a1a2e; padding: 1rem; border: none; border-radius: 5px; font-size: 1rem; font-weight: 600; cursor: pointer;">
                    Send Message
                </button>
            </form>
            
            <div style="margin-top: 2rem; text-align: center;">
                <p style="color: #666;">Or reach me at:</p>
                <p style="margin-top: 0.5rem;">
                    <a href="mailto:your.email@example.com" style="color: #4ecca3; text-decoration: none;">your.email@example.com</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
