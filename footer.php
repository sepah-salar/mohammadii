<footer class="clash-footer pt-5">
    <div class="container-fluid px-lg-5">
        <div class="row g-4 justify-content-center">
            
            <!-- بخش لوگو -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="clash-brand position-relative">
                    <div class="clash-border"></div>
                    <h3 class="gold-text mb-3">⚔️ CLASH LEGENDS</h3>
                    <p class="text-light opacity-75 small">ساخت افسانه‌ها از ۲۰۱۲</p>
                    <div class="clash-border reverse"></div>
                </div>
            </div>

            <!-- لینک‌ها -->
            <div class="col-xl-2 col-lg-3 col-md-4">
                <div class="footer-section">
                    <h5 class="gold-text mb-3"><i class="fas fa-map me-2"></i>نقشه‌ها</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link small">پایگاه اژدها</a></li>
                        <li><a href="#" class="footer-link small">قلعه الکترو</a></li>
                        <li><a href="#" class="footer-link small">دهکده تاریک</a></li>
                    </ul>
                </div>
            </div>

            <!-- نبردها -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="footer-section">
                    <h5 class="gold-text mb-3"><i class="fas fa-crosshairs me-2"></i>جنگ‌های اخیر</h5>
                    <div class="battle-stats">
                        <div class="battle-item victory">
                            <span>پیروزی ضد اژدها</span>
                            <span>+320</span>
                        </div>
                        <div class="battle-item defeat">
                            <span>شکست در حمله هوایی</span>
                            <span>-15</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- خبرنامه -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="footer-section">
                    <h5 class="gold-text mb-3"><i class="fas fa-scroll me-2"></i>اخبار قبیله</h5>
                    <div class="input-group clash-input-group">
                        <input type="email" class="form-control clash-input" placeholder="مثال: chief@clan.com">
                        <button class="btn clash-btn">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <div class="social-icons mt-4">
                        <a href="#" class="social-icon"><i class="fab fa-telegram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-discord"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-battle-net"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- کپی رایت -->
        <div class="footer-copyright text-center py-4">
            <span class="text-glow">© <?=date('Y')?> Clan of Legends • قدرت گرفته از اکسیر خالص</span>
        </div>
    </div>
</footer>

<style>
.clash-footer {
    background: #0a0a0a;
    border-top: 3px solid;
    border-image: linear-gradient(45deg, #8a6c2d, #c5a047, #8a6c2d) 1;
    position: relative;
    overflow: hidden;
    width: 100%;
    height: 60%;
    margin: 20px;
}

.clash-footer::before {
    content: '';
    position: absolute;
    top: 0;
    
    background: repeating-linear-gradient(
          45deg,
        #1a1a1a 0px,
        #1a1a1a 25px,
        #0a0a0a 25px,
        #0a0a0a 50px
    );
    opacity: 0.1;
    z-index: 0;
}

.gold-text {
    color: #c5a047;
    font-family: 'Tahoma', sans-serif;
    text-shadow: 0 0 10px #c5a04733;
    position: relative;
}

.clash-border {
    height: 2px;
    background: linear-gradient(90deg, transparent, #c5a047, transparent);
    margin: 1rem 0;
}

.clash-border.reverse {
    background: linear-gradient(90deg, transparent, #8a6c2d, transparent);
}

.footer-section {
    position: relative;
    z-index: 1;
    padding: 1.5rem;
    background: #111111dd;
    border-radius: 8px;
    backdrop-filter: blur(3px);
    border: 1px solid #ffffff0d;
    transition: 0.3s;
}

.footer-section:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px #00000055;
}

.footer-link {
    color: #ffffffcc !important;
    text-decoration: none;
    padding: 0.3rem 0;
    display: block;
    position: relative;
}

.footer-link::before {
    content: '•';
    color: #c5a047;
    margin-left: 0.5rem;
    opacity: 0;
    transition: 0.3s;
}

.footer-link:hover {
    color: #c5a047 !important;
    padding-right: 1rem;
}

.footer-link:hover::before {
    opacity: 1;
}

.clash-input {
    background: #1a1a1a !important;
    border: 1px solid #c5a04733 !important;
    color: #fff !important;
    border-radius: 5px !important;
}

.clash-btn {
    background: linear-gradient(45deg, #c5a047, #8a6c2d) !important;
    color: #000 !important;
    border: none !important;
    transition: 0.3s !important;
}

.clash-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px #c5a04755;
}

.battle-item {
    padding: 0.5rem;
    margin: 0.3rem 0;
    border-radius: 5px;
    display: flex;
    justify-content: space-between;
    font-size: 0.9em;
}

.victory { background: #1a472a55; color: #2ecc71; }
.defeat { background: #470f0f55; color: #e74c3c; }

.social-icons {
    display: flex;
    gap: 1rem;
    justify-content: center;
}

.social-icon {
    font-size: 1.5rem;
    color: #c5a047;
    transition: 0.3s;
    text-shadow: 0 0 10px #c5a04733;
}

.social-icon:hover {
    color: #fff;
    transform: rotate(360deg);
}

.footer-copyright {
    position: relative;
    border-top: 1px solid #ffffff11;
    margin-top: 2rem;
}

.text-glow {
    text-shadow: 0 0 10px #c5a04755;
    color: #ffffff99;
}
</style>