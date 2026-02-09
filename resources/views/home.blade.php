@extends('layouts.app')

@section('title', 'Welcome - My Portfolio')

@section('styles')
<style>
    .cards-page {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        filter: blur(8px);
        transform: scale(1.1);
    }
    
    .cards-page::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(45, 15, 50, 0.4);
    }
    
    .cards-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 40px;
        min-height: 80vh;
        padding: 2rem;
        position: relative;
        overflow: hidden;
        perspective: 1000px;
    }
    
    .floating-card {
        width: 220px;
        height: 320px;
        background: linear-gradient(145deg, #1a0a1a 0%, #2d0f2d 50%, #1a0518 100%);
        border-radius: 20px;
        cursor: pointer;
        position: relative;
        transform-style: preserve-3d;
        animation: floatIrregular 4s ease-in-out infinite;
        transition: all 0.4s ease;
        box-shadow: 0 15px 35px rgba(0,0,0,0.6);
        overflow: hidden;
        border: 1px solid rgba(180, 80, 180, 0.2);
    }
    
    /* Dragon head logo on back */
    .floating-card::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 120px;
        height: 120px;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath d='M50 20 C40 20, 30 30, 30 45 C30 55, 35 65, 45 70 L45 75 L40 75 L40 80 L50 85 L60 80 L60 75 L55 75 L55 70 C65 65, 70 55, 70 45 C70 30, 60 20, 50 20 Z' fill='none' stroke='%23d946ef' stroke-width='1.5' opacity='0.4'/%3E%3Cpath d='M45 35 C45 35, 40 40, 40 50' fill='none' stroke='%23d946ef' stroke-width='1.5' opacity='0.4'/%3E%3Cpath d='M55 35 C55 35, 60 40, 60 50' fill='none' stroke='%23d946ef' stroke-width='1.5' opacity='0.4'/%3E%3Cellipse cx='42' cy='42' rx='4' ry='5' fill='%23d946ef' opacity='0.4'/%3E%3Cellipse cx='58' cy='42' rx='4' ry='5' fill='%23d946ef' opacity='0.4'/%3E%3Cpath d='M50 50 L48 55 L50 58 L52 55 Z' fill='%23d946ef' opacity='0.4'/%3E%3Cpath d='M35 45 L25 40 L30 50' fill='none' stroke='%23d946ef' stroke-width='1.5' opacity='0.4'/%3E%3Cpath d='M65 45 L75 40 L70 50' fill='none' stroke='%23d946ef' stroke-width='1.5' opacity='0.4'/%3E%3C/svg%3E");
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        z-index: 0;
        opacity: 0.5;
    }
    
    .floating-card:nth-child(1) {
        animation-delay: 0s;
        transform: rotate(-3deg);
    }
    
    .floating-card:nth-child(2) {
        animation-delay: 0.8s;
        transform: rotate(2deg);
    }
    
    .floating-card:nth-child(3) {
        animation-delay: 1.6s;
        transform: rotate(-2deg);
    }
    
    .floating-card:nth-child(4) {
        animation-delay: 2.4s;
        transform: rotate(3deg);
    }
    
    .floating-card:nth-child(5) {
        animation-delay: 3.2s;
        transform: rotate(-1deg);
    }
    
    @keyframes floatIrregular {
        0%, 100% {
            transform: translateY(0px) translateX(0px) rotate(var(--rotation, 0deg));
        }
        25% {
            transform: translateY(-25px) translateX(10px) rotate(calc(var(--rotation, 0deg) + 2deg));
        }
        50% {
            transform: translateY(-15px) translateX(-15px) rotate(calc(var(--rotation, 0deg) - 1deg));
        }
        75% {
            transform: translateY(-30px) translateX(5px) rotate(calc(var(--rotation, 0deg) + 1deg));
        }
    }
    
    /* Purple/magenta glow effect on hover */
    .floating-card:hover {
        box-shadow: 0 0 40px 15px rgba(217, 70, 239, 0.5),
                    0 0 80px 30px rgba(217, 70, 239, 0.3),
                    0 0 120px 50px rgba(217, 70, 239, 0.1);
        border: 2px solid #d946ef;
    }
    
    /* Glow effect for dragon logo on hover */
    .floating-card:hover::before {
        opacity: 0.9;
        filter: drop-shadow(0 0 10px #d946ef) drop-shadow(0 0 20px #d946ef) drop-shadow(0 0 30px #d946ef);
    }
    
    /* Card inner content */
    .card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        padding: 20px;
        z-index: 1;
        display: flex;
        flex-direction: column;
    }
    
    /* Roman numerals */
    .card-number {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 32px;
        font-weight: bold;
        color: #d946ef;
        opacity: 0.8;
        font-family: 'Times New Roman', serif;
        text-shadow: 0 0 15px rgba(217, 70, 239, 0.5);
    }
    
    /* Card title - positioned behind/below the card */
    .card-title-container {
        position: absolute;
        bottom: -60px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        width: 100%;
        z-index: 0;
    }
    
    .card-title {
        font-size: 24px;
        font-weight: 700;
        color: #d946ef;
        text-transform: uppercase;
        letter-spacing: 3px;
        text-shadow: 0 0 20px rgba(217, 70, 239, 0.6);
        transform: translateY(0);
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        background: linear-gradient(180deg, rgba(45,15,45,0) 0%, rgba(26,5,24,1) 100%);
        padding: 10px 20px;
        border-radius: 0 0 10px 10px;
    }
    
    /* On hover, title slides up from behind/below to bottom of card */
    .floating-card:hover .card-title-container {
        bottom: 20px;
        z-index: 2;
    }
    
    .floating-card:hover .card-title {
        background: rgba(26, 10, 26, 0.95);
        border: 1px solid #d946ef;
        border-radius: 5px;
        box-shadow: 0 0 20px rgba(217, 70, 239, 0.4);
    }
    
    .card-subtitle {
        font-size: 12px;
        color: #a855a8;
        margin-top: 5px;
        letter-spacing: 1px;
    }
    
    /* Decorative border lines */
    .card-border {
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border: 1px solid rgba(180, 80, 180, 0.3);
        border-radius: 10px;
        pointer-events: none;
        transition: border-color 0.4s ease;
    }
    
    .floating-card:hover .card-border {
        border-color: #d946ef;
    }
    
    /* Corner decorations */
    .corner {
        position: absolute;
        width: 20px;
        height: 20px;
        border: 2px solid rgba(180, 80, 180, 0.4);
        transition: all 0.4s ease;
    }
    
    .corner-tl { top: 10px; left: 10px; border-right: none; border-bottom: none; }
    .corner-tr { top: 10px; right: 10px; border-left: none; border-bottom: none; }
    .corner-bl { bottom: 10px; left: 10px; border-right: none; border-top: none; }
    .corner-br { bottom: 10px; right: 10px; border-left: none; border-top: none; }
    
    .floating-card:hover .corner {
        border-color: #d946ef;
        width: 30px;
        height: 30px;
    }
    
    /* Spin and fly animation */
    .floating-card.spin-fly {
        animation: enlargeThenSpin 1.0s cubic-bezier(0.4, 0, 0.2, 1) forwards !important;
        z-index: 100;
    }
    
    @keyframes enlargeThenSpin {
        0% {
            transform: translateX(0) rotate(0deg) scale(1);
        }
        15% {
            transform: translateX(0) rotate(0deg) scale(1.4);
            box-shadow: 0 0 60px 30px rgba(217, 70, 239, 0.8),
                        0 0 120px 60px rgba(217, 70, 239, 0.5);
        }
        30% {
            transform: translateX(30vw) rotate(1080deg) scale(1.3);
        }
        100% {
            transform: translateX(150vw) rotate(2520deg) scale(1.0);
            opacity: 0;
        }
    }
    
    /* Content sections */
    .card-content {
        display: none;
        padding: 3rem;
        animation: fadeIn 0.6s ease-out;
        max-width: 900px;
        margin: 0 auto;
        background: rgba(20, 5, 20, 0.95);
        border-radius: 20px;
        border: 1px solid rgba(217, 70, 239, 0.3);
    }
    
    .card-content.active {
        display: block;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .card-content h2 {
        font-size: 3rem;
        color: #d946ef;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 3px;
        text-shadow: 0 0 30px rgba(217, 70, 239, 0.5);
    }
    
    .card-content p {
        font-size: 1.3rem;
        color: #d8b4d8;
        line-height: 1.8;
    }
    
    .back-btn {
        margin-top: 2.5rem;
        padding: 1rem 2rem;
        background: transparent;
        color: #d946ef;
        border: 2px solid #d946ef;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1.1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        transition: all 0.3s ease;
    }
    
    .back-btn:hover {
        background: #d946ef;
        color: #1a0518;
        box-shadow: 0 0 20px rgba(217, 70, 239, 0.5);
    }
</style>
@endsection

@section('content')
<div class="cards-page" style="background-image: url('/images/background.jpg');"></div>

<div id="cards-view" class="cards-container">
    <div class="floating-card" data-card="1" style="--rotation: -3deg;">
        <div class="card-border"></div>
        <div class="corner corner-tl"></div>
        <div class="corner corner-tr"></div>
        <div class="corner corner-bl"></div>
        <div class="corner corner-br"></div>
        <div class="card-inner">
            <span class="card-number">I</span>
        </div>
        <div class="card-title-container">
            <h3 class="card-title">Identity</h3>
            <p class="card-subtitle">Who am I</p>
        </div>
    </div>
    
    <div class="floating-card" data-card="2" style="--rotation: 2deg;">
        <div class="card-border"></div>
        <div class="corner corner-tl"></div>
        <div class="corner corner-tr"></div>
        <div class="corner corner-bl"></div>
        <div class="corner corner-br"></div>
        <div class="card-inner">
            <span class="card-number">II</span>
        </div>
        <div class="card-title-container">
            <h3 class="card-title">Projects</h3>
            <p class="card-subtitle">My work</p>
        </div>
    </div>
    
    <div class="floating-card" data-card="3" style="--rotation: -2deg;">
        <div class="card-border"></div>
        <div class="corner corner-tl"></div>
        <div class="corner corner-tr"></div>
        <div class="corner corner-bl"></div>
        <div class="corner corner-br"></div>
        <div class="card-inner">
            <span class="card-number">III</span>
        </div>
        <div class="card-title-container">
            <h3 class="card-title">Skills</h3>
            <p class="card-subtitle">What I do</p>
        </div>
    </div>
    
    <div class="floating-card" data-card="4" style="--rotation: 3deg;">
        <div class="card-border"></div>
        <div class="corner corner-tl"></div>
        <div class="corner corner-tr"></div>
        <div class="corner corner-bl"></div>
        <div class="corner corner-br"></div>
        <div class="card-inner">
            <span class="card-number">IV</span>
        </div>
        <div class="card-title-container">
            <h3 class="card-title">Journey</h3>
            <p class="card-subtitle">Experience</p>
        </div>
    </div>
    
    <div class="floating-card" data-card="5" style="--rotation: -1deg;">
        <div class="card-border"></div>
        <div class="corner corner-tl"></div>
        <div class="corner corner-tr"></div>
        <div class="corner corner-bl"></div>
        <div class="corner corner-br"></div>
        <div class="card-inner">
            <span class="card-number">V</span>
        </div>
        <div class="card-title-container">
            <h3 class="card-title">Connect</h3>
            <p class="card-subtitle">Get in touch</p>
        </div>
    </div>
</div>

<div id="content-view" style="display: none; position: relative; z-index: 10; padding: 2rem;">
    <div id="card-1-content" class="card-content">
        <h2>Identity</h2>
        <p>This content will be added later as requested.</p>
        <button class="back-btn" onclick="showCards()">← Back</button>
    </div>
    
    <div id="card-2-content" class="card-content">
        <h2>Projects</h2>
        <p>Here you can showcase your amazing projects with detailed descriptions, images, and links to live demos or repositories.</p>
        <button class="back-btn" onclick="showCards()">← Back</button>
    </div>
    
    <div id="card-3-content" class="card-content">
        <h2>Skills</h2>
        <p>Display your technical skills, programming languages, frameworks, and tools you master. Perfect for highlighting your capabilities.</p>
        <button class="back-btn" onclick="showCards()">← Back</button>
    </div>
    
    <div id="card-4-content" class="card-content">
        <h2>Journey</h2>
        <p>Share your professional journey, work experience, education, and achievements in an engaging timeline format.</p>
        <button class="back-btn" onclick="showCards()">← Back</button>
    </div>
    
    <div id="card-5-content" class="card-content">
        <h2>Connect</h2>
        <p>Provide your contact information, social media links, and a contact form for visitors to reach out to you.</p>
        <button class="back-btn" onclick="showCards()">← Back</button>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.floating-card').forEach(card => {
        card.addEventListener('click', function() {
            const cardNumber = this.getAttribute('data-card');
            
            // Add spin and fly animation
            this.classList.add('spin-fly');
            
            // After animation completes, show content
            setTimeout(() => {
                document.getElementById('cards-view').style.display = 'none';
                document.querySelector('.cards-page').style.display = 'none';
                document.getElementById('content-view').style.display = 'block';
                
                // Show specific card content
                document.querySelectorAll('.card-content').forEach(content => {
                    content.classList.remove('active');
                });
                document.getElementById('card-' + cardNumber + '-content').classList.add('active');
                
                // Reset the card for when we come back
                this.classList.remove('spin-fly');
            }, 1000);
        });
    });
    
    function showCards() {
        document.getElementById('content-view').style.display = 'none';
        document.querySelector('.cards-page').style.display = 'block';
        document.getElementById('cards-view').style.display = 'flex';
    }
</script>
@endsection
