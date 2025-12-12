@extends('layouts.app')

@section('title', 'Contact Us - Aura Suites')

@section('content')
    <!-- Page Header -->
    <section class="bg-dark text-white py-5">
        <div class="container">
            <h1 class="text-center">Contact Us</h1>
            <p class="text-center lead">Get in touch with our team</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-body p-4">
                            <h3 class="card-title mb-4">Send us a Message</h3>
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="tel" class="form-control" id="phone">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inquiryType" class="form-label">Inquiry Type</label>
                                    <select class="form-select" id="inquiryType">
                                        <option value="general">General Inquiry</option>
                                        <option value="reservation">Room Reservation</option>
                                        <option value="event">Event Booking</option>
                                        <option value="complaint">Complaint</option>
                                        <option value="feedback">Feedback</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-warning btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-4">Contact Information</h4>

                            <div class="d-flex align-items-start mb-4">
                                <i class="fas fa-map-marker-alt text-warning me-3 mt-1"></i>
                                <div>
                                    <h6>Address</h6>
                                    <p class="text-muted mb-0">Sea View Road, Clifton<br>Karachi, Pakistan</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-4">
                                <i class="fas fa-phone text-warning me-3 mt-1"></i>
                                <div>
                                    <h6>Phone</h6>
                                    <p class="text-muted mb-0">+92-21-1234567<br>+92-21-7654321</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-4">
                                <i class="fas fa-envelope text-warning me-3 mt-1"></i>
                                <div>
                                    <h6>Email</h6>
                                    <p class="text-muted mb-0">info@aurasuites.com<br>reservations@aurasuites.com</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-4">
                                <i class="fas fa-clock text-warning me-3 mt-1"></i>
                                <div>
                                    <h6>Front Desk Hours</h6>
                                    <p class="text-muted mb-0">24/7<br>Always available to assist you</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Section -->
                    <div class="card shadow mt-4">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3">Quick FAQ</h5>
                            <div class="accordion" id="faqAccordion">
                                <div class="accordion-item">
                                    <h6 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq1">
                                            What time is check-in/check-out?
                                        </button>
                                    </h6>
                                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Check-in: 2:00 PM | Check-out: 12:00 PM
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h6 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq2">
                                            Do you offer airport transfer?
                                        </button>
                                    </h6>
                                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Yes, we provide airport transfer service upon request.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Our Location</h2>
            <div class="card shadow">
                <div class="card-body p-0">
                    <div class="bg-dark text-white p-4 text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-map-marker-alt text-warning me-2"></i>
                            Sea View Road, Clifton, Karachi
                        </h5>
                    </div>
                    <!-- Simple map placeholder -->
                    <div class="p-5 text-center bg-secondary text-white" style="min-height: 300px;">
                        <iframe style="width: 100%"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d924247.1435344581!2d66.49596117975734!3d25.19174041389555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e06651d4bbf%3A0x9cf92f44555a0c23!2sKarachi%2C%20Pakistan!5e0!3m2!1sen!2s!4v1761288870414!5m2!1sen!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Simple form validation
            const firstName = document.getElementById('firstName').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;

            if (firstName && email && message) {
                // Show success modal
                if (typeof showBookingModal === 'function') {
                    showBookingModal('Contact Form Submitted', 'Thank you for your message! We will get back to you soon.');
                } else {
                    // Fallback modal
                    const modalHTML = `
                        <div class="modal fade" id="contactSuccessModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title">Message Sent Successfully!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                                        <p>Thank you for your message! We will get back to you soon.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    const existingModal = document.getElementById('contactSuccessModal');
                    if (existingModal) existingModal.remove();
                    document.body.insertAdjacentHTML('beforeend', modalHTML);
                    const modal = new bootstrap.Modal(document.getElementById('contactSuccessModal'));
                    modal.show();
                }
                this.reset();
            }
        });
    </script>
@endsection