<x-frontend.layout>
    <section class="relative h-screen pt-10 lg:pb-32">
        <div class="container relative flex flex-col items-center justify-center max-w-screen-xl text-center">
            <img src="{{ asset('assets/svgs/ic-files.svg') }}" alt="tickety-assets">
            <h2 class="mt-[30px] text-[32px] font-bold">
                Success Checkout
            </h2>
            <p class="mt-4 mb-10 text-lg leading-8 text-iron-grey">
                We will send ticket details through your <br class="hidden md:block">
                email, please sit tight and enjoy your time.
            </p>
            <a href="{{ route('home') }}" class="btn-secondary px-[34px]">
                Book Other Ticket
            </a>
        </div>
        <!-- Wavy line ornament -->
        <img src="{{ asset('assets/svgs/wavy-line-4.svg') }}" class="absolute bottom-0 w-full -z-10" alt="">
    </section>
</x-frontend.layout>