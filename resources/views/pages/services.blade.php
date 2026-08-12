@extends('layouts.app')
@section('title', 'Services')

@push('styles')
<style>
    .why-card {
        border-radius: 16px; border: 1px solid #e9ecef;
        padding: 2rem; background: #fff;
        transition: all .3s; text-align: center;
    }
    .why-card:hover { transform: translateY(-5px); box-shadow: 0 12px 32px rgba(0,0,0,.1); }
    .why-icon {
        width: 64px; height: 64px;
        background: linear-gradient(135deg,rgba(13,110,253,.1),rgba(102,16,242,.1));
        border-radius: 50%; display: flex; align-items: center;
        justify-content: center; font-size: 1.8rem; margin: 0 auto 1rem;
    }

    .process-step {
        position: relative; text-align: center; padding: 1.5rem;
    }
    .process-step::after {
        content: '→';
        position: absolute; right: -12px; top: 50%;
        transform: translateY(-50%);
        color: #0d6efd; font-size: 1.4rem; font-weight: bold;
    }
    .process-step:last-child::after { display: none; }
    .step-num {
        width: 48px; height: 48px;
        background: linear-gradient(135deg,#0d6efd,#6610f2);
        border-radius: 50%; display: flex; align-items: center;
        justify-content: center; color: #fff; font-weight: 800;
        font-size: 1.1rem; margin: 0 auto .75rem;
    }
    .service-icon-wrap i { font-size: 1.6rem; color: #0d6efd; }
</style>
@endpush

@section('content')

{{-- === HERO === --}}
<section class="page-hero">
    <canvas id="servicesCanvas"></canvas>

    @foreach([['fa-globe','5%','8%','10s','0s'],['fa-mobile-screen','82%','12%','12s','2s'],['fa-pen-ruler','45%','5%','9s','1s'],['fa-cloud','65%','18%','11s','3s'],['fa-lock','25%','15%','13s','1.5s'],['fa-lightbulb','90%','5%','8s','4s']] as $ic)
    <div class="float-icon" style="left:{{ $ic[1] }};top:{{ $ic[2] }};animation-duration:{{ $ic[3] }};animation-delay:{{ $ic[4] }}"><i class="fa-solid fa-{{ $ic[0] }}"></i></div>
    @endforeach

    <div class="container hero-content">
        <div class="row align-items-center g-5">
            <div class="col-lg-7 text-white">
                <div class="glow-badge mb-4"><i class="fa-solid fa-gear"></i> &nbsp;What We Offer</div>
                <h1 class="display-4 fw-bold mb-3 lh-sm">
                    Our <span class="gradient-text">Services</span>
                </h1>
                <p class="text-white-50 fs-5 mb-4" style="max-width:520px;line-height:1.7;">
                    Comprehensive end-to-end digital solutions — from design to deployment — tailored to accelerate your business growth.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('contact') }}" class="btn-hero-primary btn">Get a Free Quote</a>
                    <a href="{{ route('about') }}" class="btn-hero-outline btn">About Us →</a>
                </div>
            </div>

            {{-- Right: rotating service icons --}}
            <div class="col-lg-5 d-none d-lg-flex justify-content-center align-items-center">
                <div style="position:relative;width:380px;height:380px;">
                    {{-- rings --}}
                    <div style="position:absolute;inset:0;border:1px solid rgba(13,110,253,.25);border-radius:50%;animation:spin 18s linear infinite;"></div>
                    <div style="position:absolute;inset:30px;border:1px dashed rgba(102,16,242,.3);border-radius:50%;animation:spin 12s linear infinite reverse;"></div>
                    <div style="position:absolute;inset:70px;border:1px solid rgba(52,211,153,.2);border-radius:50%;animation:spin 8s linear infinite;"></div>
                    {{-- center hub --}}
                    <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;">
                        <div style="width:110px;height:110px;background:linear-gradient(135deg,rgba(13,110,253,.2),rgba(102,16,242,.2));border:1px solid rgba(13,110,253,.4);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 0 40px rgba(13,110,253,.3);">
                            <i class="fa-solid fa-gear" style="font-size:2.8rem;color:#60a5fa;"></i>
                        </div>
                    </div>
                    {{-- 6 orbiting icons on outer ring, each spins independently --}}
                    @foreach([
                        ['0s',      'globe',         '#0d6efd'],
                        ['-3.33s',  'mobile-screen', '#6610f2'],
                        ['-6.66s',  'pen-ruler',     '#0dcaf0'],
                        ['-10s',    'cloud',         '#34d399'],
                        ['-13.33s', 'lock',          '#ffc107'],
                        ['-16.66s', 'lightbulb',     '#dc3545'],
                    ] as $s)
                    <div style="position:absolute;inset:0;animation:spin 20s linear infinite;animation-delay:{{ $s[0] }};">
                        <div style="width:46px;height:46px;background:rgba(255,255,255,.07);border:1px solid {{ $s[2] }}99;border-radius:10px;position:absolute;top:0;left:50%;margin-left:-23px;margin-top:-23px;box-shadow:0 0 10px {{ $s[2] }}55;display:flex;align-items:center;justify-content:center;">
                            <i class="fa-solid fa-{{ $s[1] }}" style="color:{{ $s[2] }};font-size:1.2rem;"></i>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-indicator"><div class="scroll-dot"></div><span>Scroll</span></div>
</section>

{{-- === SERVICES GRID === --}}
<section class="py-5" style="background:#f8f9ff;">
    <div class="container py-3">
        <div class="text-center mb-5">
            <span class="text-primary fw-semibold text-uppercase small">What We Offer</span>
            <h2 class="fw-bold mt-1 section-title">End-to-End Technology Services</h2>
            <p class="text-muted mt-3 mx-auto" style="max-width:580px;">From concept to deployment, we provide everything your business needs to succeed in the digital landscape.</p>
        </div>
        <div class="row g-4">
            @foreach($services as $service)
            <div class="col-md-6 col-lg-4">
                <div class="service-card h-100">
                    <div class="service-icon-wrap">{!! $service['icon'] !!}</div>
                    <h4 class="fw-bold mb-2">{{ $service['title'] }}</h4>
                    <p class="text-muted mb-4">{{ $service['desc'] }}</p>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 mt-auto">Get a Quote →</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- === PROCESS === --}}
<section class="py-5 bg-white">
    <div class="container py-3">
        <div class="text-center mb-5">
            <span class="text-primary fw-semibold text-uppercase small">How We Work</span>
            <h2 class="fw-bold mt-1 section-title">Our Process</h2>
        </div>
        <div class="row g-0">
            @foreach([
                ['1','Discovery','We learn your goals, audience, and requirements in depth.'],
                ['2','Planning','We map out architecture, timelines, and deliverables.'],
                ['3','Build','Our team designs and develops your solution iteratively.'],
                ['4','Launch','We deploy, test, and hand over with full support.'],
            ] as $step)
            <div class="col-6 col-md-3 process-step">
                <div class="step-num">{{ $step[0] }}</div>
                <h6 class="fw-bold mb-1">{{ $step[1] }}</h6>
                <p class="text-muted small mb-0">{{ $step[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- === WHY CHOOSE US === --}}
<section class="py-5" style="background:#f8f9ff;">
    <div class="container py-3">
        <div class="text-center mb-5">
            <span class="text-primary fw-semibold text-uppercase small">Why TechPeak</span>
            <h2 class="fw-bold mt-1 section-title">Why Choose Us?</h2>
        </div>
        <div class="row g-4">
            @foreach([
                ['bolt','Fast Turnaround','Agile methodology ensures on-time delivery without compromising quality.'],
                ['shield-halved','Secure by Design','Security is built into every layer of our development process.'],
                ['handshake','Dedicated Support','Post-launch support and maintenance to keep your systems running smoothly.'],
                ['tag','Competitive Pricing','Premium quality solutions at rates that fit your budget.'],
            ] as $w)
            <div class="col-sm-6 col-lg-3">
                <div class="why-card h-100">
                    <div class="why-icon"><i class="fa-solid fa-{{ $w[0] }}"></i></div>
                    <h5 class="fw-bold mb-2">{{ $w[1] }}</h5>
                    <p class="text-muted small mb-0">{{ $w[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- === CTA === --}}
<section class="cta-section py-5 text-white">
    <div class="container text-center py-4 position-relative" style="z-index:1;">
        <span class="glow-badge mb-4 d-inline-block">Let's Build Together</span>
        <h2 class="fw-bold display-5 mb-3">Need a Custom Solution?</h2>
        <p class="text-white-50 fs-5 mb-4 mx-auto" style="max-width:480px;">Tell us about your project and we'll craft the perfect solution for you.</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('contact') }}" class="btn-hero-primary btn btn-lg px-5">Start a Conversation</a>
            <a href="{{ route('about') }}" class="btn-hero-outline btn btn-lg px-5">About Us</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>initParticleCanvas('servicesCanvas');</script>
@endpush
