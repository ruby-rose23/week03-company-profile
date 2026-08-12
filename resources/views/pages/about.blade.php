@extends('layouts.app')
@section('title', 'About Us')

@push('styles')
<style>
    .value-card {
        border-radius: 16px; border: 1px solid #e9ecef;
        padding: 2rem; background: #fff;
        transition: all .3s; position: relative; overflow: hidden;
    }
    .value-card::before {
        content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
        background: linear-gradient(90deg,#0d6efd,#6610f2);
        transform: scaleX(0); transition: transform .3s;
    }
    .value-card:hover { transform: translateY(-5px); box-shadow: 0 12px 32px rgba(0,0,0,.1); }
    .value-card:hover::before { transform: scaleX(1); }

    .team-card {
        border-radius: 16px; border: 1px solid #e9ecef;
        padding: 2rem; background: #fff;
        transition: all .3s; text-align: center;
    }
    .team-card:hover { transform: translateY(-6px); box-shadow: 0 16px 40px rgba(0,0,0,.1); }
    .team-avatar {
        width: 90px; height: 90px;
        border: 3px solid rgba(13,110,253,.3);
        border-radius: 50%; margin: 0 auto 1rem;
        overflow: hidden; object-fit: cover;
    }

    /* hex grid decoration */
    .hex-bg {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='56' height='100'%3E%3Cpath d='M28 66L0 50V16L28 0l28 16v34L28 66zm0-2l26-15V18L28 2 2 18v31l26 15z' fill='%230d6efd' fill-opacity='0.04'/%3E%3C/svg%3E");
    }
</style>
@endpush

@section('content')

{{-- ═══ HERO ═══ --}}
<section class="page-hero">
    <canvas id="aboutCanvas"></canvas>

    @foreach([['fa-lightbulb','8%','10%','10s','0s'],['fa-brain','80%','15%','12s','2s'],['fa-microscope','50%','5%','9s','1s'],['fa-gear','20%','20%','11s','3s'],['fa-globe','70%','8%','13s','1.5s'],['fa-handshake','35%','18%','8s','4s']] as $ic)
    <div class="float-icon" style="left:{{ $ic[1] }};top:{{ $ic[2] }};animation-duration:{{ $ic[3] }};animation-delay:{{ $ic[4] }}"><i class="fa-solid fa-{{ $ic[0] }}"></i></div>
    @endforeach

    <div class="container hero-content">
        <div class="row align-items-center g-5">
            <div class="col-lg-7 text-white">
                <div class="glow-badge mb-4"><i class="fa-solid fa-building"></i> &nbsp;Our Story</div>
                <h1 class="display-4 fw-bold mb-3 lh-sm">
                    About <span class="gradient-text">TechPeak Solutions</span>
                </h1>
                <p class="text-white-50 fs-5 mb-4" style="max-width:520px;line-height:1.7;">
                    The people, values, and vision behind every line of code we write — from Santa Rosa, Laguna to the world.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('services') }}" class="btn-hero-primary btn">Our Services</a>
                    <a href="{{ route('contact') }}" class="btn-hero-outline btn">Work With Us →</a>
                </div>
            </div>

            {{-- Right: animated hexagon graphic --}}
            <div class="col-lg-5 d-none d-lg-flex justify-content-center">
                <div style="position:relative;width:340px;height:340px;">
                    {{-- outer hex ring --}}
                    <div style="position:absolute;inset:0;border:1px solid rgba(13,110,253,.2);border-radius:30% 70% 70% 30%/30% 30% 70% 70%;animation:morphBlob 8s ease-in-out infinite,spin 18s linear infinite;"></div>
                    <div style="position:absolute;inset:30px;border:1px dashed rgba(102,16,242,.25);border-radius:70% 30% 30% 70%/70% 70% 30% 30%;animation:morphBlob 6s ease-in-out infinite reverse,spin 12s linear infinite reverse;"></div>
                    <style>@keyframes spin { to { transform: rotate(360deg); } }</style>
                    {{-- center --}}
                    <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;">
                        <div style="width:130px;height:130px;background:linear-gradient(135deg,rgba(13,110,253,.2),rgba(102,16,242,.2));border:1px solid rgba(13,110,253,.4);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 0 40px rgba(13,110,253,.25);">
                            <i class="fa-solid fa-building" style="font-size:3.2rem;color:#60a5fa;"></i>
                        </div>
                    </div>
                    {{-- orbiting labels --}}
                    <div style="position:absolute;inset:0;animation:spin 20s linear infinite;animation-delay:0s;">
                        <div style="position:absolute;top:0;left:50%;width:46px;height:46px;margin-left:-23px;margin-top:-23px;background:rgba(13,110,253,.15);border:1px solid rgba(13,110,253,.3);border-radius:8px;padding:.3rem .7rem;color:#60a5fa;font-size:.75rem;font-weight:600;white-space:nowrap;display:flex;align-items:center;justify-content:center;">Founded 2020</div>
                    </div>
                    <div style="position:absolute;inset:0;animation:spin 20s linear infinite;animation-delay:-5s;">
                        <div style="position:absolute;top:0;left:50%;width:46px;height:46px;margin-left:-23px;margin-top:-23px;background:rgba(102,16,242,.15);border:1px solid rgba(102,16,242,.3);border-radius:8px;padding:.3rem .7rem;color:#a78bfa;font-size:.75rem;font-weight:600;white-space:nowrap;display:flex;align-items:center;justify-content:center;">50+ Clients</div>
                    </div>
                    <div style="position:absolute;inset:0;animation:spin 20s linear infinite;animation-delay:-10s;">
                        <div style="position:absolute;top:0;left:50%;width:46px;height:46px;margin-left:-23px;margin-top:-23px;background:rgba(52,211,153,.1);border:1px solid rgba(52,211,153,.3);border-radius:8px;padding:.3rem .7rem;color:#34d399;font-size:.75rem;font-weight:600;white-space:nowrap;display:flex;align-items:center;justify-content:center;">20+ Team</div>
                    </div>
                    <div style="position:absolute;inset:0;animation:spin 20s linear infinite;animation-delay:-15s;">
                        <div style="position:absolute;top:0;left:50%;width:46px;height:46px;margin-left:-23px;margin-top:-23px;background:rgba(251,191,36,.1);border:1px solid rgba(251,191,36,.3);border-radius:8px;padding:.3rem .7rem;color:#fbbf24;font-size:.75rem;font-weight:600;white-space:nowrap;display:flex;align-items:center;justify-content:center;">100+ Projects</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-indicator"><div class="scroll-dot"></div><span>Scroll</span></div>
</section>

<style>
@keyframes morphBlob {
    0%,100% { border-radius:30% 70% 70% 30%/30% 30% 70% 70%; }
    50%      { border-radius:70% 30% 30% 70%/70% 70% 30% 30%; }
}
</style>

{{-- ═══ COMPANY HISTORY ═══ --}}
<section class="py-5 bg-white">
    <div class="container py-3">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="text-primary fw-semibold text-uppercase small">Our Story</span>
                <h2 class="fw-bold mt-1 mb-3" style="font-size:2.2rem;">From a Small Team to a <span class="gradient-text">Growing Force</span></h2>
                <p class="text-muted lh-lg">TechPeak Solutions was founded in 2020 by a group of passionate software engineers and designers who believed that great technology should be accessible to every business — not just the big ones.</p>
                <p class="text-muted lh-lg">Starting from a small co-working space in Santa Rosa, Laguna, we quickly grew our portfolio by delivering high-quality web and mobile solutions to local businesses. Today, we serve clients across the Philippines and continue to expand our reach globally.</p>
                <p class="text-muted lh-lg">Our journey has been defined by a relentless commitment to quality, innovation, and client satisfaction — values that remain at the core of everything we do.</p>
            </div>
            <div class="col-lg-6">
                <div class="tech-card-dark p-4">
                    <h6 class="text-white-50 text-uppercase small mb-4 fw-semibold"><i class="fa-solid fa-calendar-days"></i> Company Timeline</h6>
                    @foreach([
                        ['2020','Founded','TechPeak Solutions established in Santa Rosa, Laguna.'],
                        ['2021','First 10 Clients','Delivered 15+ successful web and mobile projects.'],
                        ['2022','Team Expansion','Grew to a team of 20 skilled professionals.'],
                        ['2023','Cloud Division','Launched dedicated Cloud & Cybersecurity services.'],
                        ['2024','50+ Clients','Serving businesses across the Philippines and beyond.'],
                    ] as $item)
                    <div class="d-flex gap-3 mb-3 align-items-start">
                        <div class="timeline-dot mt-1"></div>
                        <div>
                            <span class="text-primary fw-bold small">{{ $item[0] }} — {{ $item[1] }}</span>
                            <p class="text-white-50 small mb-0">{{ $item[2] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══ MISSION / VISION / VALUES ═══ --}}
<section class="py-5 hex-bg" style="background-color:#f8f9ff;">
    <div class="container py-3">
        <div class="text-center mb-5">
            <span class="text-primary fw-semibold text-uppercase small">Our Foundation</span>
            <h2 class="fw-bold mt-1 section-title">What Drives Us</h2>
        </div>
        <div class="row g-4">

            {{-- Mission: Spaceship --}}
            <div class="col-md-4">
                <div class="value-card h-100 text-center">
                    <div class="service-icon-wrap mx-auto mb-3" style="width:70px;height:70px;font-size:1.8rem;background:linear-gradient(135deg,rgba(13,110,253,.12),rgba(102,16,242,.12));">
                        <span class="fa-stack" style="font-size:.9rem;">
                            <i class="fa-solid fa-rocket fa-stack-1x" style="color:#0d6efd;font-size:1.8rem;"></i>
                        </span>
                    </div>
                    <h4 class="fw-bold mb-3" style="background:linear-gradient(90deg,#0d6efd,#6610f2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Mission</h4>
                    <p class="text-muted">To empower businesses through innovative, reliable, and affordable technology solutions that drive growth and create lasting digital impact.</p>
                </div>
            </div>

            {{-- Vision: Eye --}}
            <div class="col-md-4">
                <div class="value-card h-100 text-center">
                    <div class="service-icon-wrap mx-auto mb-3" style="width:70px;height:70px;font-size:1.8rem;background:linear-gradient(135deg,rgba(13,110,253,.12),rgba(102,16,242,.12));">
                        <span class="fa-stack" style="font-size:.9rem;">
                            <i class="fa-solid fa-eye fa-stack-1x" style="color:#6610f2;font-size:1.8rem;"></i>
                        </span>
                    </div>
                    <h4 class="fw-bold mb-3" style="background:linear-gradient(90deg,#0d6efd,#6610f2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Vision</h4>
                    <p class="text-muted">To be the most trusted technology partner for businesses in Southeast Asia, recognized for excellence, integrity, and transformative digital solutions.</p>
                </div>
            </div>

            {{-- Core Values: Planet ring + heart center --}}
            <div class="col-md-4">
                <div class="value-card h-100 text-center">
                    <div class="service-icon-wrap mx-auto mb-3" style="width:70px;height:70px;background:linear-gradient(135deg,rgba(13,110,253,.12),rgba(102,16,242,.12));position:relative;">
                        <span class="fa-stack" style="font-size:.85rem;">
                            <i class="fa-solid fa-circle fa-stack-2x" style="color:rgba(13,110,253,.08);"></i>
                            <i class="fa-solid fa-heart fa-stack-1x" style="color:#e74c8b;font-size:1rem;"></i>
                        </span>
                        {{-- orbit ring --}}
                        <div style="position:absolute;inset:-4px;border:2px solid rgba(13,110,253,.35);border-radius:50%;transform:rotate(-30deg);border-top-color:transparent;border-bottom-color:transparent;"></div>
                    </div>
                    <h4 class="fw-bold mb-3" style="background:linear-gradient(90deg,#0d6efd,#6610f2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Core Values</h4>
                    <ul class="list-unstyled text-muted text-start">
                        @foreach(['<i class="fa-solid fa-circle-check"></i> Innovation First','<i class="fa-solid fa-circle-check"></i> Client-Centered','<i class="fa-solid fa-circle-check"></i> Integrity & Transparency','<i class="fa-solid fa-circle-check"></i> Continuous Learning','<i class="fa-solid fa-circle-check"></i> Teamwork & Collaboration'] as $v)
                        <li class="mb-2">{!! $v !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ═══ TEAM ═══ --}}
<section class="py-5 bg-white">
    <div class="container py-3">
        <div class="text-center mb-5">
            <span class="text-primary fw-semibold text-uppercase small">The People</span>
            <h2 class="fw-bold mt-1 section-title">Meet Our Team</h2>
            <p class="text-muted mt-3">A diverse group of passionate professionals dedicated to your success.</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach([
                ['tony-stark.webp','Tony Stark','Chief Executive Officer','Visionary leader with 10+ years in tech entrepreneurship.','#0d6efd'],
                ['pepper-potts.jpg','Pepper Potts','Lead Developer','Full-stack engineer specializing in Laravel and React.','#6610f2'],
                ['jane-poster.jpg','Jane Poster','UI/UX Designer','Creative designer passionate about user-centered experiences.','#0dcaf0'],
                ['bruce-banner.webp','Bruce Banner','Cybersecurity Specialist','Expert in network security and threat intelligence.','#198754'],
            ] as $m)
            <div class="col-sm-6 col-lg-3">
                <div class="team-card h-100">
                    <img src="{{ asset('photos/' . $m[0]) }}" alt="{{ $m[1] }}" class="team-avatar" style="border-color:{{ $m[4] }}40;">
                    <h5 class="fw-bold mb-1">{{ $m[1] }}</h5>
                    <span class="badge mb-2 px-3" style="background:linear-gradient(135deg,#0d6efd,#6610f2);">{{ $m[2] }}</span>
                    <p class="text-muted small mb-0">{{ $m[3] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══ CTA ═══ --}}
<section class="cta-section py-5 text-white">
    <div class="container text-center py-4 position-relative" style="z-index:1;">
        <span class="glow-badge mb-4 d-inline-block">Join Our Journey</span>
        <h2 class="fw-bold display-5 mb-3">Ready to Work With Us?</h2>
        <p class="text-white-50 fs-5 mb-4 mx-auto" style="max-width:480px;">Let's collaborate and build something extraordinary together.</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('contact') }}" class="btn-hero-primary btn btn-lg px-5">Get In Touch</a>
            <a href="{{ route('services') }}" class="btn-hero-outline btn btn-lg px-5">Our Services</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>initParticleCanvas('aboutCanvas');</script>
@endpush
