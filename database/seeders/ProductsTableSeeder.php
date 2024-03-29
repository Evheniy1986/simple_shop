<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'name' => 'Xiaomi Redmi Note 13 8/256 Mint Green',
                'code' => 'redmi-note-13',
                'description' => 'З Redmi можливо все, що ви задумали
Смартфон Redmi Note 13, оснащений потужним 6 нм процесором Snapdragon 685, легко підтримує режим багатозадачності і справляється з будь-якими викликами. 6.67-дюймовий FHD+ AMOLED дисплей з частотою оновлення 120 Гц та колірним охопленням 100% DCI-P3 радує соковитими кольорами та чіткими деталями. Основна камера з супер-чітким модулем 108 Мп отримує чудові фото навіть за слабкого освітлення. Завдяки швидкій зарядці потужністю 33 Вт поповнити заряд батареї можна перед виходом з дому.',
                'image' => 'products/QaBoLSh6VwStky122NdP2T2Gi7pNw8mpDqNRnXVD.png',
                'price' => 9299,
                'count' => rand(0,10)
            ],
            [
                'category_id' => 1,
                'name' => 'Apple iPhone 15 256GB Black (MTP63)',
                'code' => 'iPhone-15',
                'description' => 'Экран (6.1", OLED (Super Retina XDR), 2556x1179) / Apple A17 Pro / основная квадрокамера: 48 Мп + 12 Мп + 12 Мп + 12 Мп, фронтальная камера: 12 Мп / 256 ГБ встроенной памяти / 3G / LTE / 5G / GPS / Nano-SIM / iOS 17',
                'image' => 'products/c9dVDHMGZFXpCWXK8YqLjt2l7AeIDqf4VsqQSiWv.png',
                'price' => 41999,
                'count' => rand(0,10)
            ],
            [
                'category_id' => 3,
                'name' => 'Кофемашина DELONGHI Dinamica Plus ECAM380.95.TB',
                'code' => 'delongi',
                'description' => 'DINAMICA PLUS
Dinamica позволяет создавать
разнообразные кофейные
напитки на любой вкус
Автоматическая кофемашина премиум-класса
от DeLonghi для всей семьи.',
                'image' => 'products/7cGsqqQ0l5oCxQXH0lJFABgGUvvHp4m8tDf6BBdG.jpg',
                'price' => 28999,
                'count' => rand(0,10)
            ],
            [
                'category_id' => 3,
                'name' => 'Холодильник Samsung RB38T679FB1/UA',
                'code' => 'samsung-3b38t',
                'description' => 'Вписується у твій спосіб життя
Холодильник Samsung RB38T679F з об\'ємом 400 літрів та інноваційними функціями стане незамінним для зберігання продуктів. Технологія всебічного охолодження All-Around Cooling забезпечує рівномірний розподіл холоду в кожному куточку камери, а функція No Frost запобігає утворенню льоду на стінках. Модель побудована на базі технології Digital Inverter, що гарантує ефективну роботу та довговічність – це підтверджено 20-річною гарантією на компресор.',
                'image' => 'products/88Gfi4eawqOYr5wtDpdFZUgaqKSEMnH5QJeleZZY.jpg',
                'price' => 28345,
                'count' => rand(0,10)
            ],
            [
                'category_id' => 3,
                'name' => 'Пральна машина Whirlpool WRBSB 6228 B UA',
                'code' => 'whirlpool-wrbsb',
                'description' => 'Безшумна робота

Інноваційний інверторний двигун SENSE Inverter забезпечить тривалу безшумну роботу. Насолоджуйтесь ідеальними результатами та тишею.
Моя програма - Персоналізовані рішення

Збережіть у пам\'яті пристрою Ваші улюблені програми. Опція Улюблені програми дозволить Вам зберегти програми, які ви використовуєте найчастіше для простого та зручного використання.
    Блокування від дітей

Насамперед безпека.
    Ця пральна машина Whirlpool оснащена системою блокування від дітей для запобігання випадковому використанню цього приладу дітьми.
    Індикація ходу програми

Інтуїтивне керування.
    Індикація ходу програми відображає всі етапи вибраного циклу.
    Таймер зворотного відліку',
                'image' => 'products/CeWZNMaQX79VBIcYQvZVS0vbxNtaLQgSt4q8Xthu.png',
                'price' => 13999,
                'count' => rand(0,10)
            ],
            [
                'category_id' => 2,
                'name' => 'Навушники JBL Tune 720 BT (JBLT720BTBLK) Blue',
                'code' => 'jbl-tune-720vt',
                'description' => 'Бездротові навушники JBL Tune 720 BT дають чистий басовий звук JBL Pure Bass за допомогою з\'єднання Bluetooth 5.3. Завдяки цим технологіям ви отримаєте чудове звучання без дротів та обмежень. Щоб налаштувати техніку, використовуйте програму JBL Headphones. Система багатоточкового підключення суттєво полегшує використання у зв\'язці з декількома девайсами. Отримайте 76 годин автономної роботи за рахунок ємної батареї.',
                'image' => 'products/Lp0rLk2kCCLqjWzbLSfCtJ8G6fZyf2rQgiPBhEiN.png',
                'price' => 2399,
                'count' => rand(0,10)
            ],
            [
                'category_id' => 2,
                'name' => 'Ігрова консоль Xbox Series S 1TB чорна',
                'code' => 'igrovaya-consol-xbox-black',
                'description' => 'Легенда у твоїх руках
Приготуйтеся до нереального ігрового досвіду, який отримаєте з консоллю XBOX Series S. Вона стала тією самою приставкою, що доступна за ціною і забезпечує лише приємні враження від геймінгу. Продуктивність найвищого рівня, велика цифрова бібліотека, прискорене завантаження – що може бути крутіше? Додайте до цього підписку Game Pass Ultimate, що дає можливість протестувати ігри прямо в день їх виходу – краще за цю забавку не знайти!',
                'image' => 'products/p7IGJviQjiLrnAOfKPWZ7DFSSrAvloTjvJRFlzL5.jpg',
                'price' => 17999,
                'count' => rand(0,10)
            ],
            [
                'category_id' => 3,
                'name' => 'М\'ясорубка Tefal HV1 7в1 NE109838',
                'code' => 'tefal-hv1',
                'description' => 'М\'ясорубка Tefal HV 7в1 - ідеальний помічник на кухні, якщо ви хочете приготувати будь-який рецепт страв на основі м\'ясного фаршу, а також для салатів, гарнірів або томатного соку.

Легко і швидко перемеліть будь-яке, навіть жорстке м\'ясо, наріжете або натрете овочі, приготуєте томатний соус, сосиски та багато іншого за допомогою компактної та потужної м\'ясорубки.
Ідеальний партнер на кухні завдяки потужності 1400 Вт обробляє до 1,7 кг м\'яса за хвилину.

    За допомогою даної моделі можна швидко і легко приготувати безліч рецептів завдяки універсальному набору аксесуарів, які входять у комплект: 2 насадки для різного перемелювання м\'яса, 3 барабани для нарізки та шатківниці, насадка для ковбас та насадка для виробництва томатного соку.
Завдяки компактній конструкції та вбудованій великій ручці м\'ясорубку зручно зберігати та транспортувати.
    М\'ясорубка Tefal HV 7в1 помічник, який завжди під рукою та готовий до роботи, якщо ви хочете приготувати смачні страви легко та швидко.',
                'image' => 'products/04hjzrDZhqj0aE0nqGKJI4JedbTcWj0TSogPLyTi.jpg',
                'price' => 3599,
                'count' => rand(0,10)
            ],
            [
                'category_id' => 3,
                'name' => 'Бойлер Бош',
                'code' => 'boiler',
                'description' => 'Бойлер Бош самій лучший',
                'image' => 'products/bDho166TajVubRuwwv9didCFZJZc7Ff7cMSB7AAT.jpg',
                'price' => 6799,
                'count' => rand(0,10)
            ],
            [
                'category_id' => 1,
                'name' => 'Xiami redmi note 7',
                'code' => 'note-7',
                'description' => 'Xiami redmi note 7 black',
                'image' => 'products/HlOYgk4h2DnxSumG82NGgwRNhW4CdCjg7Z1T0vCz.png',
                'price' => 3999,
                'count' => rand(0,10)
            ],

        ]);
    }
}
