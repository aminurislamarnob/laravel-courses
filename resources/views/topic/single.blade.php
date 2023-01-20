<x-guest-layout>
    <section class="mt-20 lg:mt-[140px]">
        <div class="container mx-auto">
            <h1 class="heading-tertiory text-center mb-10 md:mb-16">{{$topics->name}}</h1>
            <div class="inline-flex single-feature gap-10 flex-wrap mx-auto">
                @foreach($courses as $course)
                    @include('components.course-box', ['course' => $course])
                @endforeach
            </div>
            <div class="mt-12 mb-12">
                {{ $courses->links() }}
            </div>
        </div>
    </section>
</x-guest-layout>