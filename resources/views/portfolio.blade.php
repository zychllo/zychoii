@extends('layouts.main')

@section('title', 'zychllo - Portfolio')

@section('styles')
<style>
    /* Scroll Progress Line - Left Side */
    .scroll-progress-container {
        position: fixed;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        width: 2px;
        height: 60vh;
        background: rgba(181, 145, 29, 0.2);
        z-index: 100;
        border-radius: 1px;
    }
    
    .scroll-progress-line {
        width: 100%;
        height: 0%;
        background: linear-gradient(180deg, #b5911d 0%, #d4af37 50%, #b5911d 100%);
        border-radius: 1px;
        transition: height 0.1s ease-out;
        box-shadow: 0 0 10px rgba(181, 145, 29, 0.5);
    }
    
    /* Yellow glow effect on scroll */
    .scroll-glow {
        position: fixed;
        left: 0;
        top: 0;
        width: 100px;
        height: 100%;
        background: linear-gradient(90deg, rgba(181, 145, 29, 0.15) 0%, transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
        z-index: 50;
    }
    
    .scroll-glow.active {
        opacity: 1;
    }
    
    /* Black background with very slight golden tint */
    body {
        background: linear-gradient(145deg, #0a0805 0%, #0d0a08 50%, #0a0805 100%);
        min-height: 100vh;
    }
    
    /* Very subtle golden tint overlay */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(ellipse at 30% 20%, rgba(181, 145, 29, 0.08) 0%, transparent 50%),
                    radial-gradient(ellipse at 70% 80%, rgba(181, 145, 29, 0.05) 0%, transparent 50%);
        z-index: -1;
        pointer-events: none;
    }
    
    /* Main content wrapper - everything centered */
    .portfolio-content {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 60px;
        min-height: 100vh;
    }
    
    /* Ensure all sections stay above overlay */
    .page-section {
        position: relative;
        z-index: 1;
    }
    
    /* Page 1: Hero Section - Perfectly Centered */
    .hero-section {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 0 5%;
    }
    
    .hero-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 40px;
    }
    
    .hero-text {
        text-align: center;
    }
    
    .hero-name {
        font-family: 'Playfair Display', serif;
        font-size: 120px;
        font-weight: 900;
        line-height: 1.1;
        margin-bottom: 20px;
        padding-bottom: 10px;
        letter-spacing: -2px;
        background: linear-gradient(90deg, 
            #b5911d 0%, 
            #b5911d 40%, 
            #f4e5a3 50%, 
            #b5911d 60%, 
            #b5911d 100%);
        background-size: 200% 100%;
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 0 40px rgba(181, 145, 29, 0.3);
        animation: goldSweep 1s ease-out forwards;
        overflow: visible;
    }
    
    @keyframes goldSweep {
        0% {
            background-position: -200% center;
        }
        100% {
            background-position: 200% center;
        }
    }
    
    .hero-role {
        font-family: 'Montserrat', sans-serif;
        font-size: 18px;
        color: rgba(255, 255, 255, 0.7);
        letter-spacing: 4px;
        text-transform: uppercase;
        font-weight: 500;
    }
    
    .hero-photos {
        display: flex;
        gap: 30px;
        justify-content: center;
    }
    
    .hero-photo {
        width: 200px;
        height: 260px;
        background: linear-gradient(145deg, #1a1a1a 0%, #2d2d2d 100%);
        border-radius: 8px;
        border: 1px solid rgba(181, 145, 29, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(181, 145, 29, 0.5);
        font-size: 14px;
        overflow: hidden;
    }
    
    .hero-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.6) contrast(1.1);
        transition: filter 0.3s ease;
    }
    
    .hero-photo:hover img {
        filter: brightness(0.75) contrast(1.1);
    }
    
    .hero-tagline {
        font-family: 'Playfair Display', serif;
        font-size: 24px;
        font-weight: 400;
        font-style: italic;
        color: rgba(181, 145, 29, 0.8);
        text-align: center;
        margin-top: 20px;
        letter-spacing: 2px;
        text-shadow: 0 0 20px rgba(181, 145, 29, 0.3);
    }
    
    /* Page 2: Portfolio Section - Perfectly Centered */
    .portfolio-section {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 100px 5%;
    }
    
    .portfolio-cards {
        display: flex;
        flex-direction: column;
        gap: 40px;
        width: 100%;
        max-width: 800px;
        perspective: 1000px;
    }
    
    .portfolio-card {
        width: 100%;
        height: 240px;
        position: relative;
        cursor: pointer;
        transform-style: preserve-3d;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        transform-origin: center center;
    }
    
    .portfolio-card:hover:not(.flipped) {
        transform: scale(1.02);
    }
    
    .portfolio-card:hover:not(.flipped) .card-front {
        box-shadow: 
            0 0 40px 15px rgba(181, 145, 29, 0.4),
            0 0 80px 30px rgba(181, 145, 29, 0.2);
    }
    
    .portfolio-card.flipped {
        transform: rotateY(180deg);
        transform-origin: center center;
    }
    
    .card-front, .card-back-portfolio {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 16px;
        overflow: hidden;
        transform-origin: center center;
    }
    
    .card-front {
        background: linear-gradient(145deg, #1a1a1a 0%, #2d2d2d 100%);
        border: 1px solid rgba(181, 145, 29, 0.3);
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;
    }
    
    .card-front img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.6) contrast(1.1);
        transition: transform 0.4s ease, filter 0.3s ease;
    }
    
    .portfolio-card:hover .card-front img {
        transform: scale(1.2);
        filter: brightness(0.75) contrast(1.1);
    }
    
    .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 2;
        transition: background 0.3s ease;
    }
    
    .portfolio-card:hover .card-overlay {
        background: rgba(0, 0, 0, 0.25);
    }
    
    .card-label {
        font-family: 'Playfair Display', serif;
        font-size: 56px;
        font-weight: 700;
        color: #b5911d;
        text-shadow: 0 0 30px rgba(181, 145, 29, 0.8), 0 2px 10px rgba(0, 0, 0, 0.8);
        z-index: 3;
        transition: transform 0.4s ease;
    }
    
    .portfolio-card:hover .card-label {
        transform: scale(1.1);
    }
    
    .card-back-portfolio {
        background: #0a0805;
        transform: rotateY(180deg) translateZ(1px);
        border: 2px solid #b5911d;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        transform-origin: center center;
    }
    
    .card-back-portfolio h3 {
        font-size: 28px;
        color: #b5911d;
        margin-bottom: 15px;
    }
    
    .card-back-portfolio p {
        font-size: 15px;
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.8;
    }
    
    /* Page 3: About Section ("me?") - Perfectly Centered */
    .about-section {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 100px 5%;
        text-align: center;
    }
    
    .about-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 50px;
        max-width: 900px;
    }
    
    .about-header {
        text-align: center;
    }
    
    .about-title {
        font-family: 'Playfair Display', serif;
        font-size: 100px;
        font-weight: 900;
        color: #b5911d;
        margin-bottom: 30px;
        text-shadow: 0 0 40px rgba(181, 145, 29, 0.3);
    }
    
    .about-text {
        font-size: 18px;
        line-height: 2;
        color: rgba(255, 255, 255, 0.85);
        max-width: 700px;
        text-align: center;
    }
    
    .about-photo {
        width: 280px;
        height: 360px;
        background: linear-gradient(145deg, #1a1a1a 0%, #2d2d2d 100%);
        border-radius: 8px;
        border: 1px solid rgba(181, 145, 29, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(181, 145, 29, 0.5);
    }
    
    .about-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
        filter: brightness(0.6) contrast(1.1);
        transition: filter 0.3s ease;
    }
    
    .about-photo:hover img {
        filter: brightness(0.75) contrast(1.1);
    }
    
    /* Page 4: Contact Section - Perfectly Centered */
    .contact-section {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 100px 5%;
        text-align: center;
    }
    
    .contact-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 60px;
    }
    
    .contact-title {
        font-family: 'Playfair Display', serif;
        font-size: 80px;
        font-weight: 900;
        color: #b5911d;
        text-shadow: 0 0 40px rgba(181, 145, 29, 0.3);
    }
    
    .social-links {
        display: flex;
        gap: 80px;
        justify-content: center;
    }
    
    .social-link {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }
    
    .social-link:hover {
        transform: scale(1.1);
    }
    
    .social-link:hover .social-icon {
        box-shadow: 
            0 0 40px 15px rgba(181, 145, 29, 0.5),
            0 0 80px 30px rgba(181, 145, 29, 0.3);
        border-color: #b5911d;
    }
    
    .social-icon {
        width: 100px;
        height: 100px;
        background: #0a0805;
        border: 2px solid rgba(181, 145, 29, 0.5);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .social-icon svg {
        width: 50px;
        height: 50px;
        fill: #b5911d;
    }
    
    .social-label {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.6);
        letter-spacing: 2px;
        text-transform: uppercase;
    }
    
    .copy-toast {
        position: fixed;
        bottom: 100px;
        left: 50%;
        transform: translateX(-50%) translateY(100px);
        background: #b5911d;
        color: #0a0805;
        padding: 15px 30px;
        border-radius: 8px;
        font-weight: 600;
        opacity: 0;
        transition: all 0.3s ease;
        z-index: 1000;
    }
    
    .copy-toast.show {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }
</style>
@endsection

@section('content')
<!-- Scroll Progress Line -->
<div class="scroll-progress-container">
    <div class="scroll-progress-line" id="scrollProgress"></div>
</div>

<!-- Yellow Glow Effect on Scroll -->
<div class="scroll-glow" id="scrollGlow"></div>

<!-- Portfolio Content -->
<div class="portfolio-content">
    <!-- Page 1: Hero -->
    <section class="hero-section page-section" id="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-name">zychllo</h1>
                <p class="hero-role">Coder, Photographer, Designer</p>
            </div>
            <div class="hero-photos">
                <div class="hero-photo">
                    <img src="/images/hero-1.jpg.jpeg" alt="Hero Photo 1">
                </div>
                <div class="hero-photo">
                    <img src="/images/hero-2.jpg.jpeg" alt="Hero Photo 2">
                </div>
            </div>
            <p class="hero-tagline">In another life...</p>
        </div>
    </section>

    <!-- Page 2: Portfolio -->
    <section class="portfolio-section page-section" id="portfolio">
        <div class="portfolio-cards">
            <div class="portfolio-card" onclick="flipCard(this)">
                <div class="card-front">
                    <img src="/images/portofolio-code.jpg.jpeg" alt="Code Projects">
                    <div class="card-overlay">
                        <span class="card-label">code</span>
                    </div>
                </div>
                <div class="card-back-portfolio">
                    <h3>Code</h3>
                    <p>I craft elegant solutions through code. My passion lies in creating seamless user experiences and robust applications. From frontend interfaces to backend architecture, I bring ideas to life with precision and creativity.</p>
                </div>
            </div>
            
            <div class="portfolio-card" onclick="flipCard(this)">
                <div class="card-front">
                    <img src="/images/portofolio-photo.jpg.jpeg" alt="Photography">
                    <div class="card-overlay">
                        <span class="card-label">photographic</span>
                    </div>
                </div>
                <div class="card-back-portfolio">
                    <h3>Photography</h3>
                    <p>Through the lens, I capture moments that tell stories. Photography allows me to freeze time and share perspectives. Each shot is carefully composed to evoke emotion and showcase the beauty in everyday scenes.</p>
                </div>
            </div>
            
            <div class="portfolio-card" onclick="flipCard(this)">
                <div class="card-front">
                    <img src="/images/portofolio-game.jpg.jpeg" alt="Game Design">
                    <div class="card-overlay">
                        <span class="card-label">game</span>
                    </div>
                </div>
                <div class="card-back-portfolio">
                    <h3>Game Design</h3>
                    <p>Games are interactive art. I design immersive experiences that challenge, entertain, and inspire. From concept to execution, I focus on gameplay mechanics, visual storytelling, and player engagement.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Page 3: About ("me?") -->
    <section class="about-section page-section" id="about">
        <div class="about-content">
            <div class="about-header">
                <h2 class="about-title">me?</h2>
                <div class="about-text">
                    <p>I am a creative technologist who believes in the power of combining art and code. My journey began with a curiosity for how things work, which evolved into a passion for creating digital experiences that leave lasting impressions.</p>
                    <br>
                    <p>Whether I'm debugging code at 3 AM or capturing golden hour light through my camera, I approach every project with dedication and attention to detail. I believe that the best work comes from the intersection of technical skill and creative vision.</p>
                </div>
            </div>
            <div class="about-photo">
                <img src="/images/about.jpg.jpeg" alt="About Me">
            </div>
        </div>
    </section>

    <!-- Page 4: Contact -->
    <section class="contact-section page-section" id="contact">
        <div class="contact-content">
            <h2 class="contact-title">Call Me</h2>
            <div class="social-links">
                <div class="social-link" onclick="copyToClipboard('instagram', '@zychllo')">
                    <div class="social-icon">
                        <!-- Instagram SVG -->
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </div>
                    <span class="social-label">Instagram</span>
                </div>
                
                <div class="social-link" onclick="copyToClipboard('whatsapp', '+62 851-6198-2056')">
                    <div class="social-icon">
                        <!-- WhatsApp SVG -->
                        <svg viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </div>
                    <span class="social-label">WhatsApp</span>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Copy Toast Notification -->
<div class="copy-toast" id="copyToast">Copied to clipboard!</div>
@endsection

@section('scripts')
<script>
    // Scroll Progress Line
    const scrollProgress = document.getElementById('scrollProgress');
    const scrollGlow = document.getElementById('scrollGlow');
    
    window.addEventListener('scroll', () => {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = (scrollTop / docHeight) * 100;
        
        // Update progress line
        if (scrollProgress) {
            scrollProgress.style.height = scrollPercent + '%';
        }
        
        // Show yellow glow effect when scrolling
        if (scrollGlow) {
            scrollGlow.classList.add('active');
            
            // Hide glow after scrolling stops
            clearTimeout(window.scrollTimeout);
            window.scrollTimeout = setTimeout(() => {
                scrollGlow.classList.remove('active');
            }, 150);
        }
    });
    
    // Portfolio card flip
    function flipCard(card) {
        card.classList.toggle('flipped');
    }
    
    // Copy to clipboard
    function copyToClipboard(platform, text) {
        navigator.clipboard.writeText(text).then(() => {
            const toast = document.getElementById('copyToast');
            toast.textContent = `${platform}: ${text} - Copied!`;
            toast.classList.add('show');
            
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }).catch(err => {
            console.error('Failed to copy: ', err);
            // Fallback for older browsers
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            
            const toast = document.getElementById('copyToast');
            toast.textContent = `${platform}: ${text} - Copied!`;
            toast.classList.add('show');
            
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        });
    }
</script>
@endsection
