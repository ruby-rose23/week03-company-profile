@extends('layouts.app')
@section('title', 'Contact Us')

@push('styles')
<style>
    .contact-info-card {
        background: linear-gradient(135deg,#0a1628,#0d1f3c);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 16px; color: #fff; padding: 2rem;
    }
    .info-item {
        display: flex; gap: 1rem; align-items: flex-start;
        padding: 1rem 0; border-bottom: 1px solid rgba(255,255,255,.06);
    }
    .info-item:last-child { border-bottom: none; padding-bottom: 0; }
    .info-icon {
        width: 44px; height: 44px; flex-shrink: 0;
        background: rgba(13,110,253,.15); border: 1px solid rgba(13,110,253,.3);
        border-radius: 10px; display: flex; align-items: center;
        justify-content: center; font-size: 1.2rem; color: #60a5fa;
    }

    .form-card {
        background: #fff; border-radius: 20px;
        border: 1px solid #e9ecef; padding: 2.5rem;
        box-shadow: 0 8px 32px rgba(0,0,0,.06);
    }
    .form-control, .form-select {
        border-radius: 10px; border: 1.5px solid #e9ecef;
        padding: .75rem 1rem; transition: border-color .2s, box-shadow .2s;
    }
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 3px rgba(13,110,253,.12);
    }

    .social-btn {
        display: flex; align-items: center; gap: .5rem;
        padding: .5rem 1rem; border-radius: 8px;
        border: 1px solid rgba(255,255,255,.15);
        color: rgba(255,255,255,.7); font-size: .85rem;
        text-decoration: none; transition: all .2s;
    }
    .social-btn:hover { background: rgba(255,255,255,.08); color: #fff; border-color: rgba(255,255,255,.3); }

    .map-placeholder {
        border-radius: 12px; overflow: hidden;
        background: linear-gradient(135deg,#0a1628,#0d1f3c);
        border: 1px solid rgba(255,255,255,.07);
        height: 180px; display: flex; align-items: center; justify-content: center;
        position: relative;
    }
    .map-placeholder::before {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(circle at 50% 50%, rgba(13,110,253,.15) 0%, transparent 70%);
    }
</style>
@endpush

@section('content')

{{-- === HERO === --}}
<section class="page-hero">
    <canvas id="contactCanvas"></canvas>

    @foreach([['fa-envelope','8%','10%','10s','0s'],['fa-phone','80%','12%','12s','2s'],['fa-comment','45%','5%','9s','1s'],['fa-satellite-dish','20%','18%','11s','3s'],['fa-map','70%','8%','13s','1.5s'],['fa-paper-plane','90%','20%','8s','4s']] as $ic)
    <div class="float-icon" style="left:{{ $ic[1] }};top:{{ $ic[2] }};animation-duration:{{ $ic[3] }};animation-delay:{{ $ic[4] }}"><i class="fa-solid fa-{{ $ic[0] }}"></i></div>
    @endforeach

    <div class="container hero-content">
        <div class="row align-items-center g-5">
            <div class="col-lg-7 text-white">
                <div class="glow-badge mb-4"><i class="fa-solid fa-paper-plane"></i> &nbsp;Reach Out</div>
                <h1 class="display-4 fw-bold mb-3 lh-sm">
                    Get In <span class="gradient-text">Touch</span>
                </h1>
                <p class="text-white-50 fs-5 mb-4" style="max-width:520px;line-height:1.7;">
                    Have a project in mind? We'd love to hear from you. Send us a message and we'll respond within 24 hours.
                </p>
                <div class="d-flex gap-4 flex-wrap">
                    @foreach(['<i class="fa-solid fa-envelope"></i> hello@techpeaksolutions.ph','<i class="fa-solid fa-phone"></i> +63 49 123 4567','<i class="fa-solid fa-location-dot"></i> Santa Rosa, Laguna'] as $info)
                    <span class="text-white-50 small">{!! $info !!}</span>
                    @endforeach
                </div>
            </div>

            {{-- Right: signal / communication graphic --}}
            <div class="col-lg-5 d-none d-lg-flex justify-content-center align-items-center">
                <div style="position:relative;width:300px;height:300px;">
                    {{-- signal rings --}}
                    @foreach(['0px','30px','60px','90px'] as $i => $inset)
                    <div style="position:absolute;inset:{{ $inset }};border:1px solid rgba(13,110,253,{{ 0.35 - $i*0.07 }});border-radius:50%;animation:pulseRing {{ 2 + $i*0.5 }}s ease-in-out infinite,spin {{ 10 + $i*4 }}s linear infinite {{ $i % 2 == 0 ? '' : 'reverse' }};animation-delay:{{ $i*0.4 }}s;"></div>
                    @endforeach
                    <style>@keyframes spin { to { transform: rotate(360deg); } }</style>
                    {{-- center --}}
                    <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;">
                        <div style="width:100px;height:100px;background:linear-gradient(135deg,rgba(13,110,253,.25),rgba(102,16,242,.25));border:1px solid rgba(13,110,253,.5);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 0 30px rgba(13,110,253,.3);font-size:2.5rem;"><i class="fa-solid fa-satellite-dish" style="color:#60a5fa;"></i></div>
                    </div>
                    {{-- orbiting message bubbles --}}
                    <div style="position:absolute;inset:0;animation:spin 20s linear infinite;animation-delay:0s;">
                        <div style="position:absolute;top:0;left:50%;width:46px;height:46px;margin-left:-23px;margin-top:-23px;background:rgba(13,110,253,.15);border:1px solid rgba(13,110,253,.3);border-radius:12px;padding:.4rem .8rem;color:#60a5fa;font-size:.75rem;font-weight:600;white-space:nowrap;display:flex;align-items:center;justify-content:center;">Hello! <i class="fa-solid fa-hand-wave ms-1"></i></div>
                    </div>
                    <div style="position:absolute;inset:0;animation:spin 20s linear infinite;animation-delay:-6.66s;">
                        <div style="position:absolute;top:0;left:50%;width:46px;height:46px;margin-left:-23px;margin-top:-23px;background:rgba(52,211,153,.1);border:1px solid rgba(52,211,153,.3);border-radius:12px;padding:.4rem .8rem;color:#34d399;font-size:.75rem;font-weight:600;white-space:nowrap;display:flex;align-items:center;justify-content:center;">Let's talk! <i class="fa-solid fa-comments ms-1"></i></div>
                    </div>
                    <div style="position:absolute;inset:0;animation:spin 20s linear infinite;animation-delay:-13.33s;">
                        <div style="position:absolute;top:0;left:50%;width:46px;height:46px;margin-left:-23px;margin-top:-23px;background:rgba(102,16,242,.15);border:1px solid rgba(102,16,242,.3);border-radius:12px;padding:.4rem .8rem;color:#a78bfa;font-size:.75rem;font-weight:600;white-space:nowrap;display:flex;align-items:center;justify-content:center;">24h reply <i class="fa-solid fa-bolt ms-1"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-indicator"><div class="scroll-dot"></div><span>Scroll</span></div>
</section>

<style>
@keyframes pulseRing { 0%,100%{transform:scale(1);opacity:1} 50%{transform:scale(1.04);opacity:.6} }
@keyframes floatBubble { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-8px)} }
</style>

{{-- === CONTACT SECTION === --}}
<section class="py-5" style="background:#f8f9ff;">
    <div class="container py-3">
        <div class="row g-5 align-items-start">

            {{-- Contact Form --}}
            <div class="col-lg-7">
                <div class="form-card">
                    <span class="text-primary fw-semibold text-uppercase small">Send a Message</span>
                    <h3 class="fw-bold mt-1 mb-1">We'd Love to Hear From You</h3>
                    <p class="text-muted mb-4">Fill out the form and our team will get back to you within 24 hours.</p>

                    @if(session('success'))
                        <div class="alert alert-success rounded-3">{{ session('success') }}</div>
                    @endif

                    <form>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Juan dela Cruz" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="juan@example.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small">Subject <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="How can we help you?" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small">Message <span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="5" placeholder="Tell us about your project or inquiry..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-hero-primary btn btn-lg w-100 fw-semibold">
                                    Send Message <i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Contact Info --}}
            <div class="col-lg-5">
                <div class="contact-info-card mb-4">
                    <h5 class="fw-bold text-white mb-3">Contact Information</h5>
                    @foreach([
                        ['location-dot','Office Address','123 Innovation Drive, Tech Park, Santa Rosa, Laguna, Philippines'],
                        ['envelope','Email Us','hello@techpeaksolutions.ph'],
                        ['phone','Call Us','+63 49 123 4567'],
                        ['clock','Business Hours',"Mon–Fri: 8:00 AM – 6:00 PM\nSat: 9:00 AM – 12:00 PM"],
                    ] as $info)
                    <div class="info-item">
                        <div class="info-icon"><i class="fa-solid fa-{{ $info[0] }}"></i></div>
                        <div>
                            <div class="text-white-50 small fw-semibold text-uppercase" style="font-size:.7rem;letter-spacing:.06em;">{{ $info[1] }}</div>
                            <div class="text-white small mt-1" style="white-space:pre-line;">{{ $info[2] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Social Media --}}
                <h6 class="fw-bold mb-3">Follow Us</h6>
                <div class="d-flex gap-2 flex-wrap mb-4">
                    <a href="#" class="social-btn" style="background:rgba(13,110,253,.1);border-color:rgba(13,110,253,.3);color:#60a5fa;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/></svg>
                        Facebook
                    </a>
                    <a href="#" class="social-btn" style="background:rgba(255,255,255,.05);border-color:rgba(255,255,255,.15);color:rgba(255,255,255,.7);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/></svg>
                        GitHub
                    </a>
                    <a href="#" class="social-btn" style="background:rgba(10,102,194,.15);border-color:rgba(10,102,194,.3);color:#60a5fa;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/></svg>
                        LinkedIn
                    </a>
                </div>

                {{-- Map Placeholder --}}
                <div class="map-placeholder">
                    <div class="text-center position-relative" style="z-index:1;">
                        <div style="font-size:2.5rem;"><i class="fa-solid fa-map" style="color:#60a5fa;"></i></div>
                        <p class="text-white fw-semibold mb-0 small">Santa Rosa, Laguna, Philippines</p>
                        <p class="text-white-50 mb-0" style="font-size:.75rem;">123 Innovation Drive, Tech Park</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- === CTA === --}}
<section class="cta-section py-5 text-white">
    <div class="container text-center py-4 position-relative" style="z-index:1;">
        <span class="glow-badge mb-4 d-inline-block">We're Here For You</span>
        <h2 class="fw-bold display-5 mb-3">Let's Start Something Great</h2>
        <p class="text-white-50 fs-5 mb-4 mx-auto" style="max-width:480px;">Whether you have a question or a full project brief — we're ready to help.</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('services') }}" class="btn-hero-primary btn btn-lg px-5">View Our Services</a>
            <a href="{{ route('about') }}" class="btn-hero-outline btn btn-lg px-5">About Us</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>initParticleCanvas('contactCanvas');</script>
@endpush
