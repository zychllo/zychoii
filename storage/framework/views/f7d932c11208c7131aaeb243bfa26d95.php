<?php $__env->startSection('title', 'Projects - My Portfolio'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding: 4rem 0;">
    <div class="container">
        <h1 style="font-size: 3rem; margin-bottom: 1rem; text-align: center;">My Projects</h1>
        <p style="text-align: center; color: #666; margin-bottom: 3rem; font-size: 1.1rem;">
            Here are some of my recent works
        </p>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            <!-- Project 1 -->
            <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <div style="height: 200px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
                <div style="padding: 1.5rem;">
                    <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem;">Project One</h3>
                    <p style="color: #666; margin-bottom: 1rem;">Description of your first project. What technologies did you use? What problem did it solve?</p>
                    <a href="#" style="color: #4ecca3; text-decoration: none; font-weight: 600;">View Project →</a>
                </div>
            </div>

            <!-- Project 2 -->
            <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <div style="height: 200px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);"></div>
                <div style="padding: 1.5rem;">
                    <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem;">Project Two</h3>
                    <p style="color: #666; margin-bottom: 1rem;">Description of your second project. Showcase your best work here.</p>
                    <a href="#" style="color: #4ecca3; text-decoration: none; font-weight: 600;">View Project →</a>
                </div>
            </div>

            <!-- Project 3 -->
            <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <div style="height: 200px; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);"></div>
                <div style="padding: 1.5rem;">
                    <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem;">Project Three</h3>
                    <p style="color: #666; margin-bottom: 1rem;">Description of your third project. Add as many projects as you want.</p>
                    <a href="#" style="color: #4ecca3; text-decoration: none; font-weight: 600;">View Project →</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victus\web-portfolio\portfolio\resources\views/projects.blade.php ENDPATH**/ ?>