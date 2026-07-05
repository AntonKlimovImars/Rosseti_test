<?php

namespace Database\Seeders;

use App\Models\PageBlock;
use App\Models\BlockField;
use Illuminate\Database\Seeder;

class PageBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'slug' => 'hero',
                'title' => 'Главный баннер',
                'order' => 1,
                'fields' => [
                    ['key' => 'title', 'value' => 'СОЗДАЕМ ПОТЕНЦИАЛ РАЗВИТИЯ СТРАНЫ', 'type' => 'text', 'label' => 'Заголовок'],
                    ['key' => 'subtitle', 'value' => 'Отчет Группы компании «Россети» об устойчивом развитии за 2024 год', 'type' => 'text', 'label' => 'Подзаголовок'],
                    ['key' => 'bg_image', 'value' => '', 'type' => 'image', 'label' => 'Фоновое изображение'],
                ],
            ],
            [
                'slug' => 'about',
                'title' => 'О компании',
                'order' => 2,
                'fields' => [
                    ['key' => 'title', 'value' => 'Мы — группа компаний «Россети»', 'type' => 'text', 'label' => 'Заголовок'],
                    ['key' => 'description', 'value' => 'Ведущий оператор электрических сетей в Российской Федерации — одна из крупнейших электросетевых компаний в мире. Группа управляет 2,5 млн км линий электропередачи, 901 тыс. подстанций с трансформаторной мощностью 835 ГВА.', 'type' => 'textarea', 'label' => 'Описание'],
                    ['key' => 'description_2', 'value' => 'Что делает Группу крупнейшим распределительным сетевым комплексом в мире и обеспечивает ее влияние на электроэнергетический сектор, а также придает ее деятельности существенное значение.', 'type' => 'textarea', 'label' => 'Описание 2'],
                    ['key' => 'image', 'value' => '', 'type' => 'image', 'label' => 'Фотография'],
                ],
            ],
            [
                'slug' => 'director-speech',
                'title' => 'Обращение директора',
                'order' => 3,
                'fields' => [
                    ['key' => 'name', 'value' => 'А. В. Рюмин', 'type' => 'text', 'label' => 'ФИО'],
                    ['key' => 'position', 'value' => 'Генеральный директор ПАО «Россети»', 'type' => 'text', 'label' => 'Должность'],
                    ['key' => 'photo', 'value' => '', 'type' => 'image', 'label' => 'Фото директора'],
                    ['key' => 'signature', 'value' => '', 'type' => 'image', 'label' => 'Подпись'],
                ],
            ],
            [
                'slug' => 'about-long-read',
                'title' => 'Письмо директора',
                'order' => 4,
                'fields' => [
                    ['key' => 'greeting', 'value' => 'Уважаемые коллеги!', 'type' => 'text', 'label' => 'Приветствие'],
                    ['key' => 'text_col1', 'value' => '', 'type' => 'rich_text', 'label' => 'Текст (левая колонка)'],
                    ['key' => 'text_col2', 'value' => '', 'type' => 'rich_text', 'label' => 'Текст (правая колонка)'],
                    ['key' => 'stat_1_value', 'value' => '725 млрд руб.', 'type' => 'text', 'label' => 'Статистика 1 — значение'],
                    ['key' => 'stat_1_label', 'value' => 'выручка за 2024 год', 'type' => 'text', 'label' => 'Статистика 1 — подпись'],
                    ['key' => 'stat_2_value', 'value' => '770 млрд руб.', 'type' => 'text', 'label' => 'Статистика 2 — значение'],
                    ['key' => 'stat_2_label', 'value' => 'инвестпрограмма', 'type' => 'text', 'label' => 'Статистика 2 — подпись'],
                    ['key' => 'stat_3_value', 'value' => '1,2 млрд руб.', 'type' => 'text', 'label' => 'Статистика 3 — значение'],
                    ['key' => 'stat_3_label', 'value' => 'социальные программы', 'type' => 'text', 'label' => 'Статистика 3 — подпись'],
                    ['key' => 'stat_4_value', 'value' => '10,8 млрд руб.', 'type' => 'text', 'label' => 'Статистика 4 — значение'],
                    ['key' => 'stat_4_label', 'value' => 'экология и охрана окружающей среды', 'type' => 'text', 'label' => 'Статистика 4 — подпись'],
                ],
            ],
            [
                'slug' => 'about-report',
                'title' => 'Об отчете',
                'order' => 5,
                'fields' => [
                    ['key' => 'label', 'value' => 'Об отчете', 'type' => 'text', 'label' => 'Метка'],
                    ['key' => 'title', 'value' => 'Максимально полно представляем информацию о деятельности компании', 'type' => 'text', 'label' => 'Заголовок'],
                    ['key' => 'principles', 'value' => json_encode([
                        'Учет мнений заинтересованных сторон',
                        'Сравнимость',
                        'Актуальность',
                        'Существенность',
                        'Прозрачность',
                        'Достоверность',
                    ], JSON_UNESCAPED_UNICODE), 'type' => 'json', 'label' => 'Принципы (JSON массив)'],
                ],
            ],
            [
                'slug' => 'material-topics',
                'title' => 'Существенные темы',
                'order' => 6,
                'fields' => [
                    ['key' => 'label', 'value' => 'GRI 3-1, 3-2', 'type' => 'text', 'label' => 'Метка'],
                    ['key' => 'title', 'value' => 'Существенные темы отчета', 'type' => 'text', 'label' => 'Заголовок'],
                    ['key' => 'subtitle', 'value' => 'Приоритетные темы показывают, какие направления важны для внутренних и внешних стейкхолдеров.', 'type' => 'textarea', 'label' => 'Подзаголовок'],
                    ['key' => 'topics', 'value' => json_encode([
                        ['num' => '01', 'title' => 'Надежное электроснабжение', 'type' => 'Управленческий аспект'],
                        ['num' => '02', 'title' => 'Здоровье и безопасность', 'type' => 'Социальный аспект'],
                        ['num' => '03', 'title' => 'Развитие регионов', 'type' => 'Социальный аспект'],
                        ['num' => '04', 'title' => 'Забота о потребителях', 'type' => 'Социальный аспект'],
                        ['num' => '05', 'title' => 'Кадровый потенциал', 'type' => 'Социальный аспект'],
                        ['num' => '06', 'title' => 'Цифровые технологии', 'type' => 'Управленческий аспект'],
                    ], JSON_UNESCAPED_UNICODE), 'type' => 'json', 'label' => 'Темы (JSON)'],
                ],
            ],
            [
                'slug' => 'scale',
                'title' => 'Масштаб Группы',
                'order' => 7,
                'fields' => [
                    ['key' => 'title', 'value' => 'Масштаб Группы компаний «Россети»', 'type' => 'text', 'label' => 'Заголовок'],
                    ['key' => 'bg_image', 'value' => '', 'type' => 'image', 'label' => 'Фоновое изображение'],
                    ['key' => 'stat_1_value', 'value' => '82', 'type' => 'text', 'label' => 'Стат 1 — число'],
                    ['key' => 'stat_1_label', 'value' => 'региона присутствия', 'type' => 'text', 'label' => 'Стат 1 — подпись'],
                    ['key' => 'stat_2_value', 'value' => '69', 'type' => 'text', 'label' => 'Стат 2 — число'],
                    ['key' => 'stat_2_label', 'value' => 'регионов имеют статус СТСО', 'type' => 'text', 'label' => 'Стат 2 — подпись'],
                    ['key' => 'stat_3_value', 'value' => '122', 'type' => 'text', 'label' => 'Стат 3 — число'],
                    ['key' => 'stat_3_label', 'value' => 'межгосударственные линии электропередачи, по которым осуществляется учет перетоков электроэнергии', 'type' => 'text', 'label' => 'Стат 3 — подпись'],
                    ['key' => 'stat_main_value', 'value' => '~80%', 'type' => 'text', 'label' => 'Главная цифра'],
                    ['key' => 'stat_main_label', 'value' => 'вырабатываемой электроэнергии передается по сетям Группы', 'type' => 'text', 'label' => 'Главная цифра — подпись'],
                ],
            ],
            [
                'slug' => 'contents',
                'title' => 'Содержание',
                'order' => 8,
                'fields' => [
                    ['key' => 'title', 'value' => 'Содержание', 'type' => 'text', 'label' => 'Заголовок'],
                    ['key' => 'chapters', 'value' => json_encode([
                        ['num' => '01', 'title' => 'О компании', 'text' => 'Ключевая роль в обеспечении надежного электроснабжения страны.', 'img' => '/images/content-01.jpg'],
                        ['num' => '02', 'title' => 'Управление устойчивым развитием', 'text' => 'Последовательное развитие устойчивого управления.', 'img' => '/images/content-02.jpg'],
                        ['num' => '03', 'title' => 'Вклад в развитие страны', 'text' => 'Инвестиции и вклад в экономику регионов.', 'img' => '/images/content-03.jpg'],
                        ['num' => '04', 'title' => 'Забота об окружающей среде', 'text' => 'Снижение экологического воздействия.', 'img' => '/images/content-04.jpg'],
                        ['num' => '05', 'title' => 'Защита прав человека', 'text' => 'Сильная команда и ответственность работодателя.', 'img' => '/images/content-05.png'],
                        ['num' => '06', 'title' => 'Вклад в общество', 'text' => 'Поддержка регионов и социальных инициатив.', 'img' => '/images/content-06.jpg'],
                        ['num' => '07', 'title' => 'Управленческий аспект', 'text' => 'Финансовая устойчивость и корпоративное управление.', 'img' => '/images/content-07.jpg'],
                        ['num' => '08', 'title' => 'Приложения', 'text' => 'Прозрачная отчетность по международным стандартам.', 'img' => '/images/content-08.jpg'],
                    ], JSON_UNESCAPED_UNICODE), 'type' => 'json', 'label' => 'Главы (JSON)'],
                ],
            ],
        ];

        foreach ($blocks as $blockData) {
            $fields = $blockData['fields'];
            unset($blockData['fields']);

            $block = PageBlock::updateOrCreate(
                ['slug' => $blockData['slug']],
                $blockData
            );

            foreach ($fields as $order => $fieldData) {
                BlockField::updateOrCreate(
                    ['page_block_id' => $block->id, 'key' => $fieldData['key']],
                    array_merge($fieldData, ['order' => $order])
                );
            }
        }
    }
}
