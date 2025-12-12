@extends('layouts.app')

@section('title', 'Thank You - Aura Suites')

@section('content')
    <!-- Thank You Section -->
    <section class="min-vh-100 d-flex align-items-center"
        style="background: linear-gradient(rgba(93, 64, 55, 0.9), rgba(161, 136, 127, 0.9));">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center text-white"> <!-- Text-white class added -->
                    <!-- Success Icon -->
                    <div class="mb-4">
                        <div class="success-animation">
                            <i class="fas fa-check-circle fa-5x text-white mb-4"></i> <!-- Changed to white -->
                        </div>
                    </div>

                    <!-- Thank You Message -->
                    <h1 class="display-4 fw-bold mb-4 text-white">Thank You!</h1> <!-- Text-white added -->
                    <h3 class="mb-4 text-white">Your Booking Has Been Confirmed</h3> <!-- Text-white added -->

                    <!-- Confirmation Details -->
                    <div class="confirmation-card bg-white text-dark rounded-3 p-4 mb-5 shadow-lg">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h5 class="text-warning"><i class="fas fa-receipt me-2"></i>Booking Details</h5>
                                <p class="mb-1"><strong>Booking ID:</strong> AURA-{{ date('YmdHis') }}</p>
                                <p class="mb-1"><strong>Date:</strong> {{ date('F j, Y') }}</p>
                                <p class="mb-0"><strong>Time:</strong> {{ date('g:i A') }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5 class="text-warning"><i class="fas fa-hotel me-2"></i>What's Next?</h5>
                                <p class="mb-1">📧 Confirmation email sent</p>
                                <p class="mb-1">📞 Our team will contact you</p>
                                <p class="mb-0">🛎️ Ready to welcome you!</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex flex-column flex-md-row justify-content-center gap-3 mb-5">
                        <a href="/" class="btn btn-warning btn-lg px-4">
                            <i class="fas fa-home me-2"></i>Back to Home
                        </a>
                        <a href="/rooms" class="btn btn-outline-light btn-lg px-4">
                            <i class="fas fa-bed me-2"></i>Book Another Room
                        </a>
                        <button class="btn btn-light btn-lg px-4" onclick="window.print()">
                            <i class="fas fa-print me-2"></i>Print Confirmation
                        </button>
                    </div>

                    <!-- Additional Information -->
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="info-boxes">
                                <div class="row g-4">
                                    <div class="col-md-4">
                                        <div class="text-center p-3">
                                            <i class="fas fa-envelope fa-2x text-white mb-3"></i> <!-- White icon -->
                                            <h6 class="text-white">Email Confirmation</h6> <!-- White text -->
                                            <small class="text-white">Check your inbox for detailed confirmation</small>
                                            <!-- White text -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center p-3">
                                            <i class="fas fa-phone fa-2x text-white mb-3"></i> <!-- White icon -->
                                            <h6 class="text-white">24/7 Support</h6> <!-- White text -->
                                            <small class="text-white">Call us anytime: +92-21-1234567</small>
                                            <!-- White text -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center p-3">
                                            <i class="fas fa-clock fa-2x text-white mb-3"></i> <!-- White icon -->
                                            <h6 class="text-white">Check-in Reminder</h6> <!-- White text -->
                                            <small class="text-white">Check-in: 2:00 PM | Check-out: 12:00 PM</small>
                                            <!-- White text -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Sharing -->
                    <div class="mt-5">
                        <p class="text-white mb-3">Share your excitement!</p> <!-- White text -->
                        <div class="social-sharing">
                            <a href="#" class="btn btn-outline-light btn-sm mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-outline-light btn-sm mx-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-outline-light btn-sm mx-1">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-outline-light btn-sm mx-1">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hotel Features Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">While You Wait For Your Stay</h2>
            <div class="row">
                <div class="col-md-3 text-center mb-4">
                    <i class="fas fa-utensils fa-2x text-warning mb-3"></i>
                    <h5>Fine Dining</h5>
                    <p class="text-muted small">Explore our exquisite restaurant menus</p>
                </div>
                <div class="col-md-3 text-center mb-4">
                    <i class="fas fa-spa fa-2x text-warning mb-3"></i>
                    <h5>Spa Services</h5>
                    <p class="text-muted small">Book relaxing spa treatments in advance</p>
                </div>
                <div class="col-md-3 text-center mb-4">
                    <i class="fas fa-swimming-pool fa-2x text-warning mb-3"></i>
                    <h5>Pool Access</h5>
                    <p class="text-muted small">Enjoy our luxurious swimming pool</p>
                </div>
                <div class="col-md-3 text-center mb-4">
                    <i class="fas fa-concierge-bell fa-2x text-warning mb-3"></i>
                    <h5>Concierge</h5>
                    <p class="text-muted small">Let us plan your perfect stay</p>
                </div>
            </div>
        </div>
    </section>

    <style>
        .min-vh-100 {
            min-height: 100vh;
        }

        .success-animation {
            animation: bounceIn 1s ease-in-out;
        }

        .confirmation-card {
            border-left: 4px solid #c9a96e;
        }

        .social-sharing .btn {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* Ensure all text in the hero section is white */
        .text-white {
            color: white !important;
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0.3);
                opacity: 0;
            }

            50% {
                transform: scale(1.05);
                opacity: 1;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .info-boxes .col-md-4 {
            transition: transform 0.3s ease;
        }

        .info-boxes .col-md-4:hover {
            transform: translateY(-5px);
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }
    </style>

    <script>
        // Confetti animation for celebration
        document.addEventListener('DOMContentLoaded', function () {
            // Simple confetti effect
            const confettiElements = document.querySelector('.success-animation');

            // Add some dynamic content
            const bookingIdElement = document.querySelector('p strong');
            if (bookingIdElement && bookingIdElement.textContent.includes('Booking ID:')) {
                const randomId = Math.random().toString(36).substr(2, 8).toUpperCase();
                bookingIdElement.parentElement.innerHTML = `<strong>Booking ID:</strong> AURA-${randomId}`;
            }

            // Auto-redirect after 30 seconds (optional)
            setTimeout(() => {
                console.log('Thank you for booking with Aura Suites!');
            }, 30000);
        });

        // Print functionality enhancement
        function printConfirmation() {
            const printContent = `
            <div style="text-align: center; padding: 20px; font-family: Arial, sans-serif;">
                <h1 style="color: #5d4037;">Aura Suites</h1>
                <h2 style="color: #c9a96e;">Booking Confirmation</h2>
                <p>Thank you for your booking!</p>
                <p>Booking ID: AURA-${Math.random().toString(36).substr(2, 8).toUpperCase()}</p>
                <p>Date: ${new Date().toLocaleDateString()}</p>
                <p>We look forward to welcoming you!</p>
            </div>
        `;

            const printWindow = window.open('', '_blank');
            printWindow.document.write(printContent);
            printWindow.document.close();
            printWindow.print();
        }
    </script>
@endsection