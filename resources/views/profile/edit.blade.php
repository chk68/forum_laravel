<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white shadow-lg rounded-lg p-4">
                <h1 class="font-semibold text-lg mb-4">{{ __('Змінити інформацію профіля') }}</h1>
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="bg-white shadow-lg rounded-lg p-4">
                <h3 class="font-semibold text-lg mb-4">{{ __('Змінити зображення') }}</h3>
                @include('profile.partials.update-image')
            </div>

            <div class="bg-white shadow-lg rounded-lg p-4">
                <h3 class="font-semibold text-lg mb-4">{{ __('Змінити пароль') }}</h3>
                @include('profile.partials.update-password-form')
            </div>

            <div class="bg-white shadow-lg rounded-lg p-4">
                <h3 class="font-semibold text-lg mb-4">{{ __('Видалення акаунту') }}</h3>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>


{{--
<footer class="footer footer-expand-md footer-dark bg-dark" aria-label="Fourth footer example">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5 class="text-white">Контактная информация</h5>
                <p class="text-white">Адрес: ваш адрес</p>
                <p class="text-white">Телефон: ваш телефон</p>
                <p class="text-white">Email: ваш email</p>
            </div>
            <div class="col-md-6">
                <h5 class="text-white">Ссылки</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Ссылка 1</a></li>
                    <li><a href="#" class="text-white">Ссылка 2</a></li>
                    <li><a href="#" class="text-white">Ссылка 3</a></li>
                    <li><a href="#" class="text-white">Ссылка 4</a></li>
                </ul>
            </div>
        </div>
        <hr class="text-white">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center text-white">&copy; {{ date('Y') }} Ваше название. Все права защищены.</p>
            </div>
        </div>
    </div>
</footer>
--}}




<script>
    const input = document.getElementById('image');
    const avatarImage = document.querySelector('.avatar-image img');

    // Добавляем атрибут "hidden" при загрузке страницы
    if (avatarImage.src=="") {
        avatarImage.style.display = "none";
    }

    input.addEventListener('change', function () {
        const file = input.files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function () {
            if (reader.result) {
                avatarImage.src = reader.result;
                avatarImage.style.display = "block"; // Удаляем атрибут "hidden"
            } else {
                avatarImage.src = "";
                avatarImage.style.display = "none"; // Добавляем атрибут "hidden"
            }
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    });
</script>
