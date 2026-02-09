<?php $__env->startSection('title', 'zychllo - Enter'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .landing-container {
        width: 100vw;
        height: 100vh;
        background: linear-gradient(145deg, #0a0805 0%, #0d0a08 50%, #0a0805 100%);
        display: flex;
        justify-content: center;
        align-items: center;
        perspective: 1000px;
        overflow: hidden;
    }
    
    .card-container {
        width: 280px;
        height: 400px;
        position: relative;
        transform-style: preserve-3d;
        cursor: pointer;
        animation: naturalFloat 5s ease-in-out infinite;
        will-change: transform;
    }
    
    /* Natural irregular floating with side sway */
    @keyframes naturalFloat {
        0% {
            transform: translateY(0) translateX(0) rotateZ(-1deg) rotateX(2deg);
        }
        20% {
            transform: translateY(-15px) translateX(8px) rotateZ(1deg) rotateX(-1deg);
        }
        40% {
            transform: translateY(-8px) translateX(-5px) rotateZ(-2deg) rotateX(3deg);
        }
        60% {
            transform: translateY(-20px) translateX(3px) rotateZ(2deg) rotateX(1deg);
        }
        80% {
            transform: translateY(-12px) translateX(-8px) rotateZ(-1deg) rotateX(-2deg);
        }
        100% {
            transform: translateY(0) translateX(0) rotateZ(-1deg) rotateX(2deg);
        }
    }
    
    .card-container:hover {
        animation-play-state: paused;
    }
    
    /* Luxurious gold glow on all sides */
    .card-container::before,
    .card-container::after {
        content: '';
        position: absolute;
        pointer-events: none;
        z-index: -1;
        opacity: 0;
        transition: all 0.4s ease;
    }
    
    /* Main glow - all sides */
    .card-container::before {
        top: -20px;
        left: -20px;
        right: -20px;
        bottom: -20px;
        background: 
            linear-gradient(90deg, rgba(181, 145, 29, 0) 0%, rgba(181, 145, 29, 0.4) 15%, rgba(181, 145, 29, 0.6) 50%, rgba(181, 145, 29, 0.4) 85%, rgba(181, 145, 29, 0) 100%),
            linear-gradient(0deg, rgba(181, 145, 29, 0) 0%, rgba(181, 145, 29, 0.4) 15%, rgba(181, 145, 29, 0.6) 50%, rgba(181, 145, 29, 0.4) 85%, rgba(181, 145, 29, 0) 100%);
        filter: blur(20px);
    }
    
    /* Corner glow enhancement */
    .card-container::after {
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        border: 2px solid rgba(212, 175, 55, 0.5);
        border-radius: 16px;
        box-shadow: 
            0 0 20px rgba(181, 145, 29, 0.6),
            0 0 40px rgba(181, 145, 29, 0.4),
            0 0 60px rgba(181, 145, 29, 0.2);
        filter: blur(10px);
    }
    
    .card-container:hover::before {
        opacity: 1;
        background: 
            linear-gradient(90deg, rgba(181, 145, 29, 0) 0%, rgba(181, 145, 29, 0.7) 15%, rgba(244, 229, 163, 0.8) 50%, rgba(181, 145, 29, 0.7) 85%, rgba(181, 145, 29, 0) 100%),
            linear-gradient(0deg, rgba(181, 145, 29, 0) 0%, rgba(181, 145, 29, 0.7) 15%, rgba(244, 229, 163, 0.8) 50%, rgba(181, 145, 29, 0.7) 85%, rgba(181, 145, 29, 0) 100%);
    }
    
    .card-container:hover::after {
        opacity: 1;
        border-color: rgba(244, 229, 163, 0.8);
        box-shadow: 
            0 0 30px rgba(181, 145, 29, 0.9),
            0 0 60px rgba(181, 145, 29, 0.7),
            0 0 90px rgba(181, 145, 29, 0.5),
            inset 0 0 20px rgba(181, 145, 29, 0.3);
    }
    
    /* Card brightness increase on hover */
    .custom-card,
    .card-back {
        transition: filter 0.4s ease, box-shadow 0.4s ease;
    }
    
    .card-container:hover .custom-card,
    .card-container:hover .card-back {
        filter: brightness(1.15);
        box-shadow: 
            0 10px 40px rgba(0,0,0,0.9),
            0 0 30px rgba(181, 145, 29, 0.5);
    }
    
    /* Card faces */
    .custom-card, .card-back {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.8);
        will-change: transform;
        backface-visibility: hidden;
    }
    
    .custom-card {
        transform: rotateY(0deg);
    }
    
    .card-back {
        transform: rotateY(180deg);
    }
    
    .custom-card img, .card-back img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 12px;
    }
    
    /* Click animation - slow rotation, stop at back, cover screen */
    .card-container.flipping {
        animation: revealAndCover 2.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }
    
    @keyframes revealAndCover {
        /* Start - slow rotation */
        0% {
            transform: translateZ(0) rotateY(0deg) scale(1);
        }
        20% {
            transform: translateZ(50px) rotateY(72deg) scale(1.05);
        }
        40% {
            transform: translateZ(100px) rotateY(144deg) scale(1.1);
        }
        /* Stop at back (180deg - eye visible) */
        50% {
            transform: translateZ(150px) rotateY(180deg) scale(1.2);
        }
        /* Brief pause then cover screen */
        55% {
            transform: translateZ(200px) rotateY(180deg) scale(1.5);
        }
        100% {
            transform: translateZ(800px) rotateY(180deg) scale(35);
        }
    }
    
    /* Click instruction */
    .click-hint {
        position: absolute;
        bottom: 80px;
        left: 50%;
        transform: translateX(-50%);
        font-family: 'Montserrat', sans-serif;
        font-size: 12px;
        color: rgba(181, 145, 29, 0.6);
        letter-spacing: 3px;
        text-transform: uppercase;
        opacity: 0;
        animation: fadeInHint 2s ease 3s forwards;
    }
    
    @keyframes fadeInHint {
        to { opacity: 1; }
    }
    
    /* Page transition */
    .page-transition {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #0a0805;
        z-index: 9999;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.5s ease;
    }
    
    .page-transition.active {
        opacity: 1;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="landing-container">
    <div class="card-container" id="kingCard" onclick="flipCard()">
        <!-- Front of card -->
        <div class="custom-card">
            <img src="/images/card-front.png" alt="Card Front">
        </div>
        
        <!-- Back of card -->
        <div class="card-back">
            <img src="/images/card-back.png" alt="Card Back">
        </div>
    </div>
    
    <div class="click-hint">CLICK TO ENTER</div>
</div>

<div class="page-transition" id="transition"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    function flipCard() {
        const card = document.getElementById('kingCard');
        const transition = document.getElementById('transition');
        
        card.classList.add('flipping');
        
        setTimeout(() => {
            transition.classList.add('active');
            
            setTimeout(() => {
                window.location.href = '/portfolio';
            }, 500);
        }, 2200);
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victus\web-portfolio\portfolio\resources\views/landing.blade.php ENDPATH**/ ?>