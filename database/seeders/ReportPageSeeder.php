<?php

namespace Database\Seeders;

use App\Models\ReportPage;
use App\Models\ReportSubsection;
use Illuminate\Database\Seeder;

class ReportPageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            ['number' => '01', 'title' => 'О Компании',                     'slug' => 'about-company',      'order' => 1],
            ['number' => '02', 'title' => 'Управление устойчивым развитием', 'slug' => 'sustainability',     'order' => 2],
            ['number' => '03', 'title' => 'Вклад в развитие страны',         'slug' => 'contribution',       'order' => 3],
            ['number' => '04', 'title' => 'Забота об окружающей среде',      'slug' => 'environment',        'order' => 4],
            ['number' => '05', 'title' => 'Защита прав человека',            'slug' => 'human-rights',       'order' => 5],
            ['number' => '06', 'title' => 'Вклад в общество',               'slug' => 'society',            'order' => 6],
            ['number' => '07', 'title' => 'Управленческий аспект',           'slug' => 'governance',         'order' => 7],
            ['number' => '08', 'title' => 'Приложения',                      'slug' => 'appendix',           'order' => 8],
        ];

        foreach ($pages as $pageData) {
            ReportPage::create(array_merge($pageData, [
                'is_active' => true,
                'color' => '#005B9C',
            ]));
        }

        // Seed subsections for "01 О Компании"
        $aboutCompany = ReportPage::where('slug', 'about-company')->first();

        $subsections = [
            [
                'title' => 'Портрет Группы компаний «Россети»',
                'slug' => 'portrait',
                'order' => 1,
                'content_blocks' => [
                    [
                        'type' => 'gri_reference',
                        'data' => ['codes' => 'GRI 2-1, 2-6'],
                    ],
                    [
                        'type' => 'heading',
                        'data' => ['content' => 'Портрет Группы компаний «Россети»', 'level' => 'h2'],
                    ],
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'content' => '<p>Группа «Россети» – системообразующая компания России и естественный монопольный оператор магистральных и распределительных электрических сетей страны.</p><p>Мы обеспечиваем передачу и распределение электроэнергии, а также технологическое присоединение потребителей практически во всех регионах страны. Около 80% всей вырабатываемой в стране электроэнергии проходит через наши сети.</p><p>В состав Группы входят 39 дочерних и зависимых обществ, в том числе 17 сетевых компаний. Материнская компания Группы, ПАО «Россети», выполняет функции по управлению Единой национальной электрической сетью.</p>',
                        ],
                    ],
                    [
                        'type' => 'stats_grid',
                        'data' => [
                            'items' => [
                                ['value' => '82', 'unit' => '', 'description' => 'региона присутствия'],
                                ['value' => '69', 'unit' => '', 'description' => 'регионов имеют стат ГТО'],
                                ['value' => '122', 'unit' => '', 'description' => 'вида основной деятельности'],
                                ['value' => '~80%', 'unit' => '', 'description' => 'вырабатываемой электроэнергии передается по сетям Группы'],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Миссия и ценности',
                'slug' => 'mission',
                'order' => 2,
                'content_blocks' => [
                    [
                        'type' => 'heading',
                        'data' => ['content' => 'Миссия и ценности', 'level' => 'h2'],
                    ],
                    [
                        'type' => 'quote',
                        'data' => [
                            'text' => 'Обеспечение надежного и качественного электроснабжения потребителей как ключевого условия развития экономики и повышения качества жизни граждан.',
                            'author' => '',
                            'position' => 'Миссия компании',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'География присутствия',
                'slug' => 'geography',
                'order' => 3,
                'content_blocks' => [
                    [
                        'type' => 'heading',
                        'data' => ['content' => 'География присутствия', 'level' => 'h2'],
                    ],
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'content' => '<p>Группа «Россети» осуществляет деятельность на территории 82 субъектов Российской Федерации.</p>',
                        ],
                    ],
                    [
                        'type' => 'image',
                        'data' => ['url' => null, 'caption' => 'Карта присутствия Группы «Россети»', 'size' => 'full'],
                    ],
                ],
            ],
            [
                'title' => 'Бизнес-модель',
                'slug' => 'business-model',
                'order' => 4,
                'content_blocks' => [
                    [
                        'type' => 'heading',
                        'data' => ['content' => 'Бизнес-модель', 'level' => 'h2'],
                    ],
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'content' => '<p>Бизнес-модель Группы «Россети» основана на передаче и распределении электроэнергии, а также технологическом присоединении потребителей к электрическим сетям.</p>',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Созданная и распределенная прямая экономическая стоимость',
                'slug' => 'economic-value',
                'order' => 5,
                'content_blocks' => [
                    [
                        'type' => 'heading',
                        'data' => ['content' => 'Созданная и распределенная прямая экономическая стоимость', 'level' => 'h2'],
                    ],
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'content' => '<p>Информация об экономической стоимости, созданной и распределенной Группой компаний «Россети».</p>',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Признание',
                'slug' => 'recognition',
                'order' => 6,
                'content_blocks' => [
                    [
                        'type' => 'heading',
                        'data' => ['content' => 'Признание', 'level' => 'h2'],
                    ],
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'content' => '<p>Достижения и награды Группы компаний «Россети» в отчетном периоде.</p>',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Ключевые события года',
                'slug' => 'key-events',
                'order' => 7,
                'content_blocks' => [
                    [
                        'type' => 'heading',
                        'data' => ['content' => 'Ключевые события года', 'level' => 'h2'],
                    ],
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'content' => '<p>Основные события и достижения Группы компаний «Россети» за отчетный год.</p>',
                        ],
                    ],
                ],
            ],
        ];

        foreach ($subsections as $subsectionData) {
            $aboutCompany->subsections()->create($subsectionData);
        }
    }
}
