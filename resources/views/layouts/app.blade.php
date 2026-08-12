<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'TechPeak Solutions' }} | Innovating Your Digital Future</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; }

        /* ── Shared hero ── */
        .page-hero {
            position: relative;
            background: linear-gradient(135deg, #020818 0%, #0a1628 40%, #0d1f3c 70%, #091020 100%);
            overflow: hidden;
            padding: 6rem 0 5rem;
        }
        .page-hero canvas {
            position: absolute;
            inset: 0; width: 100%; height: 100%;
            opacity: .45;
        }
        .page-hero .hero-content { position: relative; z-index: 2; }

        /* glow badge */
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

        /* gradient text */
        .gradient-text {
            background: linear-gradient(90deg, #60a5fa, #a78bfa, #34d399);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* hero buttons */
        .btn-hero-primary {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            border: none; color: #fff;
            padding: .75rem 2rem; border-radius: 50px; font-weight: 600;
            transition: transform .2s, box-shadow .2s;
        }
        .btn-hero-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(13,110,253,.5); color: #fff; }
        .btn-hero-outline {
            background: transparent;
            border: 1.5px solid rgba(255,255,255,.35);
            color: #fff; padding: .75rem 2rem; border-radius: 50px; font-weight: 600;
            transition: all .2s;
        }
        .btn-hero-outline:hover { background: rgba(255,255,255,.1); border-color: #fff; color: #fff; }

        /* floating icons */
        .float-icon {
            position: absolute; font-size: 1.6rem; opacity: .1;
            animation: floatUp linear infinite; pointer-events: none;
        }
        @keyframes floatUp {
            0%   { transform: translateY(0) rotate(0deg); opacity: .1; }
            50%  { opacity: .2; }
            100% { transform: translateY(-110vh) rotate(360deg); opacity: 0; }
        }

        /* section title underline */
        .section-title::after {
            content: ''; display: block; width: 50px; height: 4px;
            background: linear-gradient(90deg,#0d6efd,#6610f2);
            margin: 10px auto 0; border-radius: 2px;
        }

        /* cards */
        .card { transition: transform .2s, box-shadow .2s; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 8px 24px rgba(0,0,0,.12); }
        .nav-link { transition: color .2s; }
        .nav-link:hover { color: #0d6efd !important; }

        /* dark tech card */
        .tech-card-dark {
            background: linear-gradient(135deg, #0a1628, #0d1f3c);
            border: 1px solid rgba(255,255,255,.07);
            border-radius: 16px; color: #fff;
        }

        /* service card */
        .service-card {
            background: #fff; border: 1px solid #e9ecef;
            border-radius: 16px; padding: 2rem;
            transition: all .3s; position: relative; overflow: hidden;
        }
        .service-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
            background: linear-gradient(90deg,#0d6efd,#6610f2);
            transform: scaleX(0); transition: transform .3s;
        }
        .service-card:hover { transform: translateY(-6px); box-shadow: 0 16px 40px rgba(0,0,0,.1); }
        .service-card:hover::before { transform: scaleX(1); }
        .service-icon-wrap {
            width: 60px; height: 60px;
            background: linear-gradient(135deg,rgba(13,110,253,.1),rgba(102,16,242,.1));
            border-radius: 14px; display: flex; align-items: center;
            justify-content: center; font-size: 1.6rem; margin-bottom: 1rem;
        }

        /* cta section */
        .cta-section {
            background: linear-gradient(135deg,#020818,#0a1628);
            position: relative; overflow: hidden;
        }
        .cta-section::before {
            content: ''; position: absolute;
            width: 500px; height: 500px;
            background: radial-gradient(circle,rgba(13,110,253,.15) 0%,transparent 70%);
            top: -150px; right: -100px; border-radius: 50%;
        }
        .cta-section::after {
            content: ''; position: absolute;
            width: 400px; height: 400px;
            background: radial-gradient(circle,rgba(102,16,242,.12) 0%,transparent 70%);
            bottom: -100px; left: -80px; border-radius: 50%;
        }

        /* stats bar */
        .stats-bar { background: linear-gradient(135deg,#0a1628,#0d1f3c); border-top:1px solid rgba(255,255,255,.06); border-bottom:1px solid rgba(255,255,255,.06); }
        .stat-item { border-right: 1px solid rgba(255,255,255,.08); }
        .stat-item:last-child { border-right: none; }
        .stat-number { font-size:2rem; font-weight:800; background:linear-gradient(90deg,#60a5fa,#a78bfa); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }

        /* ticker */
        .ticker-wrap { background:linear-gradient(135deg,#0a1628,#0d1f3c); overflow:hidden; padding:1rem 0; border-top:1px solid rgba(255,255,255,.06); border-bottom:1px solid rgba(255,255,255,.06); }
        .ticker-track { display:flex; gap:3rem; animation:ticker 25s linear infinite; white-space:nowrap; }
        .ticker-track:hover { animation-play-state:paused; }
        @keyframes ticker { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }
        .ticker-item { display:flex; align-items:center; gap:.5rem; color:rgba(255,255,255,.5); font-size:.85rem; font-weight:500; letter-spacing:.05em; }
        .ticker-item span { color:#60a5fa; font-size:1.1rem; }

        /* timeline dot */
        .timeline-dot { width:12px; height:12px; background:#0d6efd; border-radius:50%; flex-shrink:0; margin-top:5px; box-shadow:0 0 8px #0d6efd; }

        /* spin */
        @keyframes spin { to { transform: rotate(360deg); } }

        /* scroll indicator */
        .scroll-indicator { position:absolute; bottom:1.5rem; left:50%; transform:translateX(-50%); display:flex; flex-direction:column; align-items:center; gap:.3rem; color:rgba(255,255,255,.4); font-size:.7rem; letter-spacing:.1em; text-transform:uppercase; }
        .scroll-dot { width:20px; height:34px; border:2px solid rgba(255,255,255,.3); border-radius:10px; position:relative; }
        .scroll-dot::after { content:''; position:absolute; top:5px; left:50%; transform:translateX(-50%); width:4px; height:6px; background:rgba(255,255,255,.6); border-radius:2px; animation:scrollBounce 1.6s ease-in-out infinite; }
        @keyframes scrollBounce { 0%,100%{top:5px;opacity:1} 100%{top:18px;opacity:0} }
    </style>
    @stack('styles')
</head>
<body class="bg-light">

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Shared particle canvas initialiser --}}
    <script>
    function initParticleCanvas(canvasId) {
        const canvas = document.getElementById(canvasId);
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        let W, H, nodes = [];

        function resize() {
            W = canvas.width  = canvas.offsetWidth;
            H = canvas.height = canvas.offsetHeight;
        }
        resize();
        window.addEventListener('resize', () => { resize(); initNodes(); });

        function initNodes() {
            nodes = [];
            const count = Math.max(40, Math.floor((W * H) / 12000));
            for (let i = 0; i < count; i++) {
                nodes.push({ x:Math.random()*W, y:Math.random()*H, vx:(Math.random()-.5)*.4, vy:(Math.random()-.5)*.4, r:Math.random()*2+1 });
            }
        }
        initNodes();

        function draw() {
            ctx.clearRect(0, 0, W, H);
            for (let i = 0; i < nodes.length; i++) {
                for (let j = i+1; j < nodes.length; j++) {
                    const dx = nodes[i].x-nodes[j].x, dy = nodes[i].y-nodes[j].y;
                    const d = Math.sqrt(dx*dx+dy*dy);
                    if (d < 130) {
                        ctx.beginPath(); ctx.moveTo(nodes[i].x,nodes[i].y); ctx.lineTo(nodes[j].x,nodes[j].y);
                        ctx.strokeStyle = `rgba(96,165,250,${(1-d/130)*.35})`; ctx.lineWidth=.8; ctx.stroke();
                    }
                }
            }
            nodes.forEach(n => {
                ctx.beginPath(); ctx.arc(n.x,n.y,n.r,0,Math.PI*2);
                ctx.fillStyle='rgba(96,165,250,.7)'; ctx.fill();
                n.x+=n.vx; n.y+=n.vy;
                if(n.x<0||n.x>W) n.vx*=-1;
                if(n.y<0||n.y>H) n.vy*=-1;
            });
            requestAnimationFrame(draw);
        }
        draw();

        canvas.addEventListener('mousemove', e => {
            const r = canvas.getBoundingClientRect();
            const mx=e.clientX-r.left, my=e.clientY-r.top;
            nodes.forEach(n => {
                const dx=n.x-mx, dy=n.y-my, d=Math.sqrt(dx*dx+dy*dy);
                if(d<100){ n.vx+=dx/d*.08; n.vy+=dy/d*.08; const s=Math.sqrt(n.vx*n.vx+n.vy*n.vy); if(s>2){n.vx=n.vx/s*2;n.vy=n.vy/s*2;} }
            });
        });
    }
    </script>

    @stack('scripts')
</body>
</html>
