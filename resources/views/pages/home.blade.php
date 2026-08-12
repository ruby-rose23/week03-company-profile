@extends('layouts.app')
@section('title', 'Home')

@push('styles')
<style>
    /* ── Hero ── */
    #hero {
        position: relative;
        min-height: 100vh;
        background: linear-gradient(135deg, #020818 0%, #0a1628 40%, #0d1f3c 70%, #091020 100%);
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    #techCanvas {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        opacity: .55;
    }

    /* floating tech icons */
    .float-icon {
        position: absolute;
        font-size: 1.6rem;
        opacity: .12;
        animation: floatUp linear infinite;
        pointer-events: none;
        user-select: none;
    }
    @keyframes floatUp {
        0%   { transform: translateY(0)   rotate(0deg);   opacity: .12; }
        50%  { opacity: .22; }
        100% { transform: translateY(-110vh) rotate(360deg); opacity: 0; }
    }

    /* glowing badge */
    .glow-badge {
        display: inline-block;
        background: rgba(13,110,253,.18);
        border: 1px solid rgba(13,110,253,.45);
        color: #60a5fa;
        padding: .35rem 1rem;
        border-radius: 50px;
        font-size: .8rem;
        letter-spacing: .08em;
        text-transform: uppercase;
        font-weight: 600;
        animation: pulseBorder 2.5s ease-in-out infinite;
    }
    @keyframes pulseBorder {
        0%,100% { box-shadow: 0 0 0 0 rgba(13,110,253,.3); }
        50%      { box-shadow: 0 0 0 8px rgba(13,110,253,0); }
    }

    /* hero headline gradient */
    .hero-gradient-text {
        background: linear-gradient(90deg, #60a5fa, #a78bfa, #34d399);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* typing cursor */
    .cursor { animation: blink .7s step-end infinite; }
    @keyframes blink { 50% { opacity: 0; } }

    /* hero buttons */
    .btn-hero-primary {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
        border: none;
        color: #fff;
        padding: .75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        transition: transform .2s, box-shadow .2s;
    }
    .btn-hero-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(13,110,253,.5);
        color: #fff;
    }
    .btn-hero-outline {
        background: transparent;
        border: 1.5px solid rgba(255,255,255,.35);
        color: #fff;
        padding: .75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all .2s;
    }
    .btn-hero-outline:hover {
        background: rgba(255,255,255,.1);
        border-color: #fff;
        color: #fff;
    }

    /* scroll indicator */
    .scroll-indicator {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: .3rem;
        color: rgba(255,255,255,.4);
        font-size: .7rem;
        letter-spacing: .1em;
        text-transform: uppercase;
    }
    .scroll-dot {
        width: 20px; height: 34px;
        border: 2px solid rgba(255,255,255,.3);
        border-radius: 10px;
        position: relative;
    }
    .scroll-dot::after {
        content: '';
        position: absolute;
        top: 5px; left: 50%;
        transform: translateX(-50%);
        width: 4px; height: 6px;
        background: rgba(255,255,255,.6);
        border-radius: 2px;
        animation: scrollBounce 1.6s ease-in-out infinite;
    }
    @keyframes scrollBounce {
        0%,100% { top: 5px; opacity: 1; }
        100%     { top: 18px; opacity: 0; }
    }

    /* ── Stats bar ── */
    .stats-bar {
        background: linear-gradient(135deg, #0a1628, #0d1f3c);
        border-top: 1px solid rgba(255,255,255,.06);
        border-bottom: 1px solid rgba(255,255,255,.06);
    }
    .stat-item { border-right: 1px solid rgba(255,255,255,.08); }
    .stat-item:last-child { border-right: none; }
    .stat-number {
        font-size: 2rem;
        font-weight: 800;
        background: linear-gradient(90deg, #60a5fa, #a78bfa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* ── About section ── */
    .tech-card-dark {
        background: linear-gradient(135deg, #0a1628, #0d1f3c);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 16px;
        color: #fff;
    }
    .timeline-dot {
        width: 12px; height: 12px;
        background: #0d6efd;
        border-radius: 50%;
        flex-shrink: 0;
        margin-top: 5px;
        box-shadow: 0 0 8px #0d6efd;
    }

    /* ── Services ── */
    .service-card {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 16px;
        padding: 2rem;
        transition: all .3s;
        position: relative;
        overflow: hidden;
    }
    .service-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, #0d6efd, #6610f2);
        transform: scaleX(0);
        transition: transform .3s;
    }
    .service-card:hover { transform: translateY(-6px); box-shadow: 0 16px 40px rgba(0,0,0,.1); }
    .service-card:hover::before { transform: scaleX(1); }
    .service-icon-wrap {
        width: 60px; height: 60px;
        background: linear-gradient(135deg, rgba(13,110,253,.1), rgba(102,16,242,.1));
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.6rem;
        margin-bottom: 1rem;
    }

    /* ── Tech stack ticker ── */
    .ticker-wrap {
        background: linear-gradient(135deg, #0a1628, #0d1f3c);
        overflow: hidden;
        padding: 1rem 0;
        border-top: 1px solid rgba(255,255,255,.06);
        border-bottom: 1px solid rgba(255,255,255,.06);
    }
    .ticker-track {
        display: flex;
        gap: 3rem;
        animation: ticker 25s linear infinite;
        white-space: nowrap;
    }
    .ticker-track:hover { animation-play-state: paused; }
    @keyframes ticker {
        0%   { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .ticker-item {
        display: flex; align-items: center; gap: .5rem;
        color: rgba(255,255,255,.5);
        font-size: .85rem;
        font-weight: 500;
        letter-spacing: .05em;
    }
    .ticker-item span { color: #60a5fa; font-size: 1.1rem; }

    /* ── CTA ── */
    .cta-section {
        background: linear-gradient(135deg, #020818, #0a1628);
        position: relative;
        overflow: hidden;
    }
    .cta-section::before {
        content: '';
        position: absolute;
        width: 500px; height: 500px;
        background: radial-gradient(circle, rgba(13,110,253,.15) 0%, transparent 70%);
        top: -150px; right: -100px;
        border-radius: 50%;
    }
    .cta-section::after {
        content: '';
        position: absolute;
        width: 400px; height: 400px;
        background: radial-gradient(circle, rgba(102,16,242,.12) 0%, transparent 70%);
        bottom: -100px; left: -80px;
        border-radius: 50%;
    }

    /* counter animation */
    .count-up { display: inline-block; }
</style>
@endpush

@section('content')

{{-- ═══════════════════════════════════════════════════════
     HERO — animated tech canvas background
═══════════════════════════════════════════════════════ --}}
<section id="hero">
    <canvas id="techCanvas"></canvas>

    {{-- Floating tech icons --}}
    @foreach([
        ['fa-laptop','10%','5%','8s','0s'],       ['fa-gear','25%','15%','11s','2s'],
        ['fa-lock','70%','8%','9s','1s'],          ['fa-cloud','85%','20%','13s','3s'],
        ['fa-satellite-dish','45%','3%','10s','4s'],['fa-desktop','60%','12%','12s','1.5s'],
        ['fa-link','15%','25%','14s','5s'],        ['fa-bolt','90%','5%','7s','2.5s'],
        ['fa-shield-halved','35%','18%','11s','3.5s'],['fa-mobile-screen','78%','30%','9s','0.5s'],
    ] as $icon)
    <div class="float-icon" style="left:{{ $icon[1] }};top:{{ $icon[2] }};animation-duration:{{ $icon[3] }};animation-delay:{{ $icon[4] }}"><i class="fa-solid fa-{{ $icon[0] }}"></i></div>
    @endforeach

    <div class="container position-relative" style="z-index:2;">
        <div class="row align-items-center min-vh-100 py-5">
            <div class="col-lg-7">
                <div class="glow-badge mb-4"><i class="fa-solid fa-rocket"></i> &nbsp;Welcome to TechPeak Solutions</div>

                <h1 class="display-3 fw-bold text-white mb-3 lh-sm">
                    Innovating Your<br>
                    <span class="hero-gradient-text" id="typedText"></span><span class="cursor text-white">|</span>
                </h1>

                <p class="text-white-50 fs-5 mb-4" style="max-width:520px;line-height:1.7;">
                    We craft cutting-edge digital solutions that help businesses grow, scale, and thrive in the modern world — from Santa Rosa, Laguna to the globe.
                </p>

                <div class="d-flex gap-3 flex-wrap mb-5">
                    <a href="{{ route('services') }}" class="btn-hero-primary btn">Explore Our Services</a>
                    <a href="{{ route('contact') }}" class="btn-hero-outline btn">Get In Touch →</a>
                </div>

                {{-- mini trust badges --}}
                <div class="d-flex gap-4 flex-wrap">
                    @foreach(['<i class="fa-solid fa-circle-check"></i> 50+ Happy Clients','<i class="fa-solid fa-circle-check"></i> 4+ Years Experience','<i class="fa-solid fa-circle-check"></i> 100+ Projects Delivered'] as $badge)
                    <span class="text-white-50 small">{!! $badge !!}</span>
                    @endforeach
                </div>
            </div>

            {{-- Right side — glowing tech graphic --}}
            <div class="col-lg-5 d-none d-lg-flex justify-content-center align-items-center">
                <div style="position:relative;width:380px;height:380px;">
                    {{-- outer ring --}}
                    <div style="position:absolute;inset:0;border:1px solid rgba(13,110,253,.25);border-radius:50%;animation:spin 18s linear infinite;"></div>
                    {{-- middle ring --}}
                    <div style="position:absolute;inset:30px;border:1px dashed rgba(102,16,242,.3);border-radius:50%;animation:spin 12s linear infinite reverse;"></div>
                    {{-- inner ring --}}
                    <div style="position:absolute;inset:70px;border:1px solid rgba(52,211,153,.2);border-radius:50%;animation:spin 8s linear infinite;"></div>
                    <style>@keyframes spin { to { transform: rotate(360deg); } }</style>
                    {{-- center --}}
                    <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;">
                        <div style="width:140px;height:140px;background:linear-gradient(135deg,rgba(13,110,253,.2),rgba(102,16,242,.2));border:1px solid rgba(13,110,253,.4);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 0 40px rgba(13,110,253,.3);">
                            <i class="fa-solid fa-lightbulb" style="font-size:3.5rem;color:#60a5fa;"></i>
                        </div>
                    </div>
                    {{-- orbit dots --}}
                    @foreach([['0s','0deg'],['1.5s','90deg'],['3s','180deg'],['4.5s','270deg']] as $dot)
                    <div style="position:absolute;inset:0;animation:spin 6s linear infinite;animation-delay:{{ $dot[0] }};transform:rotate({{ $dot[1] }});">
                        <div style="width:12px;height:12px;background:#0d6efd;border-radius:50%;position:absolute;top:0;left:50%;transform:translateX(-50%);box-shadow:0 0 10px #0d6efd;"></div>
                    </div>
                    @endforeach
                    {{-- orbiting labels --}}
                    <div style="position:absolute;inset:0;animation:spin 20s linear infinite;animation-delay:0s;">
                        <div style="position:absolute;top:0;left:50%;width:46px;height:46px;margin-left:-23px;margin-top:-23px;transform:translateX(0);background:rgba(13,110,253,.15);border:1px solid rgba(13,110,253,.3);border-radius:8px;padding:.3rem .7rem;color:#60a5fa;font-size:.75rem;font-weight:600;white-space:nowrap;display:flex;align-items:center;justify-content:center;">Web Dev</div>
                    </div>
                    <div style="position:absolute;inset:0;animation:spin 20s linear infinite;animation-delay:-5s;">
                        <div style="position:absolute;top:0;left:50%;width:46px;height:46px;margin-left:-23px;margin-top:-23px;background:rgba(102,16,242,.15);border:1px solid rgba(102,16,242,.3);border-radius:8px;padding:.3rem .7rem;color:#a78bfa;font-size:.75rem;font-weight:600;white-space:nowrap;display:flex;align-items:center;justify-content:center;">Cloud <i class="fa-solid fa-cloud"></i></div>
                    </div>
                    <div style="position:absolute;inset:0;animation:spin 20s linear infinite;animation-delay:-10s;">
                        <div style="position:absolute;top:0;left:50%;width:46px;height:46px;margin-left:-23px;margin-top:-23px;background:rgba(52,211,153,.1);border:1px solid rgba(52,211,153,.3);border-radius:8px;padding:.3rem .7rem;color:#34d399;font-size:.75rem;font-weight:600;white-space:nowrap;display:flex;align-items:center;justify-content:center;">Security <i class="fa-solid fa-lock"></i></div>
                    </div>
                    <div style="position:absolute;inset:0;animation:spin 20s linear infinite;animation-delay:-15s;">
                        <div style="position:absolute;top:0;left:50%;width:46px;height:46px;margin-left:-23px;margin-top:-23px;background:rgba(251,191,36,.1);border:1px solid rgba(251,191,36,.3);border-radius:8px;padding:.3rem .7rem;color:#fbbf24;font-size:.75rem;font-weight:600;white-space:nowrap;display:flex;align-items:center;justify-content:center;">Mobile <i class="fa-solid fa-mobile-screen"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-indicator">
        <div class="scroll-dot"></div>
        <span>Scroll</span>
    </div>
</section>

<style>
@keyframes spin { to { transform: rotate(360deg); } }
</style>

{{-- ═══════════════════════════════════════════════════════
     STATS BAR
═══════════════════════════════════════════════════════ --}}
<div class="stats-bar py-4">
    <div class="container">
        <div class="row text-center g-0">
            @foreach([
                ['50+','Happy Clients'],
                ['100+','Projects Delivered'],
                ['4+','Years of Excellence'],
                ['6','Core Services'],
            ] as $stat)
            <div class="col-6 col-md-3 stat-item py-2">
                <div class="stat-number count-up" data-target="{{ (int) $stat[0] }}">0</div>
                <div class="text-white-50 small mt-1">{{ $stat[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════
     TECH STACK TICKER
═══════════════════════════════════════════════════════ --}}
<div class="ticker-wrap">
    <div class="ticker-track">
        @php
        $techs = [
            ['fa-brands fa-react','React'],['fa-brands fa-php','PHP'],['fa-brands fa-node-js','Node.js'],['fa-brands fa-python','Python'],
            ['fa-solid fa-cloud','AWS'],['fa-brands fa-docker','Docker'],['fa-solid fa-code','TypeScript'],['fa-solid fa-database','MySQL'],
            ['fa-solid fa-pen-nib','Figma'],['fa-solid fa-fire','Laravel'],['fa-solid fa-mobile-screen','Flutter'],['fa-solid fa-shield-halved','Nginx'],
            ['fa-brands fa-react','React'],['fa-brands fa-php','PHP'],['fa-brands fa-node-js','Node.js'],['fa-brands fa-python','Python'],
            ['fa-solid fa-cloud','AWS'],['fa-brands fa-docker','Docker'],['fa-solid fa-code','TypeScript'],['fa-solid fa-database','MySQL'],
            ['fa-solid fa-pen-nib','Figma'],['fa-solid fa-fire','Laravel'],['fa-solid fa-mobile-screen','Flutter'],['fa-solid fa-shield-halved','Nginx'],
        ];
        @endphp
        @foreach($techs as $tech)
        <div class="ticker-item"><span><i class="{{ $tech[0] }}"></i></span>{{ $tech[1] }}</div>
        @endforeach
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════
     COMPANY INTRODUCTION
═══════════════════════════════════════════════════════ --}}
<section class="py-5 bg-white">
    <div class="container py-3">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="text-primary fw-semibold text-uppercase small">Who We Are</span>
                <h2 class="fw-bold mt-1 mb-3" style="font-size:2.2rem;">Building Tomorrow's<br>Technology, <span style="background:linear-gradient(90deg,#0d6efd,#6610f2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Today</span></h2>
                <p class="text-muted lh-lg">Founded in 2020 and headquartered in Santa Rosa, Laguna, TechPeak Solutions is a full-service IT company dedicated to delivering innovative digital solutions. We partner with startups, SMEs, and enterprises to transform their ideas into powerful digital products.</p>
                <p class="text-muted lh-lg">Our team of passionate engineers, designers, and strategists work collaboratively to ensure every project exceeds expectations.</p>
                <a href="{{ route('about') }}" class="btn btn-outline-primary mt-2 px-4 rounded-pill">Learn More About Us →</a>
            </div>
            <div class="col-lg-6">
                <div class="tech-card-dark p-4">
                    <h6 class="text-white-50 text-uppercase small mb-3 fw-semibold">Company Milestones</h6>
                    @foreach([
                        ['2020','Founded in Santa Rosa, Laguna with a team of 5.'],
                        ['2021','Delivered 15+ projects. First enterprise client onboarded.'],
                        ['2022','Team grew to 20. Launched UI/UX & Mobile divisions.'],
                        ['2023','Cloud & Cybersecurity services launched.'],
                        ['2024','50+ clients served. Expanding across Southeast Asia.'],
                    ] as $item)
                    <div class="d-flex gap-3 mb-3 align-items-start">
                        <div class="timeline-dot mt-1"></div>
                        <div>
                            <span class="text-primary fw-bold small">{{ $item[0] }}</span>
                            <p class="text-white-50 small mb-0">{{ $item[1] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════
     FEATURED SERVICES
═══════════════════════════════════════════════════════ --}}
<section class="py-5" style="background:#f8f9ff;">
    <div class="container py-3">
        <div class="text-center mb-5">
            <span class="text-primary fw-semibold text-uppercase small">What We Do</span>
            <h2 class="fw-bold mt-1 section-title">Our Core Services</h2>
            <p class="text-muted mt-3 mx-auto" style="max-width:500px;">Comprehensive digital solutions designed to accelerate your business growth.</p>
        </div>
        <div class="row g-4">
            @foreach([
                ['fa-globe','Web Development','Scalable, high-performance web apps built with modern frameworks and best practices.'],
                ['fa-mobile-screen','Mobile Development','Native and cross-platform apps for iOS and Android that users love.'],
                ['fa-pen-ruler','UI/UX Design','Beautiful, user-centered interfaces that convert visitors into customers.'],
                ['fa-cloud','Cloud Solutions','Reliable cloud infrastructure to power your business at any scale.'],
            ] as $service)
            <div class="col-md-6 col-lg-3">
                <div class="service-card h-100">
                    <div class="service-icon-wrap"><i class="fa-solid {{ $service[0] }}"></i></div>
                    <h5 class="fw-bold mb-2">{{ $service[1] }}</h5>
                    <p class="text-muted small mb-0">{{ $service[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('services') }}" class="btn btn-primary px-5 rounded-pill">View All 6 Services →</a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════
     CALL TO ACTION
═══════════════════════════════════════════════════════ --}}
<section class="cta-section py-5 text-white">
    <div class="container text-center py-4 position-relative" style="z-index:1;">
        <span class="glow-badge mb-4 d-inline-block">Let's Build Together</span>
        <h2 class="fw-bold display-5 mb-3">Ready to Start Your Project?</h2>
        <p class="text-white-50 fs-5 mb-4 mx-auto" style="max-width:500px;">Let's build something amazing together. Reach out to our team today and get a free consultation.</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('contact') }}" class="btn-hero-primary btn btn-lg px-5">Contact Us Now</a>
            <a href="{{ route('services') }}" class="btn-hero-outline btn btn-lg px-5">Our Services</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
// ── Typing animation ──────────────────────────────────────
const phrases = ['Digital Future', 'Web Solutions', 'Mobile Apps', 'Cloud Systems', 'Secure Networks'];
let pi = 0, ci = 0, deleting = false;
const el = document.getElementById('typedText');
function type() {
    const word = phrases[pi];
    el.textContent = deleting ? word.slice(0, --ci) : word.slice(0, ++ci);
    let delay = deleting ? 60 : 100;
    if (!deleting && ci === word.length) { delay = 2000; deleting = true; }
    else if (deleting && ci === 0)       { deleting = false; pi = (pi + 1) % phrases.length; delay = 400; }
    setTimeout(type, delay);
}
type();

// ── Canvas tech background ────────────────────────────────
const canvas = document.getElementById('techCanvas');
const ctx    = canvas.getContext('2d');
let W, H, nodes = [];

function resize() {
    W = canvas.width  = canvas.offsetWidth;
    H = canvas.height = canvas.offsetHeight;
}
resize();
window.addEventListener('resize', () => { resize(); initNodes(); });

function initNodes() {
    nodes = [];
    const count = Math.floor((W * H) / 14000);
    for (let i = 0; i < count; i++) {
        nodes.push({
            x: Math.random() * W,
            y: Math.random() * H,
            vx: (Math.random() - .5) * .4,
            vy: (Math.random() - .5) * .4,
            r: Math.random() * 2 + 1,
        });
    }
}
initNodes();

function drawFrame() {
    ctx.clearRect(0, 0, W, H);

    // draw connections
    for (let i = 0; i < nodes.length; i++) {
        for (let j = i + 1; j < nodes.length; j++) {
            const dx = nodes[i].x - nodes[j].x;
            const dy = nodes[i].y - nodes[j].y;
            const dist = Math.sqrt(dx*dx + dy*dy);
            if (dist < 130) {
                ctx.beginPath();
                ctx.moveTo(nodes[i].x, nodes[i].y);
                ctx.lineTo(nodes[j].x, nodes[j].y);
                ctx.strokeStyle = `rgba(96,165,250,${(1 - dist/130) * .35})`;
                ctx.lineWidth = .8;
                ctx.stroke();
            }
        }
    }

    // draw nodes
    nodes.forEach(n => {
        ctx.beginPath();
        ctx.arc(n.x, n.y, n.r, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(96,165,250,.7)';
        ctx.fill();

        // move
        n.x += n.vx;
        n.y += n.vy;
        if (n.x < 0 || n.x > W) n.vx *= -1;
        if (n.y < 0 || n.y > H) n.vy *= -1;
    });

    requestAnimationFrame(drawFrame);
}
drawFrame();

// ── Mouse interaction ─────────────────────────────────────
canvas.addEventListener('mousemove', e => {
    const rect = canvas.getBoundingClientRect();
    const mx = e.clientX - rect.left;
    const my = e.clientY - rect.top;
    nodes.forEach(n => {
        const dx = n.x - mx, dy = n.y - my;
        const dist = Math.sqrt(dx*dx + dy*dy);
        if (dist < 100) {
            n.vx += dx / dist * .08;
            n.vy += dy / dist * .08;
            // clamp speed
            const speed = Math.sqrt(n.vx*n.vx + n.vy*n.vy);
            if (speed > 2) { n.vx = n.vx/speed*2; n.vy = n.vy/speed*2; }
        }
    });
});

// ── Count-up animation ────────────────────────────────────
const counters = document.querySelectorAll('.count-up');
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const target = parseInt(el.dataset.target);
        let current = 0;
        const step = Math.ceil(target / 60);
        const timer = setInterval(() => {
            current = Math.min(current + step, target);
            el.textContent = current + '+';
            if (current >= target) clearInterval(timer);
        }, 30);
        observer.unobserve(el);
    });
}, { threshold: .5 });
counters.forEach(c => observer.observe(c));
</script>
@endpush
