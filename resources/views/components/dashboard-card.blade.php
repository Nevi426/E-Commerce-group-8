@props(['title', 'icon', 'link', 'color' => 'blue'])

<a href="{{ $link }}" class="block group">
    <div class="
        bg-white 
        shadow-md 
        rounded-2xl 
        border border-gray-200 
        p-6 
        transition-all 
        duration-300 
        hover:-translate-y-1 
        hover:shadow-2xl 
        hover:border-{{ $color }}-500
        cursor-pointer
    ">

        <div class="flex items-start gap-4">

            <!-- Icon -->
            <div class="
                p-4 
                bg-{{ $color }}-100 
                text-{{ $color }}-600 
                rounded-xl 
                transition-all 
                duration-300
                group-hover:bg-{{ $color }}-600
                group-hover:text-white
            ">
                <i class="fas fa-{{ $icon }} text-3xl"></i>
            </div>

            <!-- Text Content -->
            <div class="flex-1">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-{{ $color }}-700 transition">
                    {{ $title }}
                </h3>

                <p class="text-gray-600 mt-2 leading-relaxed">
                    {{ $slot }}
                </p>
            </div>

        </div>

    </div>
</a>
