@extends('layouts.site')

@section('content')
    <div style="background-color: #d2d5d5" class="main-body-channels">
        <div class="container py-4">
            <div class="row">
                <h1>Правила</h1>
                <div class="col-md-4">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">1. Правила поведінки</a>
                        <a href="#" class="list-group-item list-group-item-action">2. Правила розміщення контенту</a>
                        <a href="#" class="list-group-item list-group-item-action">3. Правила спілкування з іншими учасниками</a>
                        <a href="#" class="list-group-item list-group-item-action">4. Правила використання особистих даних</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="container-fluid" style="height: 100vh;">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 24px;">Виберіть пункт правил</h5>
                                <div class="card-text" style="font-size: 24px;">
                                    <p>На цій сторінці буде відображено всі пункти правил, які необхідно дотримуватися, використовуючи наш форум. Для ознайомлення з кожним пунктом правил вам необхідно вибрати відповідний пункт в меню зліва.</p>
                                    <p>Використовуючи наш форум - Ви автоматично погоджуєтесь з правилами форуму та правилами ведення діалогу. У разі відмови – можете залишити цей форум. Адміністрація не несе відповідальності за поведінку інших користувачів.</p>
                                    <p>Успіхів! Натисніть на один з пунктів зліва, щоб відобразити його опис.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Получаем все элементы списка слева
        const items = document.querySelectorAll('.list-group-item');

        // Добавляем обработчик событий на каждый элемент списка
        items.forEach(item => {
            item.addEventListener('click', () => {
                // Убираем класс active со всех элементов списка
                items.forEach(i => i.classList.remove('active'));
                // Добавляем класс active на выбранный элемент списка
                item.classList.add('active');
                // Получаем заголовок и текст выбранного пункта правил
                const title = item.textContent.trim();
                let text;
                if (title === '1. Правила поведінки') {
                    text = 'Ввічлива поведінка, відсутність образ та загроз. Не розміщуйте контент, що порушує законодавство. Не зловживайте правом на використання форуму для реклами або продажу товарів та послуг.';
                } else if (title ===  '2. Правила розміщення контенту') {
                    text = 'Заборонено розміщувати контент, що порушує авторські права. Не допускається розміщення порнографії, насильства, наркотиків та пропаганди екстремізму. Рекомендується уникати політичних дискусій.';
                } else if (title ===  '3. Правила спілкування з іншими учасниками') {
                    text = 'Поважайте думки інших учасників. Уникайте конфліктів та сперечань, намагайтеся знайти спільну мову. Не розголошуйте особисту інформацію інших учасників без їх згоди. У разі порушення правил спілкування, модератори форуму можуть застосовувати відповідні заходи до порушників.';
                } else if (title ===  '4. Правила використання особистих даних') {
                    text =  'При реєстрації на форумі ви погоджуєтесь на обробку своїх персональних даних. Форум зобовязується не передавати ваші дані третім особам та використовувати їх тільки в цілях функціонування форуму. Не розголошуйте особисті дані інших учасників форуму.';

                } else {
                    text = 'На цій сторінці буде відображено всі пункти правил, які необхідно дотримуватися, використовуючи наш форум. Для ознайомлення з кожним пунктом правил вам необхідно вибрати відповідний пункт в меню зліва. Використовуючи наш форум - Ви автоматично погоджуєтесь з правилами форуму та правилами ведення діалогу. У разі відмови – можете залишити цей форум. Адміністрація не несе відповідальності за поведінку інших користувачів.Успіхів!Натисніть на один з пунктів зліва, щоб відобразити його опис.';
                }
                // Выводим заголовок и текст выбранного пункта в правой части страницы
                const cardTitle = document.querySelector('.card-title');
                const cardText = document.querySelector('.card-text');
                cardTitle.textContent = title;
                cardText.textContent = text;
            });
        });
    </script>
@endsection




