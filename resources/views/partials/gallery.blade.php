{{-- <section id="fh5co-portfolio">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center heading-section animate-box">
                <h3>Our Gallery</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
            </div>
        </div>
        <div class="row row-bottom-padded-md">
            <div class="col-md-12">
                <ul id="fh5co-portfolio-list">
                    <li class="two-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{ asset('assets/images/cover_bg_1.jpg') }});">
                        <a href="#" class="color-3">
                            <div class="case-studies-summary">
                                <span>Give Love</span>
                                <h2>Donation is caring</h2>
                            </div>
                        </a>
                    </li>
                    <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{ asset('assets/images/cover_bg_3.jpg') }});">
                        <a href="#" class="color-4">
                            <div class="case-studies-summary">
                                <span>Give Love</span>
                                <h2>Donation is caring</h2>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center animate-box">
                <a href="#" class="btn btn-primary btn-lg">See Gallery</a>
            </div>
        </div>
    </div>
</section> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 1000, // Animation duration
        offset: 120, // Offset from the viewport
        easing: 'ease-in-out', // Animation easing
        once: false, // Allow animations to repeat
    });

    // Add scroll listener to reset AOS when at the top
    window.addEventListener('scroll', function() {
        if (window.scrollY === 0) {
            AOS.refresh(); // Refresh AOS animations when scrolled to the top
        }
    });
</script>
<section class="video-hero" id="fh5co-portfolio" data-aos="fade-in" data-aos-duration="1000">
    <div class="video-container">
        <!-- Blurred Background Container -->
        <div class="blur-container" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
            <div class="content">
                <h2 style="color: #2c2424;" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">MAKING A
                    DIFFERENCE</h2>
                <h3 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">IN GAZA'S CHILDREN'S LIVES</h3>
                <p style="color: #161313; font-weight: 500;" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="800">Join us in our mission to bring hope, education, and healthcare to the children
                    of Gaza. Every contribution, no matter how small, can make a significant impact.</p>
                <button class="play-button" onclick="openVideoModal()" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="1000">
                    <span class="play-icon">▶</span>
                    <span class="button-text">WATCH OUR STORY</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Video Modal -->
    <div class="video-modal" id="videoModal" data-aos="fade-in" data-aos-duration="1000">
        <div class="modal-content">
            <button class="close-button" onclick="closeVideoModal()" data-aos="fade-in" data-aos-duration="1000"
                data-aos-delay="200">×</button>
            <div class="video-wrapper" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="400">
                <video id="videoPlayer" controls>
                    <source src="{{ asset('assets/images/gaza.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</section>


<style>
    .video-hero {
        position: relative;
        width: 100%;
        padding: 0;
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: url({{ asset('assets/images/1.jpg') }}) center/cover no-repeat;

    }

    .video-container {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .blur-container {
        background: rgba(255, 255, 255, 0.123);
        backdrop-filter: blur(8px);
        padding: 2rem;
        border-radius: 10px;
        max-width: 800px;
        width: 90%;
    }

    .content {
        color: white;
        text-align: center;
    }

    .content h2 {
        font-size: 3.5rem;
        margin-bottom: 0.5rem;
        font-weight: 700;
        line-height: 1.2;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .content h3 {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        font-weight: 600;
        line-height: 1.2;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #2ecc71;
    }

    .content p {
        font-size: 1.5rem;
        margin-bottom: 2rem;
        opacity: 0.9;
        line-height: 1.6;
    }

    .play-button {
        background: #2ecc71;
        color: white;
        border: none;
        padding: 1.5rem 3rem;
        border-radius: 50px;
        font-size: 1.5rem;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        transition: transform 0.3s ease, background-color 0.3s ease;
        outline: none;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .play-button:hover {
        transform: scale(1.05);
        background: #27ae60;
    }

    .play-button:focus {
        box-shadow: 0 0 0 3px rgba(46, 204, 113, 0.5);
    }

    .play-icon {
        font-size: 1.6em;
    }

    /* Modal Styles */
    .video-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(10px);
        z-index: 9999;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .video-modal.active {
        display: flex;
        opacity: 1;
    }

    .modal-content {
        position: relative;
        width: 90%;
        max-width: 1200px;
        margin: auto;
        background: #000;
        border-radius: 8px;
        overflow: hidden;
    }

    .video-wrapper {
        position: relative;
        padding-top: 56.25%;
        /* 16:9 Aspect Ratio */
    }

    .video-wrapper video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(0, 0, 0, 0.5);
        border: none;
        color: white;
        font-size: 2rem;
        cursor: pointer;
        z-index: 1;
        padding: 0.5rem;
        line-height: 1;
        outline: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .close-button:focus {
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.5);
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .content h2 {
            font-size: 3rem;
        }

        .content h3 {
            font-size: 2rem;
        }

        .content p {
            font-size: 1.25rem;
        }

        .play-button {
            padding: 1.2rem 2.4rem;
            font-size: 1.3rem;
        }
    }

    @media (max-width: 480px) {
        .content h2 {
            font-size: 2.5rem;
        }

        .content h3 {
            font-size: 1.75rem;
        }

        .content p {
            font-size: 1.1rem;
        }

        .play-button {
            padding: 1rem 2rem;
            font-size: 1.1rem;
        }
    }
</style>

<script>
    const modal = document.getElementById('videoModal');
    const videoPlayer = document.getElementById('videoPlayer');

    function openVideoModal() {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
        videoPlayer.play();
    }

    function closeVideoModal() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
        videoPlayer.pause();
        videoPlayer.currentTime = 0;
    }

    // Close modal when clicking outside the video
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeVideoModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeVideoModal();
        }
    });

    // Prevent modal close when clicking on the video
    videoPlayer.addEventListener('click', (e) => {
        e.stopPropagation();
    });
</script>
