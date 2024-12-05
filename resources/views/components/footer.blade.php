<footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto text-center">
        <p>&copy; {{ date('Y') }} Brent Vanroelen - Erasmushogeschool Brussel</p>
        <p>Made as an assignment for school</p>
            <div class="footer-links">
                <a href="{{ route('faq.index') }}">FAQ</a><br>
                <a href="{{ route('contact.show') }}">Contact</a>
            </div>
        <div class="google-map mt-4">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3224.7132899389894!2d4.319980926580404!3d50.84209572166962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c40f19faf0f9%3A0x4ef5b683135ecb1e!2sErasmushogeschool%20Brussel!5e1!3m2!1snl!2sbe!4v1732794531749!5m2!1snl!2sbe"
        width="100%"
        height="200"
        style="border:0;"
        allowfullscreen="yes"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

    </div>
</footer>
